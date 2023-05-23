<?php

namespace App\Http\Services;
use App\Models\Users;

class UsersService
{
    protected $users;
    public function __construct(Users $users){
        $this->users = $users;
    }
    
    public function getRecords()
    {
        return $this->users->getRecords();
    }

    public function getName()
    {
        $name = $this->users->getRecords()->select('name')->get();
        return $name;
    }
}