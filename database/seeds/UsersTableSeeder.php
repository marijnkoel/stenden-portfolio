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
        //
        DB::table('users')->insert([
            'name' => "Admin",
            'infix' => "is",
            'surname' => "tator",
            'user_level' => 0,
            'email' => "admin@stenden.nl",
            'password' => bcrypt('123456'),
        ]);
    }
}
