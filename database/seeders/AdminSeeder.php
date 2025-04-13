<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Buat role 'admin' jika belum ada
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Hapus user admin jika sudah ada
        User::where('email', 'admin@gmail.com')->delete();

        // Buat ulang user admin dengan password baru
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'), // ✅ password baru
        ]);

        // Berikan role admin
        if (!$admin->hasRole('admin')) {
        $admin->assignRole($role);
        }
    }
}
