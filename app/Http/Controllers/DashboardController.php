<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    return view('dashboard.index',[
        "name" => "Lab TK-B 1",
        "id" => "id",
        "location" => "Laboratorium Telekomunikasi Barat - 01",
        "maps" => "maps"
    ]);
    }
}
