@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.ADD') @lang('app.METHODOLOGY') @lang('app.DESC')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ADD') @lang('app.METHODOLOGY') @lang('app.DESC')</h3>
            <img id="img-preview" class="card-image" src="{{ asset('uploads/methodologyDetails/concept01.png') }}"
                alt="Main Service Image" srcset="">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('methodologyDetail.store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="exampleInputFile">@lang('app.IMAGE')</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" onchange="showPreview(event)" class="custom-file-input" name="icon_image"
                                id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose Icon</label>
                        </div>
                    </div>
                </div>
                @error('icon_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.METHODOLOGY') @lang('app.DESC')</label>
                    <input type="text" name="methodology_desc" value="{{ old('methodology_desc') }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.METHODOLOGY') @lang('app.DESC')">
                </div>
                @error('methodology_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">@lang('app.ADD')</button>
                    <a href="{{ url('/methodologyDetail') }}" class="btn btn-success">@lang('app.CANCEL')</a>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_title', 'METHODOLOGY DETAILS')

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
