<?php
// var_dump($prv);
// var_dump($sp);

// $selectsp = request()->input('speciality');
// var_dump($sp);
// var_dump($province);
// var_dump($province->name);
$page_title = 'Danh mục Cơ sở y tế';
$meta_keywords = 'danh sách bác sĩ, hệ thống bác sĩ, bác sĩ chuyên khoa, bác sĩ giỏi, bác sĩ uy tín, danh mục bác sĩ';
$province_name = '';
if(isset($province) && $province != null){
    $province_name = ' tại '.$province->name;
}   
if(isset($sp) && $sp != null){
    $meta_keywords = 'phòng khám '.$sp->speciality_name.''.$province_name.',
    phòng khám '.$sp->speciality_name.' đứng đầu'.$province_name.',
    phòng khám '.$sp->speciality_name.' tốt'.$province_name.',
    phòng khám '.$sp->speciality_name.' uy tín'.$province_name.',
    phòng khám '.$sp->speciality_name.''.$province_name.',
    nơi khám '.$sp->speciality_name.' tốt,an toàn, uy tín'.$province_name;
    $page_title .= ' '.$sp->speciality_name;
}else{
    $meta_keywords = 'phòng khám'.$province_name.',
    phòng khám tư nhân'.$province_name.',
    phòng khám đa khoa'.$province_name.',
    phòng khám đa khoa tư nhân'.$province_name.',
    phòng khám y khoa'.$province_name.',
    khám bệnh ở đâu tốt'.$province_name.',
    phòng khám đa khoa uy tín'.$province_name.',
    phòng khám an toàn'.$province_name.',
    nơi khám bệnh tốt'.$province_name.'';
}
?>
@extends('v2/structor/main',['title'=> $page_title.$province_name, 'meta_keywords' => $meta_keywords])
@section('content')
<style type="text/css">
    span.verified-badge i {
    color: #fff;
    font-size: 10px;
    /*margin-right: 5px;*/
}
span.verified-badge em {
    margin-left: 5px;
}

