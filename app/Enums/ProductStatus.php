<?php

namespace App\Enums;

use App\Enums\Traits\valuesTrait;

enum ProductStatus: string
{
    use valuesTrait;
    case AVAILABLE = 'available';
    case UNAVAILABLE = 'unavailable';
}
