@extends('admins.layouts.master',['title' => 'Sửa thông tin tài khoản'])
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

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
                            <form class="form" action="{{route('user.update',$user->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Tên:</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                       value="{{$user->name}}"
                                                       name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Email:</label>
                                                <input type="email" id="first-name-column" class="form-control"
                                                       value="{{$user->email}}"
                                                       name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Mật khẩu:</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                       placeholder="Mật khẩu" value=""
                                                       name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Xác nhận mật khẩu:</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                       placeholder="Xác nhận mật khẩu" value=""
                                                       name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mr-1">
                                            <div class="form-group">
                                                <label for="first-name-column">Role:</label>
                                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <a href="{{ route('user.index') }}" class="btn btn-primary mr-1 mb-1">Back</a>
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
        $(document).ready(function () {
            $('[name="all_permission"]').on('click', function () {
                if ($(this).is(':checked')) {
                    $.each($('.permission'), function () {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function () {
                        $(this).prop('checked', false);
                    });
                }
            });
        });
    </script>
@endsection


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
