@extends('v2/structor/main',['title'=> 'Bác sĩ của tôi'])
@section('content')
<?php
$chat_html = '';
if(!Session::get('user')==null){
    //room_464103899
    //room_454103455
    $chat_html = '<a data-doctor="89237" href="javascript:void(0);" class="goi-cho-bac-si btn btn-ok btn-rounded click-to-start-chat" data-my-name="'.Session::get('user')->fullname.'" data-client-name="doctor_name" data-chat-to="room_464103899" data-chat-room="room_464103899_'.Session::get('user')->user_id.'"><i class="fas fa-phone"></i> 
        Gọi cho doctor_name
    </a>';
}else{
    $chat_html = '<a data-doctor="89237" href="javascript:void(0);" class="goi-cho-bac-si btn btn-ok btn-rounded btn-login-to-chat" data-url="/frameLogin"><i class="fas fa-phone"></i> 
        Gọi cho doctor_name
    </a>';
}

function bi_button_goi_cho_bac_si_name($user_id, $doctor_id, $doctor_name, $chat_html){
    $chat_html = str_replace('464103899', $user_id, $chat_html);
    $chat_html = str_replace('89237', $doctor_id, $chat_html);
    $chat_html = str_replace('doctor_name', $doctor_name, $chat_html);
    return $chat_html;
}
?>
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
<div class="container">
        <!--List Doctors-->
        <div class="list">
            <div id="content">
                <div class="dt">
                    <ul><?php $number_doctor = 0; ?>
                        @if(isset($doctors))
                        @foreach($doctors as $dr)
                        <?php $number_doctor++; ?>
                            <li>
                                <div id="avatar">
                                    <div style="text-align: center; font-weight: bold;color: #E84F5E;">TDOCTOR: {{$dr->doctor_id}}</div>
                                    <a href="/danh-sach-bac-si-chi-tiet/{{$dr->doctor_url}}-{{$dr->doctor_id}}/{{$dr->doctorspeciality->speciality->specialty_url or null}}" style="background-image: url(
                                        <?php
                                            if (strlen(strstr("$dr->profile_image", "https://dwbxi9io9o7ce.cloudfront.net")) > 0) {
                                                echo "$dr->profile_image";
                                            }
                                            else{
                                                echo "/public/images/doctor/$dr->profile_image";
                                            }
                                         ?>);"></a>
                                </div><!--Avatar-->
                                
                                <div class="content">
                                    <div class="name">
                                        <a href="/danh-sach-bac-si-chi-tiet/{{$dr->doctor_url}}-{{$dr->doctor_id}}/{{$dr->doctorspeciality->speciality->specialty_url or null}}">{{$dr->doctor_name}}</a>
                                        <!-- <a title="Nhấn vào để trò chuyện" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$dr->doctor_name}}" data-chat-to="room_{{$dr->user_id}}" data-chat-room="room_{{Session::get('user')->user_id}}_{{$dr->user_id}}" target="_blank" href="javascript:void(0);"  class="click-to-start-chat">{{$dr->doctor_name}}</a> -->
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
                                         <a style=" color: #2fa4e7;" href="/danh-sach-bac-si-chi-tiet/?q={{$dr->doctor_address}}&key=city">
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
                                        <?php echo bi_button_goi_cho_bac_si_name($dr->user_id, $dr->doctor_name.' '.$dr->doctor_id , $dr->doctor_name, $chat_html); ?>
                                        @if(false)
                                        <i class="fas fa-phone"></i> 
                                        <!--<a  href="/chat" class="bt button secondary" title="Chat với {{$dr->doctor_name}}">
                                        Chat Với {{$dr->doctor_name}}</a>-->
                                        <a title="Nhấn vào để trò chuyện" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$dr->doctor_name}}" data-chat-to="room_{{$dr->user_id}}" data-chat-room="room_{{Session::get('user')->user_id}}_{{$dr->user_id}}" target="_blank" href="javascript:void(0);"  class="bt button secondary click-to-start-chat">Chat Với {{$dr->doctor_name}}</a>
                                        <br>
                                        @endif
                                        
                                    </div><!--Chat-->
                                    
                                    <div >
                                        <p style="font-weight: bold; float: left; margin-right: 10px;" ><b>Giờ làm việc: </b>{{$dr->doctor_timework}}</p>

                                        <p style="font-weight: bold; color: #E84F5E;" >
                                        <?php

                                            if($dr->price != null)
                                            {
                                                echo $dr->price;
                                            }
                                            else
                                            {
                                                echo 1000;
                                            }
                                        ?>
                                        Vnđ/Phút</p>
                                    </div><!--Time work-->
                                </div>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                </div><!--Doctor Info-->
                <div class="pagination" style="">
                   @if($number_doctor == 0)
                   <script type="text/javascript">
                       window.location.href= '/danh-sach-bac-si';
                   </script>
                   @endif
                    
                    <span >
                        {!! $doctors->appends(request()->input())->links(); !!}
                    </span>
                   
                </div>
            </div>
        </div><!--List doctor-->
</div>

@endsection