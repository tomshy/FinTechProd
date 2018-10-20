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
        //$faker=\Faker\Factory::create();
        for($i=0;$i<=10;$i++){
        	DB::table('users')->insert([
        		'name'=>str_random(10),
        		'email'=>str_random(10).'@gmail.com',
        		'password'=>bcrypt('secret'),
        		'phone'=>mt_rand(1000000000,9999999999),
        		'balance'=>mt_rand(100000,999999)
        		]);
        }
    }
}
