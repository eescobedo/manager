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
            'name' => 'enner',
            'email' => 'eriec.42@gmail.com',
            'password' => bcrypt('123456')
        ]);

        DB::table('users')->insert([
            'name' => 'ranferi',
            'email' => 'ranferiescobedo@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
