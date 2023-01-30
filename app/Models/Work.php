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
    public $translatable = ['title','description'];

    public function workImages()
    {
        return $this->hasMany(WorkImage::class, 'work_id');
    }
}
