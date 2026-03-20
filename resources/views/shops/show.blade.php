<x-app-layout title="{{ $coffeeShop->name }} — Meet Me for a Coffee">

    <div class="max-w-3xl mx-auto px-4 py-8">

        {{-- Back --}}
        <a href="{{ route('shops.index') }}" style="font-size:0.8rem;color:#2d5a3d;text-decoration:none;display:inline-block;margin-bottom:1.5rem">← All shops</a>

        {{-- Header --}}
        <div style="background:white;border:1px solid #ddd;border-radius:6px;padding:1.5rem;margin-bottom:1.25rem">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:1rem">
                <div>
                    <h1 style="font-size:1.5rem;font-weight:700;margin-bottom:0.25rem">{{ $coffeeShop->name }}</h1>
                    <div style="font-size:0.82rem;color:#666;margin-bottom:0.4rem">{{ $coffeeShop->address }}</div>
                    @if($coffeeShop->rating)
                    <div style="font-size:0.8rem;color:#b45309">★ {{ number_format($coffeeShop->rating, 1) }} rating</div>
                    @endif
                </div>
                @auth
                <a href="{{ route('meetups.create', ['shop' => $coffeeShop->id]) }}"
                   style="background:#d45f30;color:white;padding:0.6rem 1.25rem;border-radius:4px;text-decoration:none;font-weight:600;font-size:0.88rem;white-space:nowrap">
                    ☕ Meet here
                </a>
                @else
                <a href="{{ route('register') }}"
                   style="background:#2d5a3d;color:white;padding:0.6rem 1.25rem;border-radius:4px;text-decoration:none;font-weight:600;font-size:0.88rem">
                    Join to invite someone
                </a>
                @endauth
            </div>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.25rem">

            {{-- About --}}
            <div style="background:white;border:1px solid #ddd;border-radius:6px;padding:1.25rem;grid-column:1/-1">
                @if($coffeeShop->description)
                <p style="font-size:0.88rem;color:#444;line-height:1.65">{{ $coffeeShop->description }}</p>
                @endif
            </div>

            {{-- Amenities --}}
            <div style="background:white;border:1px solid #ddd;border-radius:6px;padding:1.25rem">
                <h2 style="font-size:0.72rem;text-transform:uppercase;letter-spacing:0.08em;color:#999;margin-bottom:0.85rem;font-weight:700">What's here</h2>
                @if($coffeeShop->amenities)
                <div style="display:flex;flex-wrap:wrap;gap:0.4rem">
                    @foreach($coffeeShop->amenities as $a)
                    <span style="font-size:0.78rem;padding:0.25rem 0.6rem;background:#edf4f0;color:#2d5a3d;border-radius:3px;font-weight:500">{{ $a['icon'] }} {{ $a['label'] }}</span>
                    @endforeach
                </div>
                @else
                <p style="font-size:0.8rem;color:#999">No amenities listed yet.</p>
                @endif
            </div>

            {{-- Info --}}
            <div style="background:white;border:1px solid #ddd;border-radius:6px;padding:1.25rem">
                <h2 style="font-size:0.72rem;text-transform:uppercase;letter-spacing:0.08em;color:#999;margin-bottom:0.85rem;font-weight:700">Info</h2>
                @if($coffeeShop->opening_hours)
                <div style="font-size:0.8rem;color:#555;margin-bottom:0.5rem">🕐 {{ $coffeeShop->opening_hours }}</div>
                @endif
                @if($coffeeShop->phone)
                <div style="font-size:0.8rem;color:#555;margin-bottom:0.5rem">📞 {{ $coffeeShop->phone }}</div>
                @endif
                @if($coffeeShop->website)
                <div style="font-size:0.8rem;margin-bottom:0.5rem">
                    <a href="{{ $coffeeShop->website }}" target="_blank" style="color:#2d5a3d">🌐 Website</a>
                </div>
                @endif
                @if($coffeeShop->postcode)
                <div style="font-size:0.8rem;color:#555">📍 {{ $coffeeShop->postcode }}</div>
                @endif
            </div>

        </div>

    </div>

</x-app-layout>
