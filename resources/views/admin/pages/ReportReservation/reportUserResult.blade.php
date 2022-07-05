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
                                                        </th> <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            User
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            Guest
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            Hotel


                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Arrival
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
                                                    @foreach ($totalReservations as $key => $total)
                                                        <tr class="odd">
                                                            <td>{{ $key+1 }} </td>
                                                            <td>{{ $total->users->name }} </td>
                                                            <td>{{ $total->guests->name }} </td>
                                                            <td>{{ $total->hotels->name }} </td>

                                                            <td>{{ $total->from }}</td>
                                                            <td>{{ $total->to }}</td>
                                                            <td>{{ $total->rooms }}</td>
                                                            <td>{{ $total->roomTypes->type }}</td>
                                                            <td>{{ $total->roomCategors->name }}</td>
                                                            <td>{{ $total->meals->name }}</td>
                                                            <td>{{ $total->adult*$total->rooms }}</td>
                                                            <td>{{ $total->child }}</td>
                                                            <td>{{ $total->travelAgents->name }}</td>
                                                            <td>{{ $total->note }}</td>
                                                            <td>{{ $total->specialRequest }}</td>

                                                        </tr>
                                                    @endforeach

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
@endsection
