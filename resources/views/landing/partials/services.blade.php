<section class="td-section td-services" id="services">
    <div class="td-container">
        @include('landing.partials.section-head', [
            'eyebrow' => __('landing.services_eyebrow'),
            'title1' => __('landing.services_title_1'),
            'title2' => __('landing.services_title_2'),
            'text' => __('landing.services_text'),
        ])

        <div class="td-services__grid">
            @foreach ($services as $i => $service)
                @php
                    $heading = $service->title ?: $service->description;
                    $sub = $service->title ? $service->description : null;
                @endphp
                <a href="{{ route('services') }}" class="td-service td-service--{{ $loop->iteration }}" data-reveal>
                    @if ($service->image)
                        <img src="{{ asset('storage/images/' . $service->image) }}" alt="" loading="lazy">
                    @endif
                    <span class="td-service__open" aria-hidden="true">@include('landing.partials.icon', ['name' => 'arrow-up', 'size' => 16])</span>
                    <span class="td-service__body">
                        <span class="td-num td-num--amber">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <strong class="td-service__title">{{ $heading }}</strong>
                        @if ($sub)
                            <span class="td-service__text">{{ $sub }}</span>
                        @endif
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>
