<?php

namespace App\Http\Controllers;

use App\Http\Services\FacilitySearchService;
use Illuminate\Http\Request;

class FacilitySearchController extends Controller
{
    protected FacilitySearchService $facilitySearchService;

    public function __construct(FacilitySearchService $facilitySearchService)
    {
        $this->facilitySearchService = $facilitySearchService;
    }

    public function getSearch(Request $request)
    {
        $facilities = $this->facilitySearchService->searchFacility($request);

        return view('facilitySearch.index', ['facilities' => $facilities]);
    }
}
