{{-- Key figures (home hero, about page, works page) --}}
<div class="td-stats">
    @php
        $stats = [
            ['value' => 20, 'plus' => true, 'label' => __('landing.stat_years')],
            ['value' => 11, 'plus' => false, 'label' => __('landing.stat_team')],
            ['value' => 50, 'plus' => true, 'label' => __('landing.stat_clients')],
            ['value' => 100, 'plus' => true, 'label' => __('landing.stat_works')],
        ];
    @endphp
    @foreach ($stats as $i => $stat)
        <div @class(['td-stat', 'td-stat--accent' => $i === 0]) data-reveal>
            <p class="td-stat__value"><span data-count="{{ $stat['value'] }}">{{ $stat['value'] }}</span>@if ($stat['plus'])<span class="td-stat__plus">+</span>@endif</p>
            <p class="td-stat__label">{{ $stat['label'] }}</p>
        </div>
    @endforeach
</div>
