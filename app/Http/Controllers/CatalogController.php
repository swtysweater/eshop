<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all()->toArray();
        return view('catalog', ['data' => Item::select('items.*', 'factories.name as factoryName', 'countries.name as country')
        ->join('factories', 'items.factoryID', '=', 'factories.id')
        ->join('countries', 'factories.countryID', '=', 'countries.id')
        ->take(9)
        ->get(), 'session' => $request->session()->all(), 'categories' => $categories]);
    }
    public function category($id)
    {
        return view('catalog', ['data' => Item::where('categoryID', $id)
        ->select('items.*', 'factories.name as factoryName', 'countries.name as country')
        ->join('factories', 'items.factoryID', '=', 'factories.id')
        ->join('countries', 'factories.countryID', '=', 'countries.id')
        ->take(9)
        ->get()]);
    }
}
