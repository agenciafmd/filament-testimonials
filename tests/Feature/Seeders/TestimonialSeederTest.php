<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Tests\Feature\Seeders;

use Agenciafmd\Testimonials\Database\Seeders\TestimonialSeeder;
use Agenciafmd\Testimonials\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

use function Pest\Laravel\seed;

uses(TestCase::class, RefreshDatabase::class);

it('seeds the testimonials from the factory', function (): void {
    Storage::fake();

    seed(TestimonialSeeder::class);

    expect(Testimonial::query()->count())->toBe(20);
});
