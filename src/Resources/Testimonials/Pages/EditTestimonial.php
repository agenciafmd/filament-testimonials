<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Resources\Testimonials\Pages;

use Agenciafmd\Admix\Resources\Concerns\RedirectBack;
use Agenciafmd\Testimonials\Resources\Testimonials\TestimonialResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

final class EditTestimonial extends EditRecord
{
    use RedirectBack;

    protected static string $resource = TestimonialResource::class;

    protected $listeners = [
        'auditRestored',
    ];

    public function getRelationManagers(): array
    {
        if ($this->record->trashed()) {
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
