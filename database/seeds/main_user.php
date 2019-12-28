<?php

use Illuminate\Database\Seeder;

class main_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array(
            'name' => 'Root',
            'email' => 'root@root.com',
            'password' => bcrypt('12345678'),
            'remember_token' => bcrypt('12345678'),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
            ));
    }
}
