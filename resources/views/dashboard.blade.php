<x-app-layout title="My Meetups — Meet Me for a Coffee">

    <div class="max-w-4xl mx-auto px-4 py-8">

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.75rem;flex-wrap:wrap;gap:1rem">
            <div>
                <h1 style="font-size:1.4rem;font-weight:700;margin-bottom:0.2rem">My meetups</h1>
                <p style="font-size:0.83rem;color:#666">Coffee invites you've sent</p>
            </div>
            <a href="{{ route('meetups.create') }}" style="background:#d45f30;color:white;padding:0.6rem 1.25rem;border-radius:4px;text-decoration:none;font-weight:600;font-size:0.88rem">
                + Invite someone
            </a>
        </div>

        @if(session('success'))
        <div style="background:#edf4f0;border:1px solid #a9d1b7;border-radius:4px;padding:0.9rem 1rem;margin-bottom:1.25rem;font-size:0.85rem;color:#1a3d28;font-weight:500">
            {{ session('success') }}
        </div>
        @endif

        @if($sent->isEmpty())
        <div style="text-align:center;padding:3.5rem 1rem;background:white;border:1px solid #ddd;border-radius:6px">
            <div style="font-size:2.5rem;margin-bottom:1rem">☕</div>
            <h2 style="font-size:1rem;font-weight:600;margin-bottom:0.5rem;color:#333">No meetups yet</h2>
            <p style="font-size:0.85rem;color:#666;margin-bottom:1.5rem">Find a coffee shop and send your first invite.</p>
            <a href="{{ route('shops.index') }}" style="background:#2d5a3d;color:white;padding:0.6rem 1.4rem;border-radius:4px;text-decoration:none;font-weight:600;font-size:0.88rem">Find a shop</a>
        </div>
        @else

        @php
            $pending  = $sent->where('status', 'pending');
            $accepted = $sent->where('status', 'accepted');
            $other    = $sent->whereNotIn('status', ['pending', 'accepted']);
        @endphp

        @foreach([['Awaiting reply', $pending, '#b45309', '#fefce8', '#fde68a'], ['Accepted', $accepted, '#1a3d28', '#edf4f0', '#a9d1b7'], ['Other', $other, '#555', '#f3f4f6', '#ddd']] as [$label, $group, $textColor, $bg, $border])
        @if($group->isNotEmpty())
        <div style="margin-bottom:2rem">
            <h2 style="font-size:0.72rem;text-transform:uppercase;letter-spacing:0.08em;color:#999;font-weight:700;margin-bottom:0.75rem">{{ $label }}</h2>
            <div style="display:flex;flex-direction:column;gap:0.6rem">
                @foreach($group as $m)
                <div style="background:white;border:1px solid #ddd;border-radius:5px;padding:1rem;display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:0.75rem">
                    <div>
                        <div style="font-weight:600;font-size:0.9rem;margin-bottom:0.2rem">
                            {{ $m->coffeeShop->name }}
                            @if($m->invitee_name)<span style="font-weight:400;color:#666"> with {{ $m->invitee_name }}</span>@endif
                        </div>
                        <div style="font-size:0.77rem;color:#666;margin-bottom:0.25rem">
                            {{ $m->proposed_at->format('D j M Y, g:ia') }} · {{ $m->invitee_email }}
                        </div>
                        <span style="display:inline-block;font-size:0.68rem;font-weight:600;padding:0.15rem 0.5rem;border-radius:3px;background:{{ $bg }};color:{{ $textColor }};border:1px solid {{ $border }}">
                            {{ ucfirst($m->status) }}
                        </span>
                    </div>
                    <a href="{{ route('meetups.respond', $m->token) }}" style="font-size:0.78rem;color:#2d5a3d;font-weight:600;text-decoration:none;white-space:nowrap">
                        View invite →
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @endforeach

        @endif
    </div>

</x-app-layout>
