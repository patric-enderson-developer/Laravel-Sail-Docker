<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            // Seus inputs vão aqui dentro
            TextInput::make('title')
                ->label('Título')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->maxLength(255),

            RichEditor::make('content')
                ->label('Conteúdo')
                ->required()
                ->columnSpanFull(),

            FileUpload::make('featured_image')
                ->label('Imagem de Destaque')
                ->image()
                ->directory('posts'),

            Select::make('status')
                ->label('Status')
                ->options([
                    'draft' => 'Rascunho',
                    'published' => 'Publicado',
                    'archived' => 'Arquivado',
                ])
                ->required(),

            Toggle::make('is_featured')
                ->label('Em Destaque'),
        ]);
    }
}
