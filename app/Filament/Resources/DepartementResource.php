<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartementResource\Pages;
use App\Filament\Resources\DepartementResource\RelationManagers;
use App\Models\Departement;
use App\Models\Filiere;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DepartementResource\RelationManagers\FiliereRelationManager;

class DepartementResource extends Resource
{
    protected static ?string $model = Departement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Départements';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Nom du département')
                ->required()
                ->maxLength(255),
            
            TextInput::make('code')
                ->label('Code du département')
                ->required()
                ->maxLength(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nom'),
                TextColumn::make('code')->label('Code'),
                TextColumn::make('filiere.name')->label('Filière'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FiliereRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartements::route('/'),
            'create' => Pages\CreateDepartement::route('/create'),
            'edit' => Pages\EditDepartement::route('/{record}/edit'),
        ];
    }

}
