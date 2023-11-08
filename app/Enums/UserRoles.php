<?php

namespace App\Enums;

use App\Enums\Traits\valuesTrait;

enum UserRoles: string
{
    use valuesTrait;
    case ADMIN = 'admin';
    case USER = 'user';
}
