<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Items\SoldItems;
use DB;

class SoldItemsController extends Controller
{
    protected $section = 'sold_item';

    public function getAllItem()
    {
        $data['sold_i'] = SoldItems::select('added_at', DB::raw('SUM(item_quantity) as item_quantity'))
                          ->orderBy('added_at', 'decs')
                          ->groupBy('added_at')
                          ->get();

        return view('front.json.sold_item', $data);
    }
}
