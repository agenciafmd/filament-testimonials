<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Resources\Testimonials\Pages;

use Agenciafmd\Testimonials\Resources\Testimonials\TestimonialResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListTestimonials extends ListRecords
{
    protected static string $resource = TestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
