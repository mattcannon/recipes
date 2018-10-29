<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::latest()->take(5)->get();
        return view('index',compact('recipes'));
    }
}
