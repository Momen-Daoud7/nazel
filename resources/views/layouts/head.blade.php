<!-- Title --> 
<title>@lang('trans.nazel')</title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
	<!-- Sidemenu css -->

@if(LaravelLocalization::getCurrentLocale() == 'ar') 
	<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">
<link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
@endif
@if(LaravelLocalization::getCurrentLocale() == 'en') 
	<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('assets/css/sidemenu.css')}}">
<link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
@endif
@yield('css')

<!--- Style css -->
<!-- - Dark-mode css  -->
<link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
 <link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet">