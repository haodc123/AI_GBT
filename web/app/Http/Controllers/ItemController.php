<?php

namespace App\Http\Controllers;

use App\Items;

class ItemController extends Controller
{

    private $items;
    public function api_get_items($m, $l, $d, $s, $last) {
        $items = new Items();
        return response()->json(
            $items->getItemsByType($m, $l, $d, $s, $last)
        );
    }

}
