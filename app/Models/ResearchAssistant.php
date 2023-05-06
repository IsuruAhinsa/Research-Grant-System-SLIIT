<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResearchAssistant extends Model
{
    use HasFactory;

    protected $fillable = ['attachment'];

    public function principal_investigator(): BelongsTo
    {
        return $this->belongsTo(PrincipalInvestigator::class);
    }
}
