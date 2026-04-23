<?php

declare(strict_types=1);

namespace Agenciafmd\Testimonials\Resources\Testimonials\Schemas;

use Agenciafmd\Admix\Resources\Forms\Components\ImageUploadWithDefault;
use Agenciafmd\Admix\Resources\Forms\Components\RichEditorWithDefault;
use Agenciafmd\Admix\Resources\Forms\Components\YouTubeInput;
use Agenciafmd\Admix\Resources\Infolists\Components\DateTimeEntry;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

final class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('General'))
                    ->schema([
                        TextInput::make('name')
                            ->translateLabel()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== str($old)->slug()->toString()) {
                                    return;
                                }

                                $set('slug', str($state)->slug()->toString());
                            })
                            ->autofocus()
                            ->minLength(3)
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('slug')
                            ->translateLabel()
                            ->unique(ignoreRecord: true)
                            ->required(),
                        Textarea::make('short_description')
                            ->translateLabel()
                            ->required()
                            ->rows(5)
                            ->visible(config('filament-testimonials.short_description.visible', true))
                            ->columnSpanFull(),
                        RichEditorWithDefault::make(name: 'description', directory: 'testimonial/description')
                            ->translateLabel()
                            ->required()
                            ->visible(config('filament-testimonials.description.visible', true))
                            ->columnSpanFull(),
                        YouTubeInput::make()
                            ->visible(config('filament-testimonials.video.visible', true)),
                        ImageUploadWithDefault::make(name: 'image', directory: 'testimonial/image')
                            ->afterLabel('Max. ' . config('filament-testimonials.image.width', 720) . 'x' . config('filament-testimonials.image.height', 1280))
                            ->imageEditorAspectRatioOptions(config('filament-testimonials.image.aspect_ratio_options', ['9:16']))
                            ->imageEditorViewportWidth(config('filament-testimonials.image.width', 720))
                            ->imageEditorViewportHeight(config('filament-testimonials.image.height', 1280))
                            ->visible(config('filament-testimonials.image.visible', true)),
                    ])
                    ->collapsible()
                    ->columns()
                    ->columnSpan(2),
                Section::make(__('Information'))
                    ->schema([
                        Toggle::make('is_active')
                            ->translateLabel()
                            ->default(true),
                        Toggle::make('star')
                            ->translateLabel()
                            ->default(false),
                        DateTimeEntry::make('created_at'),
                        DateTimeEntry::make('updated_at'),
                    ])
                    ->collapsible()
                    ->columns(),
            ])
            ->columns(3);
    }
}
