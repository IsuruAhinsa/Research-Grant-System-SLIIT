<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = ['designation'];

    public function principalInvestigators(): HasMany
    {
        return $this->hasMany(PrincipalInvestigator::class);
    }
}
