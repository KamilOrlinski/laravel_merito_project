<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User;

class UserPanelController extends Controller
{
    public function userBalance() 
    {
        $user = Auth::user();

        $balance = $user->balance;
        $accountNumber = $user->accountNumber;

        return view('user.balance', ['balance' => $balance, 'accountNumber' => $accountNumber]);
    }

//     public function transfer(Request $request)
// {
//     $user = Auth::user();

//     $receiver = User::where('accountNumber', $_POST['bank_account_number']);

//     $request->validate([
//         'bank_account_number' => ['required', 'string', 'size:26'],
//         'amount' => ['required', 'numeric', 'min:0'],
//     ]);

//     // Sprawdź czy użytkownik ma wystarczającą ilość środków na koncie
//     if ($user->balance >= $request->amount) {
//         // Wykonaj przelew
//         // Zaktualizuj saldo konta użytkownika
//         $user->balance - $request->amount;
//         // Zaktualizuj saldo konta odbiorcy


//         // Poinformuj użytkownika o sukcesie przelewu
//         return redirect()->back()->with('success', 'Przelew został wykonany pomyślnie.');
//     } else {
//         // Poinformuj użytkownika o braku wystarczających środków
//         return redirect()->back()->with('error', 'Brak wystarczających środków na koncie.');
//     }
// }

}
