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
        return Catagory::all();
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        $categories = Catagory::all();
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
            'child_catagories_id' => $child_categories_id,
            'child_catagories_json' => $child_categories_map,

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
        //
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
