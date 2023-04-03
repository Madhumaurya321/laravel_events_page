<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venue;

class VenueController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createVenue(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:30',
            'cnct' =>'required|numeric|digits:10',
            'addr' => 'required|max:200'
           
        ]);
        $v = new Venue;
        //$a->name = $req->name;
        //$input = $req->all();
        $input = $req->except(['_token']);
        $flag = $v->insert($input);
        if($flag)
        {
        $req->session()->flash('Success','Venue Added Successfully!');
        }
        else
        {
            $req->session()->flash('error','Venue Not Added!');
        }
        return redirect('/listVenue');
        
    }
    public function editVenue(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:30',
            'cnct' =>'required|numeric|digits:10',
            'addr' => 'required|max:200'
           
        ]);

        $id = $req->input('id');
        $v = Venue::find($id);
        $input = $req->except(['_token','id']);
        //$a->name = $req->name;
        $flag = $v->update($input);
        if($flag)
        {
        $req->session()->flash('Success','Venue Updated Successfully!');
        }
        else
        {
            $req->session()->flash('error','Venue Not Updated!');
        }
        return redirect('/listVenue');
        
    }

    public function deleteVenue(Request $req, $id = null)
    {
        $v = new Venue;
        $flag = $v->where('id',$id)->delete();
        if($flag)
        {
        $req->session()->flash('Success','Venue Deleted Successfully!');
        }
        else
        {
            $req->session()->flash('error','Venue Not Deleted!');
        }
        return redirect('/listVenue');

    }

    public function updateVenue($id = null)
    {
        $data = Venue::find($id);
        return view('venue/edit',['data'=>$data]);
    }

    public function index()
    {
        $ven = Venue::all();
        return view('venue/list',['data'=>$ven]);
    }
}
