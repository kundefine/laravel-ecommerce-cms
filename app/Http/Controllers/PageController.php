<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use App\Catagories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function homeEdit(Page $page) {
        $all_link = Page::all_link();
        return view('admin.page.homeEdit', compact('page', 'all_link'));
    }

    public function homeUpdate(Request $request, Page $page) {
        $pre_home_data = json_decode($page->discription, true);
        if(!is_array($pre_home_data)) {
            $pre_home_data = [];
        }

        if($request->has('top_banner')) {
            // upload your top banner
            $top_banner = $request->file('top_banner');
            $filename = 'top_banner' . '.' . $top_banner->getClientOriginalExtension();
            $uploadDir = 'home_banner';
            
            $storage = Storage::disk('local')->putFileAs(
                $uploadDir,
                $top_banner,
                $filename
            );

            
            $home_data = [
                "path" => $storage,
                "link" => request('top_banner_url')
            ];
            $pre_home_data['top_banner'] = $home_data;

            $top_banner->move(public_path($uploadDir), $filename);

            $page->discription = json_encode($pre_home_data);
            $page->save();

            dd($page->discription);
        }

        

        


    }


}
