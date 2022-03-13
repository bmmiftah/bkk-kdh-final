<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->count();

        $lowongans = DB::table('lowongans')
        ->where('status', 1)
        ->count();

        $informasis = DB::table('informasis')
        ->where('deleted_at', NULL)
        ->count();

        $perusahaans = DB::table('perusahaans')->count();

        return view('dashboard.index',[
            'users' => $users,
            'lowongans' => $lowongans,
            'informasis' => $informasis,
            'perusahaans' => $perusahaans,
            'title' => "Dashboard"
        ]);

        
    }
}
