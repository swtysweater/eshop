<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];  
    
    public $items = null;
    public $totalQ = 0;
    public $totalPrice = 0;

    public function __construct($old)
    {
        if ($old)
        {
            $this->items = $old->items;
            $this->totalQ = $old->totalQ;
            $this->totalPrice = $old->totalPrice;
        }
    }
    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items)
        {
            if (array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQ++;
        $this->totalPrice += $item->price;
    }
    public function remove($item, $id)
    {
        if ($this->items)
        {
            if (array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        if ($storedItem['qty'] == '1')
        {
            unset($this->items[$id]);
            $this->totalQ--;
            $this->totalPrice -= $item->price;
        } 
        else 
        {
            $storedItem['qty']--;
            $storedItem['price'] = $item->price * $storedItem['qty'];
            $this->items[$id] = $storedItem;
            $this->totalQ--;
            $this->totalPrice -= $item->price;
        }
    }
    public function removeAll($item, $id)
    {
        if ($this->items)
        {
            if (array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        $this->totalQ -= $storedItem['qty'];
        $this->totalPrice -= $item->price * $storedItem['qty'];
        unset($this->items[$id]);
    }
}
