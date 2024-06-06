<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //home
    public function index()
    {
       $categoriesFromDB = Categorie::all();
       $productFromDB = Product::all();
        
        return view(view:'home.index', data:['categories' => $categoriesFromDB, 'products' => $productFromDB]);
    }

    public function show($categorieId) 
    {
        $categorie = Categorie::with('products')->findOrFail($categorieId);

        return view('home.show')->with(compact('categorie'));
    }

    //product
    public function create()
    {
        $categories = Categorie::all();

       return view(view:'home.create', data:['categories' => $categories]);
    }

    public function store()
    {
        request()->validate([
            'name_the_product' =>['required', 'min:3'],
            'description' =>['required', 'min:5'],
            'image_the_product' =>['required'],
            'categories' =>['required', 'exists:categories,id']
            // 'image_the_product' => ['required|image|mimes:jpeg,png,jpg,gif|max:2048']
        ]);

        $name= request()->name_the_product;
        $price = request()->price;
        $description = request()->description;
        $categories = request()->categories;
        $image = request()->file('image_the_product');
        $image_new_name = time().$image->getClientOriginalExtension();
        $image->move('uploads/images', $image_new_name);
        
       
        

        Product::create([
            'nameproduct' =>$name,
            'price' =>$price,
            'description' =>$description,
            'imageproduct' =>'uploads/images/'. $image_new_name,
            'categorie_id' => $categories,
        ]);
      
        
        return to_route(route:'shop.index');
    }

    //categories
    public function createcategorie()
    {

       return view(view:'home.createcategorie');
    }

    public function storecategorie()
    {
        request()->validate([
            'name_the_categorie' =>['required', 'min:3'],
            'image_the_categorie' =>['required'],
        ]);

        $name= request()->name_the_categorie;
        $image = request()->file('image_the_categorie');
        $image_new_name = time().$image->getClientOriginalExtension();
        $image->move('uploads/images/categories', $image_new_name);
          

        Categorie::create([
            'namecategorie' =>$name,
            'imagecategorie' =>'uploads/images/categories/'. $image_new_name,
        ]);
      
        
        return to_route(route:'shop.index');
    }
}
