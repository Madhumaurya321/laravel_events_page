@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-sm-2">
    @include('layouts.leftSidebar')
</div>



    <div class="col-sm-9">
    <div class="mainarea">
    <h3>Update Artist</h3>
    <br><br><br>
    <form method="post" action="{{route('editArtist')}}">
        @csrf
    <div class="col-sm-6">
        <input type="hidden" name="id" id="id" value="{{$data['id']}}">
        <div class="form-group mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control @error('title') is-invalid @enderror" value="{{$data['name']}}">
            @error('name')
            <p style="color:red">{{ $message }}</p>
            @enderror    
        </div>
        <button type="submit"  class="btn btn-success">Update</button>
    </div>
</form>
        

    <br><br>
   

    </div>

    </div>
</div>
</div>

@endsection