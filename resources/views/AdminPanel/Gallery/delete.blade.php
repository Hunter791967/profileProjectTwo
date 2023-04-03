@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.DELETE') @lang('app.GALLERY')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ARE')</h3>
            <img id="img-preview" class="card-image" src="{{ asset('uploads/icons/' . $Gallery->icon_image) }}" alt="Icon_Image"
                srcset="" width="30px">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('Gallery.destroy', ['Gallery' => $Gallery->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputFile">Icon_Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="icon_image" id="exampleInputFile"
                                value="{{ $Gallery->icon_image }}">
                            <label class="custom-file-label" for="exampleInputFile">Image</label>
                        </div>
                    </div>
                </div>
                @error('icon_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">DELETE</button>
                <a href="{{ url('/Gallery') }}" class="btn btn-success">CANCEL</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_title', 'Gallery')

@section('page_style')
    <!-- SpecialStyles -->
    <link rel="stylesheet" href="{{ asset('first/styles/showData.css') }}">
@endsection
