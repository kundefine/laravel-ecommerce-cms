<?php

namespace App\Http\Controllers;

use App\Page;
use App\Menu;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_pages = Page::orderBy('created_at', 'desc')->get();
        return view('admin.page.index', compact('all_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.page.create');
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
            'title' => 'required',
            'discription' => 'required',
        ]);

        $page_data = request()->all();
        $page_data['slug'] = Page::makeNewSlug(request('title')); 

        Page::create($page_data);
        return back()->with('success', 'Your Page has been successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'discription' => 'required',
        ]);

        $page->title = request('title');
        $page->discription = request('discription');
        $page->save();
        return back()->with('success', 'Page has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if($page->delete())
            return back()->with('success', 'Delete Successfull');
    }



    public function home() {
        $menus = Menu::where('visibility', '=', '1')->get();
        $home = Page::where('slug', '=', 'home')->first()->getAttributes();

        return view('fontend.index', compact('menus', 'home'));
    }

    public function page($slug) {
        $menus = Menu::where('visibility', '=', '1')->get();
        $page = Page::where('slug', '=', $slug)->firstOrFail();
        return view('fontend.page', compact('menus', 'page'));
    }
}
