@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.UPDATE') @lang('app.PROSPECT DETAILS')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.UPDATE')</h3>

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('prospectDetail.update', ['prospectDetail' => $prospectDetail->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.NAME')</label>
                    <input type="text" name="name" value="{{ $prospectDetail->name }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.NAME')">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.EMAIL')</label>
                    <input type="email" name="email" value="{{ $prospectDetail->email }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.EMAIL')">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.PHONE')</label>
                    <input type="text" name="phone" value="{{ $prospectDetail->phone }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.PHONE')">
                </div>
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.MESSAGE')</label>
                    <textarea type="text" name="message" class="form-control" id="exampleInputName"
                        placeholder="@lang('app.Enter') @lang('app.MESSAGE')">
                        value="{{ $prospectDetail->message }}"
                    </textarea>
                </div>
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- /.card-body -->


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@lang('app.UPDATE')</button>
                <a href="{{ url('/prospectDetail') }}" class="btn btn-success">@lang('app.CANCEL')</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_style')
    <!-- SpecialStyles -->
    <link rel="stylesheet" href="{{ asset('first/styles/showData.css') }}">
@endsection
