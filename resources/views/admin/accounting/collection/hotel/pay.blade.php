@extends('admin.includes.master')
@section('title')
    Hotel Pay
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
                                <h3 class="card-title"><i class="fas fa-user-plus mr-1"></i>Hotel Pay </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal needs-validation" novalidate
                                  action="{{ route('hotel.collection.pay') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    {{--  --}}
                                    <div class="row clearfix ps-3 pe-3">

                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Email">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <input type="date" value="<?= date('Y-m-d') ?>" required class="form-control" name="date" id="meal">

                                                <label for="Name">Date</label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <input required class="form-control" name="hotelName" list="agent_ids"
                                                       autocomplete="off" size="1" id="guest" placeholder="guest name ..."
                                                >
                                                <datalist id="agent_ids" size="10">
                                                    @foreach ($hotels as $hotel)
                                                        <option value="{{ $hotel->name }}">
                                                    @endforeach
                                                </datalist>
                                                <label for="Name">Hotel </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Name.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Email">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <select  required class="form-control" name="total_id" id="total_id" >
                                                </select>
                                                <label for="Name">reservation</label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <select required class="form-control" name="kindPush" id="meal">
                                                    <option value=""> choose</option>
                                                    <option value="1">bank</option>
                                                    <option value="2">Money Keeper</option>
                                                </select>
                                                <label for="Name">kind Push</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Name.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Email">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <select required class="form-control" name="kindPush_id"
                                                        id="kindPush_id" >

                                                </select>
                                                {{-- invalid --}}
                                                <label for="email">Bank / Money Keeper </label>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Tel">
                                                    <i class="fa-solid fa-phone"></i>
                                                </span>
                                                <input type="number" class="form-control input" placeholder="balance"
                                                       name="balance" step="0.01" id="tel">
                                                {{-- invalid --}}
                                                <label for="Tel">balance </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Tel.</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" for="Whatsapp">
                                                    <i class="fa-brands fa-whatsapp"></i>
                                                </span>
                                                <input type="text"  class="form-control input" id="Name"
                                                       name="note">
                                                {{-- invalid --}}
                                                <label for="Whatsapp">Notes </label>
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
            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function () {
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.prototype.slice.call(forms)
                        .forEach(function (form) {
                            form.addEventListener('submit', function (event) {
                                if (!form.checkValidity()) {
                                    event.preventDefault()
                                    event.stopPropagation()
                                }

                                form.classList.add('was-validated')
                            }, false)
                        })
                })()
            </script>


            <script type="text/javascript">
                $(document).ready(function () {
                    $('select[name="kindPush"]').on('change', function () {
                        var stateID = $(this).val();
                        var csrf = $('meta[name="csrf-token"]').attr('content');

                        var route = '{{ route('admin.show.kindPush.hotel', ['id' => ':id']) }}';
                        route = route.replace(':id', stateID);
                        if (stateID) {
                            $.ajax({
                                beforeSend: function (x) {
                                    return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                                },
                                url: route,
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    $('#kindPush_id').empty();
                                    $.each(data, function (key, value) {
                                        $('#kindPush_id').append($('<option>', {
                                            value: value.id,
                                            text: value.name
                                        }));
                                    });
                                    $('#kindPush_id').trigger('change');

                                }
                            });
                        } else {
                            $('select[name="kind_id"]').empty();
                        }
                    });
                });
            </script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('input[name="hotelName"]').on('change', function () {
                        var stateID = $(this).val();
                        var csrf = $('meta[name="csrf-token"]').attr('content');

                        var route = '{{ route('admin.show.hotel.reservation', ['id' => ':id']) }}';
                        route = route.replace(':id', stateID);
                        if (stateID) {
                            $.ajax({
                                beforeSend: function (x) {
                                    return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                                },
                                url: route,
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    $('#total_id').empty();
                                    $.each(data, function (key, value) {
                                        $('#total_id').append($('<option>', {
                                            value: value.id,
                                            text: value.id
                                        }));
                                    });
                                    $('#total_id').trigger('change');

                                }
                            });
                        } else {
                            $('select[name="total_id"]').empty();
                        }
                    });
                });
            </script>

        </section>
        <!-- /.content -->
    </div>
@endsection
