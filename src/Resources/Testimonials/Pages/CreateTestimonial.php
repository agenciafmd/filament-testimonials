<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Resources\Testimonials\Pages;

use Agenciafmd\Admix\Resources\Concerns\RedirectBack;
use Agenciafmd\Testimonials\Resources\Testimonials\TestimonialResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateTestimonial extends CreateRecord
{
    use RedirectBack;

    protected static string $resource = TestimonialResource::class;
}
