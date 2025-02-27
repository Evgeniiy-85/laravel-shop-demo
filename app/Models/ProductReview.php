<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model {
    use HasFactory;

    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;
}
