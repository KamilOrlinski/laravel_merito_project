<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserPanelController extends Controller
{
    public function userBalance() 
    {
        $user = Auth::user();

        if(!$user)
        {
            return redirect()->back()->with('error', 'Nie znaleziono zalogowanego użytkownika');
        }

        $balance = $user->balance;
        $accountNumber = $user->accountNumber;

        return view('user.balance', ['balance' => $balance, 'accountNumber' => $accountNumber]);
    }

    public function transfer(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'bank_account_number' => ['required', 'string', 'size:26'],
        'amount' => ['required', 'numeric', 'min:0'],
    ]);

    if(empty($request->bank_account_number))
    {
        return redirect()->back()->with('error', 'Proszę podać numer konta odbiorcy');
    }

    $receiver = User::where('accountNumber', $request->bank_account_number)->first();

    if(!$receiver)
    {
        return redirect()->back()->with('error', 'Odbiorca o podanym numerze konta nie istnieje');
    }

    if ($user->balance >= $request->amount) 
    {
        $user->balance -= $request->amount;
        /** @var \App\Models\User $user **/
        $user->save();


        $receiver->balance += $request->amount;
        $receiver->save();

        return redirect()->back()->with('success', 'Przelew został wykonany pomyślnie.');
    }
    else 
    {
        return redirect()->back()->with('error', 'Brak wystarczających środków na koncie.');
    }
}

}
