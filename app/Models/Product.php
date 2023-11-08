<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin IdeHelperProduct
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'article',
        'name',
        'status',
        'data',
    ];

    public function scopeAvailable(Builder $query): void
    {
        $query->where('status', '=', ProductStatus::AVAILABLE->value);
    }

    protected $casts = [
        'data' => 'array',
    ];
}
