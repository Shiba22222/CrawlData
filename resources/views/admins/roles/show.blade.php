@extends('admins.layouts.master',['title' => ''])
@section('content')
    <div class="col-md-12">
        <h1>Role {{$role->name}}</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">

            <h3>Các permissions được cho phép</h3>

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
    <br>
    <div class="mt-4">
        <a href="{{ route('roles.index') }}" class="btn btn-primary mr-1 mb-1">Back</a>
    </div>
@endsection
