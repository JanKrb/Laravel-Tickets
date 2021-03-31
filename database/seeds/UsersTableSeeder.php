<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {

    /**
     * Create a default user
     * Default email: admin@admin.com
     * Default password: password
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'group' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

}
