<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Venue;
use App\Models\Genre;
use App\Models\Event;

class EventController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addEvent()
    {
        $data['art'] = Artist::all();
        $data['gen'] = Genre::all();
        $data['venue']  = Venue::all();
        return view('events\create',['data'=>$data]);
    }

    public function createEvent(Request $req)
    {
        $validated = $req->validate([
            'title' => 'required|max:50',
            
            'artist' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'eventDate' => 'required',
            'amount' => 'required|numeric',
            'venue' => 'required',
           
        ]); 

        $e = new Event();
        $e->title = $req->input('title');
        $e->genere_id = $req->input('genre');
        $e->artist_id = $req->input('artist');
        $e->desc = $req->input('description');
        $e->amt = $req->input('amount');
        $dt =  $req->input('eventDate');
        $e->dt = date('Y-m-d',strtotime($dt));
        $e->venue_id = $req->input('venue');

        if($req->hasFile('image')) {
            //echo "image";
            //exit();
            $imageFile = $req->file('image');
            $img=$imageFile->getClientOriginalName();
            $image = time(). rand() .'.'.$imageFile->getClientOriginalExtension();
            $imageFile->move('public/uploads/eventImage', $img);
            $e->img =  $img;
             
        }

        $flag = $e->save();
        if($flag)
        {
        $req->session()->flash('Success','Event Added Successfully!');
        }
        else
        {
            $req->session()->flash('error','Event Not Added!');
        }
        return redirect('/listEvent');

        
    }

    public function updateEvent($id = null)
    {
        $data['ev'] = Event::find($id);
        $data['art'] = Artist::all();
        $data['gen'] = Genre::all();
        $data['venue']  = Venue::all();
        return view('events\edit',['data'=>$data]);
    }

    public function index()
    {
        $event = Event::all();
        return view('events\list',['data' => $event]); 
    }

    public function editEvent(Request $req)
    {
        $validated = $req->validate([
            'title' => 'required|max:50',
            'image' => 'required',
            'artist' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'eventDate' => 'required',
            'amount' => 'required|numeric',
            'venue' => 'required',
           
        ]); 
        $id = $req->input('id');
        //$e = new Event();
        $ev = Event::find($id);
        $ev->title = $req->input('title');
        $ev->genere_id = $req->input('genre');
        $ev->artist_id = $req->input('artist');
        $ev->desc = $req->input('description');
        $ev->amt = $req->input('amount');
        $dt =  $req->input('eventDate');
        $ev->dt = date('Y-m-d',strtotime($dt));
        $ev->venue_id = $req->input('venue');

        if($req->hasFile('image')) {
            //echo "image";
            //exit();
            $imageFile = $req->file('image');
            $img=$imageFile->getClientOriginalName();
            $image = time(). rand() .'.'.$imageFile->getClientOriginalExtension();
            $imageFile->move('public/uploads/eventImage', $img);
            $ev->img =  $img;
             
        }

        $flag = $ev->save();
        if($flag)
        {
        $req->session()->flash('Success','Event Updated Successfully!');
        }
        else
        {
            $req->session()->flash('error','Event Not Update!');
        }
        return redirect('/listEvent');

     }

     public function deleteEvent(Request $req, $id = null)
     {
         $e = new Event;
         $flag = $e->where('id',$id)->delete();
         if($flag)
         {
         $req->session()->flash('Success','Event Deleted Successfully!');
         }
         else
         {
             $req->session()->flash('error','Event Not Deleted!');
         }
         return redirect('/listEvent');
 
     }

}
