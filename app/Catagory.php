<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $guarded = ['id'];


    public function menu() {
        return $this->belongsTo('App\Menu');
    }
}
