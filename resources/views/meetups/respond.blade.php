<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffee invite from {{ $meetup->user->name }} — Meet Me for a Coffee</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background:#f9f9f7;font-family:system-ui,Arial,sans-serif;min-height:100vh;display:flex;flex-direction:column">

    <nav style="background:#2d5a3d;height:48px;display:flex;align-items:center;padding:0 1.5rem">
        <a href="{{ route('home') }}" style="color:white;font-weight:700;font-size:0.95rem;text-decoration:none">☕ Meet Me for a Coffee</a>
    </nav>

    <div style="flex:1;display:flex;align-items:center;justify-content:center;padding:2rem 1rem">
        <div style="background:white;border:1px solid #ddd;border-radius:8px;padding:2rem;max-width:480px;width:100%">

            @if(session('success'))
            <div style="background:#edf4f0;border:1px solid #a9d1b7;border-radius:4px;padding:0.9rem 1rem;margin-bottom:1.5rem;font-size:0.85rem;color:#1a3d28;font-weight:500">
                {{ session('success') }}
            </div>
            @endif

            @if(session('info'))
            <div style="background:#fefce8;border:1px solid #fde68a;border-radius:4px;padding:0.9rem 1rem;margin-bottom:1.5rem;font-size:0.85rem;color:#713f12">
                {{ session('info') }}
            </div>
            @endif

            <div style="text-align:center;margin-bottom:1.75rem">
                <div style="font-size:2.5rem;margin-bottom:0.75rem">☕</div>
                <h1 style="font-size:1.25rem;font-weight:700;margin-bottom:0.4rem">
                    {{ $meetup->user->name }} wants to meet for coffee
                </h1>
                @if($meetup->invitee_name)
                <p style="font-size:0.85rem;color:#666">Hi {{ $meetup->invitee_name }},</p>
                @endif
            </div>

            {{-- Details --}}
            <div style="background:#f9f9f7;border-radius:5px;padding:1.25rem;margin-bottom:1.5rem">
                <div style="display:flex;flex-direction:column;gap:0.6rem">
                    <div style="display:flex;gap:0.75rem;font-size:0.85rem">
                        <span style="color:#999;min-width:60px">Where</span>
                        <span style="font-weight:600">{{ $meetup->coffeeShop->name }}</span>
                    </div>
                    <div style="display:flex;gap:0.75rem;font-size:0.85rem">
                        <span style="color:#999;min-width:60px">Address</span>
                        <span>{{ $meetup->coffeeShop->address }}</span>
                    </div>
                    <div style="display:flex;gap:0.75rem;font-size:0.85rem">
                        <span style="color:#999;min-width:60px">When</span>
                        <span style="font-weight:600">{{ $meetup->proposed_at->format('l j F Y \a\t g:ia') }}</span>
                    </div>
                    @if($meetup->message)
                    <div style="display:flex;gap:0.75rem;font-size:0.85rem">
                        <span style="color:#999;min-width:60px">Message</span>
                        <span style="font-style:italic;color:#555">"{{ $meetup->message }}"</span>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Status or actions --}}
            @if($meetup->isPending())
            <form method="POST" action="{{ route('meetups.answer', $meetup->token) }}" style="display:flex;gap:0.75rem">
                @csrf
                <button type="submit" name="action" value="accepted"
                    style="flex:1;background:#2d5a3d;color:white;border:none;padding:0.75rem;border-radius:4px;font-size:0.9rem;font-weight:600;cursor:pointer">
                    ✓ Accept
                </button>
                <button type="submit" name="action" value="declined"
                    style="flex:1;background:white;color:#666;border:1.5px solid #ccc;padding:0.75rem;border-radius:4px;font-size:0.9rem;font-weight:600;cursor:pointer">
                    Decline
                </button>
            </form>
            @elseif($meetup->isAccepted())
            <div style="text-align:center;padding:1.25rem;background:#edf4f0;border-radius:5px;color:#1a3d28;font-weight:600">
                ✓ You've accepted this invite — see you there!
            </div>
            @else
            <div style="text-align:center;padding:1.25rem;background:#f3f4f6;border-radius:5px;color:#666">
                This invite was declined.
            </div>
            @endif

        </div>
    </div>

    <footer style="background:#111;color:#555;font-size:0.72rem;padding:0.75rem 1.5rem;text-align:center">
        Meet Me for a Coffee &copy; {{ date('Y') }}
    </footer>
</body>
</html>
