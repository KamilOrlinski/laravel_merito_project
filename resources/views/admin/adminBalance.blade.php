<!-- resources/views/home.blade.php -->

<x-adminDashboard :balance="$balance" :accountNumber="$accountNumber">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        <p>Stan konta admina: ${{ number_format($balance, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-adminDashboard>
