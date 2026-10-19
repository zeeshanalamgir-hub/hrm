<?php

namespace App\Support;

use Illuminate\Support\Str;

/**
 * Builds short initials for avatars, e.g. "Olivia Martin" => "OM".
 * This is the single place that decides how initials look.
 */
class Initials
{
    public static function from(?string $name, int $length = 2, string $fallback = '?'): string
    {
        $initials = Str::of((string) $name)
            ->squish()
            ->explode(' ')
            ->filter()
            ->take($length)
            ->map(fn (string $part) => Str::upper(Str::substr($part, 0, 1)))
            ->implode('');

        return $initials !== '' ? $initials : $fallback;
    }
}
