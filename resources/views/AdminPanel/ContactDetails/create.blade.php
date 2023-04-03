@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.ADD') @lang('app.CONTACT')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ADD') @lang('app.CONTACT')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('contactDetail.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.NAME')</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.NAME')">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.EMAIL')</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.EMAIL')">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.ADDRESS')</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.ADDRESS')">
                </div>
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.PHONE')</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.PHONE')">
                </div>
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">@lang('app.ADD')</button>
                    <a href="{{ url('/contactDetail') }}" class="btn btn-success">@lang('app.CANCEL')</a>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_title', 'Contact Detail')

@section('page_style')
    <!-- SpecialStyles -->
    <link rel="stylesheet" href="{{ asset('first/styles/showData.css') }}">

@endsection
