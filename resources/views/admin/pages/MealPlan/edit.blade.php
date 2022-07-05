@extends('admin.includes.master')
@section('title')
    Edit Meal Plan
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
                                <h3 class="card-title"><i class="fas fa-hamburger "></i> Meal Plan </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('mealplan.update', $meals->id) }}"
                                method="post">
                                @csrf
                                @method('PUT')

                                    <div class="form-group row">
                                        <label for="notes" class="col-sm-12 col-12 col-md-2 col-form-label">Notes</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." id="notes" name="note">{{$meals->note}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row clearfix ps-3 pe-3">
                                    <div class="col-sm-6 mb-3 mt-2">
                                        <div class="form-floating input-group">
                                            <span class="input-group-text" id="Name">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control input" for="Name" placeholder="Name"
                                                name="name" value="{{$meals->name}}">
                                            {{-- invalid --}}
                                            <label for="Name">Name </label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback"> Please provide a valid Name.</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3 mt-2">
                                        <div class="form-floating input-group">
                                            <span class="input-group-text" id="Abbreviation">
                                                <i class="fa-solid fa-arrow-down-1-9"></i>
                                            </span>
                                            <input type="text" class="form-control input" for="Abbreviation"
                                                placeholder="Abbreviation" name="abbrev" value="{{$meals->abbreviation}}">
                                            {{-- invalid --}}
                                            <label for="Abbreviation">Abbreviation </label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback"> Please provide a valid Abbreviation.</div>
                                        </div>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row clearfix">
                                    <div class="col-sm-6 mb-3 mt-2">
                                        <div class="form-floating input-group">
                                            <span class="input-group-text" id="Notes">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </span>
                                            <textarea class="form-control input" rows="1" for="Notes" placeholder="Note ..." name="note">{{$meals->note}}</textarea>
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
                            </form>
                        </div>
                    </div>
                </div>
                {{-- row --}}
                {{-- start card --}}


                {{-- end card --}}




            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
