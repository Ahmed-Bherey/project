@extends('admin.includes.master')
@section('title')
    New Guest
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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-address-card mr-1"></i>New Guest </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('guest.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control input" for="Name" placeholder="Name"
                                                    name="name" required>
                                                {{-- invalid --}}
                                                <label for="Name">Name </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Name.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Nationality">
                                                    <i class="fa-solid fa-address-card"></i>
                                                </span>
                                                <input type="text" class="form-control input" id="Nationality"
                                                    placeholder="Nationality" name="nationality">
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
                                                    name="nid">
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
                                                    placeholder="birth_date" name="birth_date">
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
                                                    name="tel">
                                                {{-- invalid --}}
                                                <label for="Tel">Tel </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Tel.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Whatsapp">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </span>
                                                <input type="number" class="form-control input" id="Whatsapp"
                                                    placeholder="Whatsapp" name="whatsapp">
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
                                                    placeholder="Email" name="email">
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
                                    <button type="submit"
                                        class="btn btn-default bg-info float-right btn btn-success swalDefaultSuccess">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button type="submit"
                                        class="btn btn-default mr-3  bg-danger float-right  btn btn-danger swalDefaultError">
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
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Guest </h3>
                            </div>
                            {{-- row --}}
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
                                                           Nid
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            Name
                                                        </th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Nationality
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Birth Date
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Tel
                                                        </th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            E_mail
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Whatsapp
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            balance
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Operation
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($guests as$key=> $guest)
                                                        <tr>
                                                            <td>{{ $guest->nid }}</td>
                                                            <td>{{ $guest->name }}</td>
                                                            <td>{{ $guest->nationality }}</td>
                                                            <td>{{ $guest->birth_date }}</td>
                                                            <td>{{ $guest->tel }}</td>
                                                            <td>{{ $guest->whatsapp }}</td>
                                                            <td>{{ $guest->email }}</td>
                                                            <td>{{ $guest->balance }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn btn-success mr-2 ">
                                                                    <a href="{{ route('guest.edit', $guest->id) }}"
                                                                        class="text-white"><i class="far fa-edit ml-1"
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <button type="buttom" class="btn  btn-danger"
                                                                    data-toggle="modal" data-target="#modal-danger{{$key}}">
                                                                    <i class="fas fa-trash-alt ml-1"></i>
                                                                </button>
                                                                {{-- model delet --}}
                                                                <div class="modal fade" id="modal-danger{{$key}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content w-50 m-auto p-2">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title text-dark">Delete
                                                                                    Guest
                                                                                </h4>
                                                                                <button type="button"
                                                                                    class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"><i
                                                                                            class="fa-solid fa-xmark"></i></span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Hotel RoomAre you shoure to delet Guest
                                                                                    &hellip;</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <form method="post"
                                                                                    action="{{ route('guest.destroy', $guest->id) }}">
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
                                <h5 class="modal-title " id="exampleModalLabel"><i class="fas fa-user-plus mr-1"></i>New
                                    Agent </h5>
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



            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
