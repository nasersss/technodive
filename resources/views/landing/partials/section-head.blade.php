{{-- Shared section heading: eyebrow + two-line title + optional side text --}}
<div @class(['td-section-head', 'td-section-head--center' => $center ?? false]) data-reveal>
    <div class="td-section-head__main">
        <p class="td-eyebrow">{{ $eyebrow }}</p>
        <h2 class="td-title">{{ $title1 }}@isset($title2)<br>{{ $title2 }}@endisset</h2>
    </div>
    @isset($text)
        <p class="td-section-head__text">{{ $text }}</p>
    @endisset
</div>
