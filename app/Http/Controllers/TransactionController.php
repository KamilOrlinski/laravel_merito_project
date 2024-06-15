<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TransactionController extends Controller
{
    public function transactionHistory()
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();
    
        $receivedTransactions = $user->receivedTransactions()->latest()->get();
        $sentTransactions = $user->sentTransactions()->latest()->get();
    
        return view('admin.adminHistory', [
            'receivedTransactions' => $receivedTransactions,
            'sentTransactions' => $sentTransactions,
        ]);
    }
}
