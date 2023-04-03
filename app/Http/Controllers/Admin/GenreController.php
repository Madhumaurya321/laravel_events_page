<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createGenre(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:30',
           
        ]);
        $g = new Genre;
        //$a->name = $req->name;
        //$input = $req->all();
        $input = $req->except(['_token']);
        $flag = $g->insert($input);
        if($flag)
        {
        $req->session()->flash('Success','Genre Added Successfully!');
        }
        else
        {
            $req->session()->flash('error','Genre Not Added!');
        }
        return redirect('/listGenre');
        
    }
    public function editGenre(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|max:30',
           
        ]);

        $id = $req->input('id');
        $g = Genre::find($id);
        $input = $req->except(['_token','id']);
        //$a->name = $req->name;
        $flag = $g->update($input);
        if($flag)
        {
        $req->session()->flash('Success','Genre Updated Successfully!');
        }
        else
        {
            $req->session()->flash('error','Genre Not Updated!');
        }
        return redirect('/listGenre');
        
    }

    public function deleteGenre(Request $req, $id = null)
    {
        $g = new Genre;
        $flag = $g->where('id',$id)->delete();
        if($flag)
        {
        $req->session()->flash('Success','Genre Deleted Successfully!');
        }
        else
        {
            $req->session()->flash('error','Genre Not Deleted!');
        }
        return redirect('/listGenre');

    }

    public function updateGenre($id = null)
    {
        $data = Genre::find($id);
        return view('genres/edit',['data'=>$data]);
    }

    public function index()
    {
        $art = Genre::all();
        return view('genres/list',['data'=>$art]);
    }
}
