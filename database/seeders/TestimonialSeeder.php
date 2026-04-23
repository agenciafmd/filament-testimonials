<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Database\Seeders;

use Agenciafmd\Testimonials\Models\Testimonial;
use Illuminate\Database\Seeder;

final class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::query()
            ->truncate();

        Testimonial::factory()
            ->count(20)
            ->create();
    }
}
