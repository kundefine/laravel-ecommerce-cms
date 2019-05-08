<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongsTo('App\Catagory', 'cat_id', 'id');
    }


    // check slug exits
    public static function checkSlugExits($slug_title) {
        if(static::all()->count() > 0) {
            $slug_found = static::where('product_slug', $slug_title)->get()->all();
            if( !empty($slug_found) ) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function makeNewSlug($prev_slug) {
        $prev_slug = strtolower(str_replace(' ', '-', trim($prev_slug)));
        static $inc = 1;
        if(static::checkSlugExits($prev_slug)) {
            $newslug = $prev_slug . '-' . $inc++;
            return static::makeNewSlug($newslug);
        } else {
            return $prev_slug;
        }
        
    }

    public function filterProduct() {
        return $this;
    }
}
