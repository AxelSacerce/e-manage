<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Items\SoldItems;
use DB;

class SoldItemsController extends Controller
{
    public function getAllItem() {
      $data['sold_i']   = SoldItems::orderBy('added_at', 'decs')->get();

      return view ('front.json.sold_item', $data);
    }
}
