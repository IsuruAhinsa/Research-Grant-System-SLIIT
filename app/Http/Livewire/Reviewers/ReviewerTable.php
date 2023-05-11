<?php

namespace App\Http\Livewire\Reviewers;

use App\Models\Faculty;
use App\Models\Reviewer;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ReviewerTable extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Reviewer::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('fullname')
                ->sortable(query: function (Builder $query, string $direction): Builder {
                    return $query
                        ->orderBy('title', $direction)
                        ->orderBy('first_name', $direction)
                        ->orderBy('last_name', $direction);
                })
                ->label('Full Name'),
            TextColumn::make('faculty')
                ->description(fn(Reviewer $record): string => Faculty::where('id', $record->faculty_id)->first()->code)
                ->searchable(false)
                ->sortable(false)
                ->getStateUsing(fn(Reviewer $record) => Faculty::where('id', $record->faculty_id)->first()->name),
            TextColumn::make('created_at'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            ActionGroup::make([
                Action::make('edit')
                    ->url(fn(Reviewer $record): string => route('reviewers.edit', $record))
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
                ->modalHeading('Delete Reviewers?')
                ->modalSubheading('Are you sure you\'d like to delete these reviewers? This cannot be undone.')
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
