<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeratorPanelController extends Controller
{
    public function moderatorDashboard()
    {
        return view('moderator.modDashboard');
    }
}
