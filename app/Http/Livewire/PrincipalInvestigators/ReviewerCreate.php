<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Models\Faculty;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class ReviewerCreate extends Component implements HasForms
{
    use InteractsWithForms;

    public $faculty_id;
    public $reviewer_id;

    protected function getFormSchema(): array
    {
        return [
            Select::make('faculty_id')
                ->label('Faculty')
                ->options(Faculty::all()->pluck('name', 'id')->toArray())
                ->string()
                ->required()
                ->reactive()
                ->afterStateUpdated(fn(callable $set) => $set('reviewer_id', null))
                ->searchable(),

            Select::make('reviewer_id')
                ->label('Reviewer')
                ->options(function (callable $get) {
                    $reviewers = User::role('Reviewer')->where('faculty_id', $get('faculty_id'))->get();
                    return $reviewers->pluck('fullname', 'id');
                })
                ->string()
                ->required()
                ->searchable(),
        ];
    }

    public function saveReviewer()
    {

    }

    public function render()
    {
        return view('principal-investigators.reviewer-create');
    }
}
