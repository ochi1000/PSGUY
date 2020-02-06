<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use PHPUnit\Runner\Exception;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->products = Product::all();
    }
    public function show(){
        return view('product', ['products' => $this->products]);
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=> 'required|string|min:4',
                'price'=> 'required|numeric',
                'category'=>'required|string|min:4',
                'description'=>'required|string|min:10',
                'quantity'=>'required|integer',
                'image_path'=>'required|string'
            ]);

            Product::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'category'=>$request->category,
                'description'=>$request->description,
                'quantity'=>$request->quantity,
                'image_path'=>$request->image_path,
            ]);
            return redirect('/admin/products');
            echo('done');
        }else{
            throw new Exception('Error');
        }
    }
}
