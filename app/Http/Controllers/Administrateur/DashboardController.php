<?php

namespace App\Http\Controllers\Administrateur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    public function create(){
        return view('administrateur.dashboard');
    }
}
