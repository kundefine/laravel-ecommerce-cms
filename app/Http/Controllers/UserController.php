<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

class UserController extends Controller
{
    public function frontendIndex() {
        return view('fontend.user.index');
    }

    public function saveUserShippingAddress(Request $request, Address $address) {
        $request->validate([
            'phone' => 'required|integer|max:191',
            'location' => 'required|max:191',
            'division' => 'required|max:191',
            'city' => 'required|max:191',
            'area' => 'required|max:191',
            'address' => 'required'
        ]);
        $address::create($request->all());

        dd($request->all());
    }
}
