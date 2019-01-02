@extends('layouts.admin')
@push('stylesheets')
    <link href="{{asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('admin/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
@endpush
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 style="display: inline-block">
                            {{$title}}
                        </h2>
                        <a class=" btn btn-success waves-effect " style="float: right;" href="{{$createButton['url']}}">{{$createButton['text']}}</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    @foreach($columns as $column)
                                    <th>{{$column['label']}}</th>
                                    @endforeach
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    @foreach($columns as $column)
                                    <th>{{$column['label']}}</th>
                                    @endforeach
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    {{$slot}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
@endsection
@push('scripts')
    <script src="{{asset('admin/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('admin/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('admin/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            @if(session(str_slug($title,'-')))
            swal("Good job!", "{{session(str_slug($title,'-'))}}", "success");
            @endif
            $('.js-basic-example').DataTable({
                responsive: true,
                bDestroy: true
            });

            // set status
            $('.statusCheckBox').on('change',function () {
                var _this = $(this);
                var status = (_this.context.checked) ? 1 : 0;
                var id = _this.data('row');
                var data = {
                    'table' : "{{$table}}",
                    'status' : status,
                    'id' : id
                };
                $.post("{{route('setStatus')}}",data,function (result) {
                    swal("Good job!", result, "success");
                });
            });
        } );

    </script>
@endpush