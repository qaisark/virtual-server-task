<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\location;
use App\Models\operating_system;
use App\Models\tier;

class WelcomeController extends Controller
{
    public function index()
    {
        $locations = location::all();
        $operating_systems =  operating_system::all();
        $tiers = tier::all();
        return view('welcome')->with('locations',$locations)->with('operating_systems',$operating_systems)->with('tiers',$tiers);
    }
}
