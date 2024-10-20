<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create the SSO role if it doesn't exist
        $ssoRole = Role::firstOrCreate(['role_name' => 'SSO']);

        // Create a user with the SSO role
        $user = User::factory()->create([
            'name' => 'sso',
            'email' => 'sso@example.com',
            'password' => bcrypt('password'), // Make sure to hash the password
        ]);

        // Attach the SSO role to the user
        $user->roles()->attach($ssoRole->id);
    }
}
