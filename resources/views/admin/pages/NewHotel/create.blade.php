@extends('admin.includes.master')
@section('title')
    New Hotel
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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-plus  mr-1"></i>New Hotel </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal needs-validation" novalidate
                                  action="{{ route('hotel.store') }}"
                                  method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="name" name="name"
                                                       id="name" required>
                                                {{-- valid --}}
                                                <label for="Name">Name </label>
                                                <div class="valid-feedback"> Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Name.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Email">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <input type="email" class="form-control" placeholder="Email"
                                                       name="email"
                                                       id="Email" required>
                                                {{-- valid --}}
                                                <label for="Email">Email </label>
                                                <div class="valid-feedback"> Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Name"><i class="fas fa-user"
                                                                                             for="Name"></i></span>
                                                <select required class="form-control" id="arname" name="category">
                                                    <option value="1">&bigstar;</option>
                                                    <option value="2">&bigstar;&bigstar;</option>
                                                    <option value="3" selected>&bigstar;&bigstar;&bigstar;</option>
                                                    <option value="4">&bigstar;&bigstar;&bigstar; &bigstar;
                                                    </option>
                                                    <option value="5">&bigstar;&bigstar;&bigstar; &bigstar;
                                                        &bigstar;
                                                    </option>
                                                    <option value="6">&bigstar;&bigstar;&bigstar; &bigstar;
                                                        &bigstar;&bigstar;
                                                    </option>
                                                    <option value="7">&bigstar;&bigstar;&bigstar; &bigstar;
                                                        &bigstar;&bigstar;&bigstar;
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Address">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Address"
                                                       name="address" id="Address" required>
                                                {{-- valid --}}
                                                <label for="Address">Address </label>
                                                <div class="valid-feedback"> Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Address.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Address">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="number" class="form-control" id="vatnumber"
                                                       placeholder="Room number" name="room_no">
                                                {{-- valid --}}
                                                <label for="Address">Room Allocation </label>
                                                <div class="valid-feedback"> Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Room number.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="tel">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="number" class="form-control"
                                                       data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                                       data-mask="" placeholder="tel" inputmode="text" name="tel"
                                                       id="tel">
                                                {{-- valid --}}
                                                <label for="tel">tel </label>
                                                <div class="valid-feedback"> Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid tel.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="whatsapp">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="number" class="form-control"
                                                       data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                                       data-mask="" placeholder="whatsapp" inputmode="text"
                                                       name="whatsapp"
                                                       id="whatsapp">
                                                {{-- valid --}}
                                                <label for="number">whatsapp </label>
                                                <div class="valid-feedback"> Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid whatsapp.</div>
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
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
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
                                                        Name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Category
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Address
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Room
                                                        number
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Tel
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">Whatsapp
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"> E_mail
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">balance
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"> Operation
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($hotels as $key=>$hotel)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">
                                                            {{ $hotel->name }}
                                                        </td>
                                                        <td>{{ $hotel->category }}</td>
                                                        <td>{{ $hotel->address }}</td>
                                                        <td>{{ $hotel->room_no }}</td>
                                                        <td>{{ $hotel->tel }}</td>
                                                        <td>{{ $hotel->whatsapp }}</td>
                                                        <td>{{ $hotel->email }}</td>
                                                        <td>{{ $hotel->balance }}</td>
                                                        <td class="d-flex">
                                                            <button type="submit" class="btn btn-success mr-2 ">
                                                                <a href="{{ route('hotel.edit', $hotel->id) }}"
                                                                   class=" text-light">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </button>
                                                            <button type="buttom" class="btn  btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-danger{{$key}}">
                                                                <i class="fas fa-trash-alt ml-1"></i>
                                                            </button>
                                                            {{-- model delet --}}
                                                            <div class="modal fade" id="modal-danger{{$key}}">
                                                                <div class="modal-dialog">
                                                                    <div
                                                                            class="modal-content w-50 m-auto p-2">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title text-danger">Delete
                                                                                New Hotel
                                                                            </h4>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true"><i
                                                                                                class="fa-solid fa-xmark text-dark"></i></span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Are you shoure to delet Hotel
                                                                                &hellip;</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form method="POST"
                                                                                  action="{{ route('hotel.destroy', $hotel->id) }}">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                        class="btn btn-outline-danger">
                                                                                    <i
                                                                                            class="fa-solid fa-check"></i>
                                                                                </button>
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
            <!-- Modal delete-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title " id="exampleModalLabel"><i class="fas fa-bed mr-1"></i>Hotels
                                    Room
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

                {{-- validation --}}
                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function () {
                        'use strict';
                        window.addEventListener('load', function () {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function (form) {
                                form.addEventListener('submit', function (event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
