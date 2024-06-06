<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'Administrators' )->first();
        $data = User::create([
            'name'=> "Admin",
            'email'=> "admin@gmail.com",
            'password'=> Hash::make("12345678"),
            'is_admin'=> "2",
            ]);
        $data->roleUsers()->attach($role->id);
    }
}
