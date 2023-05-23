<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Services\FacilitiesService;

class FacilitiesController extends Controller
{
    protected $facilitiesService;
    public function __construct(FacilitiesService $facilitiesService){
        $this->facilitiesService = $facilitiesService;
    }
    
    public function getRecords()
    {
        $facilities = $this->facilitiesService->getRecords();
        return view(('admin.facility.top'), ['facilities' => $facilities]);
    }

    public function deleteRecord($id)
    {
        $this->facilitiesService->deleteRecord($id);
        return redirect()->route('facility.top');
    }
}