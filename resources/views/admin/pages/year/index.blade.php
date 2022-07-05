@extends('admin.includes.master')
@section('title')
    Reservation Date
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
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-hands-helping text-light mr-1"></i>
                                    Acive Year

                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('Years.index.update') }}"
                                  method="get">

                                <div class="card-body">
                                    @foreach($years as  $key=>$year)
                                        <div class="row clearfix">
                                            <div class="col-sm-6 mb-3 mt-3">
                                                <div class="form-floating input-group">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="{{$year->name}}"  @if($year->active == 1) checked @endif  name="data[active][]" id="{{$key+1}}">

                                                    </div>

                                                    <input type="text" readonly class="form-control" id="{{$key+1}}"
                                                           name="data[name][]" value="{{$year->name}}"
                                                           required>
                                                    {{-- valid --}}


                                                </div>
                                            </div>
                                            @endforeach
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


            {{-- end card --}}

            <!-- Modal -->


            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>

@endsection
