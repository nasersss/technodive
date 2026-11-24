{{-- One sign-in form field.
     $name · $label · $icon (user|lock) · optional: $type (text), $value, $placeholder, $autocomplete, $autofocus, $hint --}}
@php
    $type = $type ?? 'text';
    $id = 'td-' . $name;
    $isPassword = $type === 'password';
@endphp
<div @class(['td-auth-field', 'td-auth-field--password' => $isPassword])>
    <label for="{{ $id }}">{{ $label }}</label>
    <div class="td-auth-field__control">
        <span class="td-auth-field__icon">@include('landing.partials.icon', ['name' => $icon, 'size' => 18])</span>
        <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value ?? '' }}"
            placeholder="{{ $placeholder ?? '' }}" autocomplete="{{ $autocomplete ?? 'off' }}" required
            @if ($autofocus ?? false) autofocus @endif
            @if (! $isPassword) dir="auto" @endif
            @error($name) aria-invalid="true" aria-describedby="{{ $id }}-error" @enderror>
        @if ($isPassword)
            <button type="button" class="td-auth-field__toggle" data-password-toggle aria-controls="{{ $id }}" aria-pressed="false" aria-label="إظهار كلمة المرور">
                @include('landing.partials.icon', ['name' => 'eye', 'size' => 18, 'class' => 'td-eye'])
                @include('landing.partials.icon', ['name' => 'eye-off', 'size' => 18, 'class' => 'td-eye-off'])
            </button>
        @endif
    </div>
    @error($name)
        <p class="td-auth-field__error" id="{{ $id }}-error">{{ $message }}</p>
    @enderror
    @isset($hint)
        <p class="td-auth-field__hint">{{ $hint }}</p>
    @endisset
</div>
