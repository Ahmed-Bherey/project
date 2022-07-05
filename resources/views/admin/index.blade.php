@extends('admin.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 col-lg-6">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                            <li class="breadcrumb-item active"> Home</li>
                        </ol>

                    </div><!-- /.col -->
                    @include('admin.layouts.alerts.success')
                    @include('admin.layouts.alerts.errors')

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content card pt-3  pb-3 m-2">

            <div class="container-fluid counter_section">
                <h3 class="m-0 mb-3">Numbers</h3>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\Hotel::count()}}">{{\App\Models\Hotel::count()}}</h3>

                                <p>Hotels</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag">{{\App\Models\Hotel::count()}}</i>
                            </div>
                            <a href="{{ route('hotel.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\NewAgent::count()}}">{{\App\Models\NewAgent::count()}}</h3>

                                <p>Travel Agent</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars">{{\App\Models\NewAgent::count()}}</i>
                            </div>
                            <a href="{{ route('newaAent.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-gray">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\NewGuest::count()}}">{{\App\Models\NewGuest::count()}}</h3>
                                <p>Guests</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add">{{\App\Models\NewGuest::count()}}</i>
                            </div>
                            <a href="{{ route('guest.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-success">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\HotelContract::whereYear('created_at', '=', date('Y'))->count()}}">{{\App\Models\HotelContract::whereYear('created_at', '=', date('Y'))->count()}}</h3>
                                <p>Hotel Contracts </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph">{{\App\Models\HotelContract::whereYear('created_at', '=', date('Y'))->count()}}</i>
                            </div>
                            <a href="{{ route('hotel-contract.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-red">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\User::count()}}">{{\App\Models\User::count()}}</h3>
                                <p>Users </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph">{{\App\Models\User::count()}}</i>
                            </div>
                            <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-maroon">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\TotalReservation::whereDate('from',date('Y-m-d'))->count()}}">{{\App\Models\TotalReservation::whereDate('from',date('Y-m-d'))->count()}}</h3>
                                <p>today arrival  </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph">{{\App\Models\TotalReservation::whereDate('from',date('Y-m-d'))->count()}}</i>
                            </div>
                            <a href="{{ route('guest_reservation.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            <div class="container-fluid counter_section">

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\RoomCategory::count()}}">{{\App\Models\RoomCategory::count()}}</h3>

                                <p>Room Category</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag">{{\App\Models\RoomCategory::count()}}</i>
                            </div>
                            <a href="{{ route('roomCategory.create') }}#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\RoomType::count()}}">{{\App\Models\RoomType::count()}}</h3>

                                <p>Room Type</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars">{{\App\Models\RoomType::count()}}</i>
                            </div>
                            <a href="{{ route('roomtype.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\MealPlan::count()}}">{{\App\Models\MealPlan::count()}}</h3>
                                <p>Meal Plan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add">{{\App\Models\MealPlan::count()}}</i>
                            </div>
                            <a href="{{ route('mealplan.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->where('cancel',1)->count()}}">{{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->where('cancel',1)->count()}}</h3>
                                <p>Reservation Cancel</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph">{{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->where('cancel',1)->count()}}</i>
                            </div>
                            <a href="{{ route('guest_reservation.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\TotalReservation::count()}}">{{\App\Models\TotalReservation::count()}}</h3>
                                <p>total Reservation</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph">{{\App\Models\TotalReservation::count()}}</i>
                            </div>
                            <a href="{{ route('guest_reservation.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-info">
                            <div class="inner nums">
                                <h3 class="num" data-goal="{{\App\Models\TotalReservation::whereDate('to',date('Y-m-d',strtotime("-1 days")))->count()}}">{{\App\Models\TotalReservation::whereDate('to',date('Y-m-d',strtotime("-1 days")))->count()}}</h3>
                                <p>today Departure  </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph">{{\App\Models\TotalReservation::whereDate('to',date('Y-m-d',strtotime("-1 days")))->count()}}</i>
                            </div>
                            <a href="{{ route('guest_reservation.create') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    <!-- ./col -->
                </div>
            </div>

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->

                <!-- /.row -->

                <div class="row">



                        <script type="text/javascript">
                            window.onload = function () {
                                var chart = new CanvasJS.Chart("chartContainer",
                                    {
                                        title: {
                                            text: "Reservation Chart in Year {{date('Y')}}"
                                        },
                                        axisX:{
                                            valueFormatString: "MMM" ,
                                            labelAngle: -50
                                        },
                                        axisY: {
                                            valueFormatString: "#,###"
                                        },

                                        data: [
                                            {
                                                type: "area",
                                                color: "rgba(0,75,141,0.7)",
                                                dataPoints: [
                                                    { x: new Date({{date('Y')}}, 0, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('1'))->count()}}},
                                                    { x: new Date({{date('Y')}}, 1, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('2'))->count()}}},
                                                    { x: new Date({{date('Y')}}, 2, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('3'))->count()}}},
                                                    { x: new Date({{date('Y')}}, 3, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('4'))->count()}}},
                                                    { x: new Date({{date('Y')}}, 4, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('5'))->count()}}},
                                                    { x: new Date({{date('Y')}}, 5, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('6'))->count()}}},
                                                    { x: new Date({{date('Y')}}, 6, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('7'))->count()}}} ,
                                                    { x: new Date({{date('Y')}}, 7, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('8'))->count()}}},
                                                    { x: new Date({{date('Y')}}, 8, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('9'))->count()}}},
                                                    { x: new Date({{date('Y')}}, 9, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('10'))->count()}}},
                                                    { x: new Date({{date('Y')}}, 10, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('11'))->count()}}},
                                                    { x: new Date({{date('Y')}},11, 30), y: {{\App\Models\TotalReservation::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('12'))->count()}}},


                                                ]
                                            }

                                        ]
                                    });

                                chart.render();
                            }
                        </script>
                        <script type="text/javascript" src="{{asset('public/canvas.js')}}"></script>

                    <div id="chartContainer" style="height: 300px; width: 100%;">


                </div>

                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
