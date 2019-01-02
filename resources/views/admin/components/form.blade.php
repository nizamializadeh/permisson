@extends('layouts.admin')
@push('stylesheets')
    <link href="{{asset('admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('admin/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/plugins/tinymce/tinymce.js')}}" rel="stylesheet" />
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
                        <a class="btn btn-info waves-effect right" href="{{$backButton['url']}}">{{$backButton['text']}}</a>
                    </div>
                    <div class="body">
                        {{$slot}}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
@endsection
@push('scripts')
    <script src="{{asset('admin/plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('admin/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{asset('admin/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('admin/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
            $('.colorpicker').colorpicker();
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('admin/plugins/tinymce')}}';
            @if(session(str_slug($title,'-')))
                swal("Good job!", "{{session(str_slug($title,'-'))}}", "success");
            @endif
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.post-img-preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".post-image").change(function() {
                readURL(this);
            });

            $('#form_validation').validate({
                rules: {
                    'checkbox': {
                        required: true
                    },
                    'gender': {
                        required: true
                    }
                },
                highlight: function (input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function (input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function (error, element) {
                    $(element).parents('.form-group').append(error);
                }
            });

            //Advanced Form Validation
            $('#form_advanced_validation').validate({
                rules: {
                    'date': {
                        customdate: true
                    },
                    'creditcard': {
                        creditcard: true
                    }
                },
                highlight: function (input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function (input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function (error, element) {
                    $(element).parents('.form-group').append(error);
                }
            });

            //Custom Validations ===============================================================================
            //Date
            $.validator.addMethod('customdate', function (value, element) {
                    return value.match(/^\d\d\d\d?-\d\d?-\d\d$/);
                },
                'Please enter a date in the format YYYY-MM-DD.'
            );

            //Credit card
            $.validator.addMethod('creditcard', function (value, element) {
                    return value.match(/^\d\d\d\d?-\d\d\d\d?-\d\d\d\d?-\d\d\d\d$/);
                },
                'Please enter a credit card in the format XXXX-XXXX-XXXX-XXXX.'
            );
            //==================================================================================================
        });
    </script>
@endpush