<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class DisbursementPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'principal_investigator_id',
        'category',
        'month',
        'activity',
        'amount',
    ];

    public static function categories(): Collection
    {
        return collect([
            ['name' => 'Purchase Capital items/Equipment/Software', 'percentage' => 90],
            ['name' => 'Purchase consumable/Materials', 'percentage' => 90],
            ['name' => 'Purchase Literature', 'percentage' => 90],
            ['name' => 'Conduct Surveys', 'percentage' => 90],
            ['name' => 'Travel Local', 'percentage' => 10],
            ['name' => 'Travel Foreign', 'percentage' => 10],
            ['name' => 'Conference Registration Fee', 'percentage' => 10],
            ['name' => 'Publishing', 'percentage' => 30],
            ['name' => 'Salaries', 'percentage' => 90],
            ['name' => 'Other (needs specifying)', 'percentage' => 20],
            ['name' => 'Unforeseen', 'percentage' => 10],
        ]);
    }

    public static function months(): Collection
    {
        return collect([
            ['id' => 1, 'name' => 'January'],
            ['id' => 2, 'name' => 'February'],
            ['id' => 3, 'name' => 'March'],
            ['id' => 4, 'name' => 'April'],
            ['id' => 5, 'name' => 'May'],
            ['id' => 6, 'name' => 'June'],
            ['id' => 7, 'name' => 'July'],
            ['id' => 8, 'name' => 'August'],
            ['id' => 9, 'name' => 'September'],
            ['id' => 10, 'name' => 'October'],
            ['id' => 11, 'name' => 'November'],
            ['id' => 12, 'name' => 'December'],
        ]);
    }

    public function getDisbursementAmount($principalInvestigatorId = null)
    {
        if (!$principalInvestigatorId) {
            return false;
        }

        return self::where('principal_investigator_id', $principalInvestigatorId)->sum('amount');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
