<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\Artist;
use App\Models\Event;
use App\Models\Genre;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count['artist'] = Artist::all()->count();
        $count['genre'] = Genre::all()->count();
        $count['event'] = Event::all()->count();
        $count['venue'] = Venue::all()->count();
        return view('panel',['data'=>$count]);
        
    }

   
    
}
