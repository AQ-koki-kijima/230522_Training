<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function getRecords()
    {
        return DB::table($this->table);
    }
}
