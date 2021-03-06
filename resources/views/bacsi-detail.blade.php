<?php $doctorname = isset($doctor)? $doctor->doctor_name : ''?>
@extends('main',['title'=> 'Bác sĩ '.$doctorname])


@section('content')
  
  			
@if(isset($doctor))	
  <div id="main">
			
		
<div id="page-title">
	<div class="background"></div>
	<div class="mask">
		<div class="position">
			<div class="inner">
				<ul class="breadcrumbs">
                    {{--<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">--}}
					{{--<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">--}}
						{{--<a href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>--}}
					{{--</li>--}}
					{{----}}
						{{--<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">--}}
							{{--<a href="/danh-sach/bac-si/?occupation=Bác sĩ" itemprop="url"><span itemprop="title">Bác sĩ</span></a>--}}
						{{--</li>--}}
					{{----}}
					{{----}}
						{{--<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">--}}
							{{--<a itemprop="url" href="/danh-sach/bac-si/?specialities=san-phu"><span itemprop="title">Sản phụ khoa</span></a>--}}
						{{--</li>--}}

				</ul>

				<h1>
					
						{{$doctor->doctor_name}}
					

					

					
						<span class="verified-badge has-tooltip">
							<em>Chính thức</em>
							<span class="tooltip">Nội dung trang này được trực tiếp quản lý bởi Bác sĩ {{$doctor->doctor_name}}</span>
						</span>
					
				</h1>
			</div>
		</div>
	</div>
</div>

<div id="detail">

	<div id="sticky-wrapper" class="sticky-wrapper is-sticky">

	</div>

	<div class="position">

		<aside>
			<div class="summary-container">
				<div class="media">
					<div id="hero-image" class="primary carousel owl-carousel owl-loaded owl-drag" data-sync="#hero-carousel">
						
							
						
					<div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 280px;"><div class="owl-item active selected" style="width: 280px;"><div class="item">
					
								<a href="#" style="background-image: url(

								<?php
                            if (strlen(strstr("$doctor->profile_image", "https://dwbxi9io9o7ce.cloudfront.net")) > 0) {
                                echo "$doctor->profile_image";
                            }
                            else{
                                echo "https://tdoctor.vn/public/images/doctor/$doctor->profile_image";
                            }
                            
                         ?>

								)"></a>
							</div></div></div></div><div class="owl-nav disabled"><div class="owl-prev disabled"></div><div class="owl-next disabled"></div></div><div class="owl-dots disabled"></div></div>
					
					
						<div class="full-sized-images owl-carousel">
							
								
									<div class="item">
										<div class="image" 
										style="background-image: url({{url('public/images/doctor/'.$doctor->profile_image)}})">
										</div>
										
											<div class="caption">
												<div>
													Bác sĩ {{$doctor->doctor_name}}
												</div>
											</div>
										
									</div>
								
							
						</div>
					

					<div class="call-to-action">
						
							<a disabled="disabled" href="#dat-kham" class="sticky-nav-link action-book button" title="Đặt khám với bác sĩ Đỗ Thị Ngọc Lan" data-professional-id="42">
								<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
								Đặt khám ngay
							</a>
						

							<br />
						<br />
						<a href="https://tdoctor.vn/dang-ky" class="button secondary" title="Chát với {{$doctor->doctor_name}}">
                        	Chát Với {{$doctor->doctor_name}}
                            <!-- <?php 
                                $us = App\Users::where('user_id',$doctor->user_id)->get(); 
                                foreach($us as $u) : ?>
                                    <div id="cometchat_userlist_{{$u->user_id}}" class="cometchat_userlist" onmouseover="jqcc(this).addClass('cometchat_userlist_hover');" onmouseout="jqcc(this).removeClass('cometchat_userlist_hover');" amount="0"><span class="cometchat_userscontentavatar"></span><div class="cometchat_chatboxDisplayDetails"><div class="cometchat_userdisplayname"> Chát Với {{$doctor->doctor_name}}</div><span id="cometchat_buddylist_typing_{{$u->user_id}}" class="cometchat_buddylist_typing"></span><span class="cometchat_userscontentdot cometchat_away"></span><div class="cometchat_userdisplaystatus"></div></div><span class="cometchat_msgcount"><div class="cometchat_msgcounttext" style="display:none;">0</div></span></div>
                                <?php endforeach ?> -->
                           
                            
                        </a>
					</div>
				</div>


		<!--  		<div class="summary">
					<dl class="contact-info">
						
							<dt>
								<i class="fa fa-graduation-cap"></i>
							</dt>
							<dd>
								
								
										
											<a href="/danh-sach/bac-si/?degrees=bac-si-chuyen-khoa-ii">Bác sĩ chuyên khoa II</a>
										
								
							</dd>
						
						
							<dt><i class="fa fa-caret-right"></i></dt>
							<dd><ul>
	<li>
	<p>Trưởng khoa Phụ ngoại - Bệnh viện Phụ sản Trung ương</p>
	</li>
	<li>
	<p>Bác sĩ&nbsp;hỗ trợ chuyên môn - Bệnh viện Phụ sản An Thịnh</p>
	</li>
	<li>
	<p>Bác sĩ Sản phụ khoa - Bệnh viện Đa khoa quốc tế Vinmec - Cơ sở Minh Khai</p>
	</li>
	<li>
	<p>Bác sĩ tại phòng khám Sản phụ khoa Đỗ Thị Ngọc Lan</p>
	</li>
</ul>
</dd>
						

						

						
							<dt><i class="fa fa-globe"></i></dt>
							<dd>
								
									<a href="/danh-sach/bac-si/?languages_spoken=tieng-viet">Tiếng Việt</a>
								
							</dd>
						
						
					</dl></div> -->
			</div>
		</aside>

		
			

<div class="content">

	<div class="desc">

		

		
			<section class="has-subsections">
				<div class="contribution">
					<ul>
						<li>
							<a href="#nhan-xet" class="sticky-nav-link">
								<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
								<span>Hài lòng</span>
								<strong>0</strong>
							</a>
						</li>

						<li>
							<a href="#nhan-xet" class="sticky-nav-link">
								<i class="fa fa-commenting" aria-hidden="true"></i>
								<span>Nhận xét</span>
								<strong>0</strong>
							</a>
						</li>

						<li>
							<a href="#activity">
								<i class="fa fa-reply" aria-hidden="true"></i>
								<span>Câu trả lời</span>
								<strong>0</strong>
							</a>
						</li>

						<li>
							<a href="#activity">
								<i class="fa fa-heart" aria-hidden="true"></i>
								<span>Cảm ơn</span>
								<strong>64</strong>
							</a>
						</li>
					</ul>
				</div>
					<div class="subsection">
						<h2 id="chuyen-khoa"><i class="fa fa-stethoscope"></i> Chuyên khoa</h2>
						<div class="inner cms has-readmore-content">
							<ul class="original-list">
								@if($doctor->specialities!=null)
								  @foreach($doctor->specialities as $spec)
									<li> <a href="/danh-sach/bac-si/?specialities={{$doctor->doctorspeciality->speciality->specialty_url}}">{{$doctor->doctorspeciality->speciality->speciality_name}}</a> </li>
								  @endforeach
								@endif
							</ul>
						<div class="list-container full-list">

						@if($doctor->specialities!=null)
								  @foreach($doctor->specialities as $spec)
								  <ul>
									<li> <a href="/danh-sach/bac-si/?specialities={{$spec->speciality->specialty_url}}">{{$spec->speciality->speciality_name}}</a> </li>
								  </ul>
								  @endforeach
								@endif


							<ul></ul><ul></ul></div></div>
					</div>
				

				
					<div class="subsection">
						<h2><i class="fa fa-list-ul"></i> Dịch vụ</h2>
						<div class="inner cms has-readmore-content">
							<ul class="original-list">		
							@if($doctor->services !=null)
								@foreach($doctor->services as $ser)
											
									<li> <a href="/danh-sach/bac-si/?services={{$ser->service}}">{{$ser->service}}</a> </li>
												
						
							   @endforeach
						    @endif
						    </ul>
				
						<div class="list-container full-list">
					@if($doctor->services!=null)
						@foreach($doctor->services as $ser)
						<ul>						
									<li> <a href="/danh-sach/bac-si/?services={{$ser->service}}">{{$ser->service['service_name']}}</a> </li>
												
						</ul>
						@endforeach
					@endif
						</div></div>
					</div>
				
			</section>
		

		

   



		
			<section>
				<h2 id="noi-lam-viec"><i class="fa fa-hospital-o"></i> Nơi công tác của {{$doctor->doctor_name}}</h2>
				<div class="inner cms has-readmore-content">
							{!!$doctor->doctor_clinic!!}

						<div class="list-container full-list"><ul>
						<!-- <li> <p>Bệnh viện Phụ sản An Thịnh</p> </li><li> <p>Khoa Sản phụ khoa - Bệnh viện Đa khoa Quốc tế Vinmec - Cơ sở Minh Khai</p> </li></ul><ul><li> <p>Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan</p> </li><li> <p>Khoa Phụ ngoại - Bệnh viện Phụ sản Trung ương</p> </li>
						-->
						</ul></div></div>
						<!-- <div class="inner cms has-readmore-content">
							<ul class="original-list">		
							@if($doctor->clinics !=null)
								@foreach($doctor->clinics as $ser)
											<li> <a href="/co-so-y-te/{{$ser->clinic_url}}-{{$ser->clinic_id}}">{{$ser->clinic_name}}</a> </li>
									
												
						
							   @endforeach
						    @endif
						    </ul>
				
						<div class="list-container full-list">
					@if($doctor->clinics!=null)
						@foreach($doctor->clinics as $ser)
						<ul>						
									<li> <a href="/co-so-y-te/{{$ser->clinic->clinic_url}}-{{$ser->clinic->clinic_id}}">{{$ser->clinic->clinic_name}}</a> </li>
												
						</ul>
						@endforeach
					@endif
						</div></div> -->
			</section>
		

		
			<section class="has-subsections">
				
					<div class="subsection">
						<h2 id="kinh-nghiem"><i class="fa fa-book"></i> Kinh nghiệm</h2>
						<div class="inner cms has-readmore-content">
							{!!$doctor->experience!!}

						<div class="list-container full-list"><ul>
						<!-- <li> <p>Bệnh viện Phụ sản An Thịnh</p> </li><li> <p>Khoa Sản phụ khoa - Bệnh viện Đa khoa Quốc tế Vinmec - Cơ sở Minh Khai</p> </li></ul><ul><li> <p>Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan</p> </li><li> <p>Khoa Phụ ngoại - Bệnh viện Phụ sản Trung ương</p> </li>
						-->
						</ul></div></div>
					</div>
			@if($doctor->training!=null)
				<div class="subsection">
						<h2><i class="fa fa-graduation-cap"></i> Quá trình đào tạo</h2>
						<div class="inner cms has-readmore-content">
							
							<ul class="original-list">
	
</ul>

						<div class="list-container full-list">
						{!!$doctor->training!!}</div></div>
					</div>
				@endif
			</section>
		

		<!-- 
					<section>
				<h2 id="giai-thuong"><i class="fa fa-trophy"></i> Giải thưởng và ghi nhận</h2>
				<div class="inner cms has-readmore-content">
					<ul class="original-list">
	<li> <p>Bằng khen của Thủ tướng Chính phủ</p> </li>
	<li> <p>Bằng khen của Bộ trưởng Bộ y tế</p> </li>
	<li> <p>Danh hiệu Thầy thuốc ưu tú</p> </li>
</ul>

				<div class="list-container full-list"><ul>
				  <li> <p>Bằng khen của Thủ tướng Chính phủ</p> </li><li> <p>Bằng khen của Bộ trưởng Bộ y tế</p> </li></ul><ul><li> <p>Danh hiệu Thầy thuốc ưu tú</p> </li>
				
				</ul></div></div>
			</section>
			-->
		

		

		 <section id="activity">
        <div class="subsection">
            <h2>
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Hoạt động gần đây của {{$doctor->doctor_name}}
              <!--   @if(count($doctor->activity)>0)
                   
                    <a href="/danh-sach/bac-si/{{$doctor->doctor_url or null}}-{{$doctor->doctor_id}}/{{$doctor->doctorspeciality->speciality->specialty_url or null}}/hoat-dong/">Xem tất cả <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                @endif
                -->
            </h2>
            <ul class="activity-list">
            <?php \Carbon\Carbon::setLocale('vi') ?>
                @foreach($doctor->activity as $at)
                <li>
                    <div class="entry-thumb" style="background-image: url({{url('public/images/doctor/'.$doctor->profile_image)}});" ></div>
                    <div class="entry-content">
                        <span class="entry-meta-time"> {!! \Carbon\Carbon::createFromTimeStamp(strtotime($at->created_at))->diffForHumans() !!} |  Trả lời <span>câu hỏi:</span></span>
                        <h4><a href="/hoi-bac-si/{{$at->question['question_url']}}-{{$at->question['question_id']}}/">{{$at->question['question_title']}}</a></h4>
                        <p>
                         @if($at->answer_content!=null)
                          @if(strlen($at->answer_content)>100 && strpos($at->answer_content, ' ', 100)!="")
							{!!substr( $at->answer_content, 0, strpos($at->answer_content, ' ', 100) )!!}		
							
						  @else
						     {!!$at->answer_content!!}		
						  @endif
                        
                        @endif
                        </p>
                        
                        <span class="thank"><i class="fa fa-heart" aria-hidden="true"></i> 0</span>
                        <a href="/hoi-bac-si/{{$at->question['question_url']}}-{{$at->question['question_id']}}/">Chi tiết <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </li>
                @endforeach
               
                
            </ul>

            <div class="view-question">
                <a href="/hoi-bac-si/"><strong>Xem chuyên mục hỏi đáp</strong>Và đặt câu hỏi</a>
            </div>
        </div>
    </section>

		<section class="comments-container">
        <h2 id="nhan-xet"><i class="fa fa-comment-o"></i> Nhận xét về bác sĩ {{$doctor->doctor_name}}</h2>
        <div class="inner">
         
            <div class="comment-form" style="float: left">
             <form method="POST" action="/comment_doctor/{{$doctor->doctor_id}}">
             	<input name="_token" value="{{csrf_token()}}" type="hidden">
						<p>
							Bạn đã sử dụng dịch vụ của bác sĩ {{$doctor->doctor_name}}? Hãy chia sẻ cảm nhận của bạn với cộng đồng.
						</p>
						<p>
							Nếu bạn có câu hỏi về sức khỏe và chuyên môn, vui lòng chuyển sang trang <a href="/hoi-bac-si/dat-cau-hoi/">Hỏi Bác sĩ</a> để được tư vấn miễn phí.
						</p>
						
						<div class="form-row">
							<div class="form-field">
								<label>
									Bình luận:
								</label>
								<div class="form-field-input">
									<textarea name="comment" placeholder="Đánh giá của bạn..." required=""></textarea>
								</div>
							</div>
						</div>
						<div class="form-row indented">
							<div class="form-field">
								<div class="form-field-input">
									<label class="like">
										<input name="like" value="true" type="radio">
										<i class="fa fa-thumbs-o-up"></i> Hài lòng
									</label>
									<label class="dislike">
										<input name="like" value="false" type="radio">
										<i class="fa fa-thumbs-o-down"></i> Không hài lòng
									</label>
								</div>
							</div>
						</div>
						<div class="button-row">
							<input name="professional" value="{{$doctor->doctor_id}}" type="hidden">
							@if(Session::get('user')!=null)
							<button type="submit">Gửi</button>
							@else
							<a href="/dang-nhap?next={{Request::url()}}">Đăng nhập để nhận xét</a>
							@endif
						</div>
					</form>
                <div class="form-success">
                    <h4><i></i>@if(session('thongbao'))
    						{{session('thongbao')}}
   							 @endif</h4>
                  
                </div>
            </div>

            <ul class="comments">
            @if(isset($comment))
            @foreach($comment as $c)
                <li class="comment ">
                            
                         	<?php $user = App\Users::find($c['user_id']); ?>
                               
                        <div class="comment-avatar" style="background-image:  #6193CA"><span><?php  $ten = $user['fullname'];
                              echo substr($ten, 0, 1); ?></span></div>
                            <div class="comment-body">
                                <h4>
                                    <span>
                                        
                                           {{$user['fullname']}}  
                                        
                                    </span>
                                    @if($c->feedback_ > 0)
                                    <span class="star-ratings" data-score="{{$c->feedback_ * 2}}0">
                                    <span class="front" style="width: 100%;"></span></span>
                                    @endif
                                </h4>

                                

                                <div class="comment-content">
                                    <p>{{$c->content}}.</p>
                                </div>

                                
                                    
                                

                                <p class="date">{{$c['created_at']}}</p>
                                <!--
                                <div class="comment-actions">
                                    
                                        <a class=" open-reply-comment " name="place-comment" data-comment-id="90" data-place-id="32209" data-email="xadoaxongtusat4@gmail.com" href="/dang-ky/?type=place&amp;place_name=Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan&amp;place_add=26 ngõ 30&amp;source=register_place&amp;next=/phong-kham-san-phu-khoa-bac-si-do-thi-ngoc-lan-32209/san-phu-khoa">
                                            Trả lời
                                        </a> 
                                    

                                    <strong>
                                        Nhận xét này có hữu ích với bạn không?
                                        <span class="options">
                                            <a href="#" class="comment-voting useful" data-comment-id="90" data-comment-type="place" title="Có">
                                                <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                                                <i class="fa fa-spinner fa-pulse fa-fw loader"></i>
                                                <span>12</span>
                                            </a>
                                            <a href="#" class="comment-voting not-useful" data-comment-id="90" data-comment-type="place" title="Không">
                                                <i class="fa fa-times fa-fw" aria-hidden="true"></i>
                                                <i class="fa fa-spinner fa-pulse fa-fw loader"></i>
                                                <span>3</span>
                                            </a>
                                        </span>
                                    </strong>
                                </div>
							     -->
                            </div>
                </li>
                @endforeach 
               @endif
                                      
                    
                
            </ul>
        </div>
    </section>




<!-- 
			<div class="inner">
				<div class="comment-form">
					<form method="POST" action="#" name="professional-comment" id="comment-post">
						<p>
							Bạn đã sử dụng dịch vụ của bác sĩ Đỗ Thị Ngọc Lan? Hãy chia sẻ cảm nhận của bạn với cộng đồng.
						</p>
						<p>
							Nếu bạn có câu hỏi về sức khỏe và chuyên môn, vui lòng chuyển sang trang <a href="/hoi-bac-si/dat-cau-hoi/">Hỏi Bác sĩ</a> để được tư vấn miễn phí.
						</p>
						
						<div class="form-row">
							<div class="form-field">
								<label>
									Bình luận:
								</label>
								<div class="form-field-input">
									<textarea name="comment" placeholder="Đánh giá của bạn..." required=""></textarea>
								</div>
							</div>
						</div>
						<div class="form-row indented">
							<div class="form-field">
								<div class="form-field-input">
									<label class="like">
										<input name="like" value="true" type="radio">
										<i class="fa fa-thumbs-o-up"></i> Hài lòng
									</label>
									<label class="dislike">
										<input name="like" value="false" type="radio">
										<i class="fa fa-thumbs-o-down"></i> Không hài lòng
									</label>
								</div>
							</div>
						</div>
						<div class="button-row">
							<input name="professional" value="42" type="hidden">
							<button type="submit">Gửi</button>
						</div>
					</form>
					<div class="form-success">
						<h4><i class="fa fa-check-square-o"></i> Cám ơn bạn đã gửi nhận xét!</h4>
						<p>Phản hồi của bạn giúp ích cho cộng đồng khi chọn lựa cơ sở chăm sóc sức khỏe và bác sĩ tốt nhất. Nó cũng góp phần giúp Đỗ Thị Ngọc Lan để tăng chất lượng dịch vụ.</p>
						<p>Hãy tiếp tục chia sẻ trải nghiệm của bạn về các cơ sở y tế và bác sĩ nhé!</p>
					</div>
				</div>

				<ul class="comments">
					
						
							<li class="comment ">
									
										
											<div class="comment-avatar" style="background: #B9C3B5"><span>A</span></div>
										
									

								<div class="comment-body">
									<h4>
										<span>
											
												Quỳnh Anh
											
										</span>

										

										<span class="liking">
											
												<span class="yes"><i class="fa fa-thumbs-o-up"></i> Hài lòng</span>
											
										</span>
									</h4>

									<div class="comment-content">
										<p>Một bác sĩ có tầm, có tâm.</p>
									</div>

									<p class="date">00h50 14-06-2016</p>

									<div class="comment-actions">
										
											<a class=" open-reply-comment " name="professional-comment" data-comment-id="304" data-professional-id="42" data-email="vanchon.ngo@gmail.com" href="/dang-ky/?type=professional&amp;prof_place=Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan&amp;prof_spec=Sản phụ khoa&amp;source=register_prof&amp;next=/danh-sach/bac-si/do-thi-ngoc-lan-42/san-phu-khoa">
												Trả lời
											</a> |
										

										<strong>
											Nhận xét này có hữu ích với bạn không?
											<span class="options">
												<a href="#" class="comment-voting useful" data-comment-id="304" data-comment-type="professional" title="Có">
													<i class="fa fa-check fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>10</span>
												</a>
												<a href="#" class="comment-voting not-useful" data-comment-id="304" data-comment-type="professional" title="Không">
													<i class="fa fa-times fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>2</span>
												</a>
											</span>
										</strong>
									</div>
								</div>
							</li>

						
							<li class="comment ">
									
										
											<div class="comment-avatar" style="background: #C9F613"><span>H</span></div>
										
									

								<div class="comment-body">
									<h4>
										<span>
											
												Võ Thị Hằng
											
										</span>

										

										<span class="liking">
											
												<span class="yes"><i class="fa fa-thumbs-o-up"></i> Hài lòng</span>
											
										</span>
									</h4>

									<div class="comment-content">
										<p>Thưa bác sĩ. Em có thai 36 tuần, em bé nặng 3,1 kg, em siêu âm bác sĩ khám em bị dư ối ,chỉ số nước ối của em là 22cm và cho em uống thuốc cofuroxim 500mg ngày uống 2 viên và nấu nước mã đề uống thay nước lọc hằng ngày như vậy có được không?  Bí dư ối có ảnh hưởng gì không và làm thế nào để giảm được lượng nước ối.<br>
Em xin cảm ơn.</p>
									</div>

									<p class="date">13h49 13-10-2016</p>

									<div class="comment-actions">
										
											<a class=" open-reply-comment " name="professional-comment" data-comment-id="1203" data-professional-id="42" data-email="vanchon.ngo@gmail.com" href="/dang-ky/?type=professional&amp;prof_place=Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan&amp;prof_spec=Sản phụ khoa&amp;source=register_prof&amp;next=/danh-sach/bac-si/do-thi-ngoc-lan-42/san-phu-khoa">
												Trả lời
											</a> |
										

										<strong>
											Nhận xét này có hữu ích với bạn không?
											<span class="options">
												<a href="#" class="comment-voting useful" data-comment-id="1203" data-comment-type="professional" title="Có">
													<i class="fa fa-check fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>3</span>
												</a>
												<a href="#" class="comment-voting not-useful" data-comment-id="1203" data-comment-type="professional" title="Không">
													<i class="fa fa-times fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
											</span>
										</strong>
									</div>
								</div>
							</li>

						
							<li class="comment ">
									
										
											<div class="comment-avatar" style="background: #F1F8A5"><span>B</span></div>
										
									

								<div class="comment-body">
									<h4>
										<span>
											
												hồng bích
											
										</span>

										

										<span class="liking">
											
										</span>
									</h4>

									<div class="comment-content">
										<p>cho e xin sdt bác sỹ</p>
									</div>

									<p class="date">14h50 07-10-2016</p>

									<div class="comment-actions">
										
											<a class=" open-reply-comment " name="professional-comment" data-comment-id="1150" data-professional-id="42" data-email="vanchon.ngo@gmail.com" href="/dang-ky/?type=professional&amp;prof_place=Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan&amp;prof_spec=Sản phụ khoa&amp;source=register_prof&amp;next=/danh-sach/bac-si/do-thi-ngoc-lan-42/san-phu-khoa">
												Trả lời
											</a> |
										

										<strong>
											Nhận xét này có hữu ích với bạn không?
											<span class="options">
												<a href="#" class="comment-voting useful" data-comment-id="1150" data-comment-type="professional" title="Có">
													<i class="fa fa-check fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>2</span>
												</a>
												<a href="#" class="comment-voting not-useful" data-comment-id="1150" data-comment-type="professional" title="Không">
													<i class="fa fa-times fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
											</span>
										</strong>
									</div>
								</div>
							</li>

						
							<li class="comment child">
									
										
											<div class="comment-avatar"></div>
										
									

								<div class="comment-body">
									<h4>
										<span class="staff-name" title="Phản hồi chính thức">
											
												Chăm sóc khách hàng  ViCare 
											
										</span>

										

										<span class="liking">
											
										</span>
									</h4>

									<div class="comment-content">
										<p>Dạ cảm ơn anh/chị đã sử dụng dịch vụ của ViCare. Anh/chi có thể liên hệ đến phòng khám bác sĩ Đỗ Thị Ngọc Lan theo số điện thoại sau ạ: 0439745150</p>
									</div>

									<p class="date">11h46 08-10-2016</p>

									<div class="comment-actions">
										
											<a class="open-edit-comment" name="professional-comment" data-comment-id="1159" href="#">Sửa</a>
										

										<strong>
											Nhận xét này có hữu ích với bạn không?
											<span class="options">
												<a href="#" class="comment-voting useful" data-comment-id="1159" data-comment-type="professional" title="Có">
													<i class="fa fa-check fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
												<a href="#" class="comment-voting not-useful" data-comment-id="1159" data-comment-type="professional" title="Không">
													<i class="fa fa-times fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
											</span>
										</strong>
									</div>
								</div>
							</li>

						
							<li class="comment ">
									
										
											<div class="comment-avatar" style="background: #D7F9C3"><span>H</span></div>
										
									

								<div class="comment-body">
									<h4>
										<span>
											
												Nguyễn Hồng
											
										</span>

										

										<span class="liking">
											
												<span class="yes"><i class="fa fa-thumbs-o-up"></i> Hài lòng</span>
											
										</span>
									</h4>

									<div class="comment-content">
										<p>Bác sỹ ơi cho em hỏi em mang thai ở tuần thu 36 nhưng chưa thấy xuất hiện sữa non bác sỹ cho em hỏi như vậy có bình thường không ạ. Va siêu âm thi trọng lượng bé co sai số không ạ.em cam ơn bác sỹ</p>
									</div>

									<p class="date">08h12 05-11-2016</p>

									<div class="comment-actions">
										
											<a class=" open-reply-comment " name="professional-comment" data-comment-id="1435" data-professional-id="42" data-email="vanchon.ngo@gmail.com" href="/dang-ky/?type=professional&amp;prof_place=Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan&amp;prof_spec=Sản phụ khoa&amp;source=register_prof&amp;next=/danh-sach/bac-si/do-thi-ngoc-lan-42/san-phu-khoa">
												Trả lời
											</a> |
										

										<strong>
											Nhận xét này có hữu ích với bạn không?
											<span class="options">
												<a href="#" class="comment-voting useful" data-comment-id="1435" data-comment-type="professional" title="Có">
													<i class="fa fa-check fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
												<a href="#" class="comment-voting not-useful" data-comment-id="1435" data-comment-type="professional" title="Không">
													<i class="fa fa-times fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
											</span>
										</strong>
									</div>
								</div>
							</li>

						
							<li class="comment child">
									
										
											<div class="comment-avatar"></div>
										
									

								<div class="comment-body">
									<h4>
										<span class="staff-name" title="Phản hồi chính thức">
											
												Chăm sóc khách hàng ViCare
											
										</span>

										

										<span class="liking">
											
										</span>
									</h4>

									<div class="comment-content">
										<p>Cảm ơn chị đã sử dụng dịch vụ của ViCare. ViCare hiện giờ đã có mảng Hỏi Bác Sĩ ở trên trang web. chị có thể post câu hỏi chuyên môn này trực tiếp ở đường link https://vicare.vn/hoi-bac-si/dat-cau-hoi/ để nhận câu trả lời từ bác sĩ có chuyên môn liên quan ạ</p>
									</div>

									<p class="date">10h51 05-11-2016</p>

									<div class="comment-actions">
										
											<a class="open-edit-comment" name="professional-comment" data-comment-id="1441" href="#">Sửa</a>
										

										<strong>
											Nhận xét này có hữu ích với bạn không?
											<span class="options">
												<a href="#" class="comment-voting useful" data-comment-id="1441" data-comment-type="professional" title="Có">
													<i class="fa fa-check fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
												<a href="#" class="comment-voting not-useful" data-comment-id="1441" data-comment-type="professional" title="Không">
													<i class="fa fa-times fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
											</span>
										</strong>
									</div>
								</div>
							</li>

						
							<li class="comment ">
									
										
											<div class="comment-avatar" style="background: #6BCEF3"><span>V</span></div>
										
									

								<div class="comment-body">
									<h4>
										<span>
											
												Tô Thị Vinh
											
										</span>

										

										<span class="liking">
											
												<span class="yes"><i class="fa fa-thumbs-o-up"></i> Hài lòng</span>
											
										</span>
									</h4>

									<div class="comment-content">
										<p>Chào bs cho e hỏi.e sinh con tháng5 ,nay được 6tháng rồi.mà mới có kinh nguyệt 1lần vào tháng 6,và tháng 8 nhưng đến tháng10 rồi mà chưa có tiếp ạ.mà ngày nào vk ck e cũng quan hệ sao k có thai ạ</p>
									</div>

									<p class="date">20h10 03-11-2016</p>

									<div class="comment-actions">
										
											<a class=" open-reply-comment " name="professional-comment" data-comment-id="1412" data-professional-id="42" data-email="vanchon.ngo@gmail.com" href="/dang-ky/?type=professional&amp;prof_place=Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan&amp;prof_spec=Sản phụ khoa&amp;source=register_prof&amp;next=/danh-sach/bac-si/do-thi-ngoc-lan-42/san-phu-khoa">
												Trả lời
											</a> |
										

										<strong>
											Nhận xét này có hữu ích với bạn không?
											<span class="options">
												<a href="#" class="comment-voting useful" data-comment-id="1412" data-comment-type="professional" title="Có">
													<i class="fa fa-check fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
												<a href="#" class="comment-voting not-useful" data-comment-id="1412" data-comment-type="professional" title="Không">
													<i class="fa fa-times fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>1</span>
												</a>
											</span>
										</strong>
									</div>
								</div>
							</li>

						
							<li class="comment child">
									
										
											<div class="comment-avatar"></div>
										
									

								<div class="comment-body">
									<h4>
										<span class="staff-name" title="Phản hồi chính thức">
											
												Chăm sóc khách hàng ViCare
											
										</span>

										

										<span class="liking">
											
										</span>
									</h4>

									<div class="comment-content">
										<p>Cảm ơn chị đã sử dụng dịch vụ của ViCare. ViCare hiện giờ đã có mảng Hỏi Bác Sĩ ở trên trang web, chị có thể post câu hỏi này trực tiếp ở https://vicare.vn/hoi-bac-si/dat-cau-hoi/ để nhận câu trả lời từ bác sĩ có chuyên môn liên quan ạ.</p>
									</div>

									<p class="date">10h02 04-11-2016</p>

									<div class="comment-actions">
										
											<a class="open-edit-comment" name="professional-comment" data-comment-id="1421" href="#">Sửa</a>
										

										<strong>
											Nhận xét này có hữu ích với bạn không?
											<span class="options">
												<a href="#" class="comment-voting useful" data-comment-id="1421" data-comment-type="professional" title="Có">
													<i class="fa fa-check fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>1</span>
												</a>
												<a href="#" class="comment-voting not-useful" data-comment-id="1421" data-comment-type="professional" title="Không">
													<i class="fa fa-times fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
											</span>
										</strong>
									</div>
								</div>
							</li>

						
							<li class="comment ">
									
										
											<div class="comment-avatar" style="background: #FEA471"><span>T</span></div>
										
									

								<div class="comment-body">
									<h4>
										<span>
											
												Nguyen thi thanh thao
											
										</span>

										

										<span class="liking">
											
												<span class="yes"><i class="fa fa-thumbs-o-up"></i> Hài lòng</span>
											
										</span>
									</h4>

									<div class="comment-content">
										<p>E da co con trai 5 tuoi . E da su dung thuoc tranh thai hon 3 nam . Bay gio e muon co them e be . Nhung ngung  thuoc da hon 5 thang roi van ko co e be ạ</p>
									</div>

									<p class="date">17h46 03-10-2016</p>

									<div class="comment-actions">
										
											<a class=" open-reply-comment " name="professional-comment" data-comment-id="1100" data-professional-id="42" data-email="vanchon.ngo@gmail.com" href="/dang-ky/?type=professional&amp;prof_place=Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan&amp;prof_spec=Sản phụ khoa&amp;source=register_prof&amp;next=/danh-sach/bac-si/do-thi-ngoc-lan-42/san-phu-khoa">
												Trả lời
											</a> |
										

										<strong>
											Nhận xét này có hữu ích với bạn không?
											<span class="options">
												<a href="#" class="comment-voting useful" data-comment-id="1100" data-comment-type="professional" title="Có">
													<i class="fa fa-check fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
												<a href="#" class="comment-voting not-useful" data-comment-id="1100" data-comment-type="professional" title="Không">
													<i class="fa fa-times fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
											</span>
										</strong>
									</div>
								</div>
							</li>

						
							<li class="comment ">
									
										
											<div class="comment-avatar" style="background: #2772C6"><span>D</span></div>
										
									

								<div class="comment-body">
									<h4>
										<span>
											
												Tran Son dong
											
										</span>

										

										<span class="liking">
											
												<span class="yes"><i class="fa fa-thumbs-o-up"></i> Hài lòng</span>
											
										</span>
									</h4>

									<div class="comment-content">
										<p>bác sĩ rất tốt</p>
									</div>

									<p class="date">23h53 13-09-2016</p>

									<div class="comment-actions">
										
											<a class=" open-reply-comment " name="professional-comment" data-comment-id="926" data-professional-id="42" data-email="vanchon.ngo@gmail.com" href="/dang-ky/?type=professional&amp;prof_place=Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan&amp;prof_spec=Sản phụ khoa&amp;source=register_prof&amp;next=/danh-sach/bac-si/do-thi-ngoc-lan-42/san-phu-khoa">
												Trả lời
											</a> |
										

										<strong>
											Nhận xét này có hữu ích với bạn không?
											<span class="options">
												<a href="#" class="comment-voting useful" data-comment-id="926" data-comment-type="professional" title="Có">
													<i class="fa fa-check fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
												<a href="#" class="comment-voting not-useful" data-comment-id="926" data-comment-type="professional" title="Không">
													<i class="fa fa-times fa-fw" aria-hidden="true"></i>
													<i class="fa fa-spinner fa-pulse fa-fw loader"></i>
													<span>0</span>
												</a>
											</span>
										</strong>
									</div>
							</div>
							</li>

						
					
				</ul>
			</div> -->
		</section>

		
			<section>
				<h2 id="dat-kham"><i class="fa fa-calendar"></i> Đặt khám với {{$doctor->doctor_name}}</h2>
				<div class="inner">
					<p>
						Chọn phòng khám và giờ bạn muốn đặt khám từ lịch dưới đây. Để được tư vấn chọn phòng khám, bạn có thể chat với chúng tôi trên trang web này hoặc gọi điện cho chúng tôi theo số <a href="tel:{{$hl->content}}">{{$hl->content}}</a>.
					</p>
					<!-- 
					<div class="booking">
						<div class="form-row">
							<div class="form-field">
								<label>Chọn phòng khám:</label>
								<div class="form-field-input">
									<select class="place-select has-my-vicare showing" data-professional-id="42">
										
											
												<option value="32209">
													Phòng khám Sản phụ khoa - Bác sĩ Đỗ Thị Ngọc Lan
												</option>
											
										
											
										
											
										
											
										
									</select>
								</div>
							</div>
						</div>

						<div class="booking-picker">
							<table class="weeks">
		<tbody><tr>
			<td>
				<table class="week">
					<tbody><tr>
						
							<th>
								<span class="day">Thứ Tư</span>
								<span class="date">04-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Năm</span>
								<span class="date">05-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Sáu</span>
								<span class="date">06-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Bảy</span>
								<span class="date">07-01</span>
							</th>
						
							<th>
								<span class="day">Chủ Nhật</span>
								<span class="date">08-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Hai</span>
								<span class="date">09-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Ba</span>
								<span class="date">10-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Tư</span>
								<span class="date">11-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Năm</span>
								<span class="date">12-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Sáu</span>
								<span class="date">13-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Bảy</span>
								<span class="date">14-01</span>
							</th>
						
							<th>
								<span class="day">Chủ Nhật</span>
								<span class="date">15-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Hai</span>
								<span class="date">16-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Ba</span>
								<span class="date">17-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Tư</span>
								<span class="date">18-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Năm</span>
								<span class="date">19-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Sáu</span>
								<span class="date">20-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Bảy</span>
								<span class="date">21-01</span>
							</th>
						
							<th>
								<span class="day">Chủ Nhật</span>
								<span class="date">22-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Hai</span>
								<span class="date">23-01</span>
							</th>
						
							<th>
								<span class="day">Thứ Ba</span>
								<span class="date">24-01</span>
							</th>
						
					 </tr>
					 <tr>
						
							
								<td>
									
										
											<a class="full" href="/dat-kham/32209/04-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 133.33333333333331%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/04-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 66.66666666666666%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/04-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 33.33333333333333%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/04-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 33.33333333333333%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/04-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 66.66666666666666%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/04-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/04-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 66.66666666666666%"></span>
											</a>
										
									
										
											<a class="full" href="/dat-kham/32209/04-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 166.66666666666669%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="full" href="/dat-kham/32209/05-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 133.33333333333331%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/05-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 66.66666666666666%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/05-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/05-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/05-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/05-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/05-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/05-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/06-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 33.33333333333333%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/06-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="full" href="/dat-kham/32209/06-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 100%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/06-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/06-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/06-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/06-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/06-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/09h00/42">
												<span class="time">09h00</span>
												<span class="occupancy" style="width: 66.66666666666666%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/09h15/42">
												<span class="time">09h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/09h30/42">
												<span class="time">09h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/09h45/42">
												<span class="time">09h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/10h00/42">
												<span class="time">10h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/10h15/42">
												<span class="time">10h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/10h30/42">
												<span class="time">10h30</span>
												<span class="occupancy" style="width: 33.33333333333333%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/10h45/42">
												<span class="time">10h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/11h00/42">
												<span class="time">11h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/11h15/42">
												<span class="time">11h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/11h30/42">
												<span class="time">11h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/07-01-2017/11h45/42">
												<span class="time">11h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="full" href="/dat-kham/32209/08-01-2017/09h00/42">
												<span class="time">09h00</span>
												<span class="occupancy" style="width: 133.33333333333331%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/09h15/42">
												<span class="time">09h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/09h30/42">
												<span class="time">09h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/09h45/42">
												<span class="time">09h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/10h00/42">
												<span class="time">10h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/10h15/42">
												<span class="time">10h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/10h30/42">
												<span class="time">10h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/10h45/42">
												<span class="time">10h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/11h00/42">
												<span class="time">11h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/11h15/42">
												<span class="time">11h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/11h30/42">
												<span class="time">11h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/08-01-2017/11h45/42">
												<span class="time">11h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="full" href="/dat-kham/32209/09-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 166.66666666666669%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/09-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/09-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/09-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/09-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/09-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/09-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/09-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/10-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 33.33333333333333%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/10-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/10-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/10-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/10-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/10-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/10-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/10-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="full" href="/dat-kham/32209/11-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 133.33333333333331%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/11-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/11-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/11-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/11-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/11-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/11-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/11-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/12-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 33.33333333333333%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/12-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/12-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/12-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/12-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/12-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/12-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/12-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="full" href="/dat-kham/32209/13-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 166.66666666666669%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/13-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/13-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/13-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/13-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/13-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/13-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/13-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/09h00/42">
												<span class="time">09h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/09h15/42">
												<span class="time">09h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/09h30/42">
												<span class="time">09h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/09h45/42">
												<span class="time">09h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/10h00/42">
												<span class="time">10h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/10h15/42">
												<span class="time">10h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/10h30/42">
												<span class="time">10h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/10h45/42">
												<span class="time">10h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/11h00/42">
												<span class="time">11h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/11h15/42">
												<span class="time">11h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/11h30/42">
												<span class="time">11h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/14-01-2017/11h45/42">
												<span class="time">11h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/09h00/42">
												<span class="time">09h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/09h15/42">
												<span class="time">09h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/09h30/42">
												<span class="time">09h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/09h45/42">
												<span class="time">09h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/10h00/42">
												<span class="time">10h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/10h15/42">
												<span class="time">10h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/10h30/42">
												<span class="time">10h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/10h45/42">
												<span class="time">10h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/11h00/42">
												<span class="time">11h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/11h15/42">
												<span class="time">11h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/11h30/42">
												<span class="time">11h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/15-01-2017/11h45/42">
												<span class="time">11h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="full" href="/dat-kham/32209/16-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 133.33333333333331%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/16-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/16-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/16-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/16-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/16-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/16-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/16-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/17-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 33.33333333333333%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/17-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/17-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/17-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/17-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/17-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/17-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/17-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/18-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 66.66666666666666%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/18-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/18-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/18-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/18-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/18-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/18-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/18-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/19-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 33.33333333333333%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/19-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/19-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/19-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/19-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/19-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/19-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/19-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/20-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/20-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/20-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/20-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/20-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/20-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/20-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/20-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/09h00/42">
												<span class="time">09h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/09h15/42">
												<span class="time">09h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/09h30/42">
												<span class="time">09h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/09h45/42">
												<span class="time">09h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/10h00/42">
												<span class="time">10h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/10h15/42">
												<span class="time">10h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/10h30/42">
												<span class="time">10h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/10h45/42">
												<span class="time">10h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/11h00/42">
												<span class="time">11h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/11h15/42">
												<span class="time">11h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/11h30/42">
												<span class="time">11h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/21-01-2017/11h45/42">
												<span class="time">11h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/09h00/42">
												<span class="time">09h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/09h15/42">
												<span class="time">09h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/09h30/42">
												<span class="time">09h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/09h45/42">
												<span class="time">09h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/10h00/42">
												<span class="time">10h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/10h15/42">
												<span class="time">10h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/10h30/42">
												<span class="time">10h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/10h45/42">
												<span class="time">10h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/11h00/42">
												<span class="time">11h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/11h15/42">
												<span class="time">11h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/11h30/42">
												<span class="time">11h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/22-01-2017/11h45/42">
												<span class="time">11h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/23-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/23-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/23-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/23-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/23-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/23-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/23-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/23-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
								<td>
									
										
											<a class="" href="/dat-kham/32209/24-01-2017/17h00/42">
												<span class="time">17h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/24-01-2017/17h15/42">
												<span class="time">17h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/24-01-2017/17h30/42">
												<span class="time">17h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/24-01-2017/17h45/42">
												<span class="time">17h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/24-01-2017/18h00/42">
												<span class="time">18h00</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/24-01-2017/18h15/42">
												<span class="time">18h15</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/24-01-2017/18h30/42">
												<span class="time">18h30</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
										
											<a class="" href="/dat-kham/32209/24-01-2017/18h45/42">
												<span class="time">18h45</span>
												<span class="occupancy" style="width: 0%"></span>
											</a>
										
									
									
								</td>
							
						
					</tr>
				</tbody></table>
			</td>
		</tr>
	</tbody></table>
							<script type="text/html" id="booking-picker-template">
	<table class="weeks">
		<tr>
			<td>
				<table class="week">
					<tr>
						<% for (var i = 0; i < obj.length; i++) { %>
							<th>
								<span class="day"><%= obj[i].dayFormatted %></span>
								<span class="date"><%= obj[i].shortDateFormatted %></span>
							</th>
						<% } %>
					 </tr>
					 <tr>
						<% if (hasSlots) { %>
							<% for (var i = 0; i < obj.length; i++) { %>
								<td>
									<% for (var j = 0; j < obj[i].slots.length; j++) { %>
										<% if (obj[i].slots[j].cancelled) { %>
											<span class="cancelled" title="Buổi khám này đã bị hủy"><%= obj[i].slots[j].startFormatted %></span>
										<% } else if (obj[i].slots[j].past) { %>
											<span class="past" title="Buổi khám này đã kết thúc"><%= obj[i].slots[j].startFormatted %></span>
										<% } else { %>
											<a class="<% if (obj[i].slots[j].booking_count >= obj[i].slots[j].slot_size) { %>full<% } %>"
												href="/dat-kham/<%= placeId %>/<%= obj[i].dateFormatted %>/<%= obj[i].slots[j].startFormatted %>/<%= professionalId %>"
												<% if (obj.openInNewWindow) { %>target="_blank"<% } %>>
												<span class="time"><%= obj[i].slots[j].startFormatted %></span>
												<span class="occupancy" style="width: <%= obj[i].slots[j].booking_count / obj[i].slots[j].slot_size * 100 %>%"></span>
											</a>
										<% } %>
									<% } %>
									<% if (obj[i].slots.length == 0) { %>
										<span class="no-slot">&nbsp;</span>
									<% } %>
								</td>
							<% } %>
						<% } else { %>
							<td colspan="<%= obj.length %>" class="no-slot">
								<% if (professionalName) { %>
									<i class="fa fa-calendar-times-o" aria-hidden="true"></i> Bác sĩ <%=professionalName%> không có ca trực nào trong 3 tuần tới.
								<% } else if (placeName) { %>
									<i class="fa fa-calendar-times-o" aria-hidden="true"></i> Bác sĩ không có ca trực nào trong 3 tuần tới tại <%=placeName%>.
								<% } %>
							</td>
						<% } %>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</script>

						</div>

						<div class="loader">
							<div class="spinner"></div>
						</div>
					</div>
				</div> -->
			</section>
		
	</div>
</div>


<script type="text/html" id="comment-edit-template">
	<form name="<%= name %>" class="form-edit-comment" data-id="<%= id %>" data-place-id="<%= place %>" data-professional-id="<%= professional %>">
		<div class="form-row">
			<textarea class="form-control resize-textarea" rows="3" name="comment"><%= comment %></textarea>
		</div>
		<div class="button-row">
			<span class="cancel-edit" data-comment-id="<%= id %>"><i class="fa fa-times"></i> Huỷ sửa</span>
			<button type="submit">Sửa</button>
		</div>
	</form>
</script>


<script type="text/html" id="comment-reply-template">
	<form name="<%= name %>" class="form-reply-comment" data-id="<%= id %>" data-place-id="<%= place %>" data-professional-id="<%= professional %>" data-email="<%= email %>">
		<div class="form-row">
			<textarea class="form-control resize-textarea" rows="3" name="comment"></textarea>
		</div>
		<div class="button-row">
			<button type="submit">Gửi trả lời</button>
		</div>
	</form>
</script>


		

	</div>
</div>

<script type="text/html" id="comment-template">
	<li class="comment" id="comment-<%= id %>" class="<% if (parent) {print ('child') } %>">
		<div class="comment-avatar"></div>
		<div class="comment-body">
			<h4>
				<% if (display_name) {
						print(display_name);
					} else {
						print(email);
					}
				%>

				<% if (overall_rating) { %>
					<span class="star-ratings" data-score="<%= (overall_rating / 5) * 100 %>"></span>
				<% } %>

				<% if (typeof liking !== 'undefined') { %>
					<span class="liking">
						<% if (liking === true) { %>
							<span class="yes"><i class="fa fa-thumbs-o-up"></i> Hài lòng</span>
						<% } else if (liking === false) { %>
							<span class="no"><i class="fa fa-thumbs-o-down"></i> Không hài lòng</span>
						<% } %>
					</span>
				<% } %>
			</h4>

			<div class="comment-content">
				<%= comment_html %>
			</div>

			<% if (parent == null) { %>
				<ul class="ratings-list">
					<% if (ratings.attitude) { %>
						<li>
							<span class="label">Thái độ phục vụ:</span>
							<span class="star-ratings" data-score="<%= ratings.attitude / 5 * 100 %>"></span>
						</li>
					<% } %>
					<% if (ratings.waiting_time) { %>
						<li>
							<span class="label">Thời gian chờ đợi</span>
							<span class="star-ratings" data-score="<%= ratings.waiting_time / 5 * 100 %>"></span>
						</li>
					<% } %>
					<% if (ratings.cleanliness) { %>
						<li>
							<span class="label">Vệ sinh, sạch sẽ</span>
							<span class="star-ratings" data-score="<%= ratings.cleanliness / 5 * 100 %>"></span>
						</li>
					<% } %>
					<% if (ratings.recommending) { %>
						<li>
							Sẽ giới thiệu cho người thân?
							<% if (ratings.recommending == '5') { %>
								<span class="yes" title="Có">
									<i class="fa fa-check" aria-hidden="true"></i> Có
								</span>
							<% } %>
							<% if (ratings.recommending == '1') { %>
								<span class="no" title="Không">
									<i class="fa fa-times" aria-hidden="true"></i> Không
								</span>
							<% } %>
						</li>
					<% } %>
				</ul>
			<% } %>

			<p class="date"><%= created_at %></p>
		</div>
	</li>
</script>

<div class="global-thread-create-cta">
	<a href="/hoi-bac-si/dat-cau-hoi/" class="button">
		<i class="fa fa-question-circle" aria-hidden="true"></i>
		<strong>Hỏi bác sĩ</strong>
		<span>miễn phí</span>
	</a>
</div>

			
			<input name="csrfmiddlewaretoken" value="OSU4rxNLLX1ROIMoIKau1fgs2qUAr7Vj" type="hidden">
		</div>
		
	@endif
@endsection
