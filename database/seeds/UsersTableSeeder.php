<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'privilege' => '2',
            'name' => 'admin',
            'email' => 'admin',
            'password' => Hash::make('adminadmin'),
            'created_at' => '2000-01-01 00:00:00',
            'updated_at' => '2000-01-01 00:00:00',
        ]);

        DB::table('users')->insert([
            'privilege' => '0',
            'name' => 'guest',
            'email' => 'guest',
            'password' => Hash::make('guestguest'),
            'created_at' => '2000-01-01 00:00:00',
            'updated_at' => '2000-01-01 00:00:00',
        ]);
    }
}
