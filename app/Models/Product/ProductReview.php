<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model {
    use HasFactory;

    protected $fillable = ['id', 'review_advantage', 'review_disadvantage', 'review_comment', 'review_rating'];
}
