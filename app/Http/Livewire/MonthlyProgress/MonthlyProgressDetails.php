<?php

namespace App\Http\Livewire\MonthlyProgress;

use App\Models\MonthlyProgress;
use App\Models\PrincipalInvestigator;
use Livewire\Component;

class MonthlyProgressDetails extends Component
{
    public $principal_investigator;
    public $monthlyProgress;

    public function mount(PrincipalInvestigator $principalInvestigator, MonthlyProgress $monthlyProgress)
    {
        $this->principal_investigator = $principalInvestigator;
        $this->monthlyProgress = $monthlyProgress;
    }

    public function render()
    {
        return view('monthly-progress.monthly-progress-details');
    }
}
