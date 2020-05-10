<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\TestingMail;
use App\Service;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->padProblems= [
            "X or O or SQUARE or TRIANGLE or all are not working","R1 or L1 or L2 or R2 or all are not working","Player keeps going in one direction or Left Analog keeps going in one direction","Left Analog problem","Right analog problem","Pad is not charging","Pad is charging but not coming on","Pad is not charging and is not coming on ","Pad is coming on but not connecting to the console"
        ];
        $this->consoleProblems= [
            "Over heating, sounds like a jet engine about to take off","Blue light keeps blinking, does not turn on","Games are lagging, freezing or crashing often","Does not show up or connect to TV, HDMI cable problem","Blinking red light, does not turn on","Blinking yellow light, does not turn on","Ps4 does not eject game discs or auto ejects","PS4 does not connect to PSN"
        ];
        $this->locationStates= [
            "Abia","Adamawa","Akwa Ibom","Anambra","Bauchi","Bayelsa","Benue","Borno","Cross River","Delta", "Ebonyi","Edo","Ekiti","Enugu","FCT - Abuja","Gombe","Imo","Jigawa","Kaduna","Kano","Katsina",   "Kebbi","Kogi","Kwara","Lagos","Nasarawa","Niger","Ogun","Ondo","Osun","Oyo","Plateau","Rivers","Sokoto","Taraba","Yobe","Zamfara"
        ];
    }

    public function show(){
        // Cart::destroy();
        return view('fixing',['padProblems'=>$this->padProblems,'consoleProblems'=>$this->consoleProblems, 'cart'=> Cart::content(), 'servicePrice'=>$this->getServicePrice()]);
    }

    protected function getServicePrice(){
        $serviceCharge = 0;
        $cartItemCount = Cart::count();
        if($cartItemCount == 1){
            $serviceCharge = 100000;
            return $serviceCharge;
        }elseif($cartItemCount == 0){
            $serviceCharge = 0;
            return $serviceCharge;
        }elseif($cartItemCount > 1){
            $remaining = $cartItemCount - 1;
            $remainingAmount = $remaining * 90000;
            $serviceCharge = $remainingAmount + 100000;
            return $serviceCharge;
        }
    }

    public function saveFixRequest(Request $request){

        Cart::add(1, $request->name, 1, 1000, ['description'=> $request->description, 'additional_description'=>$request->additionalDescription, 'mark'=> $request->mark]);
        return response()->json(Cart::content());

    }

    public function showCompletionForm(){
        if(Cart::count() >= 1){
            if(Auth::guest()){
                return redirect()->guest('login');
            }
            return view('checkout',['states'=>$this->locationStates, 'cart'=> Cart::content(),'servicePrice'=>$this->getServicePrice()]);
        }else{
            return back();
        }
    }

    public function addUserInfo(Request $request){

        $user=Auth::user();

        $data = $this->validate($request, [
            'phone'=>'required|digits:11',
            'state'=>'required|string',
            'address'=>'required|string',
        ]);

        $user->phone = $data['phone'];
        $user->state = $data['state'];
        $user->address = $data['address'];

        $user->save();

        return response()->json(['message'=>'Success']);

    }

    public function getEditFixRequest($rowId){
        $cartItem = Cart::get($rowId);
        return response()->json([
            'error' => false,
            'cartItem'  => $cartItem,
        ], 200);
    }

    public function updateFixRequest(Request $request, $rowId)
    {
        // Cart::update($rowId, 3, ['description'=> $request->description, 'additional_description'=>$request->additionalDescription, 'mark'=> $request->mark]);
        // return response()->json('success');
    }

    public function deleteFixRequest($rowId){
        Cart::remove($rowId);
        return response()->json('success');
    }

}
