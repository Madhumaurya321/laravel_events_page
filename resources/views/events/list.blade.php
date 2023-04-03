@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-sm-2">
    @include('layouts.leftSidebar')
</div>



    <div class="col-sm-9">
    <div class="mainarea">
    <h3>Event</h3>
    <br><br>
    @if(session('Success'))
    <div class="alert alert-success">
    {{session('Success')}}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
    {{session('error')}}
    </div>
    @endif
    <br>
    <a href="{{route('addEvent')}}"><button class="btn btn-danger" style="border-radius:20px;">Create Event</button></a>

    <br><br>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Artist</th>
                <th>Genre</th>
                <th>Short Description</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row) 
            @php
            $artist = App\Models\Artist::find($row['artist_id']);
            $artist_name = $artist['name'];
            $genre = App\Models\Genre::find($row['genere_id']);
            $genre_name = $genre['name'];
            $venue = App\Models\Venue::find($row['venue_id']);
            $venue_name = $venue['name'];
            @endphp
            <tr>
                <td>{{$row['id']}}</td>
                <td><img src="{{url('/')}}/public/uploads/eventImage/{{$row['img']}}" style="height:100px;width:100px;"></td>
                <td>{{$artist_name}}</td>
                <td>{{$genre_name}}</td>
                <td>{{$row['desc']}}</td>
                <td>{{$row['amt']}}</td>
                <td>{{$row['dt']}}</td>
                <td>{{$venue_name}}</td>
                <td><a href="{{route('updateEvent', $row->id)}}"><span style="color:blue;"><i class="fa fa-edit icn"></i></span></a>&nbsp;&nbsp;
                <a href="{{route('deleteEvent', $row->id)}}" onclick="return confirm('Are You Sure')"><span style="color:red;"><i class="fa fa-trash icn"></i></span></a></td>
            </tr>
            @endforeach
        </tbody>
</table>

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