<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin already exists to prevent duplicate entries
        if (!User::where('email', 'admin')->exists()) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin', // The user requested 'admin' as the username/email for login
                'password' => Hash::make('admin123@'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);
            $this->command->info('Super admin created! Credentials: admin / admin123@');
        } else {
            $this->command->info('Super admin already exists.');
        }
    }
}
