@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('DEL') @lang('app.HomeSlider')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ARE')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('HomeSlider.destroy', ['HomeSlider' => $homeSlider->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.TITLE')</label>
                    <input type="text" name="title" value="{{ $homeSlider->title }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.TITLE')">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.SUB_TITLE')</label>
                    <input type="text" name="sub_title" value="{{ $homeSlider->sub_title }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.SUB_TITLE')">
                </div>
                @error('sub_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.TITLE_DESC')</label>
                    <input type="text" name="title_desc" value="{{ $homeSlider->title_desc }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.TITLE_DESC')">
                </div>
                @error('title_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">@lang('app.IMAGE')</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" onchange="showPreview(event)" class="custom-file-input" name="panner"
                                id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">{{ $homeSlider->panner }}</label>
                        </div>
                    </div>
                </div>
                @error('panner')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">@lang('app.VIDEO')</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="section_video" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">{{ $homeSlider->scetion_video }}</label>
                        </div>
                    </div>
                </div>
                @error('scetion_video')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.BTN_TEXT')</label>
                    <input type="text" name="btn_text" value="{{ $homeSlider->btn_text }}" class="form-control"
                        id="exampleInputEmail1" placeholder="@lang('app.Enter') @lang('app.BTN_TEXT')">
                </div>
                @error('btn_text')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">DELETE</button>
                <a href="{{ url('/HomeSlider') }}" class="btn btn-success">CANCEL</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_title', 'HomeSlider')

@section('page_style')
    <!-- SpecialStyles -->
    <link rel="stylesheet" href="{{ asset('first/styles/showData.css') }}">
@endsection
