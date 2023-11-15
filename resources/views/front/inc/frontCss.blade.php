



<link rel="stylesheet" href="{{ asset('dist/css2/bootstrap.min.css') }}" />
@if (App::islocale('en'))
    <link id="theme" rel="stylesheet" href="{{ asset('dist/css2/en/themcss.css') }}" />
@else
    <link id="theme" rel="stylesheet" href="{{ asset('dist/css2/theme-beige.css') }}" />
@endif
{{-- <link rel="stylesheet" href="{{asset('dist/css2/them.css')}}" /> --}}
<link rel="stylesheet" href="{{ asset('dist/css2/slick.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css2/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css2/animsition.min.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css2/toastr.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css2/timepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css2/jquery.datetimepicker.min.css') }}">


<!-- CSS Icons -->
{{-- <link rel="stylesheet" href="{{asset('dist/css2/themify-icons.css')}}" /> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.min.css" />
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css.map') }}">

<style>
    .modal-body .close {
        position: absolute;
        top: 0;
        left: 0;
        color: white;
        font-size: 10px;
        padding: 10px;
        border: none;
        cursor: pointer;
        text-align: center;
    }

    .modal-body .close:hover {
        background-color: #555;
    }
</style>