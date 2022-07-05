@extends('admin.includes.master')
@section('title')
    Edit Guest
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
            <div class="container-fluid ">
                {{-- row --}}
                <div class="row ">
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-10">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-address-card mr-1"></i>Edit Guest </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('guest.update', $guests->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="ps-3 pe-3">
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control input" for="Name" placeholder="Name"
                                                    name="name" value="{{ $guests->name }}">
                                                {{-- invalid --}}
                                                <label for="Name">Name </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Nationality">
                                                    <i class="fa-solid fa-address-card"></i>
                                                </span>
                                                <input type="text" class="form-control input" id="Nationality"
                                                    placeholder="Nationality" name="nationality"  value="{{ $guests->nationality }}">
                                                {{-- invalid --}}
                                                <label for="Nationality">Nationality </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Nationality.</div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="id">
                                                    <i class="fa-solid fa-address-card"></i>
                                                </span>
                                                <input type="number" class="form-control input" id="id" placeholder="id"
                                                    name="nid" value="{{ $guests->nid }}">
                                                {{-- invalid --}}
                                                <label for="id">id </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid id.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="birth_date">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                                <input type="date" class="form-control input" id="birth_date"
                                                    placeholder="birth_date" name="birth_date" value="{{ $guests->birth_date }}">
                                                {{-- invalid --}}
                                                <label for="birth_date">birth_date </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid birth_date.</div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Tel">
                                                    <i class="fa-solid fa-phone"></i>
                                                </span>
                                                <input type="number" class="form-control input" id="Tel" placeholder="Tel"
                                                    name="tel" value="{{ $guests->tel }}">
                                                {{-- invalid --}}
                                                <label for="Tel">Tel </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Whatsapp">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </span>
                                                <input type="number" class="form-control input" id="Whatsapp"
                                                    placeholder="Whatsapp" name="whatsapp" value="{{ $guests->whatsapp }}">
                                                {{-- invalid --}}
                                                <label for="Whatsapp">Whatsapp </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Whatsapp.</div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Email">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <input type="email" class="form-control input" id="Email"
                                                    placeholder="Email" name="email" value="{{ $guests->email }}">
                                                {{-- invalid --}}
                                                <label for="id">Email </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-default bg-info float-right btn btn-success swalDefaultSuccess">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button type="submit" class="btn btn-default mr-3  bg-danger float-right  btn btn-danger swalDefaultError">
                                        <i class="fa fa-times text-light  " aria-hidden="true"></i>
                                    </button>
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
