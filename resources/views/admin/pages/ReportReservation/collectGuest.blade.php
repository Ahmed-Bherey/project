@extends('admin.includes.master')
@section('title')
 collect Guest
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
                                <h3 class="card-title"><i class="fas fa-user-plus mr-1"></i>collect Guest  --- >  {{ str_pad($totals->id, 7, '0', STR_PAD_LEFT)}}   </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal needs-validation" novalidate
                                  action="{{ route('admin.collect.guest.reservation.show') }}" method="get">
                                <div class="card-body">
                                    {{--  --}}
                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Tel">
                                                    <i class="fa-solid fa-user"></i>
                                                </span>
                                                <input required class="form-control" value="{{$totals->guests->name}}" name="guestName"
                                                       autocomplete="off" size="1" id="hotel" readonly>

                                                <label for="Name">Guest </label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback"> Please provide a valid Name.</div>
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
                                                        id="kindPush_id">

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
                                                    <i class="fa-solid fa-ticket"></i>
                                                </span>
                                                <input type="number"  class="form-control"
                                                       name="balance"  required>
                                                {{-- invalid --}}
                                                <label for="Tel">balance </label>
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

        </section>
        <!-- /.content -->
    </div>
@endsection
