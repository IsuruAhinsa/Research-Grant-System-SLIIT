<?php

namespace App\Http\Livewire\Designations;

use App\Models\Designation;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
            ActionGroup::make([
                Action::make('edit')
                    ->url(fn(Designation $record): string => route('designations.edit', $record))
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
                ->modalHeading('Delete Designations')
                ->modalSubheading('Are you sure you\'d like to delete these designations? This cannot be undone.')
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
