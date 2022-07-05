@extends('admin.includes.report2')
@section('title')
    Hotel Arival
@endsection
<div class="d-none">
    <div class="space">
        <div>
            <p id="hotelName"></p>
            <p id="hotelAgent"></p>
        </div>
        <p id="hotelDate">from:{{ $from }} to:{{ $to }} <span></span></p>
    </div>
</div>
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">


            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                {{-- start card --}}
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1"
                                                   class="table table-bordered table-striped dataTable dtr-inline"
                                                   aria-describedby="example1_info">
                                                <thead>
                                                <tr>

                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        #
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Guest
                                                    </th>
                                                    @if ($hotel->count() > 0)
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            Hotel
                                                    @endif

                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Arrival
                                                    </th>  <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Nights
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Departure
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Rooms
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">room Type
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"> room Category
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"> Meal
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"> Adult
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"> child
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"> Travel Agent
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"> Note
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"> special Request
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($totals as $key => $total)
                                                    <tr class="odd">
                                                        <td class="number">{{ $key + 1 }}</td>
                                                        <td>{{ $total->guests->name }} </td>
                                                        @if ($hotel->count() > 0)
                                                            <td>{{ $total->hotels->name }} </td>
                                                        @endif
                                                        <td>{{ $total->from }}</td>
                                                        <td>{{ $total->nights_no }}</td>

                                                        <td>{{ \Carbon\Carbon::parse($total->to)->addDays(1)->format('Y-m-d') }}
                                                        </td>
                                                        <td class="rooms">{{ $total->rooms }}</td>
                                                        <td>{{ $total->roomTypes->type }}</td>
                                                        <td>{{ $total->roomCategors->name }}</td>
                                                        <td>{{ $total->meals->name }}</td>
                                                        <td class="adult">{{ $total->adult * $total->rooms }}</td>
                                                        <td>{{ $total->child }}</td>
                                                        <td>{{ $total->travelAgents->name }}</td>
                                                        <td>{{ $total->note }}</td>
                                                        <td>{{ $total->specialRequest }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr >
                                                    <td>total</td>
                                                    <td >{{$totals->count()}} </td>
                                                    <td></td>
                                                    @if ($hotel->count() > 0)
                                                        <td></td>
                                                    @endif
                                                    <td>{{$totals->sum('nights_no')}}</td>
                                                    <td></td>
                                                    <td>{{$totals->sum('rooms')}}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{$totals->sum(function ($row){
                                                       return   $row->rooms* $row->adult ;})}}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end card --}}
            <!-- Modal delete-->


                {{-- validation --}}


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        let number = document.querySelectorAll('.number'),
            total = document.querySelector('.total'),
            rooms = document.querySelectorAll('.rooms'),
            roomsTotal = document.querySelector('.rooms-total'),
            adult = document.querySelectorAll('.adult'),
            adultTotal = document.querySelector('.adult-total');

        total.textContent = number[number.length - 1].textContent
        for (let i = 0; i <= number.length; i++) {
            roomsTotal.textContent = roomsTotal.textContent * 1 + rooms[i].textContent * 1
            adultTotal.textContent = adultTotal.textContent * 1 + adult[i].textContent * 1
        }
    </script>
@endsection
