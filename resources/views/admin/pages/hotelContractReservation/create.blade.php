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
                            <form class="form-horizontal" action="{{ route('HotelContractReservations.create.store') }}"
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
                                                        value="{{ $reservationDates->name }}" readonly>

                                                    {{-- valid --}}
                                                    <label for="date to">reservation Date</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-4">
                                            <table class="table ted">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">hotel</th>
                                                        <th scope="col">room Type</th>
                                                        <th scope="col">name</th>
                                                        <th scope="col">room Category</th>
                                                        <th scope="col">meal Plan</th>
                                                        <th scope="col"> rate</th>
                                                        <th scope="col"> new rate</th>
                                                        <th scope="col"> opration </th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($hotelContracts as $key => $HotelContract)
                                                        <tr>
                                                            <th scope="row">{{ $key + 1 }}</th>
                                                            <td><input type="text" class="form-control" id="hotel_id"
                                                                    value="{{ $HotelContract->hotels->name }}" readonly
                                                                    name="data[hotel_id][]"></td>
                                                            <td><input type="text" class="form-control"
                                                                    name="data[room_type_id][]"
                                                                    value="{{ $HotelContract->roomTypes->type }}"
                                                                    readonly></td>
                                                            <td><input type="text" class="form-control Rate"
                                                                    value="{{ $HotelContract->name }}" name="data[name][]"
                                                                    readonly>
                                                            </td>
                                                            <td><input readonly type="text"
                                                                    class="form-control data  Selling-rate" STEP="1"
                                                                    name="data[roomCategory_id][]"
                                                                    value="{{ $HotelContract->roomCategors->name }}">
                                                            </td>
                                                            <td><input readonly type="text"
                                                                    class="form-control data  Selling-rate" STEP="1"
                                                                    name="data[mealPlan_id][]"
                                                                    value="{{ $HotelContract->mealPlans->name }}"></td>
                                                            <td><input readonly type="text"
                                                                    class="form-control data  Selling-rate" STEP="1"
                                                                    name="data[rate][]"
                                                                    value="{{ $HotelContract->rate }}"></td>
                                                            <td><input type="number" class="form-control data  Selling-rate"
                                                                    STEP="1" name="data[reservationRate][]"
                                                                    value="{{ $HotelContract->rate }}"></td>
                                                            <td><button type="button"
                                                                    class="delet bg-danger border-0 rounded"
                                                                    onclick="delete_tr(this)">
                                                                    <i class="fa-solid fa-trash-can"></i> </button> </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                        </div>

                                    </div>


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit"
                                        class="btn btn-default bg-info float-right btn btn-success swalDefaultSuccess">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button type="button"
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
        function delete_tr(ele) {
            ele.parentElement.parentElement.remove()
        }
    </script>
@endsection
