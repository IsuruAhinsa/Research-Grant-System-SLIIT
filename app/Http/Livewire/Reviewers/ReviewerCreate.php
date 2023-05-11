<?php

namespace App\Http\Livewire\Reviewers;

use App\Models\Faculty;
use App\Models\Reviewer;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class ReviewerCreate extends Component implements HasForms
{
    use InteractsWithForms;
    public $title;
    public $first_name;
    public $last_name;
    public $faculty_id;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('title')
                ->datalist([
                    'Dr',
                    'Esq',
                    'Hon',
                    'Jr',
                    'Mr',
                    'Mrs',
                    'Ms',
                    'Messrs',
                    'Mmes',
                    'Msgr',
                    'Prof',
                    'Rev',
                    'Rt. Hon',
                    'Sr',
                    'St',
                ])
                ->string()
                ->placeholder('Please select the title.')
                ->required(),

            TextInput::make('first_name')
                ->string()
                ->maxLength(50)
                ->placeholder('Enter your first name.')
                ->required(),

            TextInput::make('last_name')
                ->string()
                ->maxLength(50)
                ->placeholder('Enter your last name.')
                ->required(),

            Select::make('faculty_id')
                ->label('Faculty')
                ->options(Faculty::all()->pluck('name', 'id'))
                ->string()
                ->required()
                ->searchable(),
        ];
    }

    public function saveReviewer()
    {
        Reviewer::create($this->form->getState());

        return redirect(route('reviewers.index'))->with([
            Notification::make()
                ->title('Submitted')
                ->body('Research Grant Handling Details Submitted Successfully!')
                ->success()
                ->send()
        ]);
    }
    public function render()
    {
        return view('reviewers.reviewer-create');
    }
}
