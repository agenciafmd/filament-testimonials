<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Resources\Testimonials;

use Agenciafmd\Testimonials\Models\Testimonial;
use Agenciafmd\Testimonials\Resources\Testimonials\Pages\CreateTestimonial;
use Agenciafmd\Testimonials\Resources\Testimonials\Pages\EditTestimonial;
use Agenciafmd\Testimonials\Resources\Testimonials\Pages\ListTestimonials;
use Agenciafmd\Testimonials\Resources\Testimonials\Schemas\TestimonialForm;
use Agenciafmd\Testimonials\Resources\Testimonials\Tables\TestimonialsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

final class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('Testimonial');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Testimonials');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-testimonials.navigation_sort');
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-testimonials.navigation_group');
    }

    public static function form(Schema $schema): Schema
    {
        return TestimonialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TestimonialsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            AuditsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTestimonials::route('/'),
            'create' => CreateTestimonial::route('/create'),
            'edit' => EditTestimonial::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
