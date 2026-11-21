<section class="td-section td-testimonials" id="testimonials">
    <div class="td-container">
        @include('landing.partials.section-head', [
            'eyebrow' => __('landing.testimonials_eyebrow'),
            'title1' => __('landing.testimonials_title'),
            'center' => true,
        ])

        <div class="td-testimonials__grid">
            @foreach ($customers as $customer)
                <figure @class(['td-quote', 'td-quote--accent' => $loop->first]) data-reveal>
                    <span class="td-quote__mark" aria-hidden="true">&#8221;</span>
                    @if ($customer->description)
                        <blockquote class="td-quote__text">{{ $customer->description }}</blockquote>
                    @endif
                    <figcaption class="td-quote__author">
                        <span class="td-quote__avatar">
                            @if ($customer->image)
                                <img src="{{ asset('storage/images/' . $customer->image) }}" alt="" loading="lazy">
                            @else
                                <span class="td-quote__initial" aria-hidden="true">{{ mb_substr((string) $customer->name, 0, 1) }}</span>
                            @endif
                        </span>
                        <span>
                            <strong>{{ $customer->name }}</strong>
                            @if ($customer->job)
                                <span>{{ $customer->job }}</span>
                            @endif
                        </span>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
