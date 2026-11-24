{{-- $withHead (default true) · $layout: '' home (4 columns) | 'two' services page | 'rows' equipment page (image beside text) --}}
@php $layout = $layout ?? ''; @endphp
<section class="td-section td-equipment" id="equipment">
    <div class="td-container">
        @if ($withHead ?? true)
            @include('landing.partials.section-head', [
                'eyebrow' => __('landing.equipment_eyebrow'),
                'title1' => __('landing.equipment_title_1'),
                'title2' => __('landing.equipment_title_2'),
                'text' => __('landing.equipment_text'),
            ])
        @endif

        <div @class(['td-equipment__grid', 'td-equipment__grid--' . $layout => $layout])>
            @foreach ($equipments as $equipment)
                <article @class(['td-gear', 'td-gear--row' => $layout === 'rows']) data-reveal>
                    <div class="td-gear__media">
                        @if ($equipment->image)
                            <img src="{{ asset('storage/images/' . $equipment->image) }}" alt="{{ $equipment->title }}" loading="lazy">
                        @endif
                    </div>
                    <div class="td-gear__body">
                        <span class="td-num td-num--amber">E-{{ sprintf('%02d', $loop->iteration) }}</span>
                        <h3 class="td-gear__title">{{ $equipment->title }}</h3>
                        @if ($equipment->description)
                            <p class="td-gear__text">{{ $equipment->description }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
