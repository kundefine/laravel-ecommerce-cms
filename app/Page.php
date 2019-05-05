<?php

namespace App;

use App\Catagory;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];
    // check slug exits
    public static function checkSlugExits($slug_title) {
        if(static::all()->count() > 0) {
            $slug_found = static::where('slug', $slug_title)->get()->all();
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





    public static function all_category_link() {
        
        $all_category_link = Catagory::all()->map(function($cat){
            return url('/category/' . $cat->id);
        })->toArray();

        return $all_category_link;
    }

    public static function all_page_link() {
        $all_page_link = Page::all()->map(function($page){
            return url('/page/' . $page->slug);
        })->toArray();
        return $all_page_link;
    }

    public static function all_link() {
        return $all_link = array_merge(static::all_category_link(), static::all_page_link());
    }
}
