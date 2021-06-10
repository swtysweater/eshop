<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Item extends Model implements Searchable
{
    use HasFactory;

    public function getSearchResult(): SearchResult
    {
       return new SearchResult($this, $this->name, $this->image);
    }

}