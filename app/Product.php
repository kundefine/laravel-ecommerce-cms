<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    


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
}
