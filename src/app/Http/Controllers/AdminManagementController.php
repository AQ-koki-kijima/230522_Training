<?php

namespace App\Http\Controllers;

class AdminManagementController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
}
