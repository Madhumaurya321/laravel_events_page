@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            @include('layouts.leftSidebar')
        </div>



        <div class="col-sm-9">
            <div class="mainarea">
                <h3>Create Events</h3>
                <br><br><br>
                <form method="post" action="{{route('createEvent')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-6">
                        <div class="form-group mb-3">
                            <label class="form-label">Title:</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Image:</label>
                            <div class="container1">
                                <h3>Image</h3>
                                <div class="drag-area1" id="drag-area1">
                                    <div class="icon1">
                                        <i class="fas fa-images"></i>
                                    </div>


                                    <span class="support1">Supports: JPEG, JPG, PNG</span>
                                </div>
                            </div><br>
                            <input type="file" name="image" id="image"
                                class="form-control input1 @error('img') is-invalid @enderror">
                            @error('image')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Genre:</label>
                            <select class="form-control input1 @error('genre') is-invalid @enderror" id="genre"
                                name="genre">
                                <option value="">select Genre</option>
                                @foreach($data['gen'] as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                                @endforeach

                            </select>
                            @error('genre')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Artist:</label>
                            <select class="form-control @error('artist') is-invalid @enderror" id="artist"
                                name="artist">
                                <option value="">select Artist</option>
                                @foreach($data['art'] as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                                @endforeach
                            </select>
                            @error('artist')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Short Description:</label>
                            <textarea rows="3" name="description" id="description"
                                class="form-control @error('desc') is-invalid @enderror"></textarea>
                            @error('description')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Amount:</label>
                            <input type="number" name="amount" id="amount"
                                class="form-control @error('amount') is-invalid @enderror">
                            @error('amount')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Date:</label>
                            <input type="text" id="datepicker" name="eventDate"
                                class="form-control @error('dt') is-invalid @enderror">
                            @error('eventDate')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label class="form-label">Venue:</label>
                            <select class="form-control @error('venue') is-invalid @enderror" id="venue" name="venue">
                                <option value="">select Venue</option>
                                @foreach($data['venue'] as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                                @endforeach
                            </select>
                            @error('venue')
                            <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>


                <br><br>


            </div>

        </div>
    </div>
</div>

<script>
$('#datepicker').datepicker({
    format: 'mm-dd-yyyy',
    startDate: 'today'
});
</script>

@endsection