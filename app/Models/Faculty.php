<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function principalInvestigator(): BelongsTo
    {
        return $this->belongsTo(PrincipalInvestigator::class);
    }
}
