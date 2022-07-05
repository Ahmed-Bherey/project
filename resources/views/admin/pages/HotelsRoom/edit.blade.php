@extends('admin.includes.master')
@section('title')
    Hotel Rooms
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
                <div class="row mt-2">
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-10">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-bed mr-1"></i>Hotels Room </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('travelAgent-rooms.update', $TravelAgentRooms->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                {{--  --}}
                                <div class="ps-3 pe-3">
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Travel agent name">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <select required class="form-control input" placeholder="Travel agent name" name="travel_agent_id">
                                                    <option value="" >Travel agent name</option>
                                                        @foreach ($travelAgents as $travelAgent)
                                                            <option value="{{$travelAgent->id}}" @if ($TravelAgentRooms->travel_agent_id == $travelAgent->id)selected @endif>{{$travelAgent->name}}</option>
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
                                                <select required class="form-control input" placeholder="Hotel Name" name="hotel_id">
                                                    <option value="" >Hotel Name</option>

                                                        @foreach ($hotels as $hotel)
                                                            <option value="{{$hotel->id}}" @if ($TravelAgentRooms->hotel_id == $hotel->id)selected @endif>{{$hotel->name}}</option>
                                                        @endforeach

                                                </select>
                                                <label for="floatingInput">- Hotel Name -</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Room No">
                                                    <i class="fa-solid fa-arrow-down-1-9"></i>
                                                </span>
                                                <input type="number" class="form-control input" for="Room No"
                                                    placeholder="Room No" name="room_no"  value="{{$TravelAgentRooms->room_no}}">
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
                                                <textarea class="form-control input" rows="1" for="Notes" placeholder="Note ..." name="note">{{$TravelAgentRooms->note}}</textarea>
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
                {{-- row --}}
                {{-- start card --}}

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
