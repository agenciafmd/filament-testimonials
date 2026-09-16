<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Services;

final class TestimonialService
{
    public static function make(): static
    {
        return resolve(self::class);
    }
}
