<section class="td-section td-team" id="team">
    <div class="td-container">
        @include('landing.partials.section-head', [
            'eyebrow' => __('landing.team_eyebrow'),
            'title1' => __('landing.team_title_1'),
            'title2' => __('landing.team_title_2'),
            'text' => __('landing.team_text'),
        ])

        <div class="td-team__grid">
            @foreach ($teams as $member)
                <article class="td-member" data-reveal>
                    @if ($member->image)
                        <img src="{{ asset('storage/images/' . $member->image) }}" alt="{{ $member->name }}" loading="lazy">
                    @endif
                    <div class="td-member__body">
                        <h3 class="td-member__name">{{ $member->name }}</h3>
                        @if ($member->job)
                            <p class="td-member__job">{{ $member->job }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
