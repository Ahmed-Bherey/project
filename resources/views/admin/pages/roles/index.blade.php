@extends('admin.includes.master')
@section('title')
    Roles
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
                    <div class="col-12 col-dm-12 col-md-12 col-lg-12 col-xl-10">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-igloo mr-1"></i>User Roles and Permissions </h3>
                            </div>
                            <div class="bg-light p-4 rounded">
                                <h1>Roles</h1>
                                <div class="lead">
                                    Manage your roles here.
                                    <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add
                                        role</a>
                                </div>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Name</th>
                                        <th width="3%" colspan="3">Action</th>
                                    </tr>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('roles.show', $role->id) }}">Show</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('roles.edit', $role->id) }}"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="d-flex">
                                    {!! $roles->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
