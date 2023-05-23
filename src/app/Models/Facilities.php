<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class Facilities extends Model
{
    protected $table = 'facilities';

    protected $primaryKey = 'id';

    public function getRecords()
    {
        return DB::table($this->table);
    }
}