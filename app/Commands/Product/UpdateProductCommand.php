<?php

namespace App\Commands\Product;

use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Bail;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Support\Validation\ValidationContext;

#[MapName(SnakeCaseMapper::class)]
class UpdateProductCommand extends Data
{
    public function __construct(
        public Optional|string $article,
        #[Bail, Min(10), Max(255)]
        public Optional|string $name,
        #[Bail, Enum(ProductStatus::class)]
        public Optional|ProductStatus $status,
        public Optional|array $data,
    )
    {
    }

    public static function rules(ValidationContext $context): array
    {
        return [
            'article' => [
                'bail',
                'max:255',
                'alpha_num',
                Rule::unique(Product::class, 'article')
                    ->ignore(
                        request()
                            ->route()
                            ->parameter('product')
                    )
            ]
        ];
    }
}
