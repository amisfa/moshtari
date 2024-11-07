<?php

namespace Modules\OpportunitiesManagement\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\OpportunitiesManagement\Models\Opportunity;

interface OpportunityRepository
{
    public function index(): Collection;
    public function store(array $params): Opportunity;
    public function update(int $id, array $params): Opportunity;
    public function show(int $id): Opportunity;
    public function destroy(int $id): int;
}
