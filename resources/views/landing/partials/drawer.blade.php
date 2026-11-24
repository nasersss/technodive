{{-- Mobile / tablet menu (opened by the header's menu button) --}}
<div class="td-drawer" id="td-drawer" data-drawer hidden>
    <div class="td-drawer__backdrop" data-menu-close></div>
    <div class="td-drawer__panel" role="dialog" aria-modal="true" aria-label="{{ __('landing.menu') }}">
        <div class="td-drawer__head">
            <img src="{{ asset('/assets/img/logo.jpg') }}" alt="" width="44" height="44">
            <button type="button" class="td-round-btn" data-menu-close aria-label="{{ __('landing.close_menu') }}">
                @include('landing.partials.icon', ['name' => 'close', 'size' => 20])
            </button>
        </div>
        <ul class="td-drawer__list">
            @foreach ($navLinks as $i => $link)
                @php $active = request()->routeIs($link['route'], $link['also'] ?? $link['route']); @endphp
                <li>
                    <a href="{{ route($link['route']) }}" @class(['td-drawer__link', 'is-active' => $active]) @if ($active) aria-current="page" @endif>
                        <span class="td-num">{{ sprintf('%02d', $i + 1) }}</span>{{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
        <a href="{{ $quoteUrl }}" class="td-btn td-btn--amber td-btn--block" data-menu-close>{{ __('landing.request_quote') }}</a>
    </div>
</div>
