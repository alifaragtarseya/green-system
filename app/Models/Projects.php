<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Projects extends Model
{
    use Translatable;

    protected $table = 'projects';

    protected $fillable = ['hide'];

    public $translatedAttributes = ['title','description', 'meta_keywords', 'meta_description', 'slug'];
    protected $with = ['translations', 'images'];

    public $translationForeignKey = 'project_id';

    public $translationModel = ProjectTranslation::class;


    public function images()
    {
        return $this->hasMany(ProjectImages::class, 'project_id', 'id');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = slug($value);
    }
}
