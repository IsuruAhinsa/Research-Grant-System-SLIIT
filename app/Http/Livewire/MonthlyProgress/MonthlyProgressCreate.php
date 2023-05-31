<?php

namespace App\Http\Livewire\MonthlyProgress;

use App\Models\MonthlyProgress;
use App\Models\PrincipalInvestigator;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Livewire\Component;

class MonthlyProgressCreate extends Component implements HasForms
{
    use InteractsWithForms;

    public $principal_investigator;

    public
        $principal_investigator_id,
        $current_progress,
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
        $this->principal_investigator_id = $principalInvestigator;
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
                            ->label('Year')
                            ->rules(["date_format:Y", "after_or_equal:".Carbon::now()->year])
                            ->reactive()
                            ->required(),

                        Select::make('current_progress_month')
                            ->label('Month')
                            ->options(function (callable $get) {
                                $dbMonths = MonthlyProgress::query()
                                    ->where('principal_investigator_id', $this->principal_investigator_id)
                                    ->where('current_progress_year', $get('current_progress_year'))
                                    ->pluck('current_progress_month')
                                    ->toArray();

                                $dbMonthsArray = [];

                                foreach ($dbMonths as $dbMonth) {
                                    $dbMonthsArray[$dbMonth] = $dbMonth;
                                }

                                return Arr::except($this->monthsArray, $dbMonthsArray);
                            })
                            ->required(),

                        Textarea::make('current_progress')
                            ->columnSpan(2)
                            ->required(),
                    ]),

                    Fieldset::make('Progress Expected for the Next Month')->schema([
                        TextInput::make('next_progress_year')
                            ->label('Year')
                            ->rules(["date_format:Y", "after_or_equal:".Carbon::now()->year])
                            ->reactive()
                            ->required(),

                        Select::make('next_progress_month')
                            ->label('Month')
                            ->required()
                            ->options(function (callable $get) {
                                $dbMonths = MonthlyProgress::query()
                                    ->where('principal_investigator_id', $this->principal_investigator_id)
                                    ->where('next_progress_year', $get('next_progress_year'))
                                    ->pluck('next_progress_month')
                                    ->toArray();

                                $dbMonthsArray = [];

                                foreach ($dbMonths as $dbMonth) {
                                    $dbMonthsArray[$dbMonth] = $dbMonth;
                                }

                                return Arr::except($this->monthsArray, $dbMonthsArray);
                            }),

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

        if ($principalInvestigator->progresses()->where('current_progress_month', $this->current_progress_month)->exists()) {
            $this->addError('current_progress_month', 'You already entered monthly progress with this month.');
            return false;
        }

        if ($principalInvestigator->progresses()->where('next_progress_month', $this->next_progress_month)->exists()) {
            $this->addError('next_progress_month', 'You already entered excepted progress with this month.');
            return false;
        }

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
