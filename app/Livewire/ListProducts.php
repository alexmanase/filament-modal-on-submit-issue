<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Product;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\EditAction;

class ListProducts extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms; 

    public function table(Table $table)
    {
        return $table
            ->query(Product::query()->latest())
            ->columns([
                TextColumn::make('name')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')
                    ->form([
                        TextInput::make('name')
                    ])
                    ->modalSubmitActionLabel('Save'),
            ])
            ->bulkActions([
                // ...
            ]);   
    }

    public function render()
    {
        return view('livewire.list-products');
    }
}