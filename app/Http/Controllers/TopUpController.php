<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class TopUpController extends Controller
{
    public function topUp(Request $request)
    {
    	$currentUser=Auth::id();
    	$lastBal=Auth::user()->balance;
    	$amount=$request->get('amount');
    	DB::table('users')->where('userId',$currentUser)->update(array('balance'=>$lastBal+$amount));
    }
}
