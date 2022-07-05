@extends('admin.includes.master')
@section('title')
    edit Reservation Date
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
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-10">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-hands-helping text-light mr-1"></i>
                                    edit Reservation Date
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('ReservationDates.edit.update', $reservationDate->id) }}" method="post">
@csrf
                                <div class="card-body">

                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Rate">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="NAME" id="Rate"
                                                       name="name" step="0.01" value="{{$reservationDate->name}}"
                                                >
                                                {{-- valid --}}
                                                <label for="Rate">name </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Rate">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </span>
                                                <input type="date" class="form-control start-date" name="from" id="from" value="{{$reservationDate->from}}"required>
                                                {{-- valid --}}
                                                <label for="date from">date from </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Rate">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </span>
                                                <input type="date" class="form-control end-date" name="to" id="to" value="{{$reservationDate->to}}" >


                                                {{-- valid --}}
                                                <label for="date to">date to </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Notes">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                                <textarea class="form-control input" rows="1" for="Notes"
                                                          placeholder="Note ..." name="note">{{$reservationDate->note}}


</textarea>
                                                <label for="Notes">Note ... </label>
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
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
