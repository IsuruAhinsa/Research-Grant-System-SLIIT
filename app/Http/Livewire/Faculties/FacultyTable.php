<?php

namespace App\Http\Livewire\Faculties;

use App\Models\Faculty;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Filament\Tables;

class FacultyTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Faculty::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('Faculty Name'),
            TextColumn::make('code')->label('Faculty Code'),
            TextColumn::make('created_at'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->url(fn(Faculty $record): string => route('faculties.edit', $record))
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
