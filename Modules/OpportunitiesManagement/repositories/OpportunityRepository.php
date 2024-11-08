<?php

namespace Modules\OpportunitiesManagement\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\OpportunitiesManagement\Models\Opportunity;

interface OpportunityRepository
{
    /**
     * @param $q
     * @return Collection
     */
    public function index($q): Collection;

    public function store(array $params): Opportunity;

    public function update(int $id, array $params): Opportunity;

    public function show(Opportunity $opportunity): Opportunity;

    public function destroy(Opportunity $opportunity): int;
}
