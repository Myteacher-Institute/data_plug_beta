<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyItemController extends Controller
{
    public function buy_item($item) {

        return view("front.buy-item", [
            'item' => $item
        ]);
    }
}
