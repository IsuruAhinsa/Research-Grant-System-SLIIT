<?php

namespace App\Http\Livewire\Faculties;

use App\Models\Faculty;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
            ActionGroup::make([
                Action::make('edit')
                    ->url(fn(Faculty $record): string => route('faculties.edit', $record))
                    ->icon('heroicon-s-pencil')
                    ->label('Edit')
                    ->color('primary'),
                DeleteAction::make()->modalButton('Delete')
            ])
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            BulkAction::make('delete')
                ->action(fn(Collection $records) => $records->each->delete())
                ->deselectRecordsAfterCompletion()
                ->requiresConfirmation()
                ->modalHeading('Delete Faculties')
                ->modalSubheading('Are you sure you\'d like to delete these faculties? This cannot be undone.')
                ->modalButton('Yes, delete them')
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
