@if (App::isLocale("ar"))

<link rel="stylesheet" href="{{asset('/ar/bootstrap/css/bootstrap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('/ar/dist/css/AdminLTE.min.css')}}">
<!-- AdminLTE Skins -->
<link rel="stylesheet" href="{{asset('/ar/dist/css/skins/_all-skins.min.css')}}"> 
@else
    
<link rel="stylesheet" href="{{asset('/en/bootstrap/css/bootstrap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('/en/dist/css/AdminLTE.min.css')}}">
<!-- AdminLTE Skins -->
<link rel="stylesheet" href="{{asset('/en/dist/css/skins/_all-skins.min.css')}}">

@endif

<link rel="stylesheet" href=" {{ asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href=" {{ asset('css/chk.css') }}">


<link href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.bootstrap4.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"> 

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" /> 



<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
rel="stylesheet">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
