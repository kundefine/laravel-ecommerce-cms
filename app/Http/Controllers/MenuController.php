<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Menu;
use App\Page;
use App\Catagory;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_menus = Menu::orderBy('created_at', 'desc')->get();
        return view('admin.menu.index', compact('all_menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Catagory::where('visibility', '=', '1')->get();
        $pages = Page::where('visibility', '=', '1')->get();
        return view('admin.menu.create', compact('categories','pages'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'feature_image' => 'mimes:jpeg,bmp,png',
            'menu_title' => 'required|min:3',
            'menu_link' => 'required',
            'menu_type' => 'required',
            'visibility' => 'required'
        ]);
        $path = null;
        if ($request->hasFile('feature_image')) {
            //
            $file = request()->file('feature_image');
            $path = $request->file('feature_image')->storeAs('menu_feature_image', request('menu_type') . '-' . time() . '.' . $file->getClientOriginalExtension());
            $renameFileName = str_replace("menu_feature_image/", "", $path);
            $file->move(base_path('\public\menu_feature_image'), $renameFileName);
        }

        $menu = new Menu();


        $menu->title = request('menu_title');
        $menu->feature_image = $path;
        $menu->link = 'http://' . request('menu_link');
        $menu->visibility = request('visibility');
        $menu->menu_type = request('menu_type');
        if(request('menu_type') === 'category_link') $menu->cat_id = request('cat_id');
        if(request('menu_type') === 'page_link') $menu->page_id = request('page_id');

        $menu->save();

        return back()->with('success', 'Menu has been Created successfully.');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Catagory::where('visibility', '=', '1')->get();
        

        return view('admin.menu.edit', compact('categories', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->delete())
            return back()->with('success', 'Delete Successfull');
    }
}
