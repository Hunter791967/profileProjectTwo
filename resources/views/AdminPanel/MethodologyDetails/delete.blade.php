@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.DELETE') @lang('app.METHODOLOGY') @lang('app.DESC')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.ARE')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form"
            action="{{ route('methodologyDetail.destroy', ['methodologyDetail' => $methodologyDetail->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.NAME')</label>
                    <input type="text" name="name" value="{{ $methodologyDetail->name }}" class="form-control"
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
                                id="exampleInputFile" {{ $methodologyDetail->icon_image }}>
                            <label class="custom-file-label" for="exampleInputFile">Choose Icon</label>
                        </div>
                    </div>
                </div>
                @error('icon_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.METHODOLOGY') @lang('app.DESC')</label>
                    <input type="text" name="methodology_desc" value="{{ $methodologyDetail->methodology_desc }}"
                        class="form-control" id="exampleInputName"
                        placeholder="@lang('app.Enter') @lang('app.METHODOLOGY') @lang('app.DESC')">
                </div>
                @error('methodology_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror



            </div>
            <!-- /.card-body -->


            <div class="card-footer">
                <button type="" class="btn btn-primary">DELETE</button>
                <a href="{{ url('/methodologyDetail') }}" class="btn btn-success">CANCEL</a>
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
