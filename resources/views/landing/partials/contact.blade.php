{{-- $withMap: true on the contact page --}}
<section class="td-section td-contact" id="contact">
    <div class="td-container">
        <div class="td-contact__card">
            <div class="td-contact__info" data-reveal>
                <p class="td-eyebrow">{{ __('landing.contact_eyebrow') }}</p>
                <h2 class="td-title">{{ __('landing.contact_title_1') }}<br>{{ __('landing.contact_title_2') }}</h2>
                <p class="td-lead">{{ __('landing.contact_text') }}</p>

                <ul class="td-contact__list">
                    <li class="td-contact__item">
                        <span class="td-contact__icon">@include('landing.partials.icon', ['name' => 'pin'])</span>
                        <span>
                            <small>{{ __('landing.address_label') }}</small>
                            <strong>{{ __('landing.address') }}</strong>
                        </span>
                    </li>
                    <li class="td-contact__item">
                        <span class="td-contact__icon">@include('landing.partials.icon', ['name' => 'phone'])</span>
                        <span>
                            <small>{{ __('landing.phone_label') }}</small>
                            <a href="tel:+967733899087" dir="ltr">+967 733 899 087</a>
                            <a href="tel:+967777375652" dir="ltr">+967 777 375 652</a>
                        </span>
                    </li>
                    <li class="td-contact__item">
                        <span class="td-contact__icon">@include('landing.partials.icon', ['name' => 'mail'])</span>
                        <span>
                            <small>{{ __('landing.email_label') }}</small>
                            <a href="mailto:saeed78ba@yahoo.com"><strong>saeed78ba@yahoo.com</strong></a>
                        </span>
                    </li>
                </ul>
            </div>

            <form method="POST" action="{{ route('contact_us_store') }}" class="td-form" data-reveal data-disable-on-submit>
                @csrf
                <h3 class="td-form__title">{{ __('landing.form_title') }}</h3>
                <div class="td-form__row">
                    <div class="td-field">
                        <label for="td-name">{{ __('landing.form_name') }}</label>
                        <input type="text" id="td-name" name="name" value="{{ old('name') }}" placeholder="{{ __('landing.form_name_ph') }}" autocomplete="name" required
                            @error('name') aria-invalid="true" aria-describedby="td-name-error" @enderror>
                        @error('name')<p class="td-field__error" id="td-name-error">{{ $message }}</p>@enderror
                    </div>
                    <div class="td-field">
                        <label for="td-email">{{ __('landing.form_email') }}</label>
                        <input type="email" id="td-email" name="email" value="{{ old('email') }}" placeholder="name@company.com" autocomplete="email" dir="ltr" required
                            @error('email') aria-invalid="true" aria-describedby="td-email-error" @enderror>
                        @error('email')<p class="td-field__error" id="td-email-error">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="td-field">
                    <label for="td-subject">{{ __('landing.form_subject') }}</label>
                    <input type="text" id="td-subject" name="subject" value="{{ old('subject', request('subject')) }}" placeholder="{{ __('landing.form_subject_ph') }}" required
                        @error('subject') aria-invalid="true" aria-describedby="td-subject-error" @enderror>
                    @error('subject')<p class="td-field__error" id="td-subject-error">{{ $message }}</p>@enderror
                </div>
                <div class="td-field">
                    <label for="td-message">{{ __('landing.form_message') }}</label>
                    <textarea id="td-message" name="message" rows="4" placeholder="{{ __('landing.form_message_ph') }}" required
                        @error('message') aria-invalid="true" aria-describedby="td-message-error" @enderror>{{ old('message') }}</textarea>
                    @error('message')<p class="td-field__error" id="td-message-error">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="td-btn td-btn--amber td-btn--lg">
                    {{ __('landing.form_send') }} @include('landing.partials.icon', ['name' => 'arrow', 'size' => 18, 'class' => 'td-flip'])
                </button>
            </form>

            @if ($withMap ?? false)
                @include('landing.partials.map')
            @endif
        </div>
    </div>
</section>
