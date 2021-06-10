<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Models\Item;

class SearchController extends Controller
{
    //

    public function index(Request $request){


        $results = (new Search())
        ->registerModel(Item::class, ['name', 'image'])
        ->search($request->input('query'));

        return response()->json($results);
            
    }

}
