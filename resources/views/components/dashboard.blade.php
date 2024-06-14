<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Przelewy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                            <p>Stan konta: {{ number_format($balance, 2) }} PLN</p>
                                        </div> <br>
                                        <p>Twój numer konta: {{ $accountNumber }}</p>
                                    </div>
                                    <form method="POST" action="{{ route('transfer') }}">
                                        @csrf
                                        <label for="bank_account_number">Numer konta odbiorcy:</label>
                                        <input type="text" id="bank_account_number" name="bank_account_number" style="color: blue; width: 260px;">
                                        <br>
                                        <label for="amount">Kwota przelewu:</label>
                                        <input type="number" id="amount" name="amount" style="color :blue">
                                        <br>
                                        <button type="submit" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 5px;">Wyślij przelew</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

