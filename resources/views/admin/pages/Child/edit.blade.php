@extends('admin.includes.master')
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
                <div class="row ">
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-10">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-child " aria-hidden="true"></i> Child </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('guest-reservation-child.update', $children->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="ps-3 pe-3">
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Guest Reservation"><i
                                                        class="fas fa-user" for="Name"></i></span>
                                                <select required class="form-control" id="Guest Reservation"
                                                    name="guest_reservation_id">
                                                    <option value="">Search...</option>
                                                    @foreach ($GuestReservations as $GuestReservation)
                                                        <option value="{{ $GuestReservation->id }}"
                                                                @if ($children->id == $GuestReservation->id) selected @endif>
                                                            {{ $GuestReservation->guests->frist_name }}
                                                            {{ $GuestReservation->guests->middle_name }}
                                                            {{ $GuestReservation->guests->last_name }}
                                                        </option>
                                                        @endforeach

                                                </select>
                                                <label for="floatingInput"> Guest Reservation </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="id">
                                                    <i class="fa-solid fa-address-card"></i>
                                                </span>
                                                <input type="text" class="form-control input" name="nid" for="id"
                                                    placeholder="Guest Reservation" required  value="{{ $children->nid }}"  />
                                                {{-- invalid --}}
                                                <label for="id">id </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Name">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control input" id="Name" name="name"
                                                    placeholder="Namen" value="{{ $children->name }}" />
                                                {{-- invalid --}}
                                                <label for="Name">Name </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="id">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                                <input type="date" class="form-control input" for="birth date"
                                                   name="birth_date" id="birth date" value="{{ $children->birth_date }}"
                                                    placeholder="Date of Birth" required />
                                                {{-- invalid --}}
                                                <label for="birth date">birth date </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Nid" class="col-sm-12 col-12 col-md-2 col-form-label">Guest Reservation</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <select req class="form-control" name="guest_reservation_id">
                                                <option value="">Select Guest Reservation</option>
                                                @foreach ($GuestReservations as $GuestReservation)
                                                    <option value="{{ $GuestReservation->id }}"
                                                        @if ($children->id == $GuestReservation->id) selected @endif>
                                                        {{ $GuestReservation->guests->frist_name }}
                                                        {{ $GuestReservation->guests->middle_name }}
                                                        {{ $GuestReservation->guests->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Nid" class="col-sm-12 col-12 col-md-2 col-form-label">N_id</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <input type="number" class="form-control" id="Nid"
                                                value="{{ $children->nid }}" placeholder="" name="nid">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="FirstName" class="col-sm-12 col-12 col-md-2 col-form-label">First_Name</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <input type="text" class="form-control" id="FirstName"
                                                value="{{ $children->frist_name }}" placeholder="" name="f_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="MiddleName" class="col-sm-12 col-12 col-md-2 col-form-label"> Middle_Name</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <input type="text" class="form-control" id="MiddleName"
                                                value="{{ $children->middle_name }}" placeholder="" name="m_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="LastName" class="col-sm-12 col-12 col-md-2 col-form-label">Last_Name</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <input type="text" class="form-control" id="LastName"
                                                value="{{ $children->last_name }}" placeholder="" name="l_name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-12 col-md-2 col-form-label">Birth Date </label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" value="{{ $children->birth_date }}"
                                                    name="date">
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-default bg-info float-right"><i
                                            class="fa fa-check text-light" aria-hidden="true"></i></button>
                                    <button type="submit" class="btn btn-default mr-3  bg-danger float-right"><i
                                            class="fa fa-times text-light  " aria-hidden="true"></i></button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                {{-- row --}}
                {{-- start card --}}


                {{-- end card --}}

                <!-- Modal delete-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title " id="exampleModalLabel"> <i class="fa fa-child "
                                        aria-hidden="true"></i> Child </h5>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body " style="font-size:20px;"><i
                                    class="fas fa-exclamation-triangle text-danger"></i>
                                Are you sure to delete?</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fas fa-times"></i></button>
                                <button type="button" class="btn btn-primary"><i class="fas fa-check"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
