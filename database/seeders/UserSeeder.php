<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * User Seeder
 * 
 * Creates admin users with different roles for testing
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@ibi.ac.id',
                'password' => Hash::make('password'),
                'role' => User::ROLE_SUPER_ADMIN,
                'is_active' => true,
            ],
            [
                'name' => 'CDC Admin',
                'email' => 'cdc@ibi.ac.id',
                'password' => Hash::make('password'),
                'role' => User::ROLE_CDC_ADMIN,
                'is_active' => true,
            ],
            [
                'name' => 'BEI Admin',
                'email' => 'bei@ibi.ac.id',
                'password' => Hash::make('password'),
                'role' => User::ROLE_BEI_ADMIN,
                'is_active' => true,
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
            $this->command->info("✓ Created user: {$userData['email']} (password: password)");
        }
    }
}
