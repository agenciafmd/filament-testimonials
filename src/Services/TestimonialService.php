<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Services;

use Agenciafmd\Testimonials\Models\Testimonial;
use Illuminate\Database\Eloquent\Builder;

final class TestimonialService
{
    public static function make(): static
    {
        return app(self::class);
    }

    private function queryBuilder(): Builder
    {
        return Testimonial::query();
    }
}
