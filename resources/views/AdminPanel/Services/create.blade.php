@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.ADD') @lang('app.SERVICE')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ADD NEW')</h3>
            <img id="img-preview" class="card-image" src="{{ asset('uploads/services/erp01.jpg') }}" alt="Panner"
                srcset="">
            <img id="icon-preview" class="card-image" src="{{ asset('uploads/services/digitransform01.png') }}" alt="Icon"
                srcset="">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="exampleInputFile">@lang('app.SERVICE') @lang('app.IMAGE')</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" onchange="showPreview(event)" class="custom-file-input"
                                name="service_image" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                        </div>
                    </div>
                </div>
                @error('service_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">@lang('app.ICON') @lang('app.IMAGE')</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" onchange="showIcon(event)" class="custom-file-input" name="icon_image"
                                id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose Icon</label>
                        </div>
                    </div>
                </div>
                @error('icon_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- EDITOR -->
                <div class="form-group">
                    <div class="mb-3">
                        <label for="exampleInputEmail1">@lang('app.SERVICE') @lang('app.TAB')</label>
                        <textarea name="service_tab" id="editor1" rows="10" cols="80">
                            This is my textarea to be replaced with CKEditor 4.
                        </textarea>
                    </div>
                </div>
                @error('service_tab')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@lang('app.ADD')</button>
                <a href="{{ url('/service') }}" class="btn btn-success">@lang('app.CANCEL')</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_title', 'HomeSlider')

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

        function showIcon(event) {
            if (event.target.files.length > 0) {
                let srcOne = URL.createObjectURL(event.target.files[0]);
                let previewOne = document.getElementById('icon-preview');
                previewOne.src = srcOne;
            }
        }
        CKEDITOR.replace('service_tab');
    </script>
    {{-- <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.

    </script> --}}
@endsection
