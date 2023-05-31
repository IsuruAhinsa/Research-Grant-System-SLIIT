<?php

namespace App\Http\Livewire\MonthlyProgress;

use App\Models\MonthlyProgress;
use App\Models\PrincipalInvestigator;
use Livewire\Component;

class MonthlyProgressDetails extends Component
{
    public $principalInvestigator;
    public $monthlyProgress;

    public function mount(PrincipalInvestigator $principalInvestigator, MonthlyProgress $monthlyProgress)
    {
        $this->principalInvestigator = $principalInvestigator;
        $this->monthlyProgress = $monthlyProgress;
    }

    public function render()
    {
        return view('monthly-progress.monthly-progress-details');
    }
}
