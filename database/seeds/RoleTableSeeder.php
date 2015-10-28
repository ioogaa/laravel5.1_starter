<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       DB::table('roles')->delete();
       $roles = array(
         array("id" => 1, "name" => "admin", "slug" => "admin", "description" => "Role super user."),
         array("id" => 2, "name" => "client", "slug" => "client", "description" => "Role client."),
       );
       DB::table('roles')->insert($roles);
     }
}
