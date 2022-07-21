@extends('admins.layouts.master',['title' => ''])
@section('content')
    <div class="col-md-12">
        <h1>Tên: {{$users->name}}</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">

            <h3>Thông tin tài khoản</h3>

            <table class="table table-striped">
                <thead>
                <th>Name</th>
                <th >Email</th>
                <th >Role</th>
                <th >Ngày tạo</th>
                </thead>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>
                    @if(!empty($users->getRoleNames()))
                        @foreach($users->getRoleNames() as $role)
                            <label class="badge bg-primary">{{ $role }}</label>
                        @endforeach
                    @endif
                </td>
                <td>{{date('d-m-Y H:i:s',strtotime($users->created_at))}}</td>
            </table>
        </div>

    </div>
    <br>
    <div class="mt-4">
        <a href="{{ route('user.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
