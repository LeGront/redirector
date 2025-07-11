<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RedirectorCampaignResource\Pages;
use App\Models\RedirectorCampaign;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RedirectorCampaignResource extends Resource
{
    protected static ?string $model = RedirectorCampaign::class;

    protected static ?string $slug = 'redirector-campaigns';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),

                TextInput::make('utm_source'),

                TextInput::make('utm_medium'),

                TextInput::make('utm_campaign'),

                TextInput::make('utm_term'),

                TextInput::make('utm_content'),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?RedirectorCampaign $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?RedirectorCampaign $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('utm_source'),

                TextColumn::make('utm_medium'),

                TextColumn::make('utm_campaign'),

                TextColumn::make('utm_term'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RedirectorCampaignResource\RelationManagers\RedirectorResourcesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRedirectorCampaigns::route('/'),
            'create' => Pages\CreateRedirectorCampaign::route('/create'),
            'edit' => Pages\EditRedirectorCampaign::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
