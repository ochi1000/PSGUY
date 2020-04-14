<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\TestingMail;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->locationStates= [
            "Abia","Adamawa","Akwa Ibom","Anambra","Bauchi","Bayelsa","Benue","Borno","Cross River","Delta", "Ebonyi","Edo","Ekiti","Enugu","FCT - Abuja","Gombe","Imo","Jigawa","Kaduna","Kano","Katsina",   "Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger","Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto","Taraba","Yobe","Zamfara"
        ];

    }
    public function show(){
        return view('service',['locationStates'=>$this->locationStates]);
    }

    public function saveFixRequest(Request $request){

        // Cart::destroy();
        Cart::add(1, $request->name, 1, 1000, ['description'=> $request->description, 'mark'=> $request->mark]);
        return response()->json(Cart::content());

    }

    public function showCompletionForm(){
        $cart = Cart::content();
        return view('completionForm',['states'=>$this->locationStates, 'cart'=> $cart]);
    }
    public function create(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'=> 'required|string|min:4',
                'email'=> 'required|email|min:4',
                'phone'=>'required|digits:11',
                'state'=>'required|string',
                'address'=>'string|min:8',
            ]);
            $service = new Service;

            $service->name = $request->name;
            $service->state = $request->state;
            $service->address = $request->address;
            $service->phone = $request->phone;
            $service->description = $request->description;

            $service->save();

            return redirect('/fixing')->with('success','Created successfully');
        }else{
            throw new Exception('Error');
        }
    }

    public function getEditFixRequest($rowId)
    {
        $cartItem = Cart::get($rowId);
        return response()->json([
            'error' => false,
            'cartItem'  => $cartItem,
        ], 200);
    }
    public function updateFixRequest(Request $request, $rowId)
    {
        Cart::update($rowId, 3, ['description'=> $request->description, 'mark'=> $request->mark]);
        return response()->json('success');
    }

    public function deleteFixRequest($rowId){
        Cart::remove($rowId);
        return response()->json('success');
    }
}
