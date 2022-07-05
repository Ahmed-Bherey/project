@extends('admin.includes.master')
@section('title')
    Edit Meal Price
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
                @include('admin.layouts.alerts.success')
                @include('admin.layouts.alerts.errors')
                <form class="form-horizontal" action="{{ route('mealprice.update', $mealPrices->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row ">
                        <div class="ps-3 pe-3">
                            <div class="row clearfix ps-3 pe-3">
                                <div class="col-sm-6 mb-3 mt-2">
                                    <div class="form-floating input-group">
                                        <span class="input-group-text" id="Hotel Name">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <select class="form-control input" placeholder="Hotel Name" name="hotel_id">
                                            @foreach ($hotels as $hotel)
                                                <option value="{{ $hotel->id }}"
                                                    @if ($mealPrices->id == $hotel->id) selected @endif>{{ $hotel->name }}
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
                                        <select class="form-control input" name="meal_id">
                                            @foreach ($meals as $meal)
                                                <option value="{{ $meal->id }}"
                                                    @if ($mealPrices->meal_id == $meal->id) selected @endif>{{ $meal->name }}
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
                                        <input type="date" class="form-control input" placeholder="date from" name="from"
                                            id="from" required value="<?= date('Y-m-d') ?>">
                                        {{-- invalid --}}
                                        <label for="from"> date from </label>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback"> Please provide a valid date from.</div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3 mt-2">
                                    <div class="form-floating input-group">
                                        <span class="input-group-text" for="to">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                        <input type="date" class="form-control input" placeholder="date from" name="to"
                                            id="to" required>
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
                                        <input type="number" class="form-control input" for="Price" placeholder="Price"
                                            name="Price">
                                        {{-- invalid --}}
                                        <label for="Price">Price </label>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal delete --}}
                            <div class="card-footer">
                                <button type="submit" class="btn btn-default bg-info float-right"><i
                                        class="fa fa-check text-light" aria-hidden="true"></i></button>
                                <button type="submit" class="btn btn-default mr-3  bg-danger float-right"><i
                                        class="fa fa-times text-light  " aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-footer -->
                </form>

            </div>
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
            {{-- end model --}}

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
