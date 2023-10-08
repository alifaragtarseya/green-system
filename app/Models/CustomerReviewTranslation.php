<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerReviewTranslation extends Model
{
    protected $table = 'customer_review_translations';
    protected $fillable = [
        'title',
        'locale',
        'customer_review_id',
        'description'
    ];
}
