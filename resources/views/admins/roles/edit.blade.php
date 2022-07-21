@extends('admins.layouts.master',['title' => 'Sửa Role'])
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('roles.update',$role->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Tên quyền:</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                       value="{{$role->name}}"
                                                       name="name">
                                            </div>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                            <th scope="col" width="1%"><input type="checkbox" name="all_permission">
                                            </th>
                                            <th scope="col" width="20%">Name</th>
                                            <th scope="col" width="1%">Guard</th>
                                            </thead>
                                            @foreach($permissions as $permission)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox"
                                                               name="permission[{{ $permission->name }}]"
                                                               value="{{ $permission->name }}"
                                                               class='permission'
                                                            {{ in_array($permission->name, $rolePermissions)
                                                                ? 'checked'
                                                                : '' }}>
                                                    </td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>{{ $permission->guard_name }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <div class="col-12 d-flex justify-content-end">
                                            <a href="{{ route('roles.index') }}" class="btn btn-primary mr-1 mb-1">Back</a>
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {
                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }
            });
        });
    </script>
@endsection
