<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use Translatable;

    protected $table = 'blogs';

    protected $fillable = ['hide', 'image', 'category_id', 'model_type', 'model_id'];

    public $translatedAttributes = ['title','description'];
    protected $with = ['translations'];

    public $translationForeignKey = 'blog_id';

    public $translationModel = BlogTranslation::class;


    public static function scopeFilter($query,$request)
    {
        return $query->where(function ($q) use ($request) {
            if ($request->search) {
                $q->whereHasTranslate('title', 'like', '%' . $request->search . '%');

            }


            if ($request->category_id) {
                $q->where('category_id', $request->category_id);
            }
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
