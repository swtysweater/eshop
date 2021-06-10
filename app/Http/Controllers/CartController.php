<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Card;
use App\Models\Payment_Method;
use Illuminate\Support\Facades\Auth;
use Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartitems = $request->session()->get('cart');
        if($cartitems !== NULL)
        {
            $cartitems = $request->session()->get('cart')->items;
        }
        $totalPrice = $request->session()->get('cart')->totalPrice ?? null;
        $methods = Payment_Method::all()->toArray();
        $card = Card::where('userID', Auth::id())->get()->toArray();
        return view('cart', ['cartitems' => $cartitems, 'total' => $totalPrice, 'methods' => $methods, 'card' => $card]);
        
    }
    public function proceed(Request $request)
    {
        $cartitems = $request->session()->get('cart')->items;
        $total = $request->session()->get('cart')->totalPrice;
        $order = new Order;
        $order->userID = Auth::id();
        $order->payment_methodID = $request->payment_method;
        $order->total = $total;
        $order->save();
        foreach($cartitems as $item)
        {
            $orderitem = new OrderItem;
            $orderitem->orderID = $order->id;
            $orderitem->itemID = $item['item']['id'];
            $orderitem->qty = $item['qty'];
            $orderitem->save();
        }
        $request->session()->forget('cart');
        return view('purchase');
    }
    public function add(Request $request, $id)
    {
        $item = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($item, $item->id);
        Session::put('cart', $cart);
        return redirect()->route('cart');
    }
    public function remove(Request $request, $id)
    {
        $item = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($item, $item->id);
        Session::put('cart', $cart);
        return redirect()->route('cart');
    }
    public function removeAll(Request $request, $id)
    {
        $item = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeAll($item, $item->id);
        Session::put('cart', $cart);
        return redirect()->route('cart');
    }
}
