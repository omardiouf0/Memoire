<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FichierResource\Pages;
use App\Models\Fichier;
use App\Models\Matiere;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class FichierResource extends Resource
{
    protected static ?string $model = Fichier::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->label('Nom du fichier'),
            Select::make('type')
                ->options([
                    'td' => 'TD',
                    'tp' => 'TP',
                    'concours' => 'Concours',
                ])
                ->required(),
            Select::make('niveau')
                ->options([
                    'BTS1'=>'BTS1',
                    'BTS2'=>'BTS2',
                    'BTS'=>'BTS',
                    'BT'=>'BT',
                    'BTI'=>'BTI',
                ])
                ->required(),
            TextInput::make('annee')->required()->label('Année'),
            FileUpload::make('chemin')
                ->label('Fichier')
                ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'])
                ->required()
                ->directory('documents'),// tu peux modifier selon l'endroit où tu veux stocker
            Select::make('matiere_id')
                ->relationship('matiere', 'name')
                ->searchable()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nom')->searchable(),
                TextColumn::make('type')->label('Type'),
                TextColumn::make('niveau'),
                TextColumn::make('annee'),
                TextColumn::make('matiere.name')->label('Matière'),
            ])
            ->filters([
                 SelectFilter::make('type')
                ->label('Filtrer par type')
                ->options([
                    'td' => 'TD',
                    'tp' => 'TP',
                    'concours'=>'Concours',
                ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFichiers::route('/'),
            'create' => Pages\CreateFichier::route('/create'),
            'edit' => Pages\EditFichier::route('/{record}/edit'),
        ];
    }
   

}
