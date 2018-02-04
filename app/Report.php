<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function item($item_code){
    	return Item::where('item_code', $item_code)->first();
    }
}
