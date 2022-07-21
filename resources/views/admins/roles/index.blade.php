@extends('admins.layouts.master',['title' => 'Role'])
@section('content')

    <div class="row" id="table-inverse">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (\Session::has('message'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('message') !!}</li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-content">
                    <form action="">
                        <div class="card-body">
                            <a href="{{route('roles.create')}}" class="btn btn-outline-primary">Thêm quyền</a>
                            {{--                            <label for="">Tìm kiếm:</label>--}}
                            {{--                            <input type="search" name="search" placeholder="Tìm kiếm" value="{{$searches}}">--}}
                        </div>
                    </form>

                    <!-- table with light -->
                    <div class="table-responsive">
                        <table class="table table-light mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên quyền</th>
                                <th>Ngày tạo</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody id="ListCategory">
                            @foreach($roles as $key => $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{date('d-m-Y H:i:s',strtotime($item->created_at))}}</td>
                                    <td>
                                        <div class="buttons">
                                            <form action="{{route('roles.destroy',$item->id)}}" method="post">
                                                @csrf
                                                <a href="{{route('roles.show',$item->id)}}"
                                                   class="btn icon icon-left btn-info"><i data-feather="edit"></i>
                                                    Show</a>
                                                <a href="{{route('roles.edit',$item->id)}}"
                                                   class="btn icon icon-left btn-primary"><i data-feather="edit"></i>
                                                    Sửa</a>
                                                @method('DELETE')
                                                <button class="btn icon icon-left btn-danger" type="submit">
                                                    <i data-feather="alert-triangle"></i>Xóa
                                                </button>

                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{--                        {{$getAll ->links()}}--}}
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
