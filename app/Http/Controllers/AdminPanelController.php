<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.adminDashboard');
    }

    // public function navAdminDash()
    // {
    //     return view('admin.adminDashboard');
    // }
}
