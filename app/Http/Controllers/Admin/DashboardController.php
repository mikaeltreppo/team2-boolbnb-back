<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($userId)
    {
        $user = auth()->user();

        $apartment_count = Apartment::where('user_id', $userId)->count();
        $apartments = $user->apartments()->pluck('id');
        $messages_count = Message::whereIn('apartment_id', $apartments)->count();

        // Ottenere il conteggio delle views per ogni mese sugli appartamenti dell'utente
        $currentMonth = Carbon::now()->month;
        $views_count = [];
        $total_views = 0; // Somma globale delle views

        for ($i = 1; $i <= 12; $i++) {
            $monthViews = View::whereIn('apartment_id', $apartments)
                ->whereMonth('date', $i)
                ->count();

            $views_count[] = $monthViews;
            $total_views += $monthViews; // Aggiungi il conteggio del mese alla somma globale
        }

        $data = $views_count;

        return view('admin.dashboard', compact('apartment_count', 'messages_count', 'data', 'total_views'));
    }
}