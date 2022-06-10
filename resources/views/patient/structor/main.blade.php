<!doctype html >
<!--[if IE 8]>    <html class="ie8" lang="vi"> <![endif]-->
<!--[if IE 9]>    <html class="ie9" lang="vi"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="vi"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--FACEBOOK-->
    <meta property="og:locale" content="en_us" />
    <meta property="og:locale:alternate" content="ar_ar" />
    <meta property="og:image" content="https://tdoctor.vn/public/v2/img/logo2.png">
    <meta property="og:image:secure_url" content="https://tdoctor.vn/public/v2/img/logo2.png" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="620">
    <meta property="og:type" content="company" />
    <meta property="og:url" content="https://tdoctor.vn"/>
    <meta property="og:title" content="Hãy gọi cho chúng tôi ngay" />
    <meta property="og:description" content="Hệ thống y tế trực tuyến tại Việt Nam với hơn 1000 bác sĩ giỏi" />
    <meta property="fb:app_id" content="130864624263329" />

    <title>{{$title or "TDoctor"}} </title>
@include('patient.structor.header')
	@yield('content')
@if(Session::get('user')!=null && Session::get('user')->user_id == 454103383)
@include('patient.structor.chat')
@else
@include('patient.structor.chat')
@endif

@include('patient.structor.footer')
