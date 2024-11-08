<?php

namespace Modules\OpportunitiesManagement\Models;

use App\Traits\HasSearch;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\OpportunitiesManagement\Enums\OpportunityStatus;
use Modules\UserManagement\Models\User;

/**
 *
 *
 * @property int $id
 * @property string $subject
 * @property int $estimated_price
 * @property int $user_id
 * @property OpportunityStatus $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $user
 * @method static Builder<static>|Opportunity newModelQuery()
 * @method static Builder<static>|Opportunity newQuery()
 * @method static Builder<static>|Opportunity query()
 * @method static Builder<static>|Opportunity search($keyword, $matchAllFields = false)
 * @method static Builder<static>|Opportunity whereCreatedAt($value)
 * @method static Builder<static>|Opportunity whereCustomer($value)
 * @method static Builder<static>|Opportunity whereEstimatedPrice($value)
 * @method static Builder<static>|Opportunity whereId($value)
 * @method static Builder<static>|Opportunity whereStatus($value)
 * @method static Builder<static>|Opportunity whereSubject($value)
 * @method static Builder<static>|Opportunity whereUpdatedAt($value)
 * @method static Builder<static>|Opportunity whereUserId($value)
 * @mixin Eloquent
 */
class Opportunity extends Model
{
    use HasSearch;

    protected $table = 'opportunities';

    protected $fillable = [
        'subject',
        'user_id',
        'estimated_price',
        'status'
    ];

    protected array $search = ['subject', 'status'];

    protected $casts = [
        'status' => OpportunityStatus::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
