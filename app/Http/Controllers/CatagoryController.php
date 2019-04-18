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
        // $menus = Menu::orderBy('created_at', 'desc')->get();
        $categories = Catagory::orderBy('created_at', 'desc')->get();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $child_categories_id = null;
        $child_categories_map = null;
        if(request('child_categories')) {
            foreach(request('child_categories') as $id => $value) {
                $child_categories_id[] = $id;
            }
            $child_categories_map = request('child_categories');
        }

        
        Catagory::create([
            'title' => request('category_title'),
            'visibility' => request('visibility'),
            // 'menu_id' => request('menu_id'),
            'child_catagories_id' => json_encode($child_categories_id),
            'child_catagories_json' => json_encode($child_categories_map),
        ]);
        
        return back()->with('success', 'Category has been create successfully.');
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
        // $menus = Menu::all();
        $allready_child = json_decode($catagory->child_catagories_id);
        if($allready_child == null) $allready_child = [];
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
        $child_categories_id = null;
        $child_categories_map = null;
        if(request('child_categories')) {
            foreach(request('child_categories') as $id => $value) {
                $child_categories_id[] = $id;
            }
            $child_categories_map = request('child_categories');
        }
        
        $catagory->title = request('category_title');
        $catagory->visibility = request('visibility');
        // $catagory->menu_id = request('menu_id');
        $catagory->child_catagories_id = json_encode($child_categories_id);
        $catagory->child_catagories_json = json_encode($child_categories_map);
        $catagory->save();
        return back()->with('success', 'Category has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
        $catagory->delete();
        return back()->with('success', 'Delete Successfull');
    }

}
