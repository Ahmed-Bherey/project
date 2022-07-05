@extends('admin.includes.master')
@section('title')
    Edit Agent
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
                <div class="row ">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-plus mr-1"></i>New Agent </h3>
                            </div>
                            <div class="ps-3 pe-3">
                                <form class="form-horizontal" action="{{ route('newaAent.update' , $newAgents->id) }}"
                                      method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                                <span class="input-group-text" id="Name">
                                                     <i class="fa-solid fa-user"></i>
                                                    </span>
                                                <input type="text" class="form-control input" for="Name"
                                                       placeholder="Name"
                                                       value="{{$newAgents->name}}"
                                                       name="name" pattern="[a-zA-Z'-'\s']*">
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
                                                <input type="email" value="{{$newAgents->email}}"
                                                       class="form-control input" placeholder="Email" name="email"
                                                       id="Email">
                                                {{-- invalid --}}
                                                <label for="email">Email </label>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                <span class="input-group-text" id="Tel">
                                    <i class="fa-solid fa-phone"></i>
                                </span>
                                                <input type="number" class="form-control input" value="{{$newAgents->tel}}"
                                                       placeholder="text" name="tel" id="tel">
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
                                                       placeholder="Whatsapp"
                                                       name="Whatsapp" value="{{$newAgents->Whatsapp}}">
                                                {{-- invalid --}}
                                                <label for="Whatsapp">Whatsapp </label>
                                            </div>
                                        </div>

                                    </div>
                                    {{--  --}}
                                    <div class="row clearfix">
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                <span class="input-group-text" id="Address">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                </span>
                                                <input type="number" class="form-control input" for="Address"
                                                       placeholder="Address"
                                                       name="address" value="{{$newAgents->address}}">
                                                {{-- invalid --}}
                                                <label for="Address">Address </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mt-2">
                                            <div class="form-floating input-group">
                                <span class="input-group-text" id="Notes">
                                    <i class="fa-solid fa-file-pen"></i>
                                </span>
                                                <textarea class="form-control input" rows="1" for="Notes"
                                                          placeholder="Note ..."
                                                          name="note">{{$newAgents->address}}</textarea>
                                                <label for="Notes">Note ... </label>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- row --}}


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
