<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Resources\Testimonials\Pages;

use Agenciafmd\Admix\Resources\Concerns\RedirectBack;
use Agenciafmd\Testimonials\Models\Testimonial;
use Agenciafmd\Testimonials\Resources\Testimonials\TestimonialResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

final class EditTestimonial extends EditRecord
{
    use RedirectBack;

    protected static string $resource = TestimonialResource::class;

    /**
     * @var array<int, string>
     */
    protected $listeners = [
        'auditRestored',
    ];

    public function getRelationManagers(): array
    {
        $record = $this->getRecord();

        if ($record instanceof Testimonial && $record->trashed()) {
            return [];
        }

        return parent::getRelationManagers();
    }

    public function auditRestored(): void
    {
        $this->fillForm();
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
