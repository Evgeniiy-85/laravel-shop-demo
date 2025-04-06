<?php

namespace App\Models;

use App\Enums\ActivityStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Category extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'status'  => ActivityStatus::class
    ];

    /**
     * Get the user's first name.
     */
    protected function imageUrl(): Attribute {
        return Attribute::make(
            get: fn () =>  $this->image ? Storage::disk('categories')->url($this->image) : asset('/images/no-img.png'),
        );
    }


    /**
     * @return Attribute
     */
    protected $fillable = ['title', 'parent', 'alias', 'status', 'image'];
}
