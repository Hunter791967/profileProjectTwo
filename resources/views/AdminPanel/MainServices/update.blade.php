@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.UPDATE') @lang('app.MAIN') @lang('app.SERVICE')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.UPDATE')</h3>
            <img id="img-preview" class="card-image" src="{{ asset('uploads/mainServices/' . $mainService->main_image) }}"
                alt="Panner" srcset="">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('mainService.update', ['mainService' => $mainService->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.MAIN') @lang('app.TITLE')</label>
                    <input type="text" name="main_title" value="{{ $mainService->main_title }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.MAIN') @lang('app.TITLE')">
                </div>
                @error('main_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.SUB_TITLE')</label>
                    <input type="text" name="sub_title" value="{{ $mainService->sub_title }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.SUB_TITLE')">
                </div>
                @error('sub_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">@lang('app.MAIN') @lang('app.IMAGE')</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" onchange="showPreview(event)" class="custom-file-input" name="main_image"
                                id="exampleInputFile" value="{{ $mainService->main_image }}">
                            <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                        </div>
                    </div>
                </div>
                @error('main_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <div class="mb-3">
                        <label for="exampleInputEmail1">@lang('app.MAIN') @lang('app.DESC')</label>
                        <textarea name="main_desc" id="editor1" rows="10" cols="80">
                            value="{{ $mainService->main_desc }}"
                        </textarea>
                    </div>
                </div>
                @error('main_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <div class="mb-3">
                        <label for="exampleInputEmail1">@lang('app.SUB') @lang('app.DESC')</label>
                        <textarea name="sub_desc" id="editor1" rows="10" cols="80">
                            value="{{ $mainService->sub_desc }}"
                        </textarea>
                    </div>
                </div>
                @error('sub_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@lang('app.UPDATE')</button>
                <a href="{{ url('/mainService') }}" class="btn btn-success">@lang('app.CANCEL')</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_title', 'MAIN SERVICE')

@section('page_style')
    <!-- SpecialStyles -->
    <link rel="stylesheet" href="{{ asset('first/styles/showData.css') }}">
    <script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
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


        CKEDITOR.replace('main_desc');
        CKEDITOR.replace('sub_desc');
    </script>
@endsection
