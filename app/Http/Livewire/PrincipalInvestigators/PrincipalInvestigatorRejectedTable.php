<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Models\Designation;
use App\Models\Faculty;
use App\Models\PrincipalInvestigator;
use Closure;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class PrincipalInvestigatorRejectedTable extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return PrincipalInvestigator::query()
            ->where('status', 'Rejected');
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
                ->searchable(['title', 'first_name', 'last_name', 'email'])
                ->description(fn(PrincipalInvestigator $record): string => $record->email),

            TextColumn::make('phone'),

            TextColumn::make('research_title')->label('Research Title'),

            TextColumn::make('faculty.name')
                ->description(fn(PrincipalInvestigator $record): string => Faculty::where('id', $record->faculty_id)->first()->code),

            TextColumn::make('designation.designation'),

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

    protected function getTableActions(): array
    {
        return [
            Action::make('show')
                ->label(' ')
                ->icon('heroicon-o-chevron-right')
                ->color('success')
                ->size('lg')
                ->url(fn(PrincipalInvestigator $record): string =>  route('principal-investigators.show', $record))
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
