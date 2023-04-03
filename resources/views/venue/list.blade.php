@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-sm-2">
    @include('layouts.leftSidebar')
</div>



    <div class="col-sm-9">
    <div class="mainarea">
    <h3>Venue</h3>
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
    <a href="{{route('addVenue')}}"><button class="btn btn-danger" style="border-radius:20px;">Create Venue</button></a>

    <br><br>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Venue</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{$row['name']}}</td>
                <td>{{$row['cnct']}}</td>
                <td>{{$row['addr']}}</td>
                <td><a href="{{route('updateVenue', $row->id)}}"><span style="color:blue;"><i class="fa fa-edit icn"></i></span></a>&nbsp;&nbsp;
                <a href="{{route('deleteVenue', $row->id)}}" onclick="return confirm('Are You Sure')"><span style="color:red;"><i class="fa fa-trash icn"></i></span></a></td>
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