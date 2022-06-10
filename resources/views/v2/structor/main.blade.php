<!doctype html >
<!--[if IE 8]>    <html class="ie8" lang="vi"> <![endif]-->
<!--[if IE 9]>    <html class="ie9" lang="vi"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="vi"> <!--<![endif]-->
<head>
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(!isset($meta_keywords)){
    $meta_keywords = 'tdoctor, bác sĩ trực tuyến, bác sĩ online, khám bệnh từ xa, dịch vụ khám chữa bệnh từ xa, tư vấn bác sĩ, khám bệnh online, bệnh viện trực tuyến, khám chữa bệnh trực tuyến';
}
if(!isset($meta_description)){
    $meta_description = 'Tdoctor.vn Khám chữa bệnh trực tuyến';
    if(isset($description)){
        $meta_description = $description;
    }
}
if(isset($meta_author) && $meta_author != null){
    echo '<meta name="author" content="'.$meta_author.'">';
}else{
    echo '<meta name="author" content="Tdoctor">';
}

?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{{$meta_keywords}}">
    <meta name="description" content="{{$meta_description}}">


    <!--FACEBOOK-->
    <meta property="og:locale" content="en_us" />
    <meta property="og:locale:alternate" content="ar_ar" />
    <meta property="og:image" content="{{$image or 'https://tdoctor.vn/public/v2/img/logo2.png'}}">
    <meta property="og:image:secure_url" content="{{$image or 'https://tdoctor.vn/public/v2/img/logo2.png'}}" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="620">
    <meta property="og:type" content="company" />
    <meta property="og:url" content="{{$url or $actual_link }}"/>
    <meta property="og:title" content="{{$title or 'Tdoctor.vn'}}" />
    <meta property="og:description" content="{{$meta_description or 'Hệ thống y tế trực tuyến tại Việt Nam với hơn 1000 bác sĩ giỏi'}}" />
    <meta property="fb:app_id" content="130864624263329" />

    <title>{{$title or "Bác sĩ trực tuyến Tdoctor.vn"}} </title>
    <link rel="canonical" href="https://tdoctor.vn/" />
<?php 
$currentUser = Session::get('user');

if ($currentUser && $currentUser->isPatient()) {
    ?>
    @include('patient.structor.header')
    @yield('content')
    @include('patient.structor.chat')
    @include('patient.structor.footer')
    <?php
}elseif($currentUser && ( $currentUser->isDoctor() || $currentUser->isClinic() ) )
{
    ?>
    @include('v2.structor.header-doctor')
    @yield('content')

    @if(Session::get('user')!=null && Session::get('user')->user_id == 90007044)
    @include('patient.structor.chat')
    @else
    @include('patient.structor.chat')
    @endif

    @include('v2.structor.footer')
    <?php
}else
{
    ?>
    @include('v2.structor.headerv3')
    @yield('content')
    @include('patient.structor.chat')
    @include('v2.structor.footerv3')
    <?php
}
?>
