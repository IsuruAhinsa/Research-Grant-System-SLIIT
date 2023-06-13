<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'disbursement_plan_id',
        'amount',
        'comment',
    ];

    public function disbursementPlan(): BelongsTo
    {
        return $this->belongsTo(DisbursementPlan::class);
    }

    public function calculateTotalPaidAmount($id = null)
    {
        return $this->where('disbursement_plan_id', $id)->sum('amount');
    }
}
