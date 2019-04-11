<?php

namespace App\Http\Controllers;

use App\Catagory;
use Illuminate\Http\Request;
use App\Menu;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_categories = Catagory::orderBy('created_at', 'desc')->get();
        return view('admin.category.index', compact('all_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::orderBy('created_at', 'desc')->get();
        $categories = Catagory::orderBy('created_at', 'desc')->get();
        return view('admin.category.create', compact('menus', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $child_categories_id = [];
        $child_categories_map = null;

        if(count(request('child_categories'))) {
            foreach(request('child_categories') as $id => $value) {
                $child_categories_id[] = $id;
            }
            $child_categories_map = request('child_categories');
        }

        
        Catagory::create([
            'title' => request('category_title'),
            'visibility' => request('visibility'),
            'menu_id' => request('menu_id'),
            'child_catagories_id' => json_encode($child_categories_id),
            'child_catagories_json' => json_encode($child_categories_map),
        ]);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
        $child_catagories = Catagory::get()->where('id', '!=', $catagory->id);
        $allready_child = json_decode($catagory->child_catagories_id);
        return view('admin.category.edit', compact('catagory', 'child_catagories', 'allready_child'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
        //
    }
}
