<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Models\Designation;
use App\Models\Faculty;
use App\Models\PrincipalInvestigator;
use Closure;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class PrincipalInvestigatorPendingTable extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return PrincipalInvestigator::query()
            ->where('status', 'Pending');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('full_name')
                ->sortable(query: function (Builder $query, string $direction): Builder {
                    return $query
                        ->orderBy('title', $direction)
                        ->orderBy('first_name', $direction)
                        ->orderBy('last_name', $direction);
                })
                ->searchable(['title', 'first_name', 'last_name'])
                ->description(fn(PrincipalInvestigator $record): string => $record->email),

            TextColumn::make('phone'),

            TextColumn::make('research_title')->label('Research Title'),

            TextColumn::make('faculty')
                ->description(fn(PrincipalInvestigator $record): string => Faculty::where('id', $record->faculty_id)->first()->code)
                ->searchable(false)
                ->getStateUsing(fn(PrincipalInvestigator $record) => Faculty::where('id', $record->faculty_id)->first()->name),

            TextColumn::make('designation')
                ->searchable(false)
                ->getStateUsing(fn(PrincipalInvestigator $record) => Designation::where('id', $record->designation_id)->first()->designation),

            BadgeColumn::make('status')
                ->colors([
                    'warning' => 'Pending',
                    'success' => 'Approved',
                    'danger' => 'Rejected',
                ]),

            TextColumn::make('created_at'),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn(PrincipalInvestigator $record): string => route('principal-investigators.show', $record);
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
