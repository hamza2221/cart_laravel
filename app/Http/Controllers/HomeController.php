<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function addToCart(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|max:15',
            'price' => 'required|numeric|min:1',
            'qty' => 'required|numeric|min:1',
        ]);
        Cart::instance($request->user()->id)->add(array(
                'id' => time(),
                'name' => $request->name,
                'qty' => $request->qty,
                'price' => $request->price,
                'options' => array())
                );
        
        
       return redirect('/get_cart');
    }
    public function updateCart(Request $request,$rowID,$newQuantity)
    {
        
        $myCart=Cart::instance($request->user()->id);
        $myCart->update($rowID,array(
                'qty' => $newQuantity
               )
        );
        
        
       return redirect('/get_cart');
    }
    public function getCart(Request $request)
        {
            $myCart=Cart::instance($request->user()->id);
            $cartDetails=$myCart->content();
            $total=$myCart->total();
            $totalItems=$myCart->count(false);
            return view('cartDetails')->withCart($myCart);
        }
    public function destroyCart(Request $request)
        {
            $myCart=Cart::instance($request->user()->id);
            $myCart->destroy();
            return redirect('/get_cart');
        }
}
