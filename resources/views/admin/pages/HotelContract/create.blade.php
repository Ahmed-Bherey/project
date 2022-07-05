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
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-12">
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
                            <form class="form-horizontal" action="{{ route('hotel-contract.store') }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-hotel"></i>
                                                </span>
                                                <select required class="form-control" id="HotelName" name="hotel_id">
                                                    <option value="">Search...</option>
                                                    @foreach ($hotels as $hotel)
                                                        <option value="{{ $hotel->id }}"
                                                            @isset($HCHotel_id) @if ($hotel->id == $HCHotel_id) selected @endif @endisset>
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
                                                <input type="number" class="form-control" placeholder="Rate" id="Rate"
                                                    name="rate" step="0.01" required
                                                    @isset($HCRate) value="{{ $HCRate }}" @endisset>
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
                                                <input type="date" class="form-control start-date" name="from" id="from"
                                                    @if (@isset($from)) value="{{ $from }}"
                                                    @else value="<?= date('Y-m-d') ?>" @endif>
                                                {{-- valid --}}
                                                <label for="date from">date from </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Rate">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </span>
                                                <input type="date" class="form-control end-date" name="to" id="to" required
                                                  value="{{ old('to') }}">

                                                {{-- valid --}}
                                                <label for="date to">date to </label>
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
                                                    <option value="">Search...</option>
                                                    @foreach ($roomTypes as $roomType)
                                                        <option value="{{ $roomType->id }}"
                                                            @isset($HCRoom_type_id) @if ($roomType->id == $HCRoom_type_id) selected @endif @endisset>
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
                                                    <option value="">Search...</option>
                                                    @foreach ($mealPlans as $mealPlan)
                                                        <option value="{{ $mealPlan->id }}"
                                                            @isset($HCMealPlan_id) @if ($mealPlan->id == $HCMealPlan_id) selected @endif @endisset>
                                                            {{ $mealPlan->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="meal plan">meal plan</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Notes --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="room category">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <select required class="form-control" name="roomCategory_id"
                                                    id="roomCategory_id">
                                                    <option value=""> Search...</option>
                                                    @foreach ($roomCategorys as $roomCategory)
                                                        <option value="{{ $roomCategory->id }}"
                                                            @isset($HCRoomCategory_id) @if ($roomCategory->id == $HCRoomCategory_id) selected @endif @endisset>
                                                            {{ $roomCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="room category">room category</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Notes">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                                <textarea class="form-control input" rows="1" for="Notes" placeholder="Note ..." name="note">
@isset($HCNote)
{{ $HCNote }}
@endisset
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
                                                            Hotel Name
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">Rooms
                                                            Type
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Room Category
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            meal Plans
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">Date
                                                            Range
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Rate
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Operation
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($hotelContracts as $key => $hotelContract)
                                                        <tr>
                                                            <td>{{ $hotelContract->hotels->name }}</td>
                                                            <td>{{ $hotelContract->roomTypes->type }}</td>
                                                            <td>{{ $hotelContract->roomCategors->name }}</td>
                                                            <td>{{ $hotelContract->mealPlans->name }}</td>
                                                            <td>{{ \App\Models\HotelContract::where('name',$hotelContract->name)->where('room_type_id',$hotelContract->room_type_id)->where('hotel_id',$hotelContract->hotel_id)->where('mealPlan_id',$hotelContract->mealPlan_id)->where('roomCategory_id',$hotelContract->roomCategory_id)->orderBY('date','asc')->first()->date }} To {{ \App\Models\HotelContract::where('name',$hotelContract->name)->where('room_type_id',$hotelContract->room_type_id)->where('hotel_id',$hotelContract->hotel_id)->where('mealPlan_id',$hotelContract->mealPlan_id)->where('roomCategory_id',$hotelContract->roomCategory_id)->orderBY('date','desc')->first()->date }} </td>
                                                            <td>{{ $hotelContract->rate }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn btn-success mr-2 ">
                                                                    <a href="{{ route('hotel-contract.editAll', ['name' => $hotelContract->name, 'roomType_id' => $hotelContract->roomTypes->id, 'mealPlan_id' => $hotelContract->mealPlan_id, 'roomCategory_id' => $hotelContract->roomCategory_id, 'hotel_id' => $hotelContract->hotel_id]) }}"
                                                                        class="text-white"><i class="far fa-edit ml-1"
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <button type="submit" class="btn btn-success mr-2 ">
                                                                    <a href="{{ route('hotel-contract.add', ['name' => $hotelContract->name, 'roomType_id' => $hotelContract->roomTypes->id, 'mealPlan_id' => $hotelContract->mealPlan_id, 'roomCategory_id' => $hotelContract->roomCategory_id, 'hotel_id' => $hotelContract->hotel_id]) }}"
                                                                        class="text-white"><i class="fa fa-plus ml-1"
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <button type="submit" class="btn btn-info mr-2 ">

                                                                    <a href="{{ route('hotel-contract.all.show', ['name' => $hotelContract->name, 'roomType_id' => $hotelContract->roomTypes->id, 'mealPlan_id' => $hotelContract->mealPlan_id, 'roomCategory_id' => $hotelContract->roomCategory_id, 'hotel_id' => $hotelContract->hotel_id]) }}"
                                                                        class="text-white"><i class="far fa-eye ml-1"
                                                                            aria-hidden="true"></i></a>
                                                                </button>



                                                                <button type="buttom" class="btn  btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-danger{{ $key }}">
                                                                    <i class="fas fa-trash-alt ml-1"></i>
                                                                </button>
                                                                {{-- model delet --}}
                                                                <div class="modal fade"
                                                                    id="modal-danger{{ $key }}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content w-50 m-auto p-2">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title text-danger">
                                                                                    Delete Hotel Contract
                                                                                </h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"><i
                                                                                            class="fa-solid fa-xmark text-dark"></i></span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Hotel Contract you shoure to delet Hotel
                                                                                    Contract
                                                                                    &hellip;</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a href="{{ route('hotel-contract.destroy.delete', ['name' => $hotelContract->name, 'roomType_id' => $hotelContract->room_type_id, 'mealPlan_id' => $hotelContract->mealPlan_id, 'roomCategory_id' => $hotelContract->roomCategory_id, 'hotel_id' => $hotelContract->hotel_id]) }}"
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

            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>

    <script>
        let startDate = document.querySelector('.start-date'),
            endDate = document.querySelector('.end-date');
        document.addEventListener('click', () => {
            if (endDate.value < startDate.value) {
                endDate.value = startDate.value
            }
        })
        document.addEventListener('keyPress', () => {
            if (endDate.value < startDate.value) {
                endDate.value = startDate.value
            }
        })
    </script>
@endsection
