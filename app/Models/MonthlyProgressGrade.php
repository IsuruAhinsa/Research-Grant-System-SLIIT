<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MonthlyProgressGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'monthly_progress_id',
        'grade',
        'comments',
        'graded_by',
    ];

    public function monthlyProgress(): BelongsTo
    {
        return $this->belongsTo(MonthlyProgress::class);
    }
}
