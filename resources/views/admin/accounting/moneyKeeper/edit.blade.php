@extends('admin.includes.master')
@section('title')
    Edit MoneyKeeper
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
                <div class="row ">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-plus mr-1"></i>Edit MoneyKeeper </h3>
                            </div>
                            <div class="ps-3 pe-3">
                                <form class="form-horizontal" action="{{ route('moneyKeepers.edit.update', $moneyKeeper->id) }}"
                                      method="post">
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
                                                           name="name"  value="{{$moneyKeeper->name}}">
                                                    {{-- invalid --}}
                                                    <label for="Name">Name </label>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback"> Please provide a valid Name.</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3 mt-2">
                                                <div class="form-floating input-group">

                                                    <input type="checkbox" value="1"
                                                           name="kind" @if($moneyKeeper->kind == 1) checked @endif  >
                                                    {{-- invalid --}}
                                                    <label for="Activation">Activation </label>
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
                                                           name="balance" value="{{$moneyKeeper->balance}}" >
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
                                                    <input type="text" value="{{$moneyKeeper->note}}"  class="form-control input" id="Name"
                                                           name="note">
                                                    {{-- invalid --}}
                                                    <label for="Whatsapp">Notes </label>
                                                </div>
                                            </div>

                                        </div>
                                        {{--  --}}

                                    </div>




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
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
