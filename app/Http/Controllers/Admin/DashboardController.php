<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;

class DashboardController extends Controller
{
    public function index(Request $request){

        // $apartment = Apartment::all()->where('user_id', Auth::user()->id);

        dd($request->userId);
        

        return view('admin.dashboard', compact('apartments', 'messages'));
    }
}
