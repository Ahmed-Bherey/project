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
                                <h3 class="card-title"><i class="fas fa-igloo mr-1"></i> Add new role and assign
                                    permissions. </h3>
                            </div>
                            <div class="bg-light p-4 rounded">
                                <div class="container mt-4">

                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('roles.store') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input value="{{ old('name') }}" type="text" class="form-control"
                                                name="name" placeholder="Name" required>
                                        </div>
                                        <label for="permissions" class="form-label">Assign Permissions</label>
                                        <table class="table table-striped">
                                            <thead>
                                                <th scope="col" width="1%"><input type="checkbox" name="all_permission">
                                                </th>
                                                <th scope="col" width="20%">Name</th>
                                                <th scope="col" width="1%">Guard</th>
                                            </thead>
                                            @foreach ($permissions as $permission)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="permission[{{ $permission->name }}]"
                                                            value="{{ $permission->name }}" class='permission'>
                                                    </td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>{{ $permission->guard_name }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <button type="submit" class="btn btn-primary">Save user</button>
                                        <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if ($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }

            });
        });
    </script>
@endsection
