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
                                action="{{ route('collection', $hotelContract->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="ps-3 pe-3">
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-hotel"></i>
                                                </span>
                                                <select required class="form-control" id="HotelName" name="hotel_id">
                                                    <option value="">Hotel name</option>
                                                    @foreach ($hotels as $hotel)
                                                        <option value="{{ $hotel->id }}"
                                                                @if ($hotel->id == $hotelContract->hotel_id) selected @endif>
                                                            {{ $hotel->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="HotelName">Hotel Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Rate">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="number" class="form-control" placeholder="Rate"
                                                    id="Rate" name="rate" step="0.01" required
                                                       value="{{ $hotelContract->rate }}">
                                                {{-- valid --}}
                                                <label for="Rate">Rate </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Rate">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </span>
                                                <input type="date" class="form-control" name="from" id="from"
                                                       value="{{ $hotelContract->date }}" readonly="">
                                                {{-- valid --}}
                                                <label for="date from">date from </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                        <div class="form-floating input-group">
                                                <span class="input-group-text" for="room category">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                            <select required class="form-control" name="roomCategory_id"
                                                    id="roomCategory_id">
                                                <option value=""> room category</option>
                                                @foreach ($roomCategorys as $roomCategory)
                                                    <option value="{{ $roomCategory->id }}"
                                                            @if ($roomCategory->id ==  $hotelContract->roomCategory_id) selected @endif >
                                                        {{ $roomCategory->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="room category">room category</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Room type">
                                                    <i class="fa-solid fa-restroom"></i>
                                                </span>
                                                <select required class="form-control" id="Room type" name="room_type_id">
                                                    <option value="">Room type</option>
                                                    @foreach ($roomTypes as $roomType)
                                                        <option value="{{ $roomType->id }}"
                                                                @if ($roomType->id == $hotelContract->room_type_id) selected @endif>
                                                            {{ $roomType->type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="Room type">Room type</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="meal plan">
                                                    <i class="fa-solid fa-people-roof"></i>
                                                </span>
                                                <select required class="form-control" id="mealPlan" name="mealPlan_id">
                                                    <option value="">meal plan</option>
                                                    @foreach ($mealPlans as $mealPlan)
                                                        <option value="{{ $mealPlan->id }}"
                                                                @if ($mealPlan->id == $hotelContract->mealPlan_id) selected @endif>
                                                            {{ $mealPlan->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="meal plan">meal plan</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Notes --}}
                                    <div lass="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Notes">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </span>
                                                <textarea class="form-control input" rows="1" for="Notes" placeholder="Note ..." name="note">
{{$hotelContract->note}}
                                                </textarea>
                                                <label for="Notes">Note ... </label>
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
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
