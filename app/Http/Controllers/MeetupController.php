<?php

namespace App\Http\Controllers;

use App\Models\CoffeeShop;
use App\Models\MeetupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetupController extends Controller
{
    public function create(Request $request)
    {
        $shop = null;
        if ($request->get('shop')) {
            $shop = CoffeeShop::find($request->get('shop'));
        }
        $shops = CoffeeShop::active()->orderBy('name')->get();
        return view('meetups.create', compact('shop', 'shops'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'coffee_shop_id' => 'required|exists:coffee_shops,id',
            'invitee_email'  => 'required|email',
            'invitee_name'   => 'nullable|string|max:100',
            'proposed_at'    => 'required|date|after:now',
            'message'        => 'nullable|string|max:500',
        ]);

        $meetup = MeetupRequest::create([
            ...$validated,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')
            ->with('success', "Invite sent to {$meetup->invitee_email}!");
    }

    public function respond(string $token)
    {
        $meetup = MeetupRequest::where('token', $token)
            ->with(['user', 'coffeeShop'])
            ->firstOrFail();

        return view('meetups.respond', compact('meetup'));
    }

    public function answer(Request $request, string $token)
    {
        $meetup = MeetupRequest::where('token', $token)->firstOrFail();

        if (! $meetup->isPending()) {
            return redirect()->route('meetups.respond', $token)
                ->with('info', 'This invite has already been answered.');
        }

        $action = $request->input('action');
        if (! in_array($action, ['accepted', 'declined'])) {
            abort(422);
        }

        $meetup->update([
            'status'       => $action,
            'responded_at' => now(),
        ]);

        return redirect()->route('meetups.respond', $token)
            ->with('success', $action === 'accepted' ? "You've accepted — see you there!" : "No problem, the invite has been declined.");
    }

    public function dashboard()
    {
        $sent = MeetupRequest::where('user_id', Auth::id())
            ->with('coffeeShop')
            ->orderByDesc('proposed_at')
            ->get();

        return view('dashboard', compact('sent'));
    }
}
