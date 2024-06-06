<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search in the product name and description
        $products = Product::where('nameproduct', 'LIKE', "%{$query}%")
                           ->orWhere('description', 'LIKE', "%{$query}%")
                           ->get();

        return view('search.results', compact('products'));
    }
}
