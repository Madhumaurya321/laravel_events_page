<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script1.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    </style>

</head>

<body>
    <div class=" home">

    </div>
    <br><br>
    <div class="container">
        <h1>Events</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
            Aldus PageMaker including versions of Lorem Ipsum.</p>

        <br><br>
        <div class="row">
            <div class="col-sm-8 mb-5">
                <h2>Show Details</h2>
            </div>
            <div class="col-sm-4">
                <h4>Search Event By</h4>
                <hr>
            </div>
        </div>

        @php
        $i=0;
        @endphp
        @foreach($events['ev'] as $event)
        @php
        $i++;
        $artist = App\Models\Artist::find($event['artist_id']);
        $artist_name = $artist['name'];
        $genre = App\Models\Genre::find($event['genere_id']);
        $genre_name = $genre['name'];
        $venue = App\Models\Venue::find($event['venue_id']);
        $venue_name = $venue['name'];
        $venue_addr = $venue['addr'];
        @endphp

        <div class="row">
            <div class="col-sm-8 mb-5">
                <div class="row" style="height:300px;">
                    <div class="col-sm-6">
                        <div
                            style="border-top-left-radius:25px;height:300px;background-image:url('{{url('/')}}/public/uploads/eventImage/event1.jpg');background-size:cover;">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h2>{{$event['title']}}</h2>
                        <br>
                        <h4 style="display:inline;">Artist:&nbsp;&nbsp;</h4><span
                            style="display:inline;">{{$artist_name}}</span>
                        <br>
                        <h4 style="display:inline;">Genre:&nbsp;&nbsp;</h4><span
                            style="display:inline;">{{$genre_name}}</span>
                        <br>
                        <h4 style="display:inline;">Venue:</h4><span
                            style="display:inline;">{{$genre_name}}</span><br><br>
                        <p>{{$venue_addr}}</p>
                        <h6>Date:03/04/2023</h6>
                    </div>
                </div>
            </div>
            @if($i==1)
            <div class="col-sm-4" style="">

                <form action="{{route('eventList')}}" method="post">
                @csrf

                    <div class="mb-3">
                        <label class="form-label">Predefined Date Ranges</label>
                        <input id="reportrange" name="dt" class="form-control" data-toggle="date-picker-range"
                            data-target-display="#selectedValue" data-cancel-class="btn-light">
                        <!--  <i class="mdi mdi-calendar"></i>&nbsp; -->
                        <!--   <span id="selectedValue"></span> <i class="mdi mdi-menu-down"></i> -->
                        <!-- </div> -->
                    </div>




                    <div class="input-group mb-3">
                        <select class="form-control" id="artist" name="artist">
                            <option value="">select Artist</option>
                            @foreach($events['art'] as $row)
                            <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        </select>&nbsp;
                        <div class="input-group-append" id="button-addon4">
                            
                            <button class="btn btn-primary" name="artClear" id="artClear" type="button">Clear</button>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <select class="form-control input1 " id="genre" name="genre">
                            <option value="">select Genre</option>
                            @foreach($events['gen'] as $row)
                            <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach

                        </select>&nbsp;
                        <div class="input-group-append" id="button-addon4">
                           
                            <button class="btn btn-primary" name="genClear" id="genClear" type="button">Clear</button>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <select class="form-control " id="venue" name="venue">
                            <option value="">select Venue</option>
                            @foreach($events['venue'] as $row)
                            <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        </select>&nbsp;
                        <div class="input-group-append" id="button-addon4">
                           
                            <button class="btn btn-primary" name="venClear" id="venClear" type="button">Clear</button>
                        </div>
                    </div>

                    <div>
                        <button type="button" id="resetBtn" name="resetBtn" class="btn btn-danger">Reset
                            Filters</button>
                            <button type="submit"  class="btn btn-success">Search
                            </button>
                            <a href="{{url('/')}}"><button type="button"  class="btn btn-info">All Events
                            </button></a>
                    </div>

            </form>
            </div>

            @else
            <div class="col-sm-4">

            </div>
            @endif



        </div>
        @endforeach






        @if($events['ev']->hasPages())
        <div style="display:flex;justify-content: center;">
            <div class="pagination-wrapper">
                {{ $events['ev']->links() }}

            </div>
        </div>
        @endif


    </div>


    <script>
    $(function() {

        var start = moment().subtract(1, 'month').startOf('month');
        var end = moment().subtract(1, 'month').endOf('month');
        // var start = "d/m/Y";
        // var end = "d/m/Y";    
        var dt;
        // function cb(start, end)
        // {
        //   console.log(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //   $('#selectedValue').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //   //dt = $('#reportrange').val();


        // }

        $('#reportrange').daterangepicker({
            alwaysShowCalendars: false,
            showCustomRangeLabel: true,
            startDate: start,
            endDate: end,

            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]

            }
        });



        




        $('#artClear').on('click', function() {
            $('#artist').val('');
           
        });
        $('#genClear').on('click', function() {
           $('#genre').val('');
        });
        $('#venClear').on('click', function() {
            $('#venue').val('');
           
        });

        $('#resetBtn').on('click', function() {
            $('#artist').val('');
            $('#genre').val('');
            $('#venue').val('');

            $('#reportrange').daterangepicker({
                alwaysShowCalendars: false,
                showCustomRangeLabel: true,
                startDate: start,
                endDate: end,

                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment()
                        .subtract(1,
                            'month').endOf('month')
                    ]

                }
            });



        });



    });
    </script>
</body>

</html>