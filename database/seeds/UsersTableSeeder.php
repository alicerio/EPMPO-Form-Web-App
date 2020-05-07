<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'ctis@utep.edu',
            'email_verified_at' => '2020-05-06 22:37:16',
            'password' => Hash::make('astrongpassword'),
            'type' => 2,
            'agency_id' => 1,
        ]);
    }
}
