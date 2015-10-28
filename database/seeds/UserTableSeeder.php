<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();
      DB::table('users')->insert([
            'id' => 1,
            'name' => 'administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
