<nav x-data="{ open: false }" style="background:#2d5a3d;border-bottom:2px solid #1a3d28" class="sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 flex items-center justify-between h-12">

        {{-- Logo --}}
        <a href="{{ route('home') }}" style="color:white;font-weight:700;font-size:0.95rem;text-decoration:none">
            ☕ Meet Me for a Coffee
        </a>

        {{-- Desktop links --}}
        <ul class="hidden sm:flex items-center gap-6 list-none m-0 p-0">
            <li><a href="{{ route('shops.index') }}" style="color:rgba(255,255,255,0.8);text-decoration:none;font-size:0.83rem" class="hover:text-white transition-colors">Find a shop</a></li>
            @auth
                <li><a href="{{ route('dashboard') }}" style="color:rgba(255,255,255,0.8);text-decoration:none;font-size:0.83rem" class="hover:text-white transition-colors">My meetups</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" style="color:rgba(255,255,255,0.8);background:none;border:none;font-size:0.83rem;cursor:pointer" class="hover:text-white transition-colors">Sign out</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" style="color:rgba(255,255,255,0.8);text-decoration:none;font-size:0.83rem" class="hover:text-white transition-colors">Sign in</a></li>
                <li>
                    <a href="{{ route('register') }}" style="background:#d45f30;color:white;padding:0.3rem 0.85rem;border-radius:3px;text-decoration:none;font-size:0.82rem;font-weight:600">
                        Join free
                    </a>
                </li>
            @endauth
        </ul>

        {{-- Hamburger --}}
        <button @click="open = !open" class="sm:hidden flex flex-col gap-1 p-1 border-0 bg-transparent cursor-pointer" aria-label="Menu">
            <span style="display:block;width:20px;height:2px;background:white"></span>
            <span style="display:block;width:20px;height:2px;background:white"></span>
            <span style="display:block;width:20px;height:2px;background:white"></span>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden" style="background:#2d5a3d;border-top:1px solid rgba(255,255,255,0.1)">
        <a href="{{ route('shops.index') }}" style="display:block;color:rgba(255,255,255,0.85);text-decoration:none;font-size:0.9rem;padding:0.75rem 1rem;border-bottom:1px solid rgba(255,255,255,0.1)">Find a shop</a>
        @auth
            <a href="{{ route('dashboard') }}" style="display:block;color:rgba(255,255,255,0.85);text-decoration:none;font-size:0.9rem;padding:0.75rem 1rem;border-bottom:1px solid rgba(255,255,255,0.1)">My meetups</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="display:block;width:100%;text-align:left;color:rgba(255,255,255,0.85);background:none;border:none;font-size:0.9rem;padding:0.75rem 1rem;cursor:pointer">Sign out</button>
            </form>
        @else
            <a href="{{ route('login') }}" style="display:block;color:rgba(255,255,255,0.85);text-decoration:none;font-size:0.9rem;padding:0.75rem 1rem;border-bottom:1px solid rgba(255,255,255,0.1)">Sign in</a>
            <a href="{{ route('register') }}" style="display:block;color:rgba(255,255,255,0.85);text-decoration:none;font-size:0.9rem;padding:0.75rem 1rem">Join free</a>
        @endauth
    </div>
</nav>
