<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Services\UsersService;

class UsersController extends Controller
{
    protected $usersService;
    public function __construct(UsersService $usersService){
        $this->usersService = $usersService;
    }
    
    public function getName()
    {
        return $this->usersService->getName();
    }
}