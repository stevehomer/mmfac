<x-app-layout title="Invite someone for coffee — Meet Me for a Coffee">

    <div class="max-w-xl mx-auto px-4 py-8">

        <h1 style="font-size:1.4rem;font-weight:700;margin-bottom:0.4rem">Invite someone for coffee</h1>
        <p style="font-size:0.85rem;color:#666;margin-bottom:2rem">Pick a shop, choose a time, and send your invite. They get a link to accept or decline — no account needed.</p>

        @if($errors->any())
        <div style="background:#fef2f2;border:1px solid #fca5a5;border-radius:4px;padding:0.9rem 1rem;margin-bottom:1.25rem;font-size:0.82rem;color:#b91c1c">
            <ul style="margin:0;padding-left:1.2rem">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('meetups.store') }}">
            @csrf

            {{-- Shop --}}
            <div style="margin-bottom:1.25rem">
                <label style="display:block;font-size:0.82rem;font-weight:600;margin-bottom:0.4rem;color:#333">Coffee shop</label>
                <select name="coffee_shop_id" required style="width:100%;padding:0.6rem 0.8rem;border:1.5px solid #ccc;border-radius:3px;font-size:0.88rem;background:white;outline:none">
                    <option value="">— Choose a shop —</option>
                    @foreach($shops as $s)
                    <option value="{{ $s->id }}" {{ (old('coffee_shop_id', $shop?->id) == $s->id) ? 'selected' : '' }}>
                        {{ $s->name }}, {{ $s->town }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Name --}}
            <div style="margin-bottom:1.25rem">
                <label style="display:block;font-size:0.82rem;font-weight:600;margin-bottom:0.4rem;color:#333">Their name <span style="font-weight:400;color:#999">(optional)</span></label>
                <input type="text" name="invitee_name" value="{{ old('invitee_name') }}" placeholder="e.g. Sarah"
                    style="width:100%;padding:0.6rem 0.8rem;border:1.5px solid #ccc;border-radius:3px;font-size:0.88rem;outline:none;box-sizing:border-box">
            </div>

            {{-- Email --}}
            <div style="margin-bottom:1.25rem">
                <label style="display:block;font-size:0.82rem;font-weight:600;margin-bottom:0.4rem;color:#333">Their email address</label>
                <input type="email" name="invitee_email" value="{{ old('invitee_email') }}" required placeholder="friend@example.com"
                    style="width:100%;padding:0.6rem 0.8rem;border:1.5px solid #ccc;border-radius:3px;font-size:0.88rem;outline:none;box-sizing:border-box">
            </div>

            {{-- Date/time --}}
            <div style="margin-bottom:1.25rem">
                <label style="display:block;font-size:0.82rem;font-weight:600;margin-bottom:0.4rem;color:#333">Proposed date &amp; time</label>
                <input type="datetime-local" name="proposed_at" value="{{ old('proposed_at') }}" required
                    style="width:100%;padding:0.6rem 0.8rem;border:1.5px solid #ccc;border-radius:3px;font-size:0.88rem;outline:none;box-sizing:border-box">
            </div>

            {{-- Message --}}
            <div style="margin-bottom:1.75rem">
                <label style="display:block;font-size:0.82rem;font-weight:600;margin-bottom:0.4rem;color:#333">Personal message <span style="font-weight:400;color:#999">(optional)</span></label>
                <textarea name="message" rows="3" placeholder="Would love to catch up..." maxlength="500"
                    style="width:100%;padding:0.6rem 0.8rem;border:1.5px solid #ccc;border-radius:3px;font-size:0.88rem;outline:none;resize:vertical;box-sizing:border-box">{{ old('message') }}</textarea>
                <div style="font-size:0.7rem;color:#999;margin-top:0.25rem">Max 500 characters</div>
            </div>

            <button type="submit" style="background:#d45f30;color:white;border:none;padding:0.75rem 2rem;border-radius:4px;font-size:0.92rem;font-weight:600;cursor:pointer;width:100%">
                Send invite ☕
            </button>
        </form>

    </div>

</x-app-layout>
