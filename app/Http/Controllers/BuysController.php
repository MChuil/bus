<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuysController extends Controller
{
    
    public function index(){
        return view('buys');
    }
}
