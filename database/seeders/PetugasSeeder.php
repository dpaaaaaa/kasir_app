<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PetugasSeeder extends Seeder
{
    public function run()
    {
        $role = Role::firstOrCreate(['name' => 'petugas']);

        $user = User::updateOrCreate(
            ['email' => 'petugas@gmail.com'],
            [
                'name' => 'Petugas 1',
                'password' => Hash::make('12345678'),
            ]
        );

        $user->assignRole($role);
    }
}
