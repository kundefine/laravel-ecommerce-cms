<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    public function catagories() {
        return $this->hasMany('App\Catagory');
    }
}
