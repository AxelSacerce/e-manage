<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Items\WarehouseItems;

class WarehouseItemsController extends Controller
{
    protected $session = 'warehouse_items';

    public function in_warehouse()
    {
        $data['items'] = WarehouseItems::get();

        return view('front.items.in_warehouse.in_warehouse', $data);
    }

    public function in_warehouse_add()
    {
        return view('front.items.in_warehouse.add');
    }
}
