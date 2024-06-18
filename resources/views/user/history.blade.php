<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Przelewy') }}
        </h2>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/css/dashboard.css', 'resources/js/app.js'])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" id="mainDiv">
                    <div class="container">
                        <h2 id="title">Historia transakcji</h2>
                
                        <h2>Wysłane przelewy:</h2>
                        <ul>
                            @foreach ($sentTransactions as $transaction)
                                <li id="sent">
                                    Kwota: {{ $transaction->amount }} PLN - Odbiorca: {{ $transaction->receiver }}
                                    Data: {{ $transaction->created_at }}
                                </li>
                            @endforeach
                        </ul>
                
                        <h2>Otrzymane przelewy:</h2>
                        <ul>
                            @foreach ($receivedTransactions as $transaction)
                                <li id="received">
                                    Kwota: {{ $transaction->amount }} PLN - Nadawca: {{ $transaction->sender }}
                                    Data: {{ $transaction->created_at }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- resources/views/transaction/history.blade.php -->
{{-- 
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Historia transakcji</h1>

        <h2>Wysłane przelewy:</h2>
        <ul>
            @foreach ($sentTransactions as $transaction)
                <li>
                    Kwota: {{ $transaction->amount }} PLN - Odbiorca: {{ $transaction->receiver }}
                    Data: {{ $transaction->created_at }}
                </li>
            @endforeach
        </ul>

        <h2>Otrzymane przelewy:</h2>
        <ul>
            @foreach ($receivedTransactions as $transaction)
                <li>
                    Kwota: {{ $transaction->amount }} PLN - Nadawca: {{ $transaction->sender }}
                    Data: {{ $transaction->created_at }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection --}}
