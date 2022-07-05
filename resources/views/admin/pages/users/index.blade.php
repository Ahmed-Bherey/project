@extends('admin.includes.master')
@section('title')
    Users
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
                    <div class="col-sm-12 col-lg-10">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-igloo mr-1"></i>Users Management </h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right justify-content-end d-flex mt-3 mb-3 me-3">
                                        <a class="btn btn-success" href="{{ route('users.create') }}">
                                            <i class="fa-solid fa-user-plus"></i></a>
                                    </div>
                                </div>
                            </div>


                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <div class="p-2">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    @foreach ($data as $key => $user)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-evenly ">
                                                <a class="btn btn-info" href="{{ route('users.show', $user->id) }}"><i
                                                        class="fa-solid fa-eye"></i></a>
                                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i
                                                        class="fa-solid fa-user-pen"></i></a>
                                                <a class="btn btn-danger" href="{{ route('users.destroy', $user->id) }}">
                                                    <i class="fa-solid fa-user-slash"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
