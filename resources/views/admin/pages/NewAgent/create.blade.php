@extends('admin.includes.master')
@section('title')
    New Agent
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
                                <h3 class="card-title"><i class="fas fa-user-plus mr-1"></i>New Agent </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal needs-validation" novalidate
                                action="{{ route('newaAent.store') }}" method="post">
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
                                                    @isset($compSetts) value="{{ $compSetts->name }}" @endisset
                                                    name="name" pattern="[a-zA-Z'-'\s']*" required>
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
                                                <input type="email" class="form-control input" placeholder="Email"
                                                    name="email" id="Email" >
                                                {{-- invalid --}}
                                                <label for="email">Email </label>
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
                                                <input type="number" class="form-control input" placeholder="text"
                                                    name="tel" id="tel" >
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
                                                <input type="number" class="form-control input" id="Name"
                                                    placeholder="Whatsapp" name="whatsapp">
                                                {{-- invalid --}}
                                                <label for="Whatsapp">Whatsapp </label>
                                            </div>
                                        </div>

                                    </div>
                                    {{--  --}}
                                    <div class="row clearfix ps-3 pe-3">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Address">
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </span>
                                                <input type="text" class="form-control input" for="Address"
                                                    placeholder="Address" name="address">
                                                {{-- invalid --}}
                                                <label for="Address">Address </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Notes">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </span>
                                                <textarea class="form-control input" rows="1" for="Notes" placeholder="Note ..." name="note"></textarea>
                                                <label for="Notes">Note ... </label>
                                            </div>
                                        </div>
                                    </div>
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
                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Agent </h3>
                            </div>
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
                                                            Name </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">Tel</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Address</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            E_mail</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Whatsapp</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            balance</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Notes</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Operation</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($newAgents as $key=>$Agent)
                                                        <tr>
                                                            <td>{{ $Agent->name }}</td>
                                                            <td>{{ $Agent->tel }}</td>
                                                            <td>{{ $Agent->address }}</td>
                                                            <td>{{ $Agent->email }}</td>
                                                            <td>{{ $Agent->whatsapp }}</td>
                                                            <td>{{ $Agent->balance }}</td>
                                                            <td>{{ $Agent->note }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn btn-success mr-2 ">
                                                                    <a href="{{ route('newaAent.edit', $Agent->id) }}"><i
                                                                            class="far fa-edit ml-1 text-light"
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
                                                                                <h4 class="modal-title text-danger">Delete
                                                                                    Agent
                                                                                </h4>
                                                                                <button type="button" class="close "
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"><i
                                                                                            class="fa-solid fa-xmark text-dark"></i></span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Are you shoure to delet Agent
                                                                                    &hellip;</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <form method="post"
                                                                                    action="{{ route('newaAent.destroy', $Agent->id) }}">
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
                                Are you sure to delete?</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fas fa-times"></i></button>
                                <button type="button" class="btn btn-primary"><i class="fas fa-check"></i> </button>
                            </div>
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
