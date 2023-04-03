@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-sm-2">
    @include('layouts.leftSidebar')
</div>



    <div class="col-sm-9">
    <div class="mainarea">
    <h3>Create Artist</h3>
    <br><br><br>
    <div class="col-sm-6">
        <form method="post" action="{{ route('createArtist') }}">
            @csrf
        <div class="form-group mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" id="name" value = "{{old('name')}}" class="form-control @error('title') is-invalid @enderror">
            @error('name')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"  class="btn btn-success">Submit</button>
    </div>
</form>   

    <br><br>
   

    </div>

    </div>
</div>
</div>

@endsection