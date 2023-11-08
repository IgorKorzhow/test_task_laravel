<?php

namespace App\Commands\Product;

use App\Enums\ProductStatus;
use App\Models\Product;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\AlphaNumeric;
use Spatie\LaravelData\Attributes\Validation\Bail;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class UpdateProductCommand extends Data
{
    public function __construct(
        #[Bail, AlphaNumeric, Unique(table: Product::class, column: 'article')]
        public Optional|string $article,
        #[Bail, Min(10), Max(255)]
        public Optional|string $name,
        #[Bail, Enum(ProductStatus::class)]
        public Optional|ProductStatus $status,
        public array $data,
    )
    {
    }
}
