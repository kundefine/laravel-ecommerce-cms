<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Banner;
use App\Page;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    
    public function bottomBannerIndex() {
        $bottomHomeBanner = Banner::where('banner_type', '=', 'bottom_home_banner')->get();
        $all_link = Page::all_link();
        return view('admin.banner.bottom-banner', compact('bottomHomeBanner', 'all_link'));
    }

    public function bottomBannerIndex2() {
        $bottomHomeBanner = Banner::where('banner_type', '=', 'bottom_home_banner2')->get();
        $all_link = Page::all_link();
        return view('admin.banner.bottom-banner2', compact('bottomHomeBanner', 'all_link'));
    }

    

    public function addBottomBannerCreate(Request $request) {
        // validate data

        $request->validate([
            'banner_img' => 'required|mimes:jpeg,bmp,png',
            'banner_url' => 'required',
        ]);
        $data = file_get_contents($request->file('banner_img'));
        $type = $request->file('banner_img')->getClientOriginalExtension();
        
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        Banner::create([
            'banner_img' => $base64,
            'banner_url' => request('banner_url'),
            'banner_type' => request('banner_type')
        ]);

        return back()->with('success', 'Home Bottom Banner has been added');
 
    }

    public function deleteBottomBannerDestroy(Banner $homeBottomBannerId) {
        if($homeBottomBannerId->delete())
            return back()->with('success', 'Delete Successfull');

    }
}
