@extends('admin.includes.master')
@section('content')
    <div class="content-wrapper " style="height: 100%">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- row --}}
                <div class="row ">
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-10">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"> <i class="fas fa-user mr-1"></i> Adults </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal needs-validation" novalidate
                                action="{{ route('guest-reservation-adult.update', $adults->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row clearfix ps-3 pe-3">
                                    <div class="col-sm-6 mb-3 mt-2">
                                        <div class="form-floating input-group">
                                            <span class="input-group-text" for="Name"><i class="fas fa-user"
                                                    for="Name"></i></span>

                                            <select req class="form-control" name="guest_reservation_id">
                                                <option value="">Select Guest Reservation</option>
                                                @foreach ($guestReservations as $guestReservation)
<<<<<<< HEAD
                                                    <option value="{{ $guestReservation->id }}"
                                                        @if ($adults->guest_reservation_id == $guestReservation->id) selected @endif>
=======
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
                                            <input type="email" class="form-control input" id="Email" placeholder="Email"
                                                name="email" required />
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
                                            <input type="number" class="form-control input" id="Tel" name="Tel"
                                                placeholder="Tel" pattern="[0-9]{11,11}" maxlength="11" minlength="11" />
                                            {{-- invalid --}}
                                            <label for="Tel">Tel </label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback"> Please provide a valid tel.</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3 mt-2">
                                        <div class="form-floating input-group">
                                            <span class="input-group-text" for="Whatsapp">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </span>
                                            <input type="number" class="form-control input" id="Whatsapp" name="whatsapp"
                                                placeholder="Whatsapp" />
                                            {{-- invalid --}}
                                            <label for="Whatsapp">Whatsapp </label>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback"> Please provide a valid email.</div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Nid" class="col-sm-12 col-12 col-md-2 col-form-label">Guest Reservation</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <select required class="form-control" name="guest_reservation_id">
                                                <option value="">Select Guest Reservation</option>
                                                @foreach ($guestReservations as $guestReservation)
                                                    <option value="{{ $guestReservation->id }}" @if ($adults->guest_reservation_id == $guestReservation->id)selected @endif>
>>>>>>> 606dce4308ae7802dcdf282a97ecef39054093e3
                                                        {{ $guestReservation->guests->frist_name }}
                                                        {{ $guestReservation->guests->middle_name }}
                                                        {{ $guestReservation->guests->last_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
<<<<<<< HEAD
                                        <label for="Nid" class="col-sm-2 col-form-label">N_id</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="Nid" value="{{ $adults->nid }}"
                                                placeholder="" name="nid">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="FirstName" class="col-sm-2 col-form-label">First_Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="FirstName"
                                                value="{{ $adults->frist_name }}" placeholder="" pattern="[a-zA-Z'-'\s']*"
                                                name="f_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="MiddleName" class="col-sm-2 col-form-label"> Middle_Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="MiddleName"
                                                value="{{ $adults->middle_name }}" placeholder="" pattern="[a-zA-Z'-'\s']*"
                                                name="m_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="LastName" class="col-sm-2 col-form-label">Last_Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="LastName"
                                                value="{{ $adults->last_name }}" placeholder="" pattern="[a-zA-Z'-'\s']*"
                                                name="l_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Nationality" class="col-sm-2 col-form-label">Nationality </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="Nationality"
                                                value="{{ $adults->nationality }}" placeholder="" name="nationality">
=======
                                        <label for="Nid" class="col-sm-12 col-12 col-md-2 col-form-label">N_id</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <input type="number" class="form-control" id="Nid" value="{{$adults->nid}}" placeholder="" name="nid">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="FirstName" class="col-sm-12 col-12 col-md-2 col-form-label">First_Name</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <input type="text" class="form-control" id="FirstName" value="{{$adults->frist_name}}" placeholder=""
                                                pattern="[a-zA-Z'-'\s']*" name="f_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="MiddleName" class="col-sm-12 col-12 col-md-2 col-form-label"> Middle_Name</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <input type="text" class="form-control" id="MiddleName" value="{{$adults->middle_name}}" placeholder=""
                                                pattern="[a-zA-Z'-'\s']*" name="m_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="LastName" class="col-sm-12 col-12 col-md-2 col-form-label">Last_Name</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <input type="text" class="form-control" id="LastName" value="{{$adults->last_name}}" placeholder=""
                                                pattern="[a-zA-Z'-'\s']*" name="l_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Nationality" class="col-sm-12 col-12 col-md-2 col-form-label">Nationality </label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <input type="text" class="form-control" id="Nationality" value="{{$adults->nationality}}" placeholder=""
                                                name="nationality">
>>>>>>> 606dce4308ae7802dcdf282a97ecef39054093e3
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-12 col-12 col-md-2 col-form-label">Birth Date </label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    value="{{ $adults->birth_date }}" data-target="#reservationdate"
                                                    name="date">
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tel" class="col-sm-12 col-12 col-md-2 col-form-label">Tel</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ $adults->tel }}"
                                                    inputmode="text" name="tel">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-12 col-12 col-md-2 col-form-label">E_mail</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <div class="input-group ">

                                                <input type="email" class="form-control" value="{{ $adults->email }}"
                                                    placeholder="" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Whatsapp" class="col-sm-12 col-12 col-md-2 col-form-label">Whatsapp</label>
                                        <div class="col-sm-12 col-12 col-md-10">
                                            <div class="input-group ">
                                                <input type="number" class="form-control" value="{{ $adults->whatsapp }}"
                                                    id="Whatsapp" placeholder="" name="whatsapp">
                                            </div>
                                        </div>
                                    </div>

                                </div> --}}
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
