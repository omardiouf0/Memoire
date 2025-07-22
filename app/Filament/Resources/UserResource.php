<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Filters\SelectFilter;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->label('Nom')->required(),
            TextInput::make('email')->email()->required(),
            TextInput::make('password')
                ->password()
                ->required(fn(string $context) => $context === 'create')
                ->dehydrateStateUsing(fn($state) => !empty($state) ? Hash::make($state) : null)
                ->dehydrated(fn($state) => filled($state))
                ->label('Mot de passe'),
            Select::make('role')
                ->options([
                    'professeur' => 'Professeur',
                    'etudiant' => 'Étudiant',
                ])
                ->required(),
            TextInput::make('matricule')->nullable()->label('Matricule'),
            TextInput::make('niveau')->nullable()->label('Niveau'),
            TextInput::make('specialiste')->nullable()->label('Specialité'),
        ]);
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
{
    return parent::getEloquentQuery()
        ->where('role', '!=', 'admin');
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nom')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('role')->label('Rôle'),
                TextColumn::make('matricule'),
                TextColumn::make('niveau'),
                TextColumn::make('specialiste'),

            ])
           ->filters([
            SelectFilter::make('role')
                ->label('Filtrer par rôle')
                ->options([
                    'etudiant' => 'Étudiant',
                    'professeur' => 'Professeur',
                ])
            ])
            // ->actions([
            //     Tables\Actions\EditAction::make(),
            // ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
