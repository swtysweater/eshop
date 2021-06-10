<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;

class ItemController extends Controller
{
    public function indexSite()
    {
        $items = new Item;

        return view('item', ['data' => $items
        ->select('items.*', 'factories.name as factoryName', 'countries.name as country')
        ->join('factories', 'items.factoryID', '=', 'factories.id')
        ->join('countries', 'factories.countryID', '=', 'countries.id')
        ->where('items.id', '=', $_GET['id'])
        ->first()]);
    }
}