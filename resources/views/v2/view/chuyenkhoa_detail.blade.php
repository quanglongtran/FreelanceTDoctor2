@extends('v2/structor/mainv3',['title'=> 'Hỏi bác sĩ - Chuyên khoa '.$speciality->speciality_name, 'meta_keywords' => $speciality->speciality_desc, 'description' => $speciality->speciality_desc])
@section('content')
<style type="text/css">
main {
    background-color: #F2F8FF;
}

.goi-cho-bac-si-style {
    display: inline-block;
    background: transparent;
    color: #EA222D;
    text-transform: none;
    font-weight: 700;
    font-size: 13px;
    border: 1px solid;
    border-radius: 10px;
    padding: 5px 12px;
}

.goi-cho-bac-si-style:hover {
    background: transparent;
}

.anwer__header {
    justify-content: left;
}

</style>
<main>
        <div class="top-banner">
            <div class="container">
                <div class="banner__inner">
                    <!-- <img src="../public/v3/assets/image/banner.jpg" alt="Khám bệnh online với bác sĩ Tdoctor.vn"> -->
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Banner v3 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="3751122378"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                </div>
            </div>
        </div>
        <div class="content-page">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <section class="content">
                            <div class="doctor">
                                <div class="block__header d-flex align-items-center justify-content-between">
                                    <div class="header__block block--bg only-sp">
                                        <img src="../../public/v3/assets/image/comm.png" alt="Đặt câu hỏi miễn phí">
                                        <span>Đặt câu hỏi miễn phí</span>
                                    </div>
                                    <h3 class="block__title">
                                        Các bác sĩ nổi bật trong chuyên khoa này
                                    </h3>
                                    <a href="../../danh-sach-bac-si?speciality={{$speciality->specialty_url}}">Xem tất cả</a>
                                </div>
                                @if(isset($doctors))
                                <div class="slider__doctor slider-bac-si-chuyen-khoa">
                                	@foreach($doctors as $doc)
                                    <div class="item">
                                        <a href="/danh-sach-bac-si-chi-tiet/{{$doc->doctor_url}}-{{$doc->doctor_id}}/{{$doc->doctorspeciality->speciality->specialty_url or null}}" class="slider__img">
                                            <img src="@if($doc->profile_image!=null) @if(strpos($doc->profile_image, 'http')===false)https://tdoctor.vn/public/images/doctor/@endif{{$doc->profile_image}}@endif"
                                             alt="{{$doc->doctor_name}}" title="{{$doc->doctor_name}}"/>
                                        </a>
                                        <span>
                                            
                                        </span>
                                        <a href="/danh-sach-bac-si-chi-tiet/{{$doc->doctor_url}}-{{$doc->doctor_id}}/{{$doc->doctorspeciality->speciality->specialty_url or null}}" class="name">{{$doc->doctor_name}}</a>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="doctor">
                                <div class="block__header d-flex align-items-center justify-content-between">
                                    <h3 class="block__title">
                                        Các cơ sở y tế nổi bật trong chuyên khoa này
                                    </h3>
                                    <a href="../danhsach-phongkham?speciality={{$speciality->specialty_url}}">Xem tất cả</a>
                                </div>
                                @if(isset($clinics))
                                <div class="slider__doctor slider-bac-si-chuyen-khoa slider-bac-si-chuyen-khoa-pk">
                                	@foreach($clinics as $cs)
                                    <div class="item">
                                        <a href="https://tdoctor.vn/goto/{{$cs->clinic_id}}-3"><img src="@if($cs->profile_image!=null) @if(strpos($cs->profile_image, 'http')===false)https://tdoctor.vn/public/images/health_facilities/@endif{{$cs->profile_image}}@endif"
                                                 alt="{{$cs->clinic_name}}" title="{{$cs->clinic_name}}"/></a>
                                        <a href="https://tdoctor.vn/goto/{{$cs->clinic_id}}-3" class="name">{{$cs->clinic_name}}</a>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="question-block">
                                <h3 class="block__title">
                                    Các câu hỏi mới nhất 
                                </h3>
                                @if(!empty($questions))
            					@foreach($questions as $ques)
            					<?php $question = $ques; ?>
                                <div class="question-related">
                                    <h4>{{$speciality->speciality_name}}</h4>
                                    <a href="/hoibacsi/{{$ques->question_url}}-{{$ques->question_id}}/" class="question__name">{{$ques->question_title}}</a>
                                    <p class="question__add">Hỏi bởi <span>@if($question->fullname!=null)
                                    {{$question->fullname}}
                                @endif</span>, @if($question->address)
	                                ({{$ques->address}}),
	                                @endif
                                        lúc <?php echo date("d/m/Y H:i", strtotime($ques->created_at)); ?>
                                    </p>
                                    {{\App\Helpers\StringHelper::bi_get_content_readmore($ques->question_content)}}

                                 	@if(count($question->answers)>0)
				                    @foreach($question->answers as $ans)
			                        @if($ans->answer_type!="customer" && $ans->user != null && $ans->user->doctor != null)
                                    <div class="anwer d-flex">
                                        @if ($ans->user->user_type_id == 2)
                                        @if( $ans->user->doctor()->first() != null)
                                            <a href="../../goto/{{$ans->user->doctor->doctor_id}}-2"><img style="height: 40px;" src="../../public/images/doctor/@if(strpos($ans->user->doctor->profile_image,'http')===false)/@endif{{$ans->user->doctor->profile_image}}" alt="Hình ảnh bác sĩ"></a>
                                        @endif
                                        @else
                                        <a><img style="height: 40px;" src="../../public/images/doctor/@if(strpos($ans->user->doctor->profile_image,'http')===false)/@endif{{$ans->user->doctor->profile_image}}" alt="Hình ảnh bác sĩ"></a>                                        
                                        @endif
                                        <div class="anwer__content">
                                            <div class="anwer__header d-flex">
                                                <div class="respondent">
                                                    <span>Được trả lời bởi</span>
                                                    @if ($ans->user != null)
		                                            @if ($ans->user->user_type_id == 2)
		                                            @if( $ans->user->doctor()->first() != null)
                                                    <h4><a href="../../goto/{{$ans->user->doctor->doctor_id}}-2">{{$ans->user->doctor->doctor_name}}</a></h4>
                                                    @endif
                                                    @endif
                                                    @endif
                                                </div>
                                                @if ($ans->user->user_type_id == 2)
                                                @if( $ans->user->doctor()->first() != null)
                                                    {{\App\Helpers\StringHelper::bi_nut_goi_cho_bs($ans->user->doctor->doctor_name.' '.$ans->user->doctor->doctor_id)}}
                                                    @if(!Session::get('user')==null)
                                                    <a data-auto-click-to="chat-{{$ans->user->user_id}}" href="javascript:void(0);" class="ml-2 goi-cho-bac-si-style btn-chat-vs-bs btn-roundedx btn-ok click-to-start-chat" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$ans->user->doctor->doctor_name}}" data-chat-to="room_{{$ans->user->user_id}}" data-chat-room="room_{{$ans->user->user_id}}_{{Session::get('user')->user_id}}"><i class="fa fa-" aria-hidden="true"></i> Chat với bác sĩ</a>
                                                    @else
                                                    <a href="javascript:void(0);" data-auto-click="chat-{{$ans->user->user_id}}" data-toggle="modal" data-target="#myModal-tai-app" class="ml-2 goi-cho-bac-si-style btn-chat-vs-bs btn-roundedx btn-ok btn-login-to-chat auto-click">Chat với bác sĩ</a>
                                                    @endif
                                                @endif
                                                @endif
                                                    
                                            </div>
                                            {{\App\Helpers\StringHelper::bi_get_content_readmore($ans->answer_content)}} 
                                        </div>
                                    </div>
                                    @else
                                    <div class="anwer reply d-flex">
                                        <img src="../../public/patient/images/benh-nhan.png" alt="Bệnh nhân">
                                        <div class="anwer__content">
                                            <div class="anwer__header d-flex">
                                                <div class="respondent">
                                                    <span>Được trả lời bởi</span>
                                                    <h4>@if($ans->user!=null)
                                                    {{$ans->user->fullname}}
	                                                @else
	                                                    Giấu tên
	                                                @endif</h4>
                                                </div>
                                            </div>
                                            <p class="anwer__text">
                                                {{$ans->answer_content}}
                                            </p>
                                        </div>
                                    </div>
                                    @endif
				                    @endforeach
				                	@endif
				                	@if(Session::has('user') != null)
                                    <div class="enter-anwer">
                                        <h4>Trả lời</h4>
                                        <form name="new-post" class="post-new" action="/traloicauhoiweb" method="POST">
                                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-control-ct d-flex">
                                                <textarea id="" cols="30" rows="10" name="answer_content"></textarea>
                                                <button class="btn-gui-cau-tra-loi btn btn-primary" type="submit">Gửi trả lời</button>
                                            </div>
                                            <input name="question_id" value="{{$question->question_id}}" type="hidden">
                        					<input name="answer_user_id" value="{{Session::get('user')->user_id}}" type="hidden">
                                        </form>
                                    </div>
                                    @else
                                    <div class="enter-anwer">
                                        <h4>Trả lời</h4>
                                        <div name="new-post" class="post-new" action="/traloicauhoiweb" method="POST">
                                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-control-ct d-flex">
                                                <textarea class="btn-comment" id="" cols="30" rows="10" name="body"></textarea>
                                                <button class="btn btn-primary btn-comment" type="submit">Gửi trả lời</button>
                                            </div>
                                            <input name="question_id" value="{{$question->question_id}}" type="hidden">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
           					 	@endif
                            </div>

                            <div class="pagination d-flex align-items-center justify-content-center">
                            	{!!$questions->appends(request()->query())->links()!!}
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3">
                        <aside>
                            <div class="block__aside">
                                <h4 class="block__aside-title">{{$speciality->speciality_name}}</h4>
                                <p>{!!$speciality->speciality_desc!!}</p>
                            </div>
                            <div class="block__aside">
                                <h4 class="block__aside-title">
                                    Các tuyển chọn Bác sĩ
                                </h4>
                                {{--*/ $index = 0 /*--}}
                                @if(!empty($specs = $speciality->doctors($speciality->speciality_id)))
                        		@foreach($specs as $doc) {{--*/ $index ++ /*--}}
                            	@if($index <= 5)
                                <div class="asider-doctor__item">
                                    <a href="../../goto/{{$doc->doctor_id}}-2">
                                        <img src="<?php
                                       if (strlen(strstr("$doc->profile_image", "https://dwbxi9io9o7ce.cloudfront.net")) > 0) {
                                           echo "$doc->profile_image";
                                       }
                                       else{
                                           echo "../../public/images/doctor/$doc->profile_image";
                                       }
                                       ?>" alt="Hình ảnh bác sĩ">
                                   </a>
                                    <div class="doctor__item-desc">
                                        <span></span>
                                        <p><a href="../../goto/{{$doc->doctor_id}}-2">{{$doc->doctor_name}}</a></p>
                                    </div>
                                </div>
                    			@endif
                             	@endforeach
                    			@endif

                                <a href="../../danh-sach-bac-si/ca-nuoc/{{$speciality->specialty_url}}" class="doctor__item-more">
                                    <span>Xem thêm</span>
                                    <img src="../../public/v3/assets/image/loadmore-red.png" alt="Xem thêm bác sĩ trong chuyên khoa">
                                </a>
                            </div>
                            <div class="block__aside">
                                <h4 class="block__aside-title">
                                    Các tuyển cơ sở Y tế
                                </h4>
                                {{--*/ $index = 0 /*--}}
                                @if(!empty($specs = $speciality->clinics($speciality->speciality_id)))
                        		@foreach($specs as $cs) {{--*/ $index ++ /*--}}
                            	@if($index <= 5)
                                <div class="block__address">
                                    <a href="../../goto/{{$cs->clinic_id}}-3">
                                        <img src="
                                       <?php
                                       if (!empty($cs->profile_image) && strlen(strstr("$cs->profile_image", "https://dwbxi9io9o7ce.cloudfront.net")) > 0) {
                                           echo "$cs->profile_image";
                                       }
                                       else{
                                           echo "../../public/images/health_facilities/$cs->profile_image";
                                       }
                                       ?>" alt="{{$cs->clinic_name}}">
                                   </a>
                                    <h3><a href="../../goto/{{$cs->clinic_id}}-3">{{$cs->clinic_name}}</a></h3>
                                </div>
                    			@endif
                                @endforeach
                    			@endif

                                <a href="../../danhsach-phongkham?speciality={{$speciality->specialty_url}}" class="doctor__item-more">
                                    <span>Xem thêm</span>
                                    <img src="../../public/v3/assets/image/loadmore-red.png" alt="Xem thêm cơ sở y tế">
                                </a>
                            </div>
                            <div class="aside-banner">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Chuyen khoa V3 1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="6557185479"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                            </div>
                            <div class="aside-banner">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7940791875056931"
     crossorigin="anonymous"></script>
<!-- Chuyen khoa v3 2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="8991777127"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection