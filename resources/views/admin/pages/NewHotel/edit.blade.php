@extends('admin.includes.master')
@section('title')
    Edit Hotel
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
                <div class="row ">
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">New Hotel </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('hotel.update', $hotels->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="ps-3 pe-3">
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="name" name="name"
                                                    id="name" value="{{$hotels->name}}">
                                                {{-- valid --}}
                                                <label for="Name">Name </label>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please provide a valid Name. </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Email">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <input type="email" class="form-control" placeholder="Email" name="email"
                                                    id="Email" value="{{$hotels->email}}">
                                                {{-- valid --}}
                                                <label for="Email">Email </label>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please provide a valid email. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Name"><i class="fas fa-user"
                                                        for="Name"></i></span>
                                                <select required class="form-control" id="arname" name="category">
                                                    <option value="1" @if($hotels->category == 1 ) selected @endif>&bigstar; </option>
                                                    <option value="2" @if($hotels->category == 2 ) selected @endif>&bigstar;&bigstar; </option>
                                                    <option value="3" @if($hotels->category == 3 ) selected @endif>&bigstar;&bigstar;&bigstar;</option>
                                                    <option value="4" @if($hotels->category == 4 ) selected @endif>&bigstar;&bigstar;&bigstar; &bigstar;
                                                    </option>
                                                    <option value="5" @if($hotels->category == 5 ) selected @endif>&bigstar;&bigstar;&bigstar; &bigstar;
                                                        &bigstar; </option>
                                                    <option value="6" @if($hotels->category == 6 ) selected @endif>&bigstar;&bigstar;&bigstar; &bigstar;
                                                        &bigstar;&bigstar; </option>
                                                    <option value="7" @if($hotels->category == 7 ) selected @endif>&bigstar;&bigstar;&bigstar; &bigstar;
                                                        &bigstar;&bigstar;&bigstar; </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Address">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Address"
                                                    name="address" id="Address" value="{{$hotels->address}}">
                                                {{-- valid --}}
                                                <label for="Address">Address </label>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please provide a valid Address. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Address">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="number" class="form-control" id="vatnumber"
                                                    placeholder="Room number" name="room_no" value="{{$hotels->room_no}}">
                                                {{-- valid --}}
                                                <label for="Address">Room Allocation </label>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please provide a valid Room number. </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="tel">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="number" class="form-control" value="{{$hotels->tel}}"
                                                    data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                                    data-mask="" placeholder="tel" inputmode="text" name="tel" id="tel">
                                                {{-- valid --}}
                                                <label for="tel">tel </label>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please provide a valid tel. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="whatsapp">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="number" class="form-control" value="{{$hotels->whatsapp}}"
                                                    data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                                    data-mask="" placeholder="whatsapp" inputmode="text" name="whatsapp"
                                                    id="whatsapp">
                                                {{-- valid --}}
                                                <label for="number">whatsapp </label>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please provide a valid whatsapp. </div>
                                            </div>
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
                            </form>

                        </div>
                    </div>

                </div>




            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
