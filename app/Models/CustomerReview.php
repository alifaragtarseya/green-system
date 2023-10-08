<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class CustomerReview extends Model
{
    use Translatable;

    protected $table = 'customer_reviews';

    protected $fillable = ['image'];

    public $translatedAttributes = ['title','description'];
    protected $with = ['translations'];

    public $translationForeignKey = 'customer_review_id';

    public $translationModel = CustomerReviewTranslation::class;
}
