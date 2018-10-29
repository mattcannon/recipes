<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function show(Recipe $recipe)
    {
        return view('recipes.show',compact('recipe'));
    }
}
