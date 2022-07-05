@extends('admin.includes.master')
@section('title')
    Guest Reservation
@endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    @include('admin.layouts.alerts.success')
    @include('admin.layouts.alerts.errors')
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- row --}}
                <div class="row ">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-plus mr-1"></i>Guest Reservation </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal needs-validation" novalidate
                                  action="{{ route('admin.report.guest.reservation.hotel.show') }}" method="get">
                                <div class="card-body">
                                    {{--  --}}
                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Tel">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input required class="form-control" name="guest" list="agent_ids"
                                                       autocomplete="off" size="1" id="guest" placeholder="guest name ..."  >

                                                <datalist id="agent_ids" size="10">
                                                    @foreach ($guests as $guest)
                                                        <option value="{{ $guest->name }}">
                                                    @endforeach
                                                </datalist>
                                                <label for="Name">Guest </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Name.</div>
                                            </div>
                                        </div>

                                    </div>

                                    {{--  --}}
                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Tel">
                                                    <i class="fa-solid fa-ticket"></i>
                                                </span>
                                                <input type="date" value="<?= date('Y-m-d') ?>" class="form-control input"
                                                       name="from" id="tel" required>
                                                {{-- invalid --}}
                                                <label for="Tel">From </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Tel.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Tel">
                                                    <i class="fa-solid fa-ticket"></i>
                                                </span>
                                                <input type="date" class="form-control input"
                                                       name="to"  id="tel" required>
                                                {{-- invalid --}}
                                                <label for="Tel">To </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Tel.</div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-default bg-info float-right"><i
                                                class="fa fa-check text-light" aria-hidden="true"></i></button>
                                    <button type="submit" class="btn btn-default mr-3  bg-danger float-right"><i
                                                class="fa fa-times text-light  " aria-hidden="true"></i></button>
                                </div>
                                <!-- /.card-footer -->
                            </form>

                        </div>
                    </div>
                </div>
                {{-- row --}}
                {{-- start card --}}

            </div>
            {{-- end Modal delete --}}
            {{-- vaildation --}}
            {{--<script>--}}
                {{--// Example starter JavaScript for disabling form submissions if there are invalid fields--}}
                {{--(function () {--}}
                    {{--'use strict'--}}

                    {{--// Fetch all the forms we want to apply custom Bootstrap validation styles to--}}
                    {{--var forms = document.querySelectorAll('.needs-validation')--}}

                    {{--// Loop over them and prevent submission--}}
                    {{--Array.prototype.slice.call(forms)--}}
                        {{--.forEach(function (form) {--}}
                            {{--form.addEventListener('submit', function (event) {--}}
                                {{--if (!form.checkValidity()) {--}}
                                    {{--event.preventDefault()--}}
                                    {{--event.stopPropagation()--}}
                                {{--}--}}

                                {{--form.classList.add('was-validated')--}}
                            {{--}, false)--}}
                        {{--})--}}
                {{--})()--}}
            {{--</script>--}}





        </section>
        <!-- /.content -->
    </div>
@endsection
