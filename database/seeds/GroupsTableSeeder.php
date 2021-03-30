<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GroupsTableSeeder extends Seeder {

    /**
     * Create a default admin & user role
     *
     * @return void
     */
    public function run() {
        // Add default admin group
        DB::table('groups')->insert([
            'group_name' => 'Administrator',
            'group_color' => '#ff0000',
            'default_group' => false,
            'creator_id' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('group_permissions')->insert([
            'group_id' => 1,
            'permission_name' => '*',
            'creator_id' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

}
