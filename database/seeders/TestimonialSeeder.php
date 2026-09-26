<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Database\Seeders;

use Agenciafmd\Testimonials\Database\Factories\TestimonialFactory;
use Agenciafmd\Testimonials\Models\Testimonial;
use Illuminate\Database\Seeder;

final class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::query()
            ->truncate();

        TestimonialFactory::new()
            ->count(20)
            ->create();
    }
}
