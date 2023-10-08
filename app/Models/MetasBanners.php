<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetasBanners extends Model
{
    protected $table = 'metas_banners';

    protected $fillable = ['page', 'title', 'keywords', 'description', 'image'];
}
