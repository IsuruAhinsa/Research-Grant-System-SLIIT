<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'budget',
        'start_date',
        'end_date',
        'research_funding_year',
        'faculty_code',
    ];

    /**
     * Get the app settings
     */
    public static function getSettings()
    {
        try {
            return self::firstOrNew();
        } catch (\Throwable $throwable) {
            return null;
        }
    }
}
