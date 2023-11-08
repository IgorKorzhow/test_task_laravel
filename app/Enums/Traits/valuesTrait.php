<?php

namespace App\Enums\Traits;

trait valuesTrait
{
    public static function values(): array
    {
        $values = [];

        foreach (self::cases() as $props) {
            $values[] = $props->value;
        }

        return $values;
    }
}
