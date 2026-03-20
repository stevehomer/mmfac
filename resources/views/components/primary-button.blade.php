<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150']) }} style="background:#d45f30" onmouseover="this.style.background='#b84e24'" onmouseout="this.style.background='#d45f30'">
    {{ $slot }}
</button>
