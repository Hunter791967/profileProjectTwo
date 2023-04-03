@extends('AdminPanel.Layouts.app')

@section('page_title')
    @lang('app.SHOW') @lang('app.PROJECTS')
@endsection

@section('content')
    <div class="card">
        <div class="card-header showCard-Header">
            <h6>@lang('app.SHOWING ALL') @lang('app.PROJECTS')</h6>
            {{-- @if (Auth::user()->hasPermission('users-create')) --}}
            <button type="button" class="btn btn-block btn-primary add_btn"><a class="formButton"
                    href="{{ url('/project/create') }}">@lang('app.ADD')</a></button>
            {{-- @else
                <button disabled type="button" class="btn btn-block btn-primary add_btn">@lang('app.ADD USER')</button>
            @endif --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">@lang('app.ID')
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">
                                        @lang('app.NAME')
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending">
                                        @lang('app.CLIENT') @lang('app.NAME')
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                        @lang('app.PROJECT') @lang('app.DESC')
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                        @lang('app.OPTIONS')
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="tbody_font">
                                {{-- @dd($showData) --}}
                                @foreach ($showData as $singleData)
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1">{{ $singleData->id }}</td>
                                        {{-- @dd($singleData->id) --}}
                                        <td>{{ $singleData->name }}</td>
                                        <td>{{ $singleData->client_name }}</td>
                                        <td>{{ $singleData->project_desc }}</td>

                                        <td class="option_ud col_width">
                                            {{-- @if (Auth::user()->hasPermission('users-delete')) --}}
                                            <a href="{{ url("/project/$singleData->id") }}"
                                                class="btn btn-danger update_btn" type="submit">@lang('app.DELETE')</a>
                                            {{-- @else
                                                <button disabled class="btn btn-danger update_btn"
                                                    type="button">@lang('app.DELETE')</button>
                                            @endif --}}
                                            {{-- @if (Auth::user()->hasPermission('users-update')) --}}
                                            <a href="{{ route('project.edit', ['project' => $singleData->id]) }}"
                                                type="submit"
                                                class="btn
                                                        btn-primary update_btn">@lang('app.UPDATE')</a>
                                            {{-- @else
                                                <button disabled class="btn btn-primary update_btn"
                                                    type="button">@lang('app.UPDATE')</button>
                                            @endif --}}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">@lang('app.ID')</th>
                                    <th rowspan="1" colspan="1">@lang('app.NAME')</th>
                                    <th rowspan="1" colspan="1">@lang('app.CLIENT') @lang('app.NAME')</th>
                                    <th rowspan="1" colspan="1">@lang('app.PROJECT') @lang('app.DESC')</th>
                                    <th rowspan="1" colspan="1">@lang('app.OPTIONS')</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    </div>
@endsection
@section('page_title', 'HomeSlider')
@section('page_style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminPanel/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminPanel/plugins/datatabels-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('first/styles/showData.css') }}">
@endsection
@section('page_js')
    <!-- DataTables -->
    <script src="{{ asset('AdminPanel/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminPanel/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminPanel/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminPanel/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                @if (App::getLocale() == 'ar')
                    "language": {
                        "url": '//cdn.datatables.net/plug-ins/1.13.1/i18n/ar.json'
                    },
                @endif
            });
        });
    </script>
@endsection
