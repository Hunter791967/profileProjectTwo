@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.UPDATE') @lang('app.PROJECT')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.UPDATE')</h3>
            <img id="img-preview" class="card-image" src="{{ asset('uploads/projects/' . $project->image) }}" alt="Panner"
                srcset="">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('project.update', ['project' => $project->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.NAME')</label>
                    <input type="text" name="name" value="{{ $project->name }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.NAME')">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">@lang('app.IMAGE')</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" onchange="showPreview(event)" class="custom-file-input" name="image"
                                id="exampleInputFile" value="{{ $project->image }}">
                            <label class="custom-file-label" for="exampleInputFile">Selected Image</label>
                        </div>
                    </div>
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.CLIENT') @lang('app.NAME')</label>
                    <input type="text" name="client_name" value="{{ $project->client_name }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.CLIENT') @lang('app.NAME')">
                </div>
                @error('client_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.LOCATION') @lang('app.ADDRESS')</label>
                    <input type="text" name="location_add" value="{{ $project->location_add }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.LOCATION') @lang('app.ADDRESS')">
                </div>
                @error('location_add')
                    <div class="alert
                        alert-danger">{{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.PERIOD')</label>
                    <input type="text" name="period" value="{{ $project->period }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.PERIOD')">
                </div>
                @error('period')
                    <div class="alert
                        alert-danger">{{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label>@lang('app.DATE'):</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control datepicker-input" data-target="#reservationdate"
                            name="date" value="{{ $project->date }}">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.PROJECT') @lang('app.LINK')</label>
                    <input type="text" name="project_link" value="{{ $project->project_link }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.PROJECT') @lang('app.LINK')">
                </div>
                @error('project_link')
                    <div class="alert
                        alert-danger">{{ $message }}
                    </div>
                @enderror
                <!-- Project_Desc Tab Cloumn -->
                <div class="form-group">
                    <div class="mb-3">
                        <label for="exampleInputEmail1">@lang('app.PROJECT') @lang('app.DESC')</label>
                        <textarea name="project_desc" id="editor1" rows="10" cols="80">
                            {{ $project->project_desc }}
                        </textarea>
                    </div>
                </div>
                @error('project_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="form-group">
                    <label for="exampleInputFile">@lang('app.SELECT') ('app.PROJTYPE')</label>

                    @foreach ($allData as $singleData)
                        <div class="form-check">
                            <input class="form-check-input" value="{{ $singleData->id }}" type="checkbox"
                                name="proj_type_id[]"
                                @foreach ($project->proj_types as $singleType) {{ $singleType->id == $singleData->id ? 'checked' : '' }} @endforeach>
                            <label class="form-check-label">{{ $singleData->name }}</label>
                        </div>
                    @endforeach
                </div>




            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@lang('app.UPDATE')</button>
                <a href="{{ url('/project') }}" class="btn btn-success">@lang('app.CANCEL')</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_title', 'SERVICE')

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
        CKEDITOR.replace('project_desc');
    </script>
@endsection
