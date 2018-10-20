<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests\sendMoneyReequest;

class sendMoneyController extends Controller
{
    public function create()
    {
    	return view('welcome');
    }
    public function store(Request $request)
    {
    	$sendMoney=[];
        $senderId=Auth::id();
        $lastBal=Auth::user()->balance;
    	$recipient=$sendMoney['email_phone']=$request->get('email_phone');
    	$amount=$sendMoney['amount']=$request->get('amount');
        //insert transaction to transaction table
    	DB::table('transactions')->insert([
    		'amount'=>$sendMoney['amount'],
            'recipientId'=>$sendMoney['email_phone'],
            'senderId'=>$senderId
    		]);
        //update sender and recipient balances
        DB::table('users')->where('userId',$senderId)->update(array('balance'=>$lastBal-$amount));
    	DB::table('users')->where('email',$recipient)->update(array('balance'=>$lastBal+$amount));
    	$data=array('amount'=>$amount,'user'=>$recipient,$senderId);
    	 Mail::send('send',['amount'=>$amount,'user'=>$recipient], function ($m){
            $m->from('no-reply@fintechprod.fin', 'FinTech Prod');

            $m->to('tomnyongesa5@gmail.com','Tom')->subject('Sent Money notification');
        });
    	return view('send')->with($data);

    }
}
