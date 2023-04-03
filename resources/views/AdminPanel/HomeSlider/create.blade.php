@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.ADD') @lang('app.HomeSlider')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ADD NEW')</h3>
            <img id="img-preview" class="card-image" src="{{ asset('uploads/homeSlider/amr01.png') }}" alt="Panner"
                srcset="">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('HomeSlider.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.TITLE')</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.TITLE')">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.SUB_TITLE')</label>
                    <input type="text" name="sub_title" value="{{ old('sub_title') }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.SUB_TITLE')">
                </div>
                @error('sub_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.TITLE_DESC')</label>
                    <input type="text" name="title_desc" value="{{ old('title_desc') }}" class="form-control"
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
                            <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
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
                            <input type="file" class="custom-file-input" name="scetion_video" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose Video</label>
                        </div>
                    </div>
                </div>
                @error('scetion_video')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.BTN_TEXT')</label>
                    <input type="text" name="btn_text" value="{{ old('btn_text') }}" class="form-control"
                        id="exampleInputEmail1" placeholder="@lang('app.Enter') @lang('app.BTN_TEXT')">
                </div>
                @error('btn_text')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@lang('app.ADD')</button>
                <a href="{{ url('/HomeSlider') }}" class="btn btn-success">@lang('app.CANCEL')</a>
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

@section('page_js')
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.getElementById('img-preview');
                preview.src = src;
            }
        }

        // function showVideo(event) {
        //     if (event.target.files.length > 0) {
        //         let src = URL.createObjectURL(event.target.files[0]);
        //         let preview = document.getElementById('img-preview');
        //         preview.src = src;
        //     }
        // }
    </script>
@endsection
