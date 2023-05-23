<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SystemAdmin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        SystemAdmin::truncate();
        SystemAdmin::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin')
        ]);
    }
}
