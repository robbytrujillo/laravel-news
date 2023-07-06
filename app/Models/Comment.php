<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'post_id', 'name', 'email', 'comment'
        ];

    /**
     * createdAt
     * 
     * return Attribute
     */
    protected function createdAt(): Attribute {
        return Attribute::make(
            get: fn($value) => \Carbon\Carbon::locale('id')->parse($value)->translateFormate('l, d F Y'),
        );
    }

    /**
     * updateAt
     * 
     * @return Attribute
     */
    protected function updateAt(): Attribute {
        return Attribute::make(
        get: fn ($value) =>\Carbon\Carbon::locale('id')->parse($value)->translate('l, d F Y'),
        );
    }
}
