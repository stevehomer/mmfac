<x-app-layout title="Find a Coffee Shop — Meet Me for a Coffee">

    {{-- Search & filters --}}
    <section style="background:white;border-bottom:1px solid #ddd;padding:1rem 1.5rem;position:sticky;top:48px;z-index:40">
        <div class="max-w-5xl mx-auto">
            <form method="GET" action="{{ route('shops.index') }}" style="display:flex;flex-wrap:wrap;gap:0.5rem;align-items:center">
                <div style="display:flex;flex:1;min-width:220px;border-radius:3px;overflow:hidden;border:1.5px solid #2d5a3d">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Town, postcode or shop name…"
                        style="flex:1;padding:0.5rem 0.8rem;border:none;outline:none;font-size:0.88rem">
                    <button type="submit" style="background:#2d5a3d;color:white;border:none;padding:0.5rem 0.9rem;font-weight:600;cursor:pointer;font-size:0.85rem">Search</button>
                </div>
                <div style="display:flex;flex-wrap:wrap;gap:0.3rem">
                    @foreach(['wifi' => '📶 Wi-Fi', 'outdoor' => '🌿 Outdoor', 'dogs' => '🐕 Dogs', 'food' => '🍳 Hot food', 'accessible' => '♿ Accessible'] as $key => $label)
                    <label style="display:flex;align-items:center;gap:0.3rem;font-size:0.75rem;padding:0.25rem 0.55rem;border:1px solid {{ request()->boolean($key) ? '#2d5a3d' : '#ccc' }};border-radius:3px;background:{{ request()->boolean($key) ? '#edf4f0' : 'white' }};cursor:pointer;color:{{ request()->boolean($key) ? '#2d5a3d' : '#666' }}">
                        <input type="checkbox" name="{{ $key }}" value="1" {{ request()->boolean($key) ? 'checked' : '' }} onchange="this.form.submit()" style="display:none">
                        {{ $label }}
                    </label>
                    @endforeach
                </div>
            </form>
        </div>
    </section>

    <div class="max-w-5xl mx-auto px-4 py-6">

        <div style="font-size:0.78rem;color:#666;margin-bottom:1.25rem">
            {{ $shops->count() }} {{ Str::plural('shop', $shops->count()) }} found
            @if(request('q')) matching "<strong>{{ request('q') }}</strong>" @endif
        </div>

        @if($shops->isEmpty())
            <div style="text-align:center;padding:3rem 1rem;color:#666">
                <div style="font-size:2.5rem;margin-bottom:1rem">☕</div>
                <p>No shops found. Try a different search or remove some filters.</p>
                <a href="{{ route('shops.index') }}" style="color:#2d5a3d;margin-top:0.75rem;display:inline-block">Clear search</a>
            </div>
        @else
            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:1rem">
                @foreach($shops as $shop)
                <div style="background:white;border:1px solid #ddd;border-radius:5px;overflow:hidden">
                    <div style="padding:1rem">
                        <div style="font-weight:700;font-size:0.95rem;margin-bottom:0.2rem">
                            <a href="{{ route('shops.show', $shop) }}" style="color:#1a1a1a;text-decoration:none">{{ $shop->name }}</a>
                        </div>
                        <div style="font-size:0.75rem;color:#666;margin-bottom:0.6rem">{{ $shop->address }}</div>
                        @if($shop->rating)
                        <div style="font-size:0.72rem;color:#b45309;margin-bottom:0.6rem">★ {{ number_format($shop->rating, 1) }}</div>
                        @endif
                        @if($shop->description)
                        <p style="font-size:0.78rem;color:#555;line-height:1.55;margin-bottom:0.75rem">{{ Str::limit($shop->description, 100) }}</p>
                        @endif
                        <div style="display:flex;flex-wrap:wrap;gap:0.3rem;margin-bottom:0.9rem">
                            @foreach($shop->amenities as $a)
                            <span style="font-size:0.65rem;padding:0.15rem 0.4rem;background:#edf4f0;color:#2d5a3d;border-radius:3px">{{ $a['icon'] }} {{ $a['label'] }}</span>
                            @endforeach
                        </div>
                        <div style="display:flex;gap:0.5rem">
                            <a href="{{ route('shops.show', $shop) }}" style="font-size:0.78rem;color:#2d5a3d;font-weight:600;text-decoration:none">View profile →</a>
                            @auth
                            <a href="{{ route('meetups.create', ['shop' => $shop->id]) }}" style="font-size:0.78rem;background:#d45f30;color:white;padding:0.25rem 0.65rem;border-radius:3px;text-decoration:none;font-weight:600">Meet here</a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

</x-app-layout>
