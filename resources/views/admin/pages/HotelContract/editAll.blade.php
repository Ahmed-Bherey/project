@extends('admin.includes.master')
@section('title')
    Hotel Contract
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
                                <h3 class="card-title"><i class="fas fa-hands-helping text-light mr-1"></i>Hotel
                                    Contract
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('collection',['name'=> $hotelContract->name,'roomType_id'=> $hotelContract->room_type_id,'mealPlan_id'=> $hotelContract->mealPlan_id,'roomCategory_id'=> $hotelContract->roomCategory_id,'hotel_id'=> $hotelContract->hotel_id]) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2" hidden>
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Rate">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </span>
                                                <input type="text" class="form-control start-date" name="name" id="from"
                                                       value="{{$hotelContract->name}}" readonly>
                                                {{-- valid --}}
                                                <label for="date from">date from </label>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Rate">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </span>
                                                <input type="text" class="form-control start-date" name="namess" id="from"
                                                       value="{{ \App\Models\HotelContract::where('name',$hotelContract->name)->where('room_type_id',$hotelContract->room_type_id)->where('hotel_id',$hotelContract->hotel_id)->where('mealPlan_id',$hotelContract->mealPlan_id)->where('roomCategory_id',$hotelContract->roomCategory_id)->orderBY('date','asc')->first()->date }} To {{ \App\Models\HotelContract::where('name',$hotelContract->name)->where('room_type_id',$hotelContract->room_type_id)->where('hotel_id',$hotelContract->hotel_id)->where('mealPlan_id',$hotelContract->mealPlan_id)->where('roomCategory_id',$hotelContract->roomCategory_id)->orderBY('date','desc')->first()->date }}" readonly>
                                                {{-- valid --}}
                                                <label for="date from">date from </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="HotelName" class="col-sm-12 col-12 col-md-2 col-form-label">Hotel
                                            Name</label>
                                        <div class="col-sm-12 col-12 col-md-10">

                                            <select required class="form-control" id="HotelName" name="hotel_id" readonly>
                                                <option value="">Select Guest Reservation</option>
                                                @foreach ($hotels as $hotel)
                                                    <option value="{{ $hotel->id }}"
                                                        @if ($hotel->id == $hotelContract->hotel_id) selected @endif>
                                                        {{ $hotel->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Rooms_Type" class="col-sm-12 col-12 col-md-2 col-form-label">Rooms
                                            Type</label>
                                        <div class="col-sm-12 col-12 col-md-10">

                                            <select required class="form-control" id="RoomsType" name="room_type_id" readonly>
                                                <option value="">Select Guest Reservation</option>
                                                @foreach ($hotelTypes as $hotelType)
                                                    <option value="{{ $hotelType->id }}"
                                                        @if ($hotelType->id == $hotelContract->room_type_id) selected @endif>
                                                        {{ $hotelType->type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meal_plan" class="col-sm-12 col-12 col-md-2 col-form-label">meal
                                            plan</label>
                                        <div class="col-sm-12 col-12 col-md-10">

                                            <select required class="form-control" id="mealPlan" name="mealPlan_id" readonly>
                                                <option value="">Select Guest Reservation</option>
                                                @foreach ($mealPlans as $mealPlan)
                                                    <option value="{{ $mealPlan->id }}"
                                                        @if ($mealPlan->id == $hotelContract->mealPlan_id) selected @endif>
                                                        {{ $mealPlan->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meal_plan" class="col-sm-12 col-12 col-md-2 col-form-label">
                                            Room Category</label>
                                        <div class="col-sm-12 col-12 col-md-10">

                                            <select required class="form-control" id="mealPlan" name="roomCategory_id" readonly>
                                                <option value="">Select Room Category</option>
                                                @foreach ($roomCategorys as $roomCategory)
                                                    <option value="{{ $roomCategory->id }}"
                                                        @if ($roomCategory->id == $hotelContract->roomCategory_id) selected @endif>
                                                        {{ $roomCategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="rate" class="col-sm-12 col-12 col-md-2 col-form-label">Rate</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <input type="number" class="form-control" id="rate" placeholder="" name="rate"
                                                value="{{ $hotelContract->rate }}">
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
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
