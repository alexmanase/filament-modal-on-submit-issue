<?php

namespace App\Filament\Forms;

use Filament\Forms\Components\Actions as ComponentsAction;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Livewire\Component;

class ProductForm
{
    public static function make()
    {
        return Grid::make(['sm' => 3])->schema([
            Grid::make()->schema([
                Section::make()
                    ->columnStart(1)
                    ->schema([
                        TextInput::make('keywords')
                            ->required()
                            ->maxLength(255),
                        ComponentsAction::make([
                            ComponentsAction\Action::make('generate')
                                ->action(function (Set $set, Component $livewire) {
                                    if (property_exists($livewire, 'mountedTableActionsData')) {
                                        $livewire->validateOnly('mountedTableActionsData.0.keywords');
                                    }

                                    if (property_exists($livewire, 'mountedActionsData')) {
                                        $livewire->validateOnly('mountedActionsData.0.keywords');
                                    }

                                    $set('keywords', 'Fresh');
                                }),
                        ]),
                    ]),
            ])
                ->columnSpan(['sm' => 1]),
            Grid::make()->schema([
                Section::make()
                    ->columnStart(1)
                    ->schema([
                        Textarea::make('description')
                            ->required(),
                    ]),
            ])
                ->columnSpan(['sm' => 2]),
        ]);
    }
}
