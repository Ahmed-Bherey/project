@extends('admin.includes.master')
@section('title')
    Edit Room Type
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
                                <h3 class="card-title">Rooms Type </h3>
                            </div>
                            <!-- /.card-header -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('roomtype.update', $rooms->id) }}"
                                method="post">
                                @csrf
                                @method('PUT')

                                <div class="ps-3 pe-3">
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Type">
                                                    <i class="fa-solid fa-restroom"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Type" name="type"
                                                    id="Type" value="{{ $rooms->type }}">
                                                {{-- valid --}}
                                                <label for="Name">Type </label>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please provide a valid Type. </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="capacity">
                                                    <i class="fa-solid fa-people-roof"></i>
                                                </span>
                                                <input type="number" class="form-control" placeholder="capacity"
                                                    name="capacity" id="capacity" value="{{ $rooms->capacity }}">
                                                {{-- valid --}}
                                                <label for="capacity">capacity </label>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please provide a valid capacity. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Abbreviation">
                                                    <i class="fa-solid fa-arrow-down-1-9"></i>
                                                </span>
                                                <input type="text" class="form-control input" for="Abbreviation"
                                                    placeholder="Abbreviation" name="abbreviation"
                                                    value="{{ $rooms->abbreviation }}">
                                                {{-- invalid --}}
                                                <label for="Abbreviation">Abbreviation </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Notes">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </span>
                                                <textarea class="form-control input" rows="1" for="Notes" placeholder="Note ..."
                                                    name="note">{{ $rooms->note }}</textarea>
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
