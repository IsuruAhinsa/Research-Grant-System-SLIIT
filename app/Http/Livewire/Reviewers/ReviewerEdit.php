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

class ReviewerEdit extends Component implements HasForms
{
    use InteractsWithForms;

    public Reviewer $reviewer;
    public $title;
    public $first_name;
    public $last_name;
    public $faculty_id;

    public function mount(): void
    {
        $this->form->fill([
            'title' => $this->reviewer->title,
            'first_name' => $this->reviewer->first_name,
            'last_name' => $this->reviewer->last_name,
            'faculty_id' => $this->reviewer->faculty_id,
        ]);
    }

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
        $this->reviewer->update(
            $this->form->getState(),
        );

        return redirect(route('reviewers.index'))->with([
            Notification::make()
                ->title('Updated')
                ->body('Reviewer Updated Successfully!')
                ->success()
                ->send()
        ]);
    }

    protected function getFormModel(): Reviewer
    {
        return $this->reviewer;
    }

    public function render()
    {
        return view('reviewers.reviewer-edit');
    }
}
