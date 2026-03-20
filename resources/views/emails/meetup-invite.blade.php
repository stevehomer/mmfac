<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffee invite from {{ $meetup->user->name }}</title>
    <style>
        body { margin: 0; padding: 0; background: #f9f9f7; font-family: 'Figtree', Arial, sans-serif; color: #333; }
        .wrap { max-width: 560px; margin: 40px auto; background: #fff; border-radius: 8px; overflow: hidden; border: 1px solid #e5e7eb; }
        .header { background: #2d5a3d; padding: 24px 32px; }
        .header h1 { margin: 0; color: #fff; font-size: 1.2rem; font-weight: 700; }
        .header p { margin: 4px 0 0; color: #a8d5b0; font-size: 0.85rem; }
        .body { padding: 32px; }
        .body h2 { margin: 0 0 8px; font-size: 1.4rem; color: #2d5a3d; }
        .body p { margin: 0 0 16px; line-height: 1.6; color: #555; }
        .detail-box { background: #f9f9f7; border: 1px solid #e5e7eb; border-radius: 6px; padding: 16px 20px; margin: 20px 0; }
        .detail-box p { margin: 4px 0; font-size: 0.9rem; }
        .detail-box strong { color: #2d5a3d; }
        .message-box { background: #fffbf5; border-left: 3px solid #d45f30; padding: 12px 16px; margin: 16px 0; border-radius: 0 4px 4px 0; }
        .message-box p { margin: 0; font-style: italic; color: #555; }
        .cta { text-align: center; margin: 28px 0 8px; }
        .btn-accept { display: inline-block; background: #2d5a3d; color: #fff; text-decoration: none; padding: 12px 28px; border-radius: 6px; font-weight: 700; font-size: 0.95rem; margin-right: 8px; }
        .btn-decline { display: inline-block; background: #fff; color: #666; text-decoration: none; padding: 12px 28px; border-radius: 6px; font-weight: 600; font-size: 0.95rem; border: 1px solid #d1d5db; }
        .footer { padding: 20px 32px; text-align: center; font-size: 0.75rem; color: #999; border-top: 1px solid #f0f0f0; }
        .footer a { color: #2d5a3d; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="header">
        <h1>☕ Meet Me for a Coffee</h1>
        <p>meetmeforacoffee.com</p>
    </div>
    <div class="body">
        <h2>You've been invited for a coffee!</h2>
        <p>
            <strong>{{ $meetup->user->name }}</strong> would love to meet you at
            <strong>{{ $meetup->coffeeShop->name }}</strong>.
        </p>

        <div class="detail-box">
            <p><strong>Where:</strong> {{ $meetup->coffeeShop->name }}</p>
            <p style="color:#666;font-size:0.82rem;margin-top:2px">{{ $meetup->coffeeShop->address }}</p>
            <p style="margin-top:10px"><strong>When:</strong> {{ $meetup->proposed_at->format('l j F Y \a\t g:ia') }}</p>
        </div>

        @if($meetup->message)
        <div class="message-box">
            <p>"{{ $meetup->message }}"</p>
        </div>
        @endif

        <p>Can you make it? Let {{ $meetup->user->name }} know:</p>

        <div class="cta">
            <a href="{{ route('meetups.respond', $meetup->token) }}" class="btn-accept">View &amp; Respond</a>
        </div>

        <p style="font-size:0.8rem;color:#999;text-align:center;margin-top:16px">
            Or paste this link into your browser:<br>
            <a href="{{ route('meetups.respond', $meetup->token) }}" style="color:#2d5a3d;word-break:break-all">{{ route('meetups.respond', $meetup->token) }}</a>
        </p>
    </div>
    <div class="footer">
        You received this because {{ $meetup->user->name }} found you through Meet Me for a Coffee.<br>
        <a href="{{ route('home') }}">meetmeforacoffee.com</a>
    </div>
</div>
</body>
</html>
