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
                                action="{{ route('HotelContractReservations.edit.update', $hotelContractReservation->id) }}"
                                method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="col-sm-6 mb-2 mt-2">
                                                <div class="form-floating input-group">
                                                    <span class="input-group-text" id="Rate">
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                    </span>
                                                    <input type="text" class="form-control end-date"
                                                        name="reservationDate_id" id="to" required
                                                        value="{{ $hotelContractReservation->reservationDates->name }}"
                                                        readonly>

                                                    {{-- valid --}}
                                                    <label for="date to">reservation Date</label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-12 mt-4">
                                        <table class="table ted">
                                            <thead>
                                                <tr>

                                                    <th scope="col">hotel</th>
                                                    <th scope="col">room Type</th>
                                                    <th scope="col">name</th>
                                                    <th scope="col">room Category</th>
                                                    <th scope="col">meal Plan</th>
                                                    <th scope="col"> rate</th>


                                                </tr>
                                            </thead>
                                            <tbody>


                                                <tr>

                                                    <td><input type="text" class="form-control" id="hotel_id"
                                                            value="{{ $hotelContractReservation->hotels->name }}" readonly
                                                            name="hotel_id"></td>
                                                    <td><input type="text" class="form-control" name="room_type_id"
                                                            value="{{ $hotelContractReservation->roomTypes->type }}"
                                                            readonly></td>
                                                    <td><input type="text" class="form-control Rate"
                                                            value="{{ $hotelContractReservation->name }}" name="name"
                                                            readonly>
                                                    </td>
                                                    <td><input readonly type="text" class="form-control   Selling-rate"
                                                            STEP="1" name="roomCategory_id"
                                                            value="{{ $hotelContractReservation->roomCategors->name }}">
                                                    </td>
                                                    <td><input readonly type="text" class="form-control   Selling-rate"
                                                            STEP="1" name="mealPlan_id"
                                                            value="{{ $hotelContractReservation->mealPlans->name }}"></td>

                                                    <td><input type="number" class="form-control   Selling-rate" STEP="1"
                                                            name="reservationRate"
                                                            value="{{ $hotelContractReservation->rate }}"></td>


                                                </tr>


                                            </tbody>
                                        </table>

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
