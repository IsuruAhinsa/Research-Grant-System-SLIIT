<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PrincipalInvestigator extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation_id',
        'faculty_id',
        'title',
        'first_name',
        'last_name',
        'email',
        'phone',
        'research_title',
        'resume',
        'research_grant_proposal',
        'budget_activity_plan'
    ];

    public function designation(): HasOne
    {
        return $this->hasOne(Designation::class);
    }

    public function faculty(): HasOne
    {
        return $this->hasOne(Faculty::class);
    }

    public function co_principal_investigators(): HasMany
    {
        return $this->hasMany(CoPrincipalInvestigator::class);
    }

    public function research_assistants(): HasMany
    {
        return $this->hasMany(ResearchAssistant::class);
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => "{$attributes['title']}. {$attributes['first_name']} {$attributes['last_name']}"
        );
    }
}
