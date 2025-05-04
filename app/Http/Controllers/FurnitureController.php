<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Furniture;

class FurnitureController extends Controller
{
    public function index()
    {
        $featuredFurnitures = Furniture::where('is_featured', true)->take(6)->get();
        return view('landing', compact('featuredFurnitures'));
    }
    
    public function show($id)
    {
        $furniture = Furniture::findOrFail($id);
        return response()->json($furniture);
    }

}






