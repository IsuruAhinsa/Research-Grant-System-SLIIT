<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function principalInvestigators(): HasMany
    {
        return $this->hasMany(PrincipalInvestigator::class);
    }

    public function reviewers(): HasMany
    {
        return $this->hasMany(Reviewer::class);
    }
}
