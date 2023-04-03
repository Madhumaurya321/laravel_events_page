@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-sm-2">
    @include('layouts.leftSidebar')
</div>



    <div class="col-sm-9">
    <div class="mainarea">
    <h3>Create Venue</h3>
    <br><br><br>
    <form method="post" action="{{route('createVenue')}}">
        @csrf
    <div class="col-sm-6">
    <div class="form-group mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" id="name" value = "{{old('name')}}" class="form-control @error('name') is-invalid @enderror"
            placeholder = "Enter Name">
            @error('name')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
         <div class="form-group mb-3">
            <label class="form-label">Mobile:</label>
            <input type="text" name="cnct" id="cnct" value="{{old('cnct')}}" class="form-control @error('cnct') is-invalid @enderror"
            placeholder = "Enter 10 Digit Mobile Number">
            @error('cnct')
            <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label class="form-label">Address:</label>
            <textarea rows="3" name="addr" id="addr" class="form-control @error('addr') is-invalid @enderror"></textarea>
            @error('addr')
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