<?php

namespace App\Models;

class Cart
{
    // Meaning group of items - Not set multiple rows of the same item instead we'r gonna set a quantity of a given item
    public $items = null;

    public $totalQuantity = 0;

    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity ;
            $this->totalPrice= $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item ];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];

        $this->items[$id] = $storedItem;
        $this->totalPrice += $item->price;
        $this->totalQuantity++;
    }

}
