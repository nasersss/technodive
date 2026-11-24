<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Work extends Model
{
    use HasFactory,HasTranslations;

    /** The kinds of work, used to filter the works page and shown as the project's service type. */
    public const CATEGORIES = ['salvage', 'welding', 'survey'];

    protected $fillable = [
        'title',
        'description',
        'image',
    ];
    public $translatable = ['title', 'description', 'client', 'location', 'duration'];

    public function workImages()
    {
        return $this->hasMany(WorkImage::class, 'work_id');
    }

    /** The category in the current language, e.g. «إنقاذ سفن», or null when the work has none. */
    public function categoryLabel(): ?string
    {
        return in_array($this->category, self::CATEGORIES, true) ? __('landing.category_' . $this->category) : null;
    }
}
