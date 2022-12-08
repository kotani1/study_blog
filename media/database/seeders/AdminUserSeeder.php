<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::create([
            'name' => 'owner',
            'email' => 'owner@example.com',
            'password' => Hash::make('password'),
            'admin_level' => 1,
        ]);
        AdminUser::create([
            'name' => 'sub',
            'email' => 'sub@example.com',
            'password' => Hash::make('password'),
            'admin_level' => 0,
        ]);
    }
}
