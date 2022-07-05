@extends('admin.includes.master')
@section('title')
    Meal Price
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
                                <h3 class="card-title"><i class="fas fa-hamburger  mr-1"></i>Meal Prices </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('mealprice.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        {{--  --}}
                                        <div class="row clearfix ps-3 pe-3">
                                            <div class="col-sm-6 mb-3 mt-2">
                                                <div class="form-floating input-group">
                                                    <span class="input-group-text" id="Hotel Name">
                                                        <i class="fa-solid fa-user"></i>
                                                    </span>
                                                    <select class="form-control input" placeholder="Hotel Name"
                                                        name="hotel_id">
                                                        <option value="">Search...</option>

                                                        @foreach ($hotels as $hotel)
                                                            <option value="{{ $hotel->id }}">{{ $hotel->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="floatingInput"> Hotel Name </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3 mt-2">
                                                <div class="form-floating input-group">
                                                    <span class="input-group-text" for="meal_name">
                                                        <i class="fa-solid fa-user"></i>
                                                    </span>
                                                    <select class="form-control input" placeholder="meal Name"
                                                        name="meal_id">
                                                        <option value="">Search... </option>

                                                        @foreach ($meals as $meal)
                                                            <option value="{{ $meal->id }}">{{ $meal->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- invalid --}}
                                                    <label for="Fax">Meal Name </label>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback"> Please provide a valid Meal Name.</div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="row clearfix ps-3 pe-3">
                                            <div class="col-sm-6 mb-3 mt-2">
                                                <div class="form-floating input-group">
                                                    <span class="input-group-text" for="from">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </span>
                                                    <input type="date" class="form-control input" placeholder="date from"
                                                        name="from" id="from" required value="<?= date('Y-m-d') ?>">
                                                    {{-- invalid --}}
                                                    <label for="from"> Date from </label>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback"> Please provide a valid Date from.</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3 mt-2">
                                                <div class="form-floating input-group">
                                                    <span class="input-group-text" for="to">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </span>
                                                    <input type="date" class="form-control input" placeholder="date from"
                                                        name="to" id="to" required>
                                                    {{-- invalid --}}
                                                    <label for="to"> date from </label>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback"> Please provide a valid date from.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix ps-3 pe-3">
                                            <div class="col-sm-6 mb-3 mt-2">
                                                <div class="form-floating input-group">
                                                    <span class="input-group-text" id="Price">
                                                        <i class="fa-solid fa-dollar-sign"></i>
                                                    </span>
                                                    <input type="number" class="form-control input" for="Price"
                                                        placeholder="Price" name="Price">
                                                    {{-- invalid --}}
                                                    <label for="Price">Price </label>
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
                                </div>
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
                                <h3 class="card-title"> Meal Prices</h3>
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
                                                            Hotel Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">Meal
                                                            Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">Date
                                                            range</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Price</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Operation</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($mealPrices as $key=>$mealPrice)
                                                        <tr>
                                                            <td>{{ $mealPrice->hotels->name }}</td>
                                                            <td>{{ $mealPrice->meals->name }}</td>
                                                            <td>{{ $mealPrice->date_range }}</td>
                                                            <td>{{ $mealPrice->price }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn btn-success mr-2 ">
                                                                    <a href="{{ route('mealprice.edit', $mealPrice->id) }}"
                                                                        class="text-white"><i class="far fa-edit ml-1"
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <button type="buttom" class="btn  btn-danger"
                                                                    data-toggle="modal" data-target="#modal-danger{{$key}}">
                                                                    <i class="fas fa-trash-alt ml-1"></i>
                                                                </button>
                                                                {{-- model delet --}}
                                                                <div class="modal fade" id="modal-danger{{$key}}">
                                                                    <div class="modal-dialog">
                                                                        <div
                                                                            class="modal-content  w-50 m-auto p-2">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Delete Mael Price
                                                                                </h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"><i
                                                                                            class="fa-solid fa-xmark text-dark"></i></span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Hotel RoomAre you shoure to delet Mael Price
                                                                                    &hellip;</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <form method="post"
                                                                                    action="{{ route('mealprice.destroy', $mealPrice->id) }}">
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
                <!-- Main content -->

                {{-- end card --}}
                {{-- Modal delete --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title " id="exampleModalLabel"><i class="fas fa-hamburger  mr-1"></i>Meal
                                    Prices</h5>
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
                {{-- end model --}}
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->

    </div>
@endsection
