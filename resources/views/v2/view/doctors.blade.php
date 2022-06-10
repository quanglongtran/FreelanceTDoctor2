<?php 
// $selectsp = request()->input('speciality');
// var_dump($sp);
// var_dump($province);
// var_dump($province->name);
$page_title = 'Danh mục Bác sĩ';
$meta_keywords = 'danh sách bác sĩ, hệ thống bác sĩ, bác sĩ chuyên khoa, bác sĩ giỏi, bác sĩ uy tín, danh mục bác sĩ';
$province_name = '';
if(isset($province) && $province != null){
    $province_name = ' tại '.$province->name;
}   
if(isset($sp) && $sp != null){
    $meta_keywords = 'bác sĩ '.$sp->speciality_name.' khoa'.$province_name.',
    bác sĩ chuyên khoa '.$sp->speciality_name.''.$province_name.',
    bác sĩ '.$sp->speciality_name.''.$province_name.',
    bác sĩ '.$sp->speciality_name.' giỏi'.$province_name.',
    hỏi bác sĩ '.$sp->speciality_name.''.$province_name.',
    khám bệnh '.$sp->speciality_name.''.$province_name.',
    bác sĩ '.$sp->speciality_name.' tư vấn'.$province_name.',
    bác sĩ '.$sp->speciality_name.' bệnh viện trung ương'.$province_name.'';
    $page_title .= ' '.$sp->speciality_name;
}else{
    $meta_keywords = 'danh sách bác sĩ'.$province_name.',
    hệ thống bác sĩ'.$province_name.',
    bác sĩ chuyên khoa'.$province_name.',
    bác sĩ giỏi'.$province_name.',
    bác sĩ uy tín'.$province_name.',
    danh mục bác sĩ'.$province_name.'';
}
if(!Session::get('user')==null){
    //room_464103899
    //room_454103455
    $chat_html = '<a data-auto-click-to="call-89237" data-doctor="89237" href="javascript:void(0);" class="goi-cho-bac-si btn btn-ok btn-rounded click-to-start-chat" data-my-name="'.Session::get('user')->fullname.'" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_'.Session::get('user')->user_id.'"><i class="fas fa-phone"></i> 
        Gọi cho doctor_name
    </a>';
}else{
    $chat_html = '<a data-auto-click="call-89237" data-doctor="89237" href="javascript:void(0);" class="goi-cho-bac-si btn btn-ok btn-rounded btn-login-to-chat auto-click" data-url="/frameLogin"><i class="fas fa-phone"></i> 
        Gọi cho doctor_name
    </a>';
}

function bi_button_goi_cho_bac_si_name($doctor_id, $doctor_name, $chat_html){
    $chat_html = str_replace('89237', $doctor_id, $chat_html);
    $chat_html = str_replace('doctor_name', $doctor_name, $chat_html);
    return $chat_html;
}

?>

@extends('v2/structor/main',['title'=> $page_title.$province_name, 'meta_keywords' => $meta_keywords])
@section('content')
<style type="text/css">
#chat a{
    text-transform: none;
    font-weight: 700;
    padding: 5px 10px;
    background: #e84f5e;
    color: #fff!important;
    border-radius: 15px;
    box-shadow: 0px 1px 2px 1px #6c757d;
    border: 0 none;
}
#chat a:hover {
    margin-left: 5px;
}
@media screen and (max-width:  767px){
li.row.row-list-doctors {
    display: block;
    overflow: hidden;
    padding: 0 15px;
}

}
</style>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.form-tim-kiem-bs').submit(function(event){
            var doctor_id = $('[name="doctor_id"]').val();
            if(doctor_id && doctor_id != ''){

            }else{
                event.preventDefault();
                window.location.href = '/danh-sach-bac-si/'+$('[name="province"]').val() +'/'+$('[name="speciality"]').val();
            }
        })
    })

    jQuery(document).ready(function($){
        $('.goi-cho-bac-si.click-to-start-chat').click(function(){
            console.log('chat voi ho tro vien de goi cho bs');
            _that_gbs = $(this);
            setTimeout(function(){
                $('.chat-box.active textarea').val('Tôi muốn gọi cho '+ _that_gbs.attr('data-doctor'));
                $('.chat-box.active .btn-send-chat-message').click();
            }, 300);
        })
    })
