<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Models\PrincipalInvestigator;
use Livewire\Component;

class Approval extends Component
{
    public PrincipalInvestigator $principalInvestigator;
    public $comment;

    public function render()
    {
        return view('principal-investigators.approval');
    }
}
