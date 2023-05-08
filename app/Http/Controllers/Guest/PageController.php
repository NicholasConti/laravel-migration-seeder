<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PageController extends Controller
{
    public function index()
    {

        $trains = Train::all();

        // controllo con data odierna
        $today_trains = Train::whereDate('departure_time', Carbon::today())->get();

        return view('home', compact('trains', 'today_trains'));
    }
}
