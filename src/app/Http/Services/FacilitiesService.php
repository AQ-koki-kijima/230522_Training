<?php

namespace App\Http\Services;
use App\Models\Facilities;

class FacilitiesService
{
    protected $facilities;
    public function __construct(Facilities $facilities){
        $this->facilities = $facilities;
    }
    
    public function getRecords()
    {
        return $this->facilities->getRecords()->get();
    }

    public function deleteRecord($id)
    {
        $facility = $this->facilities->find($id);

        // 削除処理
        if ($facility) {
            $facility->delete();
        }
    }
}