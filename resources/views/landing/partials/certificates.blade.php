<section class="td-section td-certs" id="certificates">
    <div class="td-container">
        @if ($withHead ?? true)
            @include('landing.partials.section-head', [
                'eyebrow' => __('landing.certificates_eyebrow'),
                'title1' => __('landing.certificates_title_1'),
                'title2' => __('landing.certificates_title_2'),
            ])
        @endif

        <div class="td-tabs" role="tablist" aria-label="{{ __('landing.certificates_eyebrow') }}" data-reveal>
            <button type="button" role="tab" class="td-tab is-active" aria-selected="true" data-cert-filter="all">{{ __('landing.filter_all') }}</button>
            <button type="button" role="tab" class="td-tab" aria-selected="false" data-cert-filter="qualification">{{ __('landing.filter_qualification') }}</button>
            <button type="button" role="tab" class="td-tab" aria-selected="false" data-cert-filter="appreciation">{{ __('landing.filter_appreciation') }}</button>
        </div>

        <div class="td-certs__grid">
            @foreach ($certificates as $certificate)
                @php
                    $typeAr = $certificate->getTranslation('type', 'ar', false);
                    $category = $typeAr === 'مؤهل' ? 'qualification' : ($typeAr === 'تقدير' ? 'appreciation' : 'other');
                    $heading = $certificate->title ?: $certificate->description;
                    $sub = $certificate->title ? $certificate->description : null;
                @endphp
                <article class="td-cert" data-cert="{{ $category }}" data-reveal>
                    <div class="td-cert__media">
                        @if ($certificate->image)
                            <img src="{{ asset('storage/images/' . $certificate->image) }}" alt="{{ $heading }}" loading="lazy">
                        @endif
                    </div>
                    <div class="td-cert__body">
                        @if ($certificate->type)
                            <span @class(['td-badge', 'td-badge--amber' => $category === 'appreciation'])>{{ $certificate->type }}</span>
                        @endif
                        @if ($heading)
                            <h3 class="td-cert__title">{{ $heading }}</h3>
                        @endif
                        @if ($sub)
                            <p class="td-cert__text">{{ $sub }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
