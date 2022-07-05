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
                                <h3 class="card-title"><i class="fas fa-igloo mr-1"></i>Roles Show </h3>
                            </div>
                            <div class="bg-light p-4 rounded">
                                <h1>{{ ucfirst($role->name) }} Role</h1>
                                <div class="lead">
                                </div>
                                <div class="container mt-4">
                                    <h3>Assigned permissions</h3>
                                    <table class="table table-striped">
                                        <thead>
                                        <th scope="col" width="20%">Name</th>
                                        <th scope="col" width="1%">Guard</th>
                                        </thead>
                                        @foreach($rolePermissions as $permission)
                                            <tr>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->guard_name }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('roles.index') }}" class="btn btn-default"><i class="fa-solid fa-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
