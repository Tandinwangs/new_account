<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserAccountDetailResource\Pages;
use App\Filament\Resources\UserAccountDetailResource\RelationManagers;
use App\Models\UserAccountDetail;
use Filament\Forms;
use App\Models\Dzongkhag;
use App\Models\Gewog;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;

class UserAccountDetailResource extends Resource
{
    protected static ?string $model = UserAccountDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('account_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('account_type')->options([
                    'Saving' => 'Saving Account',
                    'Current' => 'Current Account',
                    'Working' => 'Working Capital',
                    'Piggy' => 'Piggy Bank'
                ])
                    ->required(),
                Forms\Components\Select::make('nationality')
                    ->options([
                        'Bhutanese' => 'Bhutanese',
                        'Non-Bhutanese' => 'Non-Bhutanese',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('dob')
                    ->required(),
                Forms\Components\TextInput::make('cid')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('passport_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('work_permit')
                    ->maxLength(255),
                Forms\Components\TextInput::make('guarantor_id')
                    ->maxLength(255),
                Forms\Components\Select::make('dzongcode')
                ->relationship('dzongkhag', 'dzongname')
                ->required()
                ->reactive(),
                
                Forms\Components\Select::make('gewocode')
                    ->relationship('gewog', 'gewogname', function (Builder $query, callable $get) {
                        $dzongcode = str_pad($get('dzongcode'), 2, '0', STR_PAD_LEFT); // Ensure consistent formatting
                        info("Selected dzongcode: $dzongcode");
                        $query->whereRaw("dzongcode = ?", [$dzongcode]);
                    })
                    ->required()
                    ->reactive(),
                
                    Forms\Components\Select::make('villcode')
                    ->relationship('village', 'villname', function (Builder $query, callable $get) {
                        $gewocode = str_pad($get('gewocode'), 3, '0', STR_PAD_LEFT); // Ensure consistent formatting
                        info("Selected gewocode: $gewocode");
                        $query->whereRaw("gewocode = ?", [$gewocode]);
                    })
                    ->required(),
                Forms\Components\TextInput::make('thram_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('house_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('new_account_number')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('account_number'),
                Tables\Columns\TextColumn::make('account_type'),
                Tables\Columns\TextColumn::make('nationality'),
                Tables\Columns\TextColumn::make('dob')
                    ->date(),
                Tables\Columns\TextColumn::make('cid'),
                // Tables\Columns\TextColumn::make('passport_number'),
                // Tables\Columns\TextColumn::make('work_permit'),
                // Tables\Columns\TextColumn::make('guarantor_id'),
                Tables\Columns\TextColumn::make('dzongname'),
                Tables\Columns\TextColumn::make('gewogname'),
                Tables\Columns\TextColumn::make('villcode'),
                Tables\Columns\TextColumn::make('thram_number'),
                Tables\Columns\TextColumn::make('house_number'),
                Tables\Columns\TextColumn::make('phone_number'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('new_account_number'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUserAccountDetails::route('/'),
            'create' => Pages\CreateUserAccountDetail::route('/create'),
            // 'edit' => Pages\EditUserAccountDetail::route('/{record}/edit'),
        ];
    }    
}
