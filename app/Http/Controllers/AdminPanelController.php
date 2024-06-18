<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AdminPanelController extends Controller
{
    public function adminDashboard()
    {
        $users = User::all();
        return view('admin.adminDashboard', ['users' => $users]);
        // return view('admin.adminDashboard');
    }

    public function adminAbout() 
    {
        return view('admin.adminAbout');
    }

    // public function navAdminDash()
    // {
    //     return view('admin.adminDashboard');
    // }

    public function adminBalance() 
    {
        $user = Auth::user();

        if(!$user)
        {
            return redirect()->back()->with('error', 'Nie znaleziono zalogowanego użytkownika');
        }

        $balance = $user->balance;
        $accountNumber = $user->accountNumber;

        return view('admin.adminBalance', ['balance' => $balance, 'accountNumber' => $accountNumber]);
    }

    public function transfer(Request $request)
    {
        $user = Auth::user();

        Log::info('Transfer method called');
    
        $request->validate([
            'bank_account_number' => ['required', 'numeric', 'size:26'],
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

            try {
                $transaction = new Transaction();
                $transaction->amount = $request->amount;
                $transaction->sender = $user->accountNumber;
                $transaction->receiver = $receiver->accountNumber;

                // Log before saving
                Log::info('Saving transaction:', [
                    'amount' => $transaction->amount,
                    'sender' => $transaction->sender,
                    'receiver' => $transaction->receiver
                ]);

                $transaction->save();

                // Log after saving
                Log::info('Transaction saved successfully');
            } catch (\Exception $e) {
                Log::error('Błąd podczas zapisywania transakcji: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Wystąpił błąd podczas zapisywania transakcji.');
            }
    
            return redirect()->back()->with('success', 'Przelew został wykonany pomyślnie.');
        }
        else 
        {
            return redirect()->back()->with('error', 'Brak wystarczających środków na koncie.');
        }
    }

    public function userList()
    {
        $users = User::all();
        return view('admin.userList', ['users' => $users]);
    }

    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.userList')->with('success', 'Użytkownik zaktualizowany pomyślnie');
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Dane użytkownika zostały zaktualizowane pomyślnie');
    }
}
