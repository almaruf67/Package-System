<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(12);
        return view('manager.Panel.Order.index', compact('products'));
    }

    public function addtoCart($id)
    {
        $prod = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        $total=0;
        if(session('total'))
        {
            $total=session()->get('total');
        }
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $total+=$cart[$id]['price'];
        }
        else {
            $cart[$id] = [
                "id" => $prod->id,
                "title" => $prod->Title,
                "quantity" => 1,
                "price" => $prod->Price,
                "poster" => $prod->Poster,
            ];
            $total+=$cart[$id]['price'];
        }
        session()->put('cart', $cart);
        // dd($cart);
        session()->put('total', $total);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $total = $request->session()->pull('total');

        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $total-=$cart[$request->id]['quantity']*$cart[$request->id]['price'];
            $cart[$request->id]["quantity"] = $request->quantity;
            $total+=$cart[$request->id]['quantity']*$cart[$request->id]['price'];
            session()->put('cart', $cart);
            session()->put('total', $total);
            }
    }

    public function deleteProduct(Request $request)
    {
        $total = $request->session()->pull('total');
        
        if($request->id) {
            $cart = session()->get('cart');
            $total-=$cart[$request->id]['quantity']*$cart[$request->id]['price'];
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->put('total', $total);
        }
    }

}
