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
use Spatie\LaravelData\Support\Validation\ValidationContext;

#[MapName(SnakeCaseMapper::class)]
class CreateProductCommand extends Data
{
    public function __construct(
        #[Bail, AlphaNumeric, Unique(Product::class, 'article')]
        public string $article,
        #[Bail, Min(10), Max(255)]
        public string $name,
        #[Bail, Enum(ProductStatus::class)]
        public ProductStatus $status,
        public ?array $data,
    )
    {
    }
}
