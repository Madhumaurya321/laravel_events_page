@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-sm-2">
   @include('layouts.leftSidebar')
</div>



    <div class="col-sm-9">
    <div class="mainarea">
    <div class="row">
    <div class="col-sm-3 b1">
        <a href="{{route('listArtist')}}">
        <div class="box1">
        <h2>Artist</h2>
        <h3>{{$data['artist']}}</h3>
        </div>
        </a>
    </div>

    <div class="col-sm-3 b2">
        <a href="{{route('listGenre')}}">
        <div class="box2">
        <h2>Genre</h2>
        <h3>{{$data['genre']}}</h3>
        </div>
        </a>
    </div>

    <div class="col-sm-3 b3">
        <a href="{{route('listVenue')}}">
        <div class="box3">
        <h2>Venue</h2>
        <h3>{{$data['venue']}}</h3>
        </div>
        </a>
    </div>

    <div class="col-sm-3 b4">
    <a href="{{route('listEvent')}}">
        <div class="box4">
        <h2>Event</h2>
        <h3>{{$data['event']}}</h3>
        </div>
</a>
    </div>
    </div>
    </div>

    </div>
</div>
</div>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
@endsection