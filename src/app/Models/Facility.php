<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Facility extends Model
{
    use HasFactory;

    protected $table = 'facilities';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function getRecords()
    {
        return DB::table($this->table);
    }
}