.verified-badge:before {
    display: none;
}
i.fa.fa-map-marker {
    margin-right: 5px;
}
button.btn.btn-primary {background: #06afe3;}
.dt ul li {
    padding: 10px;
}
.content.ct.pt-2 p {
    margin-bottom: 0;
}
.pagination .pagination {
    padding: 0;
    margin: 0;
}
.pagination {
    padding-bottom: 0;
}
.call {
    float: none;
}
</style>
<div class="container">
        <div id="top" class="d-none">
            <div class="background"></div>
            <div class="link">
                <div class="nav">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="#">Cơ sở y tế</a></li>
                    </ul> 
                    
                </div>
               
                <div>
                    <h1 style="font-size: unset;">
                        @if(request()->input('q')!==null)
                        Tìm kiếm thuốc theo từ khóa "{{urldecode(request()->input('q'))}}"
                        @else
                            Danh sách cơ sở y tế
                            @if(Session::has('province'))
                                </br>tại {{@$_COOKIE['province']}}
                            @endif
                        @endif
                        <span class="weak"></span>
                    </h1>
                </div> 
            </div> 
        </div><!-- #top -->
        <br>
        @if(request()->input('q')!==null)
             <div id="search">
        
            <ul>
                <li>
                    <span>Tìm kiếm theo:</span>
                </li>
                
                <li>
                    <a href="/danhsach-phongkham/?q={{request()->input('q')}}" class="active">
                        Phòng khám ({{$clinic or '0' }})
                    </a>
                </li>

                 <li>
                        <a href="/danh-sach-nha-thuoc/?q={{request()->input('q')}}" >
                            Nhà thuốc ({{$drugstore or '0' }})
                        </a>
                </li>

                <li>
                    <a href="/danh-sach-bac-si/?q={{request()->input('q')}}">
                        Bác sĩ ({{$doctor or '0'}})
                    </a>
                </li>
                  <li>
                    <a href="/hoibacsi/danhsach/?q={{request()->input('q')}}">
                        Hỏi bác sĩ ({{$question or '0'}})
                    </a>
                </li>
                <li>
                    <a href="/benh/tim-kiem/?q={{request()->input('q')}}" >
                        Bệnh ({{$count or '0'}})
                    </a>
                </li>

                <li>
                    <a href="/thuoc-danhsach/?q={{request()->input('q')}}">
                        Thuốc ({{$thuoc or '0'}})
                    </a>
                </li>
                
               
                
            </ul>
        
            </div><!-- #Nav search -->
        @endif
        <br>
         <div class="search">
            <form action="" method="" class="form-inline">
                <div class="form-field">
                <select class="select s1" name="province">
                    <option value="">Cả nước</option>
                    <?php $province = App\Province::all();
                        $select = request()->input('province');?>
                  
                        @foreach($province as $pr)
                            <option value="{{$pr->id}}" @if($pr->id==$select)selected="selected" @endif>{{$pr->name}}</option>
                        @endforeach
                </select>
                </div>
                <div class="form-field">
                    <select name ="speciality" class="select s1">
                        <option value="">Chuyên khoa</option>
                        <?php $specs = App\Speciality::all();$selectsp = request()->input('speciality');?>
                        
                        @foreach($specs as $sp)
                            <option value="{{$sp->specialty_url}}" @if($sp->specialty_url===$selectsp)selected="selected" @endif>{{$sp->speciality_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div >
                    <button type="submit" class="butx btn btn-primary">Lọc tìm kiếm</button>
                </div>
                
            </form>
        </div><!--.Search-->
        <!--List Doctors-->
        <br>
        <div class="list">
            <div id="content">
                <div class="dt">
                    <ul>
                        @if(isset($clinics))
                        @foreach($clinics as $cl)
                            <li class="row mb-1">
                                <div id="avatar">
                                    <a href="/phongkham-chitiet/{{$cl->clinic_url}}-{{$cl->clinic_id}}/kham-benh"
                                style="background-image: url('{{url('public/images/health_facilities/'.$cl->profile_image)}}');">
                                    </a>
                                </div><!--Avatar-->

                                <div class="content ct pt-2 pb-2">
                                    <div class="name">
                                        <h2><a href="/phongkham-chitiet/{{$cl->clinic_url}}-{{$cl->clinic_id}}/kham-benh">{{$cl->clinic_name}}</a>
                                             <span class="verified-badge">
                                                 <span class="verified-badge-new">
                        <i class="far fa-check-circle"></i><em>Chính thức</em>
                    </span>
                                             </span>
                                        </h2>
                                     </div><!--Name-->
                                    <div class="desc dpk">
                                    @if(strlen($cl->clinic_desc)>200)
                                        {!! strip_tags(substr( $cl->clinic_desc, 0, strpos($cl->clinic_desc, ' ', 200) )) !!}...
                                        <a class="readmore" style="color: #4080ff;" href="/phongkham-chitiet/{{$cl->clinic_url}}-{{$cl->clinic_id}}/kham-benh">Xem tiếp <i style="color: #4080ff;" class="fa fa-angle-double-right"></i></a>
                                    @else
                                        {!! strip_tags($cl->clinic_desc) !!}
                                    <a class="readmore" style="color: #4080ff;" href="/phongkham-chitiet/{{$cl->clinic_url}}-{{$cl->clinic_id}}/kham-benh">Xem tiếp <i style="color: #4080ff;" class="fa fa-angle-double-right"></i></a>
                                @endif
                                </div><!--Description-->

                                <div>
                                    <p><i class="fa fa-map-marker"></i>{{$cl->clinic_address}}</p>
                                </div><!--Address-->

                                <div class="d-none">
                                    <p><i class="fa fa-stethoscope"></i>

                                            @foreach($cl->specialities as $sp)
                                            @if(count($cl->specialities) > 0)
                                                @if(isset($sp->clinic))
                                                <a href="/danhsach-phongkham/?specialities={{$sp->clinic->specialty_url}}">{{$sp->clinic->speciality_name}}</a>
                                                @endif
                                            @endif
                                            @endforeach</p>



                                </div><!--Clinic-->
                                <div >
                                    <i class="fa fa-user-md"></i> {{count($cl->doctors)}} bác sĩ
                                </div>


                                <div>
                                    <span >Giờ Mở Cửa : <b style="color: #4080ff;">{{$cl->clinic_timeopen}}</b></span>
                                </div><!--Time work-->

                                <div class="call">
                                    <a href="#contact-29068">
                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                        Đặt khám nhanh
                                    </a>
                                    <a href="#" >
                                        <i class="fa fa-heart" aria-hidden="true"></i> Ghi nhớ
                                    </a>
                                </div>
                            </div>

                        </li>
                    @endforeach
                    @endif
                </ul>
            </div><!--Doctor Info-->
        </div><!--List doctor-->
</div>

        <div class="row"></div>
        <div>
            <div class="container">
                <div class="pagination" style="">
                 {!! $clinics->appends(request()->input())->links(); !!}
                </div>
            </div>
        </div>
@endsection
