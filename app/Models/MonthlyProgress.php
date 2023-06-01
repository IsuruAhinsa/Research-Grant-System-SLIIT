<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function monthlyProgressGrades(): HasMany
    {
        return $this->hasMany(MonthlyProgressGrade::class);
    }

    public function checkExistsGrading(): bool
    {
        return $this
            ->monthlyProgressGrades()
            ->where('graded_by', auth()->user()->getRoleNames())
            ->exists();
    }

    public function getGrading()
    {
        return $this->monthlyProgressGrades()
            ->where('graded_by', auth()->user()->getRoleNames())->first();
    }
}
