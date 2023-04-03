<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createArtist(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:30',
           
        ]);
        $a = new Artist;
        //$a->name = $req->name;
        //$input = $req->all();
        $input = $req->except(['_token']);
        $flag = $a->insert($input);
        if($flag)
        {
        $req->session()->flash('Success','Artist Added Successfully!');
        }
        else
        {
            $req->session()->flash('error','Artist Not Added!');
        }
        return redirect('/listArtist');
        
    }
    public function editArtist(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:30',
           
        ]);

        $id = $req->input('id');
        $a = Artist::find($id);
        $input = $req->except(['_token','id']);
        //$a->name = $req->name;
        $flag = $a->update($input);
        if($flag)
        {
        $req->session()->flash('Success','Artist Updated Successfully!');
        }
        else
        {
            $req->session()->flash('error','Artist Not Updated!');
        }
        return redirect('/listArtist');
        
    }

    public function deleteArtist(Request $req, $id = null)
    {
        $a = new Artist;
        $flag = $a->where('id',$id)->delete();
        if($flag)
        {
        $req->session()->flash('Success','Artist Deleted Successfully!');
        }
        else
        {
            $req->session()->flash('error','Artist Not Deleted!');
        }
        return redirect('/listArtist');

    }

    public function updateArtist($id = null)
    {
        $data = Artist::find($id);
        return view('artist/edit',['data'=>$data]);
    }

    public function index()
    {
        $art = Artist::all();
        return view('artist/list',['data'=>$art]);
    }
}
