@extends('admin.includes.master')
@section('title')
    Reservation Date
@endsection
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
                {{-- row --}}
                <div class="row ">
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-hands-helping text-light mr-1"></i>Reservation
                                    Date

                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('HotelContractReservations.create.index') }}"
                                  method="get">

                                <div class="card-body">

                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-hotel"></i>
                                                </span>
                                                <select required class="form-control" id="HotelName"
                                                        name="reservationDate_id">
                                                    <option value="">Search...</option>
                                                    @foreach ($reservationDates as $reservationDate)
                                                        <option value="{{ $reservationDate->id }}">{{ $reservationDate->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="HotelName"> Name</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-hotel"></i>
                                                </span>
                                                <select required class="form-control" id="HotelName" name="hotel_id">
                                                    <option value="">Search...</option>
                                                    @foreach ($hotels as $hotel)
                                                        <option value="{{ $hotel->id }}">
                                                            {{ $hotel->name }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="HotelName">Hotel Name</label>
                                            </div>

                                    </div>


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit"
                                            class="btn btn-default bg-info float-right btn btn-success swalDefaultSuccess">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button type="submit"
                                            class="btn btn-default mr-3  bg-danger float-right  btn btn-danger swalDefaultError">
                                        <i class="fa fa-times text-light  " aria-hidden="true"></i>
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- row --}}
            {{-- start card --}}
            <div class="row mt-2">
                <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Hotel Contract </h3>
                        </div>
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
                                                <th class="sorting sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    Reservation Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending">Rooms
                                                    Rate
                                                </th><th class="sorting" tabindex="0" aria-controls="example1"
                                                         rowspan="1" colspan="1"
                                                         aria-label="Browser: activate to sort column ascending">Rooms
                                                    Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    hotel
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    room Type
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Room Category
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Meal Plan
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Operation
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($hotelContractReservations as $key => $hotelContractReservation)
                                                <tr>
                                                    <td>{{ $hotelContractReservation->reservationDates->name }}</td>
                                                    <td>{{ $hotelContractReservation->rate }}</td>
                                                    <td>{{ $hotelContractReservation->name }}</td>
                                                    <td>{{ $hotelContractReservation->hotels->name }}</td>
                                                    <td>{{ $hotelContractReservation->roomTypes->type }}</td>
                                                    <td>{{ $hotelContractReservation->roomCategors->name }}</td>
                                                    <td>{{ $hotelContractReservation->mealPlans->name }}</td>
                                                    <td class="d-flex">
                                                        <button type="submit" class="btn btn-success mr-2 ">
                                                            <a href="{{ route('HotelContractReservations.edit.index',$hotelContractReservation->id ) }}"
                                                               class="text-white"><i class="far fa-edit ml-1"
                                                                                     aria-hidden="true"></i></a>
                                                        </button>


                                                        <button type="buttom" class="btn  btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#modal-danger{{ $key }}">
                                                            <i class="fas fa-trash-alt ml-1"></i>
                                                        </button>

                                                        <div class="modal fade"
                                                             id="modal-danger{{ $key }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content w-50 m-auto p-2">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title text-danger">
                                                                            Delete Reservation Date
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                                    <span aria-hidden="true"><i
                                                                                                class="fa-solid fa-xmark text-dark"></i></span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure to
                                                                            delete {{$hotelContractReservation->name}}
                                                                            &hellip;</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="{{ route('HotelContractReservations.delete', $hotelContractReservation->id ) }}"
                                                                           class="btn  btn-danger"><i
                                                                                    class="fas fa-trash-alt ml-1"></i></a>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    </td>
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

        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title " id="exampleModalLabel"><i
                                        class="fas fa-hands-helping text-light mr-1"></i>Hotel Contract
                            </h5>
                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body " style="font-size:20px;"><i
                                    class="fas fa-exclamation-triangle text-danger"></i>
                            Are you sure to delete?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fas fa-times"></i></button>
                            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
</section>
    </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
    </div>


@endsection
