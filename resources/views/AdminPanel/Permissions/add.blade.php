@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.ADD USER')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ADD NEW')</h3>
            <img id="img-preview" class="card-image" src="{{ asset('uploads/users/default.png') }}" alt="User_Image"
                srcset="">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.USER_NAME')</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.USER_NAME')">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">User_Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" onchange="showPreview(event)" class="custom-file-input" name="image"
                                id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                        </div>
                    </div>
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.EMAIL')</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                        id="exampleInputEmail1" placeholder="@lang('app.Enter') @lang('app.EMAIL')">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">@lang('app.Password')</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                        id="exampleInputPassword1" placeholder="@lang('app.Password')">
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>@lang('app.ADD ROLES')</label>
                </div>
                @foreach ($allRoles as $singleRole)
                    <div class="form-check">
                        <input class="form-check-input" {{ $singleRole->name == 'user' ? 'checked' : '' }}
                            value="{{ $singleRole->name }}" type="radio" name="user_role">
                        <label class="form-check-label">{{ $singleRole->display_name }}</label>
                    </div>
                @endforeach
                <div class="form-group">
                    <label>@lang('app.ADD PERMISSIONS')</label>
                </div>
                @foreach ($allPermissions as $singlePerm)
                    <div class="form-check">
                        <input class="form-check-input" value="{{ $singlePerm->name }}" type="checkbox" name="perms[]">
                        <label class="form-check-label">{{ $singlePerm->display_name }}</label>
                    </div>
                @endforeach


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@lang('app.ADD')</button>
                <a href="{{ url('/user') }}" class="btn btn-success">@lang('app.CANCEL')</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_title', 'users')

@section('page_style')
    <!-- SpecialStyles -->
    <link rel="stylesheet" href="{{ asset('first/styles/showData.css') }}">
@endsection

@section('page_js')
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.getElementById('img-preview');
                preview.src = src;
            }
        }
    </script>
@endsection
