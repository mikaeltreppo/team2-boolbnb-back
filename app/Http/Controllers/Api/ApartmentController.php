<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(){

        $apartments = Apartment::with(['facilities','sponsorships','user','messages'])->paginate(6);
        
        return response()->json([
            'success'=> true,
            'results'=> $apartments,
        ]);
    }
}
