<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $senderId=DB::table('users')->value('userId');
        
        for ($i=0; $i <=10 ; $i++) { 
        	DB::table('transactions')->insert([
        		'senderId'=>$senderId,
        		'recipientId'=>$senderId,
        		'amount'=>mt_rand(100000,999999)
        		]);
        }
    }
}
