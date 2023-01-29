<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];
    
    public $translatable = ['title','description'];

}
