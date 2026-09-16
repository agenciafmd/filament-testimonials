<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials;

use Agenciafmd\Testimonials\Resources\Testimonials\TestimonialResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

final class TestimonialsPlugin implements Plugin
{
    public static function make(): static
    {
        return resolve(self::class);
    }

    public function getId(): string
    {
        return 'testimonials';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                TestimonialResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
