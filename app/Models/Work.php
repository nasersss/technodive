<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Work extends Model
{
    use HasFactory,HasTranslations;

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

    public function category()
    {
        return $this->belongsTo(WorkCategory::class, 'category_id');
    }

    /** The category visitors may see: null when the work has none or it is suspended. */
    public function visibleCategory(): ?WorkCategory
    {
        return $this->category && (int) $this->category->is_active === 1 ? $this->category : null;
    }
}
