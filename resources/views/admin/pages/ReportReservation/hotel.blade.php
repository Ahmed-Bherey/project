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
                                <h3 class="card-title"><i class="fas fa-hands-helping text-light mr-1"></i>Arrival
                                    List
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('admin.report.arrivalList.hotel') }}"
                                  method="get">

                                <div class="card-body">

                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-hotel"></i>
                                                </span>
                                                <select  class="form-control" id="hotel_id" name="hotel_id">
                                                    <option value="0">Search...</option>
                                                    @foreach ($hotels as $hotel)
                                                        <option value="{{ $hotel->id }}">
                                                            {{ $hotel->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="hotel_id">Hotel Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-hotel"></i>
                                                </span>
                                                <select  class="form-control" id="travelAgent_id" name="travelAgent_id">
                                                    <option value="0">Search...</option>
                                                    @foreach ($travelAgents as $travelAgent)
                                                        <option value="{{ $travelAgent->id }}">

                                                            {{ $travelAgent->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="travelAgent_id">Travel Agent</label>
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

                                                       value="<?= date('Y-m-d') ?>" required>
                                                {{-- valid --}}
                                                <label for="date from">date from </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Rate">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </span>
                                                <input type="date" class="form-control" name="to" id="to" >


                                                <label for="date to">date to </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="checkbox" id="date to"  name="checkbox"  value="1">

                                    <label class="ms-2" for="date to">Data table </label>
                                    <div class="card-footer">
                                        <button type="submit"
                                                class="btn btn-default bg-info float-right btn btn-success swalDefaultSuccess">
                                            <i class="fa fa-check text-light" aria-hidden="true"></i>
                                        </button>
                                        <button type="reset"
                                                class="btn btn-default mr-3  bg-danger float-right  btn btn-danger swalDefaultError">
                                            <i class="fa fa-times text-light  " aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            {{-- row --}}

            <!-- Modal -->

            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>

@endsection
