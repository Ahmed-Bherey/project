@extends('admin.includes.master')
@section('title')
    Reservation
@endsection
@section('content')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script> --}}

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.errors')
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- row --}}
                <div class="row ">
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-igloo mr-1"></i>Reservation :</h3>
                                <span class="ms-4 badge bg-primary round fs-6">
                                    {{ str_pad(\App\Models\TotalReservation::orderBy('id', 'DESC')->value('id') + 1, 7, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <!-- /.card-header -->
                            {{-- form start --}}

                            <form class="form-horizontal" id="form" method="post">
                                @csrf
                                <div class="card-body">
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="creation-date" class="col-sm-3 col-form-label">creation date
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="date" data-provide="datepicker" id="creation-date"
                                                           data-date-autoclose="true"
                                                           class="  form-control" name="date"
                                                           @if (isset($date)) value="{{ $date }}"
                                                           @else value="<?= date('Y-m-d') ?>" @endif />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="guest" class="col-sm-3 col-form-label">Guest Name
                                                </label>
                                                <div class="col-sm-7">
                                                    <input required class="form-control" name="guestName"
                                                           list="guest_ids"
                                                           autocomplete="off" size="1" id="guest"
                                                           placeholder="guest name ..."
                                                           @isset($guest_id) value="{{ $guest_id }}" @endisset>
                                                    <datalist id="guest_ids" size="10">
                                                        @foreach ($guests as $guest)
                                                            <option value="{{ $guest->name }}">
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                <!-- Button trigger modal -->
                                                <div class="col-sm-1">
                                                    <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"
                                                            class="btn btn-info pl-2 pr-2 p-1 btn-eye">
                                                        <i class="fa-solid fa-plus text-light"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="Travel_Agent" class="col-sm-3 col-form-label"> Travel
                                                    Agent
                                                </label>
                                                <div class="col-sm-9">
                                                    <select required class="form-control" name="travel_agent_id">
                                                        <option value="">Select Travel Agent</option>
                                                        @foreach ($travelAgents as $travelAgent)
                                                            <option value="{{ $travelAgent->id }}"
                                                                    @isset($travelAgents_id) @if ($travelAgent->id == $travelAgents_id) selected @endif
                                                                    @endisset>
                                                                {{ $travelAgent->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    {{--  --}}
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="from" class="col-sm-3 col-form-label">Arrival
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="date" data-provide="datepicker"
                                                           data-date-autoclose="true"
                                                           class="start-date form-control" name="from" id="from"
                                                           placeholder="Date of Birth"
                                                           @if (isset($DateFrom)) value="{{ $DateFrom }}"
                                                           @else value="<?= date('Y-m-d') ?>" @endif
                                                           required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="Nights No" class="col-sm-3 col-form-label">Nights
                                                    No</label>
                                                <div class="col-sm-9">
                                                    <input required type="number" class="number-days form-control"
                                                           id="nights_no" placeholder="" name="nights_no"
                                                           @isset($nights_no) value="{{ $nights_no }}" @endisset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="to" class="col-sm-3 col-form-label">Departure </label>
                                                <div class="col-sm-9">
                                                    <input type="date" data-provide="datepicker"
                                                           data-date-autoclose="true"
                                                           class="end-date form-control" name="to" id="to"
                                                           placeholder="Date of Birth"
                                                           @isset($DateTo) value="{{ $DateTo }}" @endisset />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="hotel_id" class="col-sm-3 col-form-label"> Hotel
                                                </label>
                                                <div class="col-sm-7">
                                                    <select required class="form-control" name="hotel" id="hotel">
                                                        <option value="">choose Hotel</option>
                                                        @foreach ($hotels as $hotel)
                                                            <option value="{{ $hotel->id }}"
                                                                    @isset($hotel_id) @if ($hotel->id == $hotel_id) selected @endif
                                                                    @endisset>
                                                                {{ $hotel->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-1">
                                                    <input type="button" id="numerOfReservation"
                                                           class="btn btn-success  pl-2 pr-2 p-1" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"> room type
                                                </label>
                                                <div class="col-sm-9">
                                                    <select required class="form-control" name="roomType" id="roomType">
                                                        <option value="">choose Room Type</option>
                                                        @foreach ($roomTypes as $roomType)
                                                            <option value="{{ $roomType->id }}"
                                                                    @isset($roomType_id) @if ($roomType->id == $roomType_id) selected @endif
                                                                    @endisset>
                                                                {{ $roomType->abbreviation }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="room_type" class="col-sm-3 col-form-label"> room category
                                                </label>
                                                <div class="col-sm-9">
                                                    <select required class="form-control" name="roomCategory_id"
                                                            id="category">
                                                        <option value=""> room category</option>
                                                        @foreach ($roomCategorys as $roomCategory)
                                                            <option value="{{ $roomCategory->id }}"
                                                                    @isset($Category_id) @if ($roomCategory->id == $Category_id) selected @endif
                                                                    @endisset>
                                                                {{ $roomCategory->abbreviation }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="meal_plan" class="col-sm-3 col-form-label"> meal plan
                                                </label>
                                                <div class="col-sm-9">
                                                    <select required class="form-control" name="meal" id="meal">
                                                        <option value=""> meal plan</option>
                                                        @foreach ($mealPlans as $mealPlan)
                                                            <option value="{{ $mealPlan->id }}"
                                                                    @isset($meal_id) @if ($mealPlan->id == $meal_id) selected @endif
                                                                    @endisset>
                                                                {{ $mealPlan->abbreviation }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="rooms" class="col-sm-3 col-form-label">rooms</label>
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control rooms" id="rooms"
                                                           placeholder="1" name="rooms"
                                                           @if (isset($rooms)) value="{{ $rooms }}"
                                                           @else  value="1" @endif>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="checkbox" class="btn btn-success pl-2 pr-2 p-1"
                                                           value="1"
                                                           @isset($checkbox) checked @endisset
                                                           name="checkbox" id="split">
                                                    <label class="ms-2" for="split">
                                                        split</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="rate" class="col-sm-3 col-form-label">Rate</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="rate" placeholder=""
                                                           name="rate"
                                                           @isset($rateNumber) value="{{ $rateNumber }}" @endisset>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="submit"
                                                            formaction="{{ route('guest_reservation.store') }}"
                                                            class="btn btn-info pl-2 pr-2 p-1">
                                                        <i class="fa fa-eye text-light"></i>
                                                    </button>
                                                </div>
                                                {{-- @endfor --}}
                                            </div>
                                        </div>


                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="adult" class="col-sm-3 col-form-label"> adult No</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="adultNumber"
                                                           placeholder="" name="adult"
                                                           @isset($adultNumber) value="{{ $adultNumber }}" @endisset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="child" class="col-sm-3 col-form-label"> child No</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="child" placeholder=""
                                                           name="child"
                                                           @isset($childNumber) value="{{ $childNumber }}" @endisset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="child" class="col-sm-3 col-form-label"> extra
                                                    charge </label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="extra-charge form-control" id="child"
                                                           placeholder="" name="extraCharge" value="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="rooms" class="col-sm-3 col-form-label">rooms No</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="rooms"
                                                           placeholder="1001"
                                                           name="roomNumber"
                                                           @isset($roomNumber) value="{{ $roomNumber }}" @endisset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="special request" class="col-sm-3 col-form-label ">special
                                                    request</label>
                                                <div class="col-sm-9">
                                <textarea class="form-control" rows="1" placeholder="special request ..."
                                          id="special request" name="specialRequest">
@isset($specialRequests){{ $specialRequests }}@endisset
</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                            <div class="form-group row">
                                                <label for="note" class="col-sm-3 col-form-label">Notes</label>
                                                <div class="col-sm-9">
                                <textarea class="form-control" rows="1" placeholder="Note ..." id="note" name="note">
@isset($notes){{ $notes }}@endisset
</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @isset($HotelContracts)
                                        <div class="col-12 mt-4">
                                            <table class="table ted">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Date range</th>
                                                    <th scope="col">Avilable Room</th>
                                                    <th scope="col">Rate</th>
                                                    <th scope="col">Selling rate</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach ($HotelContracts as $key => $HotelContract)
                                                    <tr>
                                                        <th scope="row">{{ $key + 1 }}</th>
                                                        <td><input type="text" class="form-control" id="selling_rate"
                                                                   value="{{ $HotelContract->date }}" readonly
                                                                   name="data[reservationDate][]"></td>
                                                        <td><input type="text" class="form-control"
                                                                   @if ($hotelNumber -
                                                                       \App\Models\GuestReservation::where('cancel', null)->where('hotel_id', $HotelContract->hotel_id)->where('date', $HotelContract->date)->sum('nights_no') <
                                                                       1) style="background: rosybrown" @endif
                                                                   value="{{ $hotelNumber -\App\Models\GuestReservation::where('cancel', null)->where('hotel_id', $hotel_id)->where('date', $HotelContract->date)->sum('nights_no') }}"
                                                                   readonly></td>
                                                        <td><input type="number" STEP="0.01" class="form-control Rate"
                                                                   @if (isset($HotelContractOffers)) value="{{ $HotelContract->offerRate }}"
                                                                   @else  value="{{ $HotelContract->rate }}" @endif
                                                                   name="data[HotelRate][]">
                                                        </td>
                                                        <td><input type="number" class="form-control data  Selling-rate"
                                                                   STEP="0.01" name="data[selling_rate][]"
                                                                   @if (isset($HotelContractOffers)) value="{{ $HotelContract->offerRate }}"
                                                                   @else  value="{{ $HotelContract->rate }}" @endif>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td>
                                                        <input type="text" class="form-control" value="Total" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control  " name="" STEP="0.01"
                                                               readonly>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control  Totle-rate "
                                                               name="NumberRate" STEP="0.01" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="number"
                                                               class="form-control data data Totle-selling-rate"
                                                               name="NumberSellingRate" readonly>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                </div>
                            @endisset
                            <!-- /.card-body -->
                                <div class="card-footer">

                                    @isset($HotelContracts)
                                        <button type="submit" formaction="{{ route('admin.store.reservation') }}"
                                                class="btn btn-default bg-info float-right"><i
                                                    class="fa fa-check text-light"
                                                    aria-hidden="true"></i></button>
                                    @endisset
                                    <a href="{{ route('guest_reservation.create') }}"
                                       class="btn btn-default mr-3 bg-secondary float-right">
                                        <i class="fa-solid fa-arrows-rotate text-light  " aria-hidden="true"></i></a>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New Guest</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form-horizontal"
                                                  action="{{ route('guest.store.from.reservation') }}" method="post">


                                                @csrf
                                                <div class="card-body">
                                                    {{--  --}}
                                                    <div class="row clearfix">
                                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                                            <div class="form-floating input-group">
                                            <span class="input-group-text" id="Name">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                                                <input type="text" class="form-control input" for="Name"
                                                                       placeholder="Name" name="name" required>
                                                                {{-- invalid --}}
                                                                <label for="Name">Name </label>
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback"> Please provide a valid
                                                                    Name.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                                            <div class="form-floating input-group">
                                            <span class="input-group-text" for="Nationality">
                                                <i class="fa-solid fa-address-card"></i>
                                            </span>
                                                                <input type="text" class="form-control input"
                                                                       id="Nationality" placeholder="Nationality"
                                                                       name="nationality">
                                                                {{-- invalid --}}
                                                                <label for="Nationality">Nationality </label>
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback"> Please provide a valid
                                                                    Nationality.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--  --}}
                                                    <div class="row clearfix">
                                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                                            <div class="form-floating input-group">
                                            <span class="input-group-text" for="id">
                                                <i class="fa-solid fa-address-card"></i>
                                            </span>
                                                                <input type="number" class="form-control input" id="id"
                                                                       placeholder="id" name="nid">
                                                                {{-- invalid --}}
                                                                <label for="id">id </label>
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback"> Please provide a valid
                                                                    id.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                                            <div class="form-floating input-group">
                                            <span class="input-group-text" for="birth_date">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                                                <input type="date" class="form-control input"
                                                                       id="birth_date" placeholder="birth_date"
                                                                       name="birth_date">
                                                                {{-- invalid --}}
                                                                <label for="birth_date">birth_date </label>
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback"> Please provide a valid
                                                                    birth_date.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--  --}}
                                                    <div class="row clearfix">
                                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                                            <div class="form-floating input-group">
                                            <span class="input-group-text" for="Tel">
                                                <i class="fa-solid fa-phone"></i>
                                            </span>
                                                                <input type="number" class="form-control input" id="Tel"
                                                                       placeholder="Tel" name="tel">
                                                                {{-- invalid --}}
                                                                <label for="Tel">Tel </label>
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback"> Please provide a valid
                                                                    Tel.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 mb-2 mt-2 ps-3 pe-3">
                                                            <div class="form-floating input-group">
                                            <span class="input-group-text" for="Whatsapp">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </span>
                                                                <input type="number" class="form-control input"
                                                                       id="Whatsapp" placeholder="Whatsapp"
                                                                       name="whatsapp">
                                                                {{-- invalid --}}
                                                                <label for="Whatsapp">Whatsapp </label>
                                                                <div class="valid-feedback">Looks good!</div>
                                                                <div class="invalid-feedback"> Please provide a valid
                                                                    Whatsapp.
                                                                </div>
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

                                                </div>
                                                <!-- /.card-footer -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Reservation </h3>
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
                                                        #
                                                    </th>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        RN
                                                    </th>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        Guest Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Hotel
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Arrival
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Nights No
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Departure
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Rooms
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Meal Plan
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Room category
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Operation
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($guestReservations as $key => $guestReservation)
                                                    <tr title="{{$guestReservation->agentBalance}}" @if ($guestReservation->cancel == 1) style="background: rosybrown"
                                                        @endif
                                                        @if ($guestReservation->total < $guestReservation->totalHotel) style="background: #baad22" @endif
                                                        >
                                                        <td>{{ $key + 1 }}</td>
                                                        <td @if($guestReservation->agentBalance >= 0 ) style="background:#048018" @else style="background:#803905"   @endif >{{ $guestReservation->id }}</td>
                                                        <td>{{ \App\Models\NewGuest::where('id', $guestReservation->guest_id)->value('name') }}
                                                        </td>
                                                        <td>{{ $guestReservation->hotels->name }}</td>
                                                        <td>{{ $guestReservation->from }}</td>
                                                        <td>{{ $guestReservation->nights_no }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($guestReservation->to)->addDays(1)->format('Y-m-d') }}
                                                        </td>

                                                        <td
                                                                @if ($guestReservation->rooms > 1) style="background-color: #00d09b;" @endif>
                                                            {{ $guestReservation->rooms }}</td>
                                                        <td>{{ $guestReservation->meals->name }}</td>
                                                        <td>{{ \App\Models\RoomCategory::where('id', $guestReservation->roomCategory_id)->value('name') }}
                                                        </td>

                                                        <td class="operation d-flex justify-content-evenly ">
                                                            <a href="{{ route('guest_reservation.edit', $guestReservation->id) }}"
                                                               class="btn btn-success "><i class="far fa-edit ml-1"
                                                                                           aria-hidden="true"></i></a>
                                                            <a href="{{ route('admin.detail.guest.delete', $guestReservation->id) }}"
                                                               onclick="return confirm('Are you sure you want to cancel this reservation?');"
                                                               class="btn  btn-danger "><i
                                                                        class="fas fa-trash-alt ml-1"></i></a>
                                                            {{--<a  class="btn  btn-info " href="{{route('admin.collect.guest.reservation', $guestReservation->id)}}" title="collect Guest">--}}
                                                            {{--<i class="fas fa-user text-light"></i>--}}
                                                                     {{--</a>--}}
                                                            <a @if((int)$guestReservation->agentHotel  >= (int)$guestReservation->total ) hidden="" @endif class="btn  btn-info " href="{{route('admin.collect.agent.reservation', $guestReservation->id)}}" title="collect Agent"><i
                                                                        class="fa fa-plus text-light	 text-light"></i>
                                                            </a>
                                                            <a class="btn  btn-info " href="{{route('admin.pay.agent.reservation', $guestReservation->id)}}" title="pay money"><i
                                                                        class=" far fa-money-bill-alt"></i></a>
                                                            <a href="{{ route('admin.detail.guest', $guestReservation->id) }}"
                                                               target="_blank" class="btn  btn-success   "><i
                                                                        class="fas fa-eye text-light"></i></a>
                                                            <a class="btn  btn-info " target="_blank"
                                                               href="{{ route('admin.reportReservation.guest', $guestReservation->id) }}"><i
                                                                        class="fas fa-print"></i></a>
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
                <!-- Modal delete-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title " id="exampleModalLabel"><i
                                            class="fas fa-igloo mr-1"></i>Reservation
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
                                <button type="button" class="btn btn-primary"><i class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('jsDate')
    <script>
        let Selling_Rate = document.querySelectorAll('.Selling-rate'),
            Rate = document.querySelectorAll('.Rate'),
            Rooms = document.querySelector('.rooms'),
            extraCharge = document.querySelector('.extra-charge'),
            // totle
            Totle_Selling_Rate = document.querySelector('.Totle-selling-rate'),
            Totle_Rate = document.querySelector('.Totle-rate'),
            Buttom_Plus = document.querySelector('.btn-eye'),

            res_Rate = 0;
        res_Selling_Rate = 0

        // to sum the  extra charge &  Rate
        extraCharge.addEventListener('keyup', () => {
            Rate[0].value = sumExtraCharge * 1 + extraCharge.value * 1
        })

        if (Selling_Rate[0] != null) {
            sumExtraCharge = Rate[0].value
        }
        document.addEventListener('keyup', () => {
            if (Selling_Rate[0] != null) {
                // to sum the extra charge & Rate
                Rate[0].addEventListener('keyup', () => {
                    sumExtraCharge = Rate[0].value,
                        extraCharge.addEventListener('keyup', () => {
                            Rate[0].value = sumExtraCharge * 1 + extraCharge.value * 1
                        })
                })
                //
                Selling_Rate[0].addEventListener('keyup', () => {
                    for (let i = 1; i < Rate.length; i++) {
                        Selling_Rate[i].value = Selling_Rate[0].value
                    }
                })
                Rate[0].addEventListener('keyup', () => {
                    for (let i = 1; i < Rate.length; i++) {
                        Rate[i].value = Rate[0].value
                    }
                })
                extraCharge.addEventListener('keyup', () => {
                    for (let i = 1; i < Rate.length; i++) {
                        Rate[i].value = Rate[0].value
                    }
                })
            }
        })
        // to calculate totle Rate

        document.addEventListener('keyup', () => {
            res_Rate = 0;
            for (let i = 0; i < Rate.length; i++) {
                res_Rate = (res_Rate * 1 + Rate[i].value * 1)
                Totle_Rate.value = res_Rate * Rooms.value
            }
        })
        for (let i = 0; i < Rate.length; i++) {
            res_Rate = (res_Rate * 1 + Rate[i].value * 1)
            Totle_Rate.value = res_Rate * Rooms.value
        }

        // to calculate totle  Selling Rate
        document.addEventListener('keyup', () => {
            res_Selling_Rate = 0;
            for (let i = 0; i < Rate.length; i++) {
                res_Selling_Rate = (res_Selling_Rate * 1 + Selling_Rate[i].value * 1)
                Totle_Selling_Rate.value = res_Selling_Rate * Rooms.value
            }
        })
        for (let i = 0; i < Rate.length; i++) {
            res_Selling_Rate = (res_Selling_Rate * 1 + Selling_Rate[i].value * 1)
            Totle_Selling_Rate.value = res_Selling_Rate * Rooms.value
        }

        let startDate = document.querySelector('.start-date'),
            endDate = document.querySelector('.end-date'),
            numberDays = document.querySelector('.number-days');

        document.addEventListener('keyup', () => {
            if (endDate.value < startDate.value) {
                endDate.value = startDate.value
            }
            date = new Date(startDate.value);
            const weekAdd = new Date(startDate.value);
            weekAdd.setDate(date.getDate() + (numberDays.value) * 1);

            // console.log(weekAdd)
            var Day = weekAdd.getDate(),
                Month = weekAdd.getMonth() + 1,
                Year = weekAdd.getFullYear();

            if (Day < 10) {
                Day = "0" + Day
            }
            if (Month < 10) {
                Month = "0" + Month
            }
            endDate.value = `${Year}-${Month}-${Day}`
        })
        document.addEventListener('keyup', () => {
            if (endDate.value < startDate.value) {
                endDate.value = startDate.value
            }
            date = new Date(startDate.value);
            const weekAdd = new Date(startDate.value);
            weekAdd.setDate(date.getDate() + (numberDays.value) * 1);

            // console.log(weekAdd)
            var Day = weekAdd.getDate(),
                Month = weekAdd.getMonth() + 1,
                Year = weekAdd.getFullYear();

            if (Day < 10) {
                Day = "0" + Day
            }
            if (Month < 10) {
                Month = "0" + Month
            }
            endDate.value = `${Year}-${Month}-${Day}`
        })
        // console.log(endDate.value)
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="hotel"]').on('change', function () {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');

                var route =
                    '{{ route('admin.numberOfReservation.rate.ajax', ['id' => ':id', 'from' => ':from']) }}';
                route = route.replace(':id', stateID).replace(':from', $('input[name="from"]').val())

                if (stateID) {
                    $.ajax({
                        beforeSend: function (x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",

                        success: function (data) {
                            $('#numerOfReservation').val(data);

                            $('#numerOfReservation').trigger('change');

                        }
                    });
                } else {
                    $('select[name="numerOfReservation"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="travel_agent_id"]').on('change', function () {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');

                var route =
                    '{{ route('admin.numberOfTravelAgent.rate.ajax', ['id' => ':id', 'from' => ':from', 'hotel' => ':hotel']) }}';
                route = route.replace(':id', stateID).replace(':from', $('input[name="from"]').val())
                    .replace(':hotel', $('#hotel option:selected').val())

                if (stateID) {
                    $.ajax({
                        beforeSend: function (x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",

                        success: function (data) {
                            $('#numerOfTravelAgent').val(data);

                            $('#numerOfTravelAgent').trigger('change');

                        }
                    });
                } else {
                    $('select[name="numerOfTravelAgent"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="roomType"]').on('change', function () {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');

                var route =
                    '{{ route('admin.reservation.rate.ajax', ['id' => ':id', 'hotel' => ':hotel', 'from' => ':from', 'nights_no' => ':nights_no', 'meal' => ':meal', 'category' => ':category']) }}';
                route = route.replace(':id', stateID).replace(':hotel', $('#hotel option:selected').val())
                    .replace(':from', $('input[name="from"]').val()).replace(':nights_no', $(
                        'input[name="nights_no"]').val()).replace(
                        ':meal', $('#meal option:selected').val()).replace(':category', $(
                        '#category option:selected').val())

                if (stateID) {
                    $.ajax({
                        beforeSend: function (x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",

                        success: function (data) {
                            $('#rate').val(data);

                            $('#rate').trigger('change');

                        }
                    });
                } else {
                    $('select[name="rate"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="hotel"]').on('change', function () {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');

                var route = '{{ route('admin.show.mealplan.hotel', ['id' => ':id']) }}';
                route = route.replace(':id', stateID);
                if (stateID) {
                    $.ajax({
                        beforeSend: function (x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('#meal').empty();
                            $.each(data, function (key, value) {
                                $('#meal').append($('<option>', {
                                    value: value.mealPlan_id,
                                    text: value.meal_plans.abbreviation
                                }));
                            });
                            $('#meal').trigger('change');

                        }
                    });
                } else {
                    $('select[name="meal"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="hotel"]').on('change', function () {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');

                var route = '{{ route('admin.show.roomType.hotel', ['id' => ':id']) }}';
                route = route.replace(':id', stateID);
                if (stateID) {
                    $.ajax({
                        beforeSend: function (x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('#roomType').empty();
                            $.each(data, function (key, value) {
                                $('#roomType').append($('<option>', {
                                    value: value.room_type_id,
                                    text: value.room_types.abbreviation
                                }));
                            });
                            $('#roomType').trigger('change');

                        }
                    });
                } else {
                    $('select[name="meal"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="hotel"]').on('change', function () {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');

                var route = '{{ route('admin.show.roomCategory.hotel', ['id' => ':id']) }}';
                route = route.replace(':id', stateID);
                if (stateID) {
                    $.ajax({
                        beforeSend: function (x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('#category').empty();
                            $.each(data, function (key, value) {
                                $('#category').append($('<option>', {
                                    value: value.roomCategory_id,
                                    text: value.room_categors.abbreviation
                                }));
                            });
                            $('#category').trigger('change');

                        }
                    });
                } else {
                    $('select[name="category"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="roomType"]').on('change', function () {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');

                var route =
                    '{{ route('admin.roomType.adultNumber.ajax', ['id' => ':id']) }}';
                route = route.replace(':id', stateID)

                if (stateID) {
                    $.ajax({
                        beforeSend: function (x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",

                        success: function (data) {
                            $('#adultNumber').val(data);

                            $('#adultNumber').trigger('change');

                        }
                    });
                } else {
                    $('select[name="adultNumber"]').empty();
                }
            });
        });
    </script>
@endsection
