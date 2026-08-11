<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Filament\Resources\Posts\Actions\EditAction; // ajuste o namespace se necessário
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn; // ← IMPORTAR
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('title')->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ]) // ← FECHAR O ARRAY
            ->filters([
                //
            ])
            ->recordActions([
                // EditAction::make(), // ajuste conforme sua versão do Filament
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
