<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\City;
use App\Models\Card;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $address = Address::where('userID', Auth::id())
        ->join('cities', 'addresses.cityID', '=', 'cities.id')
        ->select('addresses.*', 'cities.name as cityname')
        ->get()
        ->toArray();
        $orders = Order::where('userID', Auth::id())->get();
        $cards = Card::where('userID', Auth::id())->get()->toArray();
        foreach($orders as $order)
        {
            $orderitems = OrderItem::where('orderID', $order['id'])
            ->join('items', 'order_items.itemID', '=', 'items.id')
            ->get();
            $order['items'] = $orderitems;
        }
        return view('profile', ['userdata' => Auth::user(), 'orders' => $orders, 'address' => $address, 'cards' => $cards]);
    }
    public function addAddress(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                $address = new Address;
                $address->name = $request['address'];
                $address->cityID = $request['city'];
                $address->comment = $request['comment'];
                $address->userID = Auth::id();
                if ($address->save())
                {
                    return redirect()->route('profile');
                }
                break;
    
            case 'GET':
                $cities = City::all()->toArray();
                return view('newAddress', ['cities' => $cities]);
                break;
    
            default:
                abort(404);
                break;
        }
    }
    public function changeAddress(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                $addressID = Address::where('userID', Auth::id())->select('id')->get()->toArray();
                $address = Address::find($addressID['0']['id']);
                $address->name = $request['address'];
                $address->cityID = $request['city'];
                $address->comment = $request['comment'];
                $address->userID = Auth::id();
                if ($address->save())
                {
                    return redirect()->route('profile');
                }
                break;
    
            case 'GET':
                $address = Address::where('userID', Auth::id())->get()->toArray();
                $cities = City::all()->toArray();
                return view('changeAddress', ['cities' => $cities, 'address' => $address]);
                break;
    
            default:
                abort(404);
                break;
        }
    }
    public function addCard(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                $card = new Card;
                $card->name = $request['name'];
                $card->expdate = $request['expdate'];
                $card->cvc = $request['cvc'];
                $card->userID = Auth::id();
                if ($card->save())
                {
                    return redirect()->route('profile');
                }
                break;
    
            case 'GET':
                $cards = Card::where('userID', Auth::id())->get()->toArray();
                return view('newCard', ['cards' => $cards]);
                break;
    
            default:
                abort(404);
                break;
        }
    }
    public function changeCard(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                $cardID = Card::where('userID', Auth::id())->select('id')->get()->toArray();
                $card = Card::find($cardID['0']['id']);
                $card->name = $request['name'];
                $card->expdate = $request['expdate'];
                $card->cvc = $request['cvc'];
                $card->userID = Auth::id();
                if ($card->save())
                {
                    return redirect()->route('profile');
                }
                break;
    
            case 'GET':
                $cards = Card::where('userID', Auth::id())->get()->toArray();
                return view('changeCard', ['cards' => $cards]);
                break;
    
            default:
                abort(404);
                break;
        }
    }
}
