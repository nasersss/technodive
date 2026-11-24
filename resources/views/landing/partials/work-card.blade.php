{{-- One project card (works page, «other projects»).
     $work · optional $wide (featured, image beside the text on desktop) · optional $showText (default true) --}}
@php
    $url = route('singleProjects', $work->id);
    $category = $work->categoryLabel();
@endphp
<article @class(['td-work', 'td-work--card', 'td-work--wide' => $wide ?? false]) data-work-category="{{ $work->category ?: 'other' }}" data-reveal>
    <div class="td-work__media">
        <a href="{{ $url }}" class="td-work__media-link" tabindex="-1" aria-hidden="true">
            @isset($work->workImages[0])
                <img src="{{ asset('storage/images/' . $work->workImages[0]->image) }}" alt="" loading="lazy">
            @endisset
        </a>
        @if ($category)
            <span class="td-work__badge">{{ $category }}</span>
        @endif
    </div>
    <div class="td-work__body">
        @if ($work->location)
            <p class="td-work__meta">@include('landing.partials.icon', ['name' => 'pin', 'size' => 15]) {{ $work->location }}</p>
        @endif
        <h3 class="td-work__title"><a href="{{ $url }}">{{ $work->title }}</a></h3>
        @if (($showText ?? true) && $work->description)
            <p class="td-work__text td-clamp-3">{{ $work->description }}</p>
        @endif
        <a href="{{ $url }}" class="td-link">
            {{ __('landing.project_details') }} @include('landing.partials.icon', ['name' => 'arrow', 'size' => 16, 'class' => 'td-flip'])
        </a>
    </div>
</article>
