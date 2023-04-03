@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.ABOUT')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.INFO') @lang('app.ABOUT')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('About.store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="exampleInputEmail1">@lang('app.about_favorite')</label>
                    <input type="text" name="about_favorite" value="{{ old('about_favorite') }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.about_favorite')">
                </div>
                @error('about_favorite')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.about_desc')</label>
                    <input type="text" name="about_desc" value="{{ old('about_desc') }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.about_desc')">
                </div>
                @error('about_desc')
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
                <!-- EDITOR -->
                <div class="form-group">
                    <div class="mb-3">
                        <label for="exampleInputEmail1">@lang('app.ABOUT_TAB')</label>
                        {{-- <textarea class="textarea" placeholder="@lang('app.ABOUT_TAB')"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"></textarea> --}}
                        <textarea name="about_tab" id="editor1" rows="10" cols="80">
                                This is my textarea to be replaced with CKEditor 4.
                        </textarea>
                    </div>

                </div>
                @error('about_tab')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">@lang('app.RESUME')</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="resume" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Upload Resume</label>
                        </div>
                    </div>
                </div>
                @error('resume')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@lang('app.ADD')</button>
                <a href="{{ url('/About') }}" class="btn btn-success">@lang('app.CANCEL')</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_title', 'About')

@section('page_style')
    <!-- SpecialStyles -->
    <link rel="stylesheet" href="{{ asset('first/styles/showData.css') }}">
    <script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
@endsection

@section('page_js')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('about_tab');
    </script>
@endsection
