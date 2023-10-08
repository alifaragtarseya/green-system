<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    protected $table = 'blog_translations';
    protected $fillable = [
        'title',
        'locale',
        'blog_id',
        'description'
    ];

}
