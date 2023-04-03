@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.DELETE') @lang('app.PROJTYPE')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ARE')</h3>
            <img id="img-preview" class="card-image" src="{{ asset('uploads/projectTypes/' . $projType->image) }}"
                alt="Project Image" srcset="">
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('projType.destroy', ['projType' => $projType->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.NAME')</label>
                    <input type="text" name="name" value="{{ $projType->name }}" class="form-control"
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
                                id="exampleInputFile" value="{{ $projType->image }}">
                            <label class="custom-file-label" for="exampleInputFile">Selected Image</label>
                        </div>
                    </div>
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputFile">@lang('app.PROJECTS')</label>
                    {{-- @if (!empty($projType->projects))
                        @foreach ($projType->projects as $singleType)
                            <div class="form-check">
                                <input class="form-check-input" value="{{ $singleType->id }}" type="checkbox"
                                    name="project_type_id[]" checked>
                                <label class="form-check-label">{{ $singleType->name }}</label>
                            </div>
                        @endforeach
                    @else
                        <h4 for="exampleInputFile" style="color: red">No Related Projects Yet</h4>
                    @endif --}}

                    @forelse ($projType->projects as $singleType)
                        <div class="form-check">
                            <input class="form-check-input" value="{{ $singleType->id }}" type="checkbox"
                                name="project_type_id[]" checked>
                            <label class="form-check-label">{{ $singleType->name }}</label>
                        </div>
                    @empty
                        <h6 for="exampleInputFile" style="color: red">No Related Projects Yet</h6>
                    @endforelse

                </div>
                <!-- /.card-body -->


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="" class="btn btn-primary">DELETE</button>
                <a href="{{ url('/projType') }}" class="btn btn-success">CANCEL</a>
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
