<?php

namespace App\Items;

use Illuminate\Database\Eloquent\Model;

class SoldItems extends Model
{
    protected $table      = 'sold_item';
    protected $primaryKey = 'id_item';
    protected $dateFormat = 'Y-m-d';
}
