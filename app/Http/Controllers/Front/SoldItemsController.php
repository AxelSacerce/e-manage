<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Items\SoldItems;
use DB;
use Carbon\Carbon;

class SoldItemsController extends Controller
{
    public function getAllItem() {
      $data['sold_i']   = SoldItems::select('added_at', DB::raw('SUM(item_quantity) as item_quantity'))
      					->orderBy('added_at', 'decs')
      					->groupBy('added_at')
      					->get();

      return view ('front.json.sold_item', $data);
    }
}
