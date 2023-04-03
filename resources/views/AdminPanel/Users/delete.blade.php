@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('DEL USER')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ARE')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">USER NAME</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                        id="exampleInputEmail1" placeholder="Enter USER NAME">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                        id="exampleInputEmail1" placeholder="Enter email">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" value="{{ $user->password }}" class="form-control"
                        id="exampleInputPassword1" placeholder="Password">
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>ADD ROLES</label>
                </div>
                @foreach ($allRoles as $singleRole)
                    <div class="form-check">
                        <input class="form-check-input" {{ $user->hasRole($singleRole->name) ? 'checked' : '' }}
                            value="{{ $singleRole->name }}" type="radio" name="user_role">
                        <label class="form-check-label">{{ $singleRole->display_name }}</label>
                    </div>
                @endforeach
                <div class="form-group">
                    <label>ADD PERMISSIONS</label>
                </div>
                @foreach ($allPermissions as $singlePerm)
                    <div class="form-check">
                        <input class="form-check-input" {{ $user->isAbleTo($singlePerm->name) ? 'checked' : '' }}
                            value="{{ $singlePerm->name }}" type="checkbox" name="perms[]">
                        <label class="form-check-label">{{ $singlePerm->display_name }}</label>
                    </div>
                @endforeach


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">DELETE</button>
                <a href="{{ url('/user') }}" class="btn btn-success">CANCEL</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_title', 'users')
