{{-- Project facts for works (shown only when the modal is opened from the works page: class "work").
     $workCategories: every category, passed by WorkController@index.
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
    <label class="form-label" for="{{ $fieldId('category') }}">قسم العمل (يظهر كنوع الخدمة) · <a href="{{ route('work_category_list') }}">إدارة الأقسام</a></label>
    <select name="category_id" id="{{ $fieldId('category') }}" class="form-control">
        <option value="">بدون قسم</option>
        @foreach ($workCategories ?? [] as $category)
            <option value="{{ $category->id }}">{{ $category->getTranslation('name', 'ar', false) }} - {{ $category->getTranslation('name', 'en', false) }}@if ($category->is_active != 1) (معلّق)@endif</option>
        @endforeach
    </select>
    @error('category_id')
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
