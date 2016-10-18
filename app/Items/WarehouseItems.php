<?php

namespace App\Items;

use Illuminate\Database\Eloquent\Model;

class WarehouseItems extends Model
{
    protected $table 		= 'item_in_warehouse';
    protected $primaryKey	= 'id_item';
    protected $dateFormat = 'Y-m-d';

    
}
