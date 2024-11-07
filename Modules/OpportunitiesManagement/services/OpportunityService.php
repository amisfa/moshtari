<?php

namespace Modules\OpportunitiesManagement\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Modules\OpportunitiesManagement\Enums\OpportunityStatus;
use Modules\OpportunitiesManagement\Models\Opportunity;
use Modules\OpportunitiesManagement\Repositories\OpportunityRepository;
use Modules\UserManagement\Enums\Role;

class OpportunityService implements OpportunityRepository
{
    public function index(): Collection
    {
        $currentUser = auth('api')->user();
        if ($currentUser?->hasRole(Role::ADMIN)) {
            return Opportunity::all();
        } elseif ($currentUser?->hasRole(Role::USER)) {
            return Opportunity::where('user_id', $currentUser?->id)->get();
        } else {
            return Collection::empty();
        }
    }

    /**
     * @throws Exception
     */
    public function store(array $params): Opportunity
    {
        if (in_array($params['status'], [OpportunityStatus::LOST, OpportunityStatus::WON])) {
            throw new Exception("Sales opportunities cannot be created in won or lost statuses.");
        }
        return Opportunity::create($params);
    }

    /**
     * @throws Exception
     */
    public function update(int $id, array $params): Opportunity
    {
        $currentUser = auth('api')->user();
        $opportunity = Opportunity::find($id);
        $wonLostStatuses = [OpportunityStatus::LOST, OpportunityStatus::WON];
        if (!$currentUser?->hasRole(Role::ADMIN)) {
            if (in_array($params['status'], $wonLostStatuses)) {
                throw new Exception('Only managers can change the sales opportunity status to lost or won.');
            }
            if ($opportunity?->user_id != $currentUser?->id) {
                throw new Exception("Non-administrator users cannot edit other users' sales opportunities.");
            }
        }
        if (in_array($opportunity->status, $wonLostStatuses)) {
            throw new Exception('Sales opportunities with won or lost status cannot be edited.');
        }
        return Opportunity::find($id)->update($params);
    }

    /**
     * @throws Exception
     */
    public function show(int $id): Opportunity
    {
        $currentUser = auth('api')->user();
        $opportunity = Opportunity::find($id);
        if (!$currentUser?->hasRole(Role::ADMIN)
            and $opportunity?->user_id != $currentUser?->id) {
            throw new Exception("Non-administrator users cannot edit other users' sales opportunities.");
        }
        return Opportunity::find($id);
    }

    /**
     * @throws Exception
     */
    public function destroy(int $id): int
    {
        if (in_array(Opportunity::find($id)?->status, [OpportunityStatus::LOST, OpportunityStatus::WON])) {
            throw new Exception('Sales opportunities with won or lost status cannot be deleted.');
        }
        return Opportunity::destroy($id);
    }
}
