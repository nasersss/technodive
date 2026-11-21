{{-- Inline stroke icons. Usage: @include('landing.partials.icon', ['name' => 'pin']) --}}
<svg class="td-icon {{ $class ?? '' }}" viewBox="0 0 24 24" width="{{ $size ?? 20 }}" height="{{ $size ?? 20 }}" fill="none" stroke="currentColor" stroke-width="{{ $stroke ?? 1.8 }}" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
@switch($name)
    @case('sun')
        <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
        @break
    @case('moon')
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
        @break
    @case('menu')
        <path d="M4 7h16M4 12h16M4 17h16"/>
        @break
    @case('close')
        <path d="M6 6l12 12M18 6L6 18"/>
        @break
    @case('arrow')
        {{-- points toward the inline-end (left in RTL); flipped in LTR via CSS --}}
        <path d="M19 12H5M11 6l-6 6 6 6"/>
        @break
    @case('arrow-up')
        {{-- diagonal "open" arrow --}}
        <path d="M17 17L7 7M7 15V7h8"/>
        @break
    @case('pin')
        <path d="M12 21s-7-6.1-7-11.5A7 7 0 0 1 19 9.5C19 14.9 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/>
        @break
    @case('phone')
        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/>
        @break
    @case('mail')
        <rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>
        @break
    @case('shield')
        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/>
        @break
    @case('gear')
        <circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.22 4.22l2.12 2.12M17.66 17.66l2.12 2.12M2 12h3M19 12h3M4.22 19.78l2.12-2.12M17.66 6.34l2.12-2.12"/>
        @break
    @case('award')
        <circle cx="12" cy="9" r="6"/><path d="M8.5 14.5L7 22l5-3 5 3-1.5-7.5"/>
        @break
    @case('quote')
        <path d="M10 7c-3 1-4.5 3.2-4.5 6.5V17H10v-4H7.5M19 7c-3 1-4.5 3.2-4.5 6.5V17H19v-4h-2.5"/>
        @break
@endswitch
</svg>
