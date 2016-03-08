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
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'firstname' => 'bert',
            'lastname' => 'lempens',
            'email' => 'blempens@eschool.be',
            'password' => bcrypt('secret'),
            'telephone' => '5557771234',
            'admin' => 1,
        ]);
    }
}
