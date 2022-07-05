@extends('admin.includes.master')
@section('content')
    <div class="content-wrapper " style="height: 100%">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                {{-- row --}}
                <div class="row ">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"> <i class="fas fa-user mr-1"></i> Adults </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal needs-validation" novalidate
                                action="{{ route('guest-reservation-adult.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Name"><i class="fas fa-user"
                                                        for="Name"></i></span>

                                                <select req class="form-control" name="guest_reservation_id">
                                                    <option value="">Select Guest Reservation</option>
                                                    @foreach ($guestReservations as $guestReservation)
                                                        <option value="{{ $guestReservation->id }}">
                                                            {{ $guestReservation->guests->frist_name }}
                                                            {{ $guestReservation->guests->middle_name }}
                                                            {{ $guestReservation->guests->last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="floatingInput">- Guest Reservation -</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Name">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input type="text" class="form-control input" id="Name" name="name"
                                                    placeholder="Namen" required />
                                                {{-- invalid --}}
                                                <label for="Name">Name </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Nationality">
                                                    <i class="fa-solid fa-id-card"></i>
                                                </span>
                                                <input type="text" class="form-control input" id="Nationality"
                                                    placeholder="Nationality" name="nationality" required />
                                                {{-- invalid --}}
                                                <label for="Nationality">Nationality</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="id">
                                                    <i class="fa-solid fa-id-card"></i>
                                                </span>
                                                <input type="number" class="form-control input" id="id" placeholder="id" />
                                                {{-- invalid --}}
                                                <label for="id">id </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Email">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <input type="email" class="form-control input" id="Email"
                                                    placeholder="Email" name="email" required />
                                                {{-- invalid --}}
                                                <label for="Email">Email</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="birth date">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                                <input type="date" class="form-control input" id="birth date"
                                                    placeholder="birth date" name="to" required />
                                                {{-- invalid --}}
                                                <label for="birth date">birth date</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Tel">
                                                    <i class="fa-solid fa-phone"></i>
                                                </span>
                                                <input type="text" class="form-control input" id="Tel" name="Tel"
                                                    placeholder="Tel" pattern="[0-9]{11,11}" maxlength="11"
                                                    minlength="11" />
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
                                                    name="whatsapp" placeholder="Whatsapp" />
                                                {{-- invalid --}}
                                                <label for="Whatsapp">Whatsapp </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid email.</div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class=" col-sm-12 col-md-12 col-lg-12  col-xl-6">
                                            <div class="form-group row">
                                                <label for="Guest Reservation"
                                                    class="col-sm-3 col-lg-4 col-form-label">Guest Reservation</label>
                                                <div class="col-sm-9 col-lg-8">

                                                    <select req class="form-control" name="guest_reservation_id">
                                                    <option value="">Select Guest Reservation</option>
                                                    @foreach ($guestReservations as $guestReservation)
                                                    <option value="{{ $guestReservation->id }}">
                                                        {{ $guestReservation->guests->frist_name }}
                                                        {{ $guestReservation->guests->middle_name }}
                                                        {{ $guestReservation->guests->last_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Nid" class="col-sm-3 col-lg-4 col-form-label">id</label>
                                                <div class="col-sm-9 col-lg-8">
                                                    <input type="number" class="form-control" id="Nid" placeholder=""
                                                        name="nid">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="to" class="col-sm-3 col-lg-4 col-form-label">birth date</label>
                                                <div class="col-sm-9 col-lg-8">
                                                    <input type="date" data-provide="datepicker" data-date-autoclose="true"
                                                        class="form-control" name="to" id="to" placeholder="Date of Birth"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tel" class="col-sm-3 col-lg-4 col-form-label">Tel</label>
                                                <div class="col-sm-9 col-lg-8">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" inputmode="text"
                                                            name="tel" pattern="[0-9]{11,11}" maxlength="11" minlength="11">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-group row">
                                                <label for="FirstName" class="col-sm-3 col-lg-4 col-form-label">Name</label>
                                                <div class="col-sm-9 col-lg-8">
                                                    <input type="text" class="form-control" id="FirstName" placeholder=""
                                                        pattern="[a-zA-Z'-'\s']*" name="f_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Nationality"
                                                    class="col-sm-3  col-lg-4 col-form-label">Nationality </label>
                                                <div class="col-sm-9 col-lg-8">
                                                    <input type="number" class="form-control" id="Nationality"
                                                        placeholder="" name="nationality">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-lg-4 col-form-label">Email</label>
                                                <div class="col-sm-9 col-lg-8">
                                                    <input type="email" class="form-control" placeholder="" name="email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Whatsapp"
                                                    class="col-sm-3 col-lg-4 col-form-label">Whatsapp</label>
                                                <div class="col-sm-9 col-lg-8">
                                                    <div class="input-group ">
                                                        <input type="number" class="form-control" id="Whatsapp"
                                                            placeholder="" name="whatsapp">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div> --}}

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-default bg-info float-right"><i
                                            class="fa fa-check text-light" aria-hidden="true"></i></button>
                                    <button type="reset" class="btn btn-default mr-3  bg-danger float-right"><i
                                            class="fa fa-times text-light  " aria-hidden="true"></i></button>
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
                                <h3 class="card-title">Adults</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row mt-2">
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
                                                            Guest Reservation
                                                        </th>
                                                        <th class="sorting sorting_asc" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Rendering engine: activate to sort column descending">
                                                            id
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            Name</th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Nationality
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Birth Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Tel
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Email
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Whatsapp
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Operation</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($adults as $adult)
                                                        <tr>
                                                            <td>
                                                                {{ $adult->guestReservations->guests->frist_name }}
                                                                {{ $adult->guestReservations->guests->middle_name }}
                                                                {{ $adult->guestReservations->guests->last_name }}
                                                            </td>
                                                            <td>{{ $adult->id }}</td>
                                                            <td>{{ $adult->name }}</td>
                                                            <td>{{ $adult->nationality }}</td>
                                                            <td>{{ $adult->birth_date }}</td>
                                                            <td>{{ $adult->tel }}</td>
                                                            <td>{{ $adult->whatsapp }}</td>
                                                            <td>{{ $adult->email }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn btn-success mr-2 ">
                                                                    <a href="{{ route('guest-reservation-adult.edit', $adult->id) }}"
                                                                        class="text-white"><i class="far fa-edit ml-1"
                                                                            aria-hidden="true"></i></a>
                                                                </button>
<<<<<<< HEAD
                                                                <form method="post"
                                                                    action="{{ route('guest-reservation-adult.destroy', $adult->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn  btn-danger"><i
                                                                            class="fas fa-trash-alt ml-1"></i> </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach

=======
                                                                <button type="buttom" class="btn  btn-danger"
                                                                    data-toggle="modal" data-target="#modal-danger">
                                                                    <i class="fas fa-trash-alt ml-1"></i>
                                                                </button>
                                                                {{-- model delet --}}
                                                                <div class="modal fade" id="modal-danger">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content w-50 m-auto p-2">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title text-danger">Delete Adult
                                                                                </h4>
                                                                                <button type="button"
                                                                                    class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"><i
                                                                                            class="fa-solid fa-xmark text-dark"></i></span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Hotel RoomAre you shoure to delet Adult
                                                                                    &hellip;</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <form method="post"
                                                                                    action="{{ route('guest-reservation-adult.destroy', $adult->id) }}">
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
>>>>>>> 606dce4308ae7802dcdf282a97ecef39054093e3
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
                                <h5 class="modal-title " id="exampleModalLabel"><i class="fas fa-user mr-1"></i>
                                    Adults </h5>
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
                                <button type="button" class="btn btn-primary"><i class="fas fa-check"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end Modal delete --}}
                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
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
