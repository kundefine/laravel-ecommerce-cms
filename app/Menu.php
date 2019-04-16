<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];

    public function catagory() {
        return $this->belongsTo('App\Catagory', "cat_id", "id");
    }

    
}
