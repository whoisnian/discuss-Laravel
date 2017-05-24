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
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'privilege' => '0',
            'name' => 'guest',
            'email' => 'guest',
            'password' => Hash::make('guest'),
        ]);
    }
}
