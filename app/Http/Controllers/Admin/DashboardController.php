<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($userId){

        $user = auth()->user();
        
        $apartment_count = Apartment::where('user_id', $userId)->count();
        $apartments = $user->apartments()->pluck('id');
        $messages_count = Message::whereIn('apartment_id', $apartments)->count();
            
        return view('admin.dashboard', compact('apartment_count', 'messages_count'));
    }
}
