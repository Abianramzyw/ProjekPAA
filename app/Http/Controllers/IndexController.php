<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $cars = Cars::all();
        return view('dashboard', compact('cars'));
    }
}
