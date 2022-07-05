@extends('admin.includes.master')
@section('title')
    Hotel Contract
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

                <div class="row mt-2">
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-hands-helping text-light mr-1"></i>Hotel Contract
                                </h3>
                            </div>
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
                                                                Hotel Name
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Browser: activate to sort column ascending">
                                                                Rooms
                                                                Type
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Platform(s): activate to sort column ascending">
                                                                Date
                                                                Range
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Platform(s): activate to sort column ascending">
                                                                Date
                                                                Room category
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Platform(s): activate to sort column ascending">
                                                                Rate
                                                            </th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Platform(s): activate to sort column ascending">
                                                                Operation
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($hotelContracts as $hotelContract)
                                                            <tr>
                                                                <td>{{ $hotelContract->hotels->name }}</td>
                                                                <td>{{ $hotelContract->RoomTypes->type }}</td>
                                                                <td>{{ $hotelContract->roomCategors->name }}</td>
                                                                <td>{{ $hotelContract->date }}</td>
                                                                <td>{{ $hotelContract->rate }}</td>
                                                                <td class="d-flex">
                                                                    <button type="submit" class="btn btn-success mr-2 ">
                                                                        <a href="{{ route('hotel-contract.edit', $hotelContract->id) }}"
                                                                            class="text-white"><i
                                                                                class="far fa-edit ml-1"
                                                                                aria-hidden="true"></i></a>

                                                                    </button>
                                                                    <form method="post"
                                                                        action="{{ route('hotel-contract.delete', $hotelContract->id) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn  btn-danger"><i
                                                                                class="fas fa-trash-alt ml-1"></i></button>
                                                                    </form>
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


                            end card

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title " id="exampleModalLabel"><i
                                                    class="fas fa-hands-helping text-light mr-1"></i>Hotel Contract
                                            </h5>
                                            <button type="button" class="close text-light" data-dismiss="modal"
                                                aria-label="Close">
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
                                            <button type="button" class="btn btn-primary"><i class="fas fa-check"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.container-fluid -->
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
