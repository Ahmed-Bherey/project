@extends('admin.includes.master')
@section('title')
New money keeper
@endsection
@section('content')
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
                            <h3 class="card-title"><i class="fas fa-user-plus mr-1"></i>New treasury </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal needs-validation" novalidate
                            action="{{ route('moneyKeepers.create.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                {{--  --}}
                                <div class="row clearfix ps-3 pe-3">
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
                                            <span class="input-group-text" for="Email">
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                            <input type="number" class="form-control input" placeholder="number"
                                                name="number" id="Email">
                                            {{-- invalid --}}
                                            <label for="email">Number </label>
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
                                                name="balance" id="tel">
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
                                            <input type="text" class="form-control input" id="Name" name="note">
                                            {{-- invalid --}}
                                            <label for="Whatsapp">Notes </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3 mt-2">
                                        <div class="">

                                            <input type="checkbox" value="1" name="kind" checked>
                                            {{-- invalid --}}
                                            <label for="Activation">Activation </label>
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
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Name </th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            number</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            balance</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            activation</th>

                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            Operation</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($moneyKeepers as $key=>$moneyKeeper)
                                    <tr @if($moneyKeeper->kind == 0) style="background: darksalmon" @endif>
                                        <td>{{ $moneyKeeper->name }}</td>
                                        <td>{{ $moneyKeeper->number }}</td>
                                        <td>{{ $moneyKeeper->balance }}</td>
                                        <td>@if($moneyKeeper->kind == 0) x @else ✔@endif</td>
                                        <td class="d-flex">
                                            <button type="submit" class="btn btn-success mr-2 ">
                                                <a href="{{ route('moneyKeepers.edit.index', $moneyKeeper->id) }}"><i
                                                        class="far fa-edit ml-1 text-light" aria-hidden="true"></i></a>
                                            </button>
                                            <button type="buttom" class="btn  btn-danger" data-toggle="modal"
                                                data-target="#modal-danger{{$key}}">
                                                <i class="fas fa-trash-alt ml-1"></i>
                                            </button>
                                            {{-- model delet --}}
                                            <div class="modal fade" id="modal-danger{{$key}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content w-50 m-auto p-2">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-danger">Delete
                                                                moneyKeeper
                                                            </h4>
                                                            <button type="button" class="close " data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true"><i
                                                                        class="fa-solid fa-xmark text-dark"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete
                                                                &hellip;</p>
                                                        </div>
                                                        <div class="modal-footer">


                                                            <a href="{{ route('moneyKeepers.delete', $moneyKeeper->id) }}"
                                                                class="btn btn-outline-danger"><i
                                                                    class="fa-solid fa-check"></i></a>

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
        {{-- end Modal delete --}}
        {{-- vaildation --}}
        <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
        </script>




</div><!-- /.container-fluid -->

</section>
<!-- /.content -->
</div>
@endsection