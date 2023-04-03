<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Venue;
use App\Models\Genre;
use App\Models\Artist;

class Indexhome extends Controller
{
    //
    public function eventListShow()
    {
        $events['ev'] = Event::paginate(10);
        $events['art'] = Artist::all();
        $events['gen'] = Genre::all();
        $events['venue']  = Venue::all();
        return view('index',['events'=>$events]);

    }

    public function filterData(Request $req)
    {
        $gen = $req->input('genre');
        $ven = $req->input('venue');
        $art = $req->input('artist');
       

        $e = new Event();
        $dt = $req->input('dt');
        // echo $dt;  
         $dt1 = explode('-',$dt);
         $date1 = $dt1[0];
         $date2 = $dt1[1];
         $from = date('Y-m-d',strtotime($date1));
         $to = date('Y-m-d',strtotime($date2));
         $events['ev'] = Event::paginate(10);
         $events['art'] = Artist::all();
         $events['gen'] = Genre::all();
         $events['venue']  = Venue::all();
        $events['ev'] = Event::whereBetween('dt',[$from , $to])->orWhere('artist_id',$art)->orWhere('genere_id',$gen)->orWhere('venue_id',$ven)->orderBy('id','desc')->paginate(10);

        return view('index',['events'=>$events]);

    }

}
