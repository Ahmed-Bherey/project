@extends('admin.includes.master')
@section('title')
    Visa steps
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

                <div class="row mt-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Visa journal </h3>
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
                                                        date
                                                    </th>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        agent name
                                                    </th>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        hotel name
                                                    </th>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        guest name
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        collect
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        pay
                                                    </th>

                                                    {{--<th class="sorting" tabindex="0" aria-controls="example1"--}}
                                                        {{--rowspan="1" colspan="1"--}}
                                                        {{--aria-label="Platform(s): activate to sort column ascending">--}}
                                                        {{--kind--}}
                                                    {{--</th>--}}
                                                    {{--<th class="sorting" tabindex="0" aria-controls="example1"--}}
                                                        {{--rowspan="1" colspan="1"--}}
                                                        {{--aria-label="Platform(s): activate to sort column ascending">--}}
                                                        {{--name--}}
                                                    {{--</th>--}}
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        note
                                                    </th>  <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        User
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Operation
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($moves as $key=>$move)
                                                    <tr>
                                                        <td>{{ $move->date }}</td>
                                                        <td>{{ $move->agents->name }}</td>

                                                        <td>{{ $move->hotels->name }}</td>
                                                        <td>{{ $move->guests->name }}</td>
                                                        <td>{{ $move->collect }}</td>
                                                        <td>{{ $move->pay }}</td>
                                                        {{--<td>{{ $move->kind }}</td>--}}
                                                        {{--<td>{{ $move->name }}</td>--}}
                                                        <td>{{ $move->note }}</td>
                                                        <td>{{ $move->users->name }}</td>

                                                        <td class="d-flex">
                                                            {{--<button type="submit" class="btn btn-success mr-2 ">--}}
                                                            {{--<a href="{{ route('banks.edit.index', $move->id) }}"><i--}}
                                                            {{--class="far fa-edit ml-1 text-light"--}}
                                                            {{--aria-hidden="true"></i></a>--}}
                                                            {{--</button>--}}
                                                            {{--<button type="buttom" class="btn  btn-danger"--}}
                                                            {{--data-toggle="modal"--}}
                                                            {{--data-target="#modal-danger{{$key}}">--}}
                                                            {{--<i class="fas fa-trash-alt ml-1"></i>--}}
                                                            {{--</button>--}}
                                                            {{-- model delet --}}
                                                            {{--<div class="modal fade" id="modal-danger{{$key}}">--}}
                                                            {{--<div class="modal-dialog">--}}
                                                            {{--<div class="modal-content w-50 m-auto p-2">--}}
                                                            {{--<div class="modal-header">--}}
                                                            {{--<h4 class="modal-title text-danger">Delete--}}
                                                            {{--bank--}}
                                                            {{--</h4>--}}
                                                            {{--<button type="button" class="close "--}}
                                                            {{--data-dismiss="modal"--}}
                                                            {{--aria-label="Close">--}}
                                                            {{--<span aria-hidden="true"><i--}}
                                                            {{--class="fa-solid fa-xmark text-dark"></i></span>--}}
                                                            {{--</button>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="modal-body">--}}
                                                            {{--<p>Are you sure to delete--}}
                                                            {{--&hellip;</p>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="modal-footer">--}}


                                                            {{--<a href="{{ route('banks.delete', $move->id) }}"--}}
                                                            {{--class="btn btn-outline-danger"><i--}}
                                                            {{--class="fa-solid fa-check"></i></a>--}}

                                                            {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<!-- /.modal-content -->--}}
                                                            {{--</div>--}}
                                                            {{--<!-- /.modal-dialog -->--}}
                                                            {{--</div>--}}
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
                {{-- end Modal delete --}}
                {{-- vaildation --}}


            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>
@endsection
