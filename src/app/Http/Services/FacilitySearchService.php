<?php

namespace App\Http\Services;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilitySearchService
{
    protected Facility $facilities;

    public function __construct(Facility $facility)
    {
        $this->facilities = $facility;
    }

    public function searchFacility(Request $request)
    {
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $location = $request->input('location');

        return $this->facilities->getRecords()
            ->select('facilities.id', 'facilities.name', 'services.id as service_id', 'services.name as service_name', 'price')
            ->join('services', 'facilities.id', 'services.facility_id')
            ->where(function ($query) use ($keyword) {
                $query
                    ->where('facilities.name', 'LIKE', "%{$keyword}%")
                    ->orWhere('facilities.description', 'LIKE', "%{$keyword}%")
                    ->orWhere('category', 'LIKE', "%{$keyword}%")
                    ->orWhere('facilities.location', 'LIKE', "%{$keyword}%")
                    ->orWhere('services.name', 'LIKE', "%{$keyword}%")
                    ->orWhere('services.price', 'LIKE', "%{$keyword}%")
                    ->orWhere('services.description', 'LIKE', "%{$keyword}%");
            })
            ->when($category, function ($query, $category) {
                return $query->where('category', 'LIKE', "%{$category}%");
            })
            ->when($location, function ($query, $location) {
                return $query->where('location', 'LIKE', "%{$location}%");
            })
            ->get()
            ->groupBy('id');
    }
}
