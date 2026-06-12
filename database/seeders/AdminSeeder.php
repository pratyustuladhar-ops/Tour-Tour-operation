<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create default admin user (change password after first login!)
        User::updateOrCreate(
            ['email' => 'admin@himalayaai.com'],
            [
                'name'     => 'Admin',
                'email'    => 'admin@himalayaai.com',
                'password' => Hash::make('Admin@1234'),
                'is_admin' => true,
            ]
        );

        $this->command->info('✅ Admin user created: admin@himalayaai.com / Admin@1234');
    }
}
