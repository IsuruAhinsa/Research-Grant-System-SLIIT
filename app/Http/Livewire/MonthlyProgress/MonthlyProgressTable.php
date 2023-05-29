<?php

namespace App\Http\Livewire\MonthlyProgress;

use App\Models\MonthlyProgress;
use App\Models\PrincipalInvestigator;
use Closure;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class MonthlyProgressTable extends Component implements HasTable
{
    use InteractsWithTable;

    public $principal_investigator;

    public $monthsArray = [
        'January' => 'January',
        'February' => 'February',
        'March' => 'March',
        'April' => 'April',
        'May' => 'May',
        'June' => 'June',
        'July' => 'July',
        'August' => 'August',
        'September' => 'September',
        'October' => 'October',
        'November' => 'November',
        'December' => 'December',
    ];

    public function mount($principalInvestigator)
    {
        $this->principal_investigator = $principalInvestigator;
    }

    protected function getTableQuery(): Builder
    {
        return MonthlyProgress::query()->where('principal_investigator_id', $this->principal_investigator);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('current_progress_month')
                ->size('lg')
                ->weight('bold'),
            TextColumn::make('current_progress_year'),
            TextColumn::make('current_progress'),
        ];
    }

    protected function getTableContentGrid(): ?array
    {
        return [
            'md' => 2,
            'xl' => 3,
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('show')
                ->url(fn (MonthlyProgress $record): string => route('monthly-progress.show', [$this->principal_investigator, $record])),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (MonthlyProgress $record): string =>  route('monthly-progress.show', [$this->principal_investigator, $record]);
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No Monthly Progress Started';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'You may create a your monthly progress using the button below.';
    }

    protected function getTableEmptyStateActions(): array
    {
        return [
            Action::make('create')
                ->label('Create Monthly Progress')
                ->url(route('monthly-progress.create', $this->principal_investigator))
                ->size('lg')
                ->button(),
        ];
    }

    public function render()
    {
        return view('monthly-progress.monthly-progress-table');
    }
}
