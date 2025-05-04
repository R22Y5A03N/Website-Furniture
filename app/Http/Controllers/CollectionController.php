<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('collection', compact('products'));
    }
}