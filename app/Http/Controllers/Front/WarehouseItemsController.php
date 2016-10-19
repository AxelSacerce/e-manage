<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Items\WarehouseItems;
use Illuminate\Support\Facades\DB;


class WarehouseItemsController extends Controller
{
    protected $session = 'warehouse_items';

    public function in_warehouse()
    {
        $data['items'] = WarehouseItems::join('users','item_in_warehouse.by_staff','=','users.username')
                        ->paginate(10);

        return view('front.items.in_warehouse.in_warehouse', $data);
    }

    public function in_warehouse_add()
    {
        return view('front.items.in_warehouse.add');
    }
}
