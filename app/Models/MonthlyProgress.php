<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MonthlyProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'principal_investigator_id',
        'current_progress',
        'current_progress_month',
        'current_progress_year',
        'next_progress',
        'next_progress_month',
        'next_progress_year',
        'issues',
    ];

    public function principalInvestigator(): BelongsTo
    {
        return $this->belongsTo(PrincipalInvestigator::class);
    }
}
