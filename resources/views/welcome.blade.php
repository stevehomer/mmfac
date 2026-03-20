<x-app-layout title="Meet Me for a Coffee — Find someone to meet over coffee">

    {{-- Hero --}}
    <section style="background:#2d5a3d;color:white;padding:4rem 1.5rem 3.5rem">
        <div class="max-w-4xl mx-auto text-center">
            <h1 style="font-size:2.4rem;font-weight:700;line-height:1.2;margin-bottom:1rem">
                Meet someone new<br>over a great coffee
            </h1>
            <p style="font-size:1.05rem;color:rgba(255,255,255,0.8);max-width:520px;margin:0 auto 2rem">
                Find independent coffee shops near you, invite a friend, and make it happen. Simple, social, local.
            </p>
            <div style="display:flex;gap:0.75rem;justify-content:center;flex-wrap:wrap">
                <a href="{{ route('shops.index') }}" style="background:#d45f30;color:white;padding:0.75rem 1.75rem;border-radius:4px;text-decoration:none;font-weight:600;font-size:0.95rem">
                    Find a coffee shop
                </a>
                @guest
                <a href="{{ route('register') }}" style="background:rgba(255,255,255,0.15);color:white;padding:0.75rem 1.75rem;border-radius:4px;text-decoration:none;font-weight:600;font-size:0.95rem;border:1px solid rgba(255,255,255,0.3)">
                    Join free
                </a>
                @endguest
            </div>
        </div>
    </section>

    {{-- Search bar --}}
    <section style="background:white;border-bottom:1px solid #ddd;padding:1rem 1.5rem">
        <div class="max-w-2xl mx-auto">
            <form action="{{ route('shops.index') }}" method="GET" style="display:flex;gap:0;border-radius:4px;overflow:hidden;border:1.5px solid #2d5a3d">
                <input type="text" name="q" placeholder="Search by town, postcode, or shop name..."
                    value="{{ request('q') }}"
                    style="flex:1;padding:0.65rem 1rem;border:none;outline:none;font-size:0.9rem;background:white">
                <button type="submit" style="background:#2d5a3d;color:white;border:none;padding:0 1.25rem;font-weight:600;cursor:pointer;font-size:0.88rem">
                    Search
                </button>
            </form>
        </div>
    </section>

    {{-- How it works --}}
    <section style="padding:3.5rem 1.5rem">
        <div class="max-w-4xl mx-auto">
            <h2 style="font-size:1.3rem;font-weight:700;text-align:center;margin-bottom:2.5rem;color:#1a1a1a">How it works</h2>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.5rem">
                <div style="background:white;border:1px solid #ddd;border-radius:6px;padding:1.5rem;text-align:center">
                    <div style="font-size:2rem;margin-bottom:0.75rem">🔍</div>
                    <h3 style="font-weight:600;font-size:0.95rem;margin-bottom:0.5rem;color:#1a1a1a">Find a shop</h3>
                    <p style="font-size:0.8rem;color:#666;line-height:1.6">Browse independent coffee shops near you, filtered by Wi-Fi, outdoor seating, dog-friendly and more.</p>
                </div>
                <div style="background:white;border:1px solid #ddd;border-radius:6px;padding:1.5rem;text-align:center">
                    <div style="font-size:2rem;margin-bottom:0.75rem">✉️</div>
                    <h3 style="font-weight:600;font-size:0.95rem;margin-bottom:0.5rem;color:#1a1a1a">Invite someone</h3>
                    <p style="font-size:0.8rem;color:#666;line-height:1.6">Send a meetup invite to a friend or colleague. Pick a time and place that works for both of you.</p>
                </div>
                <div style="background:white;border:1px solid #ddd;border-radius:6px;padding:1.5rem;text-align:center">
                    <div style="font-size:2rem;margin-bottom:0.75rem">☕</div>
                    <h3 style="font-weight:600;font-size:0.95rem;margin-bottom:0.5rem;color:#1a1a1a">Show up</h3>
                    <p style="font-size:0.8rem;color:#666;line-height:1.6">Your contact gets a simple invite link. Accept, suggest a different time, or pick another shop.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured shops --}}
    @if(isset($shops) && $shops->count())
    <section style="padding:0 1.5rem 3.5rem">
        <div class="max-w-4xl mx-auto">
            <h2 style="font-size:1.3rem;font-weight:700;margin-bottom:1.25rem;color:#1a1a1a">Independent shops near Watford</h2>
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:1rem">
                @foreach($shops as $shop)
                <a href="{{ route('shops.show', $shop) }}" style="background:white;border:1px solid #ddd;border-radius:4px;padding:1rem;text-decoration:none;color:inherit;display:block">
                    <div style="font-weight:600;font-size:0.9rem;margin-bottom:0.25rem">{{ $shop->name }}</div>
                    <div style="font-size:0.75rem;color:#666;margin-bottom:0.5rem">{{ $shop->address }}</div>
                    <div style="display:flex;gap:0.35rem;flex-wrap:wrap">
                        @if($shop->has_wifi)<span style="font-size:0.65rem;padding:0.15rem 0.4rem;background:#edf4f0;color:#2d5a3d;border-radius:3px">📶 Wi-Fi</span>@endif
                        @if($shop->dog_friendly)<span style="font-size:0.65rem;padding:0.15rem 0.4rem;background:#edf4f0;color:#2d5a3d;border-radius:3px">🐕 Dogs</span>@endif
                        @if($shop->has_outdoor)<span style="font-size:0.65rem;padding:0.15rem 0.4rem;background:#edf4f0;color:#2d5a3d;border-radius:3px">🌿 Outdoor</span>@endif
                    </div>
                </a>
                @endforeach
            </div>
            <div style="margin-top:1.25rem;text-align:center">
                <a href="{{ route('shops.index') }}" style="color:#2d5a3d;font-size:0.85rem;font-weight:600;text-decoration:none">See all coffee shops &rarr;</a>
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    @guest
    <section style="background:#1a3d28;color:white;padding:3rem 1.5rem;text-align:center">
        <h2 style="font-size:1.4rem;font-weight:700;margin-bottom:0.75rem">Ready to meet for coffee?</h2>
        <p style="color:rgba(255,255,255,0.75);margin-bottom:1.75rem;font-size:0.9rem">Free to join. No app needed.</p>
        <a href="{{ route('register') }}" style="background:#d45f30;color:white;padding:0.75rem 2rem;border-radius:4px;text-decoration:none;font-weight:600;font-size:0.95rem">
            Create your free account
        </a>
    </section>
    @endguest

</x-app-layout>
