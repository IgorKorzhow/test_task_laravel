<?php

namespace App\Data;

use App\Enums\ProductStatus;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ProductData extends Data
{

    public function __construct(
        public int $id,
        public string $article,
        public string $name,
        public ProductStatus $status,
        public array $data,
        public Carbon $createdAt,
        public Carbon $updatedAt,
        public ?Carbon $deletedAt,
    )
    {
    }
}
