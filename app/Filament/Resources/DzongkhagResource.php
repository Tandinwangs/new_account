<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DzongkhagResource\Pages;
use App\Filament\Resources\DzongkhagResource\RelationManagers;
use App\Models\Dzongkhag;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DzongkhagResource extends Resource
{
    protected static ?string $model = Dzongkhag::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('dzongcode')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('dzongname')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('dzongcode'),
                Tables\Columns\TextColumn::make('dzongname'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDzongkhags::route('/'),
            'create' => Pages\CreateDzongkhag::route('/create'),
            'edit' => Pages\EditDzongkhag::route('/{record}/edit'),
        ];
    }    
}
