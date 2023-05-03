<?php

namespace App\Http\Livewire\Designations;

use App\Models\Designation;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Filament\Tables;

class DesignationTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Designation::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('designation'),
            TextColumn::make('created_at'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->url(fn(Designation $record): string => route('designations.edit', $record))
                ->icon('heroicon-s-pencil')
                ->label('Edit')
                ->color('success'),

            Action::make('delete')
//                ->url(fn(Role $record): string => route('roles.destroy', $record))
                ->icon('heroicon-s-trash')
                ->label('Delete')
                ->color('danger')
            // TODO: delete action implement
        ];
    }


    public function render()
    {
        return <<<'blade'
             <div>
                {{ $this->table }}
            </div>
        blade;
    }
}
