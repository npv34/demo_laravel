<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    function showDashBoard() {
        return view('admin.dashboard');
    }
}
