<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Database\Factories;

use Agenciafmd\Testimonials\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

final class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        $name = fake()->sentence(4);
        $slug = str($name)
            ->slug()
            ->toString();
        $ratio = collect(config('filament-testimonials.image.aspect_ratio_options', ['4:3']))
            ->map(fn (string $ratio) => str($ratio)
                ->replace(':', 'x')
                ->toString())
            ->implode('');

        return [
            'is_active' => fake()->boolean(),
            'star' => fake()->boolean(),
            'name' => $name,
            'short_description' => config('filament-testimonials.short_description.visible') ? fake()->text() : null,
            'description' => config('filament-testimonials.description.visible') ? fake()->text(maxNbChars: 200) : null,
            'video' => config('filament-testimonials.video.visible') ? fake()->youtubeRandomUri() : null,
            'image' => config('filament-testimonials.image.visible') ? Storage::putFile('fake', fake()->localImage(ratio: $ratio)) : null,
            'slug' => $slug,
        ];
    }
}
