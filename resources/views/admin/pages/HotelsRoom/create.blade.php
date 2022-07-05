@extends('admin.includes.master')
<<<<<<< HEAD
@section('title')
    Hotel Rooms
@endsection
=======

@section('title')
    Hotel Rooms
@endsection


>>>>>>> 606dce4308ae7802dcdf282a97ecef39054093e3
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
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-bed mr-1"></i>Hotels Room </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
<<<<<<< HEAD
                            <form class="form-horizontal" action="{{ route('travelAgent-rooms.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Travel agent name </label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="TravelAgent_id">
                                                @foreach ($travelAgents as $travelAgent)
                                                    <option value="{{ $travelAgent->id }}">{{ $travelAgent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label"> Hotel Name</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="hotel_id">
                                                @foreach ($hotels as $hotel)
                                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="roomno" class="col-sm-2 col-form-label">Room No</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="roomno" placeholder=""
                                                name="room_no">
=======
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('travelAgent-rooms.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    {{--  --}}
                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Travel agent name">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <select required class="form-control input" placeholder="Travel agent name"
                                                    name="travel_agent_id">
                                                    <option value="">Search...</option>

                                                    @foreach ($travelAgents as $travelAgent)
                                                        <option value="{{ $travelAgent->id }}">{{ $travelAgent->name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                <label for="floatingInput">- Travel agent name -</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Hotel Name">
                                                    <i class="fa-solid fa-hotel"></i>
                                                </span>
                                                <select required class="form-control input" placeholder="Hotel Name"
                                                    name="hotel_id">
                                                    <option value="">Search...</option>
                                                    @foreach ($hotels as $hotel)
                                                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                                    @endforeach

                                                </select>
                                                <label for="floatingInput">- Hotel Name -</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{--  --}}
                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Room No">
                                                    <i class="fa-solid fa-arrow-down-1-9"></i>
                                                </span>
                                                <input type="number" class="form-control input" for="Room No"
                                                    placeholder="Room No" required name="room_no">
                                                {{-- invalid --}}
                                                <label for="Room No">Room No </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Room No.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Notes">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                                <textarea class="form-control input" rows="1" for="Notes" placeholder="Note ..." name="note"></textarea>
                                                <label for="Notes">Note ... </label>
                                            </div>
>>>>>>> 606dce4308ae7802dcdf282a97ecef39054093e3
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
                {{-- row --}}
                {{-- start card --}}
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Rooms </h3>
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
                                                            Travel agent name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">Hotel
                                                            Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Room No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Operation</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
<<<<<<< HEAD
                                                    @foreach ($TravelAgentRooms as $TravelAgentRoom)
=======
                                                    @foreach ($TravelAgentRooms as$key=>$TravelAgentRoom)
>>>>>>> 606dce4308ae7802dcdf282a97ecef39054093e3
                                                        <tr>
                                                            <td>{{ $TravelAgentRoom->travelAgents->name }}</td>
                                                            <td>{{ $TravelAgentRoom->hotels->name }}</td>
                                                            <td>{{ $TravelAgentRoom->room_no }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn btn-success mr-2 ">
                                                                    <a href="{{ route('travelAgent-rooms.edit', $TravelAgentRoom->id) }}"
                                                                        class="text-white"><i class="far fa-edit ml-1"
                                                                            aria-hidden="true"></i></a>
                                                                </button>
<<<<<<< HEAD
                                                                <form method="post"
                                                                    action="{{ route('travelAgent-rooms.destroy', $TravelAgentRoom->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn  btn-danger"><i
                                                                            class="fas fa-trash-alt ml-1"></i> </button>
                                                                </form>
=======
                                                                <button type="buttom" class="btn  btn-danger"
                                                                    data-toggle="modal" data-target="#modal-danger{{$key}}">
                                                                    <i class="fas fa-trash-alt ml-1"></i>
                                                                </button>
                                                                {{-- model delet --}}
                                                                <div class="modal fade" id="modal-danger{{$key}}">
                                                                    <div class="modal-dialog">
                                                                        <div
                                                                            class="modal-content w-50 m-auto p-2">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title text-danger">Delete Hotel Room
                                                                                </h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"><i
                                                                                            class="fa-solid fa-xmark text-dark"></i></span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Hotel RoomAre you shoure to delet Hotel
                                                                                    Room
                                                                                    &hellip;</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <form method="post"
                                                                                    action="{{ route('travelAgent-rooms.destroy', $TravelAgentRoom->id) }}">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-outline-danger"><i
                                                                                            class="fa-solid fa-check"></i></button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
>>>>>>> 606dce4308ae7802dcdf282a97ecef39054093e3
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

                {{-- Modal delete --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title " id="exampleModalLabel"><i class="fas fa-bed mr-1"></i>Hotels Room
                                </h5>
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
                                <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end Modal delete --}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
