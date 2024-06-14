<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public $balance;
    public $accountNumber;

    public function __construct($balance, $accountNumber)
    {
        $this->balance = $balance;
        $this->accountNumber = $accountNumber;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard');
    }
}
