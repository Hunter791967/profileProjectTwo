@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.UPDATE') @lang('app.SKILLS')
@endsection

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@lang('app.UPDATE')</h3>

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('skill.update', ['skill' => $skill->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.NAME')</label>
                    <input type="text" name="name" value="{{ $skill->name }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.NAME')">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('app.SKILL_RATE')</label>
                    <input type="text" name="skill_rate" value="{{ $skill->skill_rate }}" class="form-control"
                        id="exampleInputName" placeholder="@lang('app.Enter') @lang('app.SKILL_RATE')">
                </div>
                @error('skill_rate')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">@lang('app.UPDATE')</button>
                <a href="{{ url('/skill') }}" class="btn btn-success">@lang('app.CANCEL')</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('page_style')
    <!-- SpecialStyles -->
    <link rel="stylesheet" href="{{ asset('first/styles/showData.css') }}">
@endsection
