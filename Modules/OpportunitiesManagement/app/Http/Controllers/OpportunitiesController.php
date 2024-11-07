<?php

namespace Modules\OpportunitiesManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\OpportunitiesManagement\Http\Requests\OpportunityStoreRequest;
use Modules\OpportunitiesManagement\Http\Requests\OpportunityUpdateRequest;
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
        return response()->json($this->opportunityService->index());
    }

    public function store(OpportunityStoreRequest $request)
    {
        return response()->json($this->opportunityService->store($request->all()));
    }

    public function show(int $id)
    {
        return response()->json($this->opportunityService->show($id));
    }

    public function update(OpportunityUpdateRequest $request, int $id)
    {
        return response()->json($this->opportunityService->update($id, $request->all()));
    }

    public function delete(int $id)
    {
        return response()->json($this->opportunityService->destroy($id));
    }
}