</script>
<div class="container">
        <br>
        @if(request()->input('q')!==null)
        <div id="search">        
            <ul>
                <li>
                    <span>Tìm kiếm theo:</span>
                </li>                
                <li>
                    <a href="/danhsach-phongkham/?q={{request()->input('q')}}">
                        Phòng khám ({{$clinic or '0' }})
                    </a>
                </li>
                 <li>
                    <a href="/danh-sach-nha-thuoc/?q={{request()->input('q')}}" >
                        Nhà thuốc ({{$drugstore or '0' }})
                    </a>
                </li>
                
                <li>
                    <a href="/danh-sach-bac-si/?q={{request()->input('q')}}" class="active">
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
                <li>
                    <a href="/danh-sach-tin-tuc/?q={{request()->input('q')}}">
                        Tin tức ({{$tintuc or '0'}})
                    </a>
                </li>
            </ul>        
        </div><!-- #Nav search -->
        @endif
        <br>
         <div class="search">
            <h3>Tìm bác sĩ bằng cách Chọn tỉnh thành bạn đang sinh sống, Chọn chuyên khoa bạn muốn khám, rồi ấn "Lọc tìm kiếm"</h3>
            <form action="" method="" class="form-inline form-tim-kiem-bs">
                <div class="form-field">
                <select class="select s1" name="province">
                    <option value="ca-nuoc">Chọn tỉnh thành</option>
                    <?php $province = App\Province::all();
                        $select = isset($province_input) ? $province_input : null;
                        ?>                  
                        @foreach($province as $pr)
                            <option value="{{$pr->name}}" @if($pr->id==$select)selected="selected" @endif>{{$pr->name}}</option>
                        @endforeach
                </select>
                </div>
                <div class="form-field">
                    <select name ="speciality" class="select s1">
                        <option value="tat-ca-chuyen-khoa">Chọn chuyên khoa</option>
                        <?php $specs = App\Speciality::all();
                        $selectsp = isset($speciality_input) ? $speciality_input : null;
                        ?>
                        
                        @foreach($specs as $sp)
                            <option value="{{$sp->specialty_url}}" @if($sp->specialty_url===$selectsp)selected="selected" @endif>{{$sp->speciality_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-field">
                    <input class="select s1" placeholder="Mã bác sĩ (nếu có)" name="doctor_id" style="width: 100%;padding: 5px;border: 1px solid #848991;border-radius: 3px;color: black;background-color: rgba(255, 255, 255, 0.8);opacity: 0.6;height: 40px;">
                </div>
                <div >
                    <button type="submit" class="but btn-loc-timkiem">Lọc tìm kiếm</button>
                </div>
                
            </form>
        </div><!--.Search-->
        <!--List Doctors-->
        <br>
        <div class="list">
            <div id="content">
                <div class="dt">
                    <ul>
                        @if(isset($doctors))
                        @foreach($doctors as $dr)
                            <li class="row row-list-doctors">

                                <div id="avatar">
                                    <div style="text-align: center; font-weight: bold;color: #E84F5E;">TDOCTOR: {{$dr->doctor_id}}</div>
                                    <a href="/danh-sach-bac-si-chi-tiet/{{$dr->doctor_url}}-{{$dr->doctor_id}}/{{$dr->doctorspeciality->speciality->specialty_url or null}}" style="background-image: url('<?php
                                            if (strlen(strstr("$dr->profile_image", "https://dwbxi9io9o7ce.cloudfront.net")) > 0) {
                                                echo "$dr->profile_image";
                                            }
                                            else{
                                                echo "/public/images/doctor/$dr->profile_image";
                                            }
                                         ?>');"></a>
                                </div><!--Avatar-->
                                
                                <div class="content content-doctor">
                                    <div class="name">
                                        <a href="/danh-sach-bac-si-chi-tiet/{{$dr->doctor_url}}-{{$dr->doctor_id}}/{{$dr->doctorspeciality->speciality->specialty_url or null}}">{{$dr->doctor_name}}</a>
                                    </div><!--Name-->
                                    <div class="desc">
                                        @if(!empty($dr->doctor_description)|| $dr->doctor_description!='')
                                            {{$dr->doctor_description}}
                                        @if(strlen($dr->doctor_description)>200 && strpos($dr->doctor_description, ' ', 200)!="")
                                        {!!substr( $dr->doctor_description, 0, strpos($dr->doctor_description, ' ', 200) )!!}
                                        
                                            <a class="readmore" style="color: #2fa4e7;" href="/danh-sach-bac-si-chi-tiet/{{$dr->doctor_url}}-{{$dr->doctor_id}}/{{$dr->doctorspeciality->speciality->specialty_url or null}}">Xem tiếp <i style="color: #2fa4e7;" class="fa fa-angle-double-right"></i></a>
                                        @endif
                                        @endif
                                    </div><!--Description-->
                             
                                    <div>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                             <b >Địa chỉ: </b>
                                             <a style=" color: #2fa4e7;" href="/danh-sach-bac-si?q={{$dr->doctor_address}}&key=city">
                                            @if(strtolower(request()->input('q')) == strtolower($dr->doctor_address))
                                                    <b >{{$dr->doctor_address}}</b>
                                                @else 
                                                    {{$dr->doctor_address}}
                                                @endif
                                            </a>
                                        
                                    </div><!--Address-->
                              
                                    <div>   

                                        <p><i class="fa fa-hospital-o"></i><b> Nơi công tác:</b> {!!$dr->doctor_clinic!!}</p>
                                    </div><!--Clinic-->
                                 
                                    <div id="chat">
                                        
                                        <?php echo bi_button_goi_cho_bac_si_name($dr->doctor_name .' '. $dr->doctor_id, $dr->doctor_name, $chat_html); ?>
                                        @if(false)
                                        <a  href="/goto/{{$dr->doctor_id}}-2" class="bt button secondary" title="Gọi {{$dr->doctor_name}}">
                                        Gọi {{$dr->doctor_name}}</a><br>
                                        @endif
                                        
                                    </div><!--Chat-->
                                    
                                    <div >
                                        <p style="font-weight: bold; float: left; margin-right: 10px;" ><b>Giờ làm việc: </b>{{$dr->doctor_timework}}</p>

                                        <p style="font-weight: bold; color: #E84F5E;" >
                                        <?php
                                            if($dr->doctor_fullinfo == NULL || $dr->doctor_fullinfo == ''){
                                            if($dr->price != null)
                                            {
                                                echo $dr->price;
                                            }
                                            else
                                            {
                                                echo 1000;
                                            }
                                            }
                                        ?>
                                        Vnđ/Phút</p>
                                    </div><!--Time work-->
                                </div>
                                @if(false)
                                <ins class="adsbygoogle"
                                     style="display:inline-block;width: 250px; text-align:center;"
                                     data-ad-layout="in-article"
                                     data-ad-format="fluid"
                                     data-ad-layout-key="-fz-1v+m-c0+<?php echo time(); ?>"
                                     data-ad-client="ca-pub-7940791875056931"
                                     data-ad-slot="9472089080"></ins>
                                <script>
                                     (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                                @endif
                            </li>
                        @endforeach
                        @endif
                    </ul>
                </div><!--Doctor Info-->
                <div class="container" style=""> 
                    <div class="pagination d-flex align-items-center justify-content-center">
                        {!! $doctors->appends(request()->input())->links(); !!}
                   
                    </div>
                </div>
            </div>
        </div><!--List doctor-->
</div>

@endsection