@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.DELETE') @lang('app.ABOUT')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ARE')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('About.destroy', ['About' => $about->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.TITLE')</label>
                    <input type="text" name="title" value="{{ $about->title }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.TITLE')">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.about_favorite')</label>
                    <input type="text" name="about_favorite" value="{{ $about->about_favorite }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.about_favorite')">
                </div>
                @error('about_favorite')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.about_desc')</label>
                    <input type="text" name="about_desc" value="{{ $about->about_desc }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.about_desc')">
                </div>
                @error('about_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.BTN_TEXT')</label>
                    <input type="text" name="btn_text" value="{{ $about->btn_text }}" class="form-control"
                        id="exampleInputEmail1" placeholder="@lang('app.Enter') @lang('app.BTN_TEXT')">
                </div>
                @error('btn_text')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="" class="btn btn-primary">DELETE</button>
                <a href="{{ url('/About') }}" class="btn btn-success">CANCEL</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

{{-- @section('page_title', 'About') --}}

@section('page_style')
    <!-- SpecialStyles -->
    <link rel="stylesheet" href="{{ asset('first/styles/showData.css') }}">
@endsection
