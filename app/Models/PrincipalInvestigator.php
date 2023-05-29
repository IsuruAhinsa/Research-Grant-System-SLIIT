<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\ModelStatus\HasStatuses;

class PrincipalInvestigator extends Model
{
    use HasFactory, HasStatuses;

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
        'budget_activity_plan',
        'remarks',
        'user_id',
        'grant_number',
    ];

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reviewers(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('is_accepted');
    }

    /**
     * @return bool
     * check if user (principal investigator) is reviewer.
     */
    public function isReviewer(): bool
    {
        return $this->reviewers()->where('user_id', auth()->id())->exists();
    }

    /**
     * @return bool
     * check if is exists pending reviewer requests.
     */
    public function hasPendingReviewerRequest(): bool
    {
        return $this->reviewers()
            ->wherePivot('user_id', auth()->id())
            ->wherePivotNull('is_accepted')
            ->exists();
    }

    public function reviewerFeedbacks(): HasMany
    {
        return $this->hasMany(ReviewerFeedback::class);
    }

    public function isFeedbackSubmitted($user_id): bool
    {
        return $this->reviewerFeedbacks()
            ->where('reviewer_id', $user_id)
            ->exists();
    }

    public function isPending(): bool
    {
        if ($this->isApproved() === TRUE || $this->isRejected() === TRUE) {
            return false;
        }

        return true;
    }

    public function isApproved(): bool
    {
        if ($this->statuses()->where('name', 'like', '%REJECTED%')->doesntExist()) {
            if ($this->reviewers()->exists() && $this->reviewers()->wherePivot('is_accepted', TRUE)->count() == 2) {
                if ($this->reviewerFeedbacks()->exists() && $this->reviewerFeedbacks()->where('overall_strong', '>', 3)->count() == 2) {
                    return true;
                }
            }
        }
        return false;
    }

    public function isRejected(): bool
    {
        if ($this->statuses()->where('name', 'like', '%REJECTED%')->exists()) {
            return true;
        }

        if ($this->reviewers()->exists() && $this->reviewers()->wherePivot('is_accepted', TRUE)->count() == 2) {
            if ($this->reviewerFeedbacks()->exists() && $this->reviewerFeedbacks()->where('overall_strong', '<=', 3)->exists()) {
                return true;
            }
        }

        return false;
    }

    public function getRejectedReasonMessage()
    {
        if ($this->isRejected()) {
            return $this->statuses()
                ->where('name', 'like', '%REJECTED%')
                ->value('reason');
        }
    }
}
