<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPanelController extends Controller
{
    public function userBalance() 
    {
        $user = Auth::user();

        return view('user.balance', ['balance' => $user->balance]);
    }
}
