<?php

namespace App\Http\Livewire\MonthlyProgress;

use App\Models\PrincipalInvestigator;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Carbon;
use Livewire\Component;

class MonthlyProgressCreate extends Component implements HasForms
{
    use InteractsWithForms;

    public $principal_investigator;

    public $current_progress,
        $current_progress_month,
        $current_progress_year,
        $next_progress,
        $next_progress_month,
        $next_progress_year,
        $issues;

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
        $this->current_progress_month = Carbon::now()->monthName;
        $this->next_progress_month = Carbon::now()->addMonth()->monthName;
        $this->current_progress_year = Carbon::now()->year;
        $this->next_progress_year = Carbon::now()->year;
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([

                    Fieldset::make('Progress for the Current Month')->schema([
                        TextInput::make('current_progress_year')
                            ->required(),

                        Select::make('current_progress_month')
                            ->options($this->monthsArray)
                            ->required(),

                        Textarea::make('current_progress')
                            ->columnSpan(2)
                            ->required(),
                    ]),

                    Fieldset::make('Progress Expected for the Next Month')->schema([
                        TextInput::make('next_progress_year')
                            ->required(),

                        Select::make('next_progress_month')
                            ->required()
                            ->options($this->monthsArray),

                        Textarea::make('next_progress')
                            ->columnSpan(2)
                            ->required(),
                    ]),

                    Fieldset::make('Specific Issues, if any')->schema([
                        Textarea::make('issues')
                            ->columnSpan(2)
                            ->nullable(),
                    ]),
                ])
        ];
    }

    public function saveMonthlyProgress()
    {
        $principalInvestigator = PrincipalInvestigator::find($this->principal_investigator);
        $principalInvestigator->progresses()->create($this->form->getState());

        return redirect()->route('monthly-progress.index', $this->principal_investigator)->with([
            Notification::make()
                ->title('Monthly Progress Added!')
                ->success()
                ->send()
        ]);
    }
    public function render()
    {
        return view('monthly-progress.monthly-progress-create');
    }
}
