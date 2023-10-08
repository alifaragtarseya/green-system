<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImages extends Model
{
    protected $table = 'project_images';

    protected $fillable = ['image', 'project_id'];
}
