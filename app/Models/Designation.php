<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = ['designation'];

    public function principalInvestigator(): BelongsTo
    {
        return $this->belongsTo(PrincipalInvestigator::class);
    }
}
