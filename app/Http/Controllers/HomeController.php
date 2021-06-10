<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addItem(Request $request, $id)
    {
        $item = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($item, $item->id);
        Session::put('cart', $cart);
        return back();
    }
    public function index(Request $request)
    {
        $items = new Item;

        return view('home', ['data' => $items
        ->select('items.*', 'factories.name as factoryName', 'countries.name as country')
        ->join('factories', 'items.factoryID', '=', 'factories.id')
        ->join('countries', 'factories.countryID', '=', 'countries.id')
        ->take(9)
        ->get(), 'session' => $request->session()->all(), 'authdata' => Auth::user()]);
    }
}
