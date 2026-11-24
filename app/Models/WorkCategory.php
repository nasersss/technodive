<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/** A category of works (أقسام الأعمال), e.g. «إنقاذ سفن». */
class WorkCategory extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    public function works()
    {
        return $this->hasMany(Work::class, 'category_id');
    }

    /** Active categories with at least one active work: the filters on the works page. */
    public function scopeShownOnWorksPage($query)
    {
        return $query->where('is_active', 1)
            ->whereHas('works', fn ($works) => $works->where('is_active', 1))
            ->orderBy('id');
    }
}
