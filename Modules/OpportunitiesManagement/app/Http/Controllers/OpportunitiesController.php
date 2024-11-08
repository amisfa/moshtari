<?php

namespace Modules\OpportunitiesManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\OpportunitiesManagement\Http\Requests\OpportunityStoreRequest;
use Modules\OpportunitiesManagement\Http\Requests\OpportunityUpdateRequest;
use Modules\OpportunitiesManagement\Models\Opportunity;
use Modules\OpportunitiesManagement\Services\OpportunityService;

class OpportunitiesController extends Controller
{
    protected OpportunityService $opportunityService;

    public function __construct(OpportunityService $opportunityService)
    {
        $this->opportunityService = $opportunityService;
    }

    public function index()
    {
        return response()->json($this->opportunityService->index(
            request()->filled('q') ? request('q') : null,
            request()->filled('filter') ? request('filter') : null));
    }

    public function store(OpportunityStoreRequest $request)
    {
        return response()->json($this->opportunityService->store($request->all()));
    }

    public function show(Opportunity $opportunity)
    {
        return response()->json($this->opportunityService->show($opportunity));
    }

    public function update(OpportunityUpdateRequest $request, int $id)
    {
        return response()->json($this->opportunityService->update($id, $request->all()));
    }

    public function delete(Opportunity $opportunity)
    {
        return response()->json($this->opportunityService->destroy($opportunity));
    }
}
