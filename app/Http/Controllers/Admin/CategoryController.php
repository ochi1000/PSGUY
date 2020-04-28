<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use PHPUnit\Runner\Exception;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->categories = Category::all();
    }
    public function show(){
        return view('category',['categories'=>$this->categories]);
    }

    public function create(Request $request){
        if($request->has('name')){
            $request->validate([
            'name' => 'required|unique:categories|min:4'
            ]);

            Category::create([
                'name'=> $request->name
            ]);
            echo('Successful');
        }else{
            throw new Exception('error');
        }

    }
}
