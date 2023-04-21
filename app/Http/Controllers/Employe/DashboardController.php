<?php

namespace App\Http\Controllers\Employe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    public function create(){
        return view('employe.dashboard');
    }
}
