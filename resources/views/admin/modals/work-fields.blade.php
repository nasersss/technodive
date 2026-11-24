{{-- Project facts for works (shown only when the modal is opened from the works page: class "work").
     $prefix: '' for the add modal, 'update' for the edit modal, so the ids stay unique. --}}
@php
    $fieldId = fn (string $name) => $prefix ? $prefix . ucfirst($name) : $name;
    $textFields = [
        'clientAr' => 'العميل بالعربي',
        'clientEn' => 'العميل بالإنجليزية',
        'locationAr' => 'الموقع بالعربي',
        'locationEn' => 'الموقع بالإنجليزية',
        'durationAr' => 'المدة بالعربي (مثال: قرابة 6 أشهر)',
        'durationEn' => 'المدة بالإنجليزية (مثال: About 6 months)',
    ];
@endphp
<div class="col-12 mt-2 hide work">
    <label class="form-label" for="{{ $fieldId('category') }}">تصنيف العمل (يظهر كنوع الخدمة)</label>
    <select name="category" id="{{ $fieldId('category') }}" class="form-control">
        <option value="">بدون تصنيف</option>
        @foreach (\App\Models\Work::CATEGORIES as $category)
            <option value="{{ $category }}">{{ __('landing.category_' . $category, [], 'ar') }} - {{ __('landing.category_' . $category, [], 'en') }}</option>
        @endforeach
    </select>
    @error('category')
        <div class="text-danger px-2">{{ $message }}</div>
    @enderror
</div>
@foreach ($textFields as $name => $label)
    <div class="col-md-6 col-sm-12 mt-2 hide work">
        <label class="form-label" for="{{ $fieldId($name) }}">{{ $label }}</label>
        <input type="text" id="{{ $fieldId($name) }}" name="{{ $name }}" class="form-control" @if (str_ends_with($name, 'En')) dir="ltr" @endif>
        @error($name)
            <div class="text-danger px-2">{{ $message }}</div>
        @enderror
    </div>
@endforeach
