{{-- Decorative map of the office location; opens Google Maps --}}
<a class="td-map" href="https://www.google.com/maps/search/?api=1&amp;query=Mukalla%2C%20Hadramout%2C%20Yemen" target="_blank" rel="noopener" data-reveal>
    <span class="td-map__land" aria-hidden="true"></span>
    <span class="td-map__pin" aria-hidden="true">@include('landing.partials.icon', ['name' => 'pin', 'size' => 20])</span>
    <span class="td-map__label">{{ __('landing.map_label') }}</span>
    <span class="td-sr">{{ __('landing.open_map') }}</span>
</a>
