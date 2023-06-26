<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    public function index()
    {

        $facilities = Facility::All();

        return response()->json([
            'success' => true,
            'results' => $facilities,
        ]);
    }
}