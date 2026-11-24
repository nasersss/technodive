{{-- «Have a project under water?» band, closing every inner page except Contact --}}
<section class="td-section td-cta-wrap">
    <div class="td-container">
        <div class="td-cta" data-reveal>
            <div class="td-cta__text">
                <h2 class="td-cta__title">{{ __('landing.cta_title') }}</h2>
                <p>{{ __('landing.cta_text') }}</p>
            </div>
            <div class="td-cta__actions">
                <a href="{{ route('contact') }}" class="td-btn td-btn--white td-btn--lg">{{ __('landing.request_quote') }}</a>
                <a href="https://wa.me/967733899087" class="td-btn td-btn--ghost-light td-btn--lg" target="_blank" rel="noopener">
                    @include('landing.partials.icon', ['name' => 'whatsapp', 'size' => 18]) {{ __('landing.whatsapp') }}
                </a>
            </div>
        </div>
    </div>
</section>
