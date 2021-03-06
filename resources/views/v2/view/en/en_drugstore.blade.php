@extends('v2/view/en/en_main',['title'=> 'Drugstore'])
@section('en_content')
<div class="main-A">
	<div id="top">
        <div class="link">
                <div class="nav">
                    <ul>
                        <li><a href="/en">Home</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="/en/danh-sach-nha-thuoc">Drugstore list</a></li>
                    </ul> 
                    
                </div>
                <h1 style="font-size: 18px;">
				    @if(request()->input('q')!==null)
					Search drugstore by keyword "{{urldecode(request()->input('q'))}}"			
					@else
						Drugstore list
					    @if(Session::has('province'))
					        </br>in <span class="province_name">{{@$_COOKIE['province']}}</span>
					    @endif
				    @endif

                </h1>
          </div> 
            
	 </div><!-- #top -->
	 <br>
        @if(request()->input('q')!==null)
             <div id="search">  
            <ul>
                <li>
                    <span>Search by:</span>
                </li>
                
                <li>
                    <a href="/en/danhsach-phongkham/?q={{request()->input('q')}}">
                        Clinic ({{$clinic or '0' }})
                    </a>
                </li>

                 <li>
	                    <a href="/en/danh-sach-nha-thuoc/?q={{request()->input('q')}}" class="active" >
	                        Drugstore ({{$drugstore or '0' }})
	                    </a>
	            </li>
	            
                <li>
                    <a href="/en/danh-sach-bac-si/?q={{request()->input('q')}}">
                        Doctors ({{$doctor or '0'}})
                    </a>
                </li>
                  <li>
                    <a href="/en/hoibacsi/danhsach/?q={{request()->input('q')}}">
                        Ask doctor ({{$question or '0'}})
                    </a>
                </li>
                <li>
                    <a href="/en/benh/tim-kiem/?q={{request()->input('q')}}" >
                        Diseace ({{$count or '0'}})
                    </a>
                </li>
                
                <li>
                    <a href="/en/thuoc-danhsach/?q={{request()->input('q')}}">
                        Medicine ({{$thuoc or '0'}})
                    </a>
                </li>
                
               
                
            </ul>
        
    </div><!-- #Nav search -->
        @endif
        <br>
	 <div class="cnt-nthuoc">
		<div id="filter-summarys">
			<form class="form-inline" action="/en/danh-sach-nha-thuoc/" method="get">
				<div class="form-group">
					<select name="province" id="province" >
						<?php $province = App\Province::all();
						$select = request()->input('province');?>

						<option value="">Country</option>
						@foreach($province as $pr)
							<option value="{{$pr->id}}" @if($pr->id==$select)selected="selected" @endif>{{$pr->name}}</option>
						@endforeach

					</select>
				</div>


				<button type="submit" class="submit-nt">Fitler search</button>
			</form>

			<script type="text/javascript">
			function province_change(){
			//alert('aaa');
				var id=$("#province").val();
				var dataString = 'province='+id+'&_token=<?php echo e(csrf_token()); ?>';
				$.ajax({
					type: 'POST',
					url: '/api/district',
					data: dataString,
					cache: false,
					success: function(output) {
					    //   alert('a');
					    $("#district").html(output);
					}
				});
			}
			</script>
		</div>
		<ul>
			@if(isset($drugstores))
			@foreach($drugstores as $cl)
				
					<li class="has-actions has-map-marker" data-map-marker="29068">
						<div class="media">
							<a href="/en/nha-thuoc/{{$cl->drugstore_url}}" class="hero-image"
								style="background-image: url({{url('public/images/health_facilities/'.$cl->profile_image)}});width:150px;height:150px;display: block;background-size: contain;background-repeat: no-repeat;background-position: center;">
							</a>
							

						</div>

						<div class="body">
							<div class="info">
								<h2>
									<a href="/en/nha-thuoc/{{$cl->drugstore_url}}">{{$cl->drugstore_name}}</a>


									
										<span class="verified-badge has-tooltip">
											<em style="text-transform: uppercase;">Offical</em>
										
										</span>
									
								</h2>

								
									<div class="desc">
									@if(strlen($cl->drugstore_desc)>200)
										{{substr( $cl->drugstore_desc, 0, strpos($cl->drugstore_desc, ' ', 200) )}}...
										<a class="readmore" href="/en/nha-thuoc/{{$cl->drugstore_url}}">Show more <i class="fa fa-angle-double-right"></i></a>
									@else
										{{$cl->drugstore_desc}}
										<a class="readmore" href="/en/nha-thuoc/{{$cl->drugstore_url}}">show more <i class="fa fa-angle-double-right"></i></a>
									@endif
									</div>
								

								<dl class="brief">

									
										<dt><i class="fa fa-map-marker"></i></dt>
										<dd>
											{{$cl->drugstore_address}}
										</dd>
										<span>Describe : <b style="color: #4080ff;">{{$cl->drugstore_desc}}</b></span><br>
										<span>Phone : <b style="color: #4080ff;">0{{$cl->drugstore_phone}}</b></span>
								</dl>

								
									
							</div>


						</div>

						<div class="actions" style="display: none;" id="contact-29068">
							
								<div class="inner">
									<div class="booking">
										<p>Select the doctor and now you want to book from the calendar below. For advice on choosing a doctor, you can chat with us on this website or call us at <a href="tel???473006008"> 0473 006 008 </a>.</p>
										<div class="form-row" >
											<div class="form-field">
												<label>Visit the doctor:</label>
												<div class="form-field-input">
													<select class="professional-select has-my-vicare" data-place-id="29068">
													
													<optgroup label="Ch???n th????ng ch???nh h??nh - C???t s???ng">
														
															<option value="40572">
															Nguy???n V??
															</option>
														
													</optgroup>
													
													<optgroup label="Da li???u">
														
															<option value="5210">
															????m Th??? H??a
															</option>
														
													</optgroup>
													
													<optgroup label="D??? ???ng - Mi???n d???ch">
														
															<option value="3066">
															Ho??ng Th??? L??m
															</option>
														
															<option value="168">
															L?? Th??? Th??y H???i
															</option>
														
															<option value="7736">
															L?? Th??? Th??y H???i
															</option>
														
															<option value="122">
															Nguy???n Th??? V??n
															</option>
														
													</optgroup>
													
													<optgroup label="Kh??m b???nh">
														
															<option value="21853">
															Danh Th??? Ph?????ng
															</option>
														
															<option value="3066">
															Ho??ng Th??? L??m
															</option>
														
															<option value="3043">
															Nguy???n C??ng Hoan
															</option>
														
															<option value="122">
															Nguy???n Th??? V??n
															</option>
														
															<option value="2941">
															Ng?? ????ng Th???c
															</option>
														
															<option value="3100">
															Phan Th??? H???ng Tuy??n
															</option>
														
															<option value="3102">
															Ph???m H???ng Huy??n
															</option>
														
															<option value="4266">
															Tr???n Th??? Ph????ng Mai
															</option>
														
															<option value="3072">
															??inh Th??? Kim Dung
															</option>
														
															<option value="21852">
															????o Th??? Loan
															</option>
														
													</optgroup>
													
													<optgroup label="L??o khoa">
														
															<option value="3035">
															????? Kh??nh H???
															</option>
														
													</optgroup>
													
													<optgroup label="Ngo???i Th???n kinh">
														
															<option value="3098">
															Ki???u ????nh H??ng
															</option>
														
															<option value="40572">
															Nguy???n V??
															</option>
														
													</optgroup>
													
													<optgroup label="Ngo???i Th???n - Ti???t ni???u">
														
															<option value="2001">
															V?? Nguy???n Kh???i Ca
															</option>
														
													</optgroup>
													
													<optgroup label="Ngo???i Ti??u ho?? - Gan m???t">
														
															<option value="3097">
															Kim V??n V??? 
															</option>
														
															<option value="406">
															Ph???m ?????c Hu???n
															</option>
														
													</optgroup>
													
													<optgroup label="N???i C?? X????ng Kh???p">
														
															<option value="168">
															L?? Th??? Th??y H???i
															</option>
														
															<option value="897">
															V?? Th??? B??ch H???nh
															</option>
														
													</optgroup>
													
													<optgroup label="N???i H?? h???p">
														
															<option value="168">
															L?? Th??? Th??y H???i
															</option>
														
															<option value="2540">
															Phan Thu Ph????ng
															</option>
														
															<option value="2932">
															Tr???n Ho??ng Th??nh
															</option>
														
													</optgroup>
													
													<optgroup label="N???i Th???n kinh">
														
															<option value="168">
															L?? Th??? Th??y H???i
															</option>
														
													</optgroup>
													
													<optgroup label="N???i Th???n - Ti???t ni???u">
														
															<option value="168">
															L?? Th??? Th??y H???i
															</option>
														
															<option value="1993">
															V????ng Tuy???t Mai
															</option>
														
															<option value="391">
															????? Gia Tuy???n
															</option>
														
															<option value="1983">
															????? Th??? Li???u
															</option>
														
													</optgroup>
													
													<optgroup label="N???i Tim m???ch">
														
															<option value="168">
															L?? Th??? Th??y H???i
															</option>
														
													</optgroup>
													
													<optgroup label="N???i Ti??u ho?? - Gan m???t">
														
															<option value="895">
															????o V??n Long
															</option>
														
															<option value="168">
															L?? Th??? Th??y H???i
															</option>
														
													</optgroup>
													
													<optgroup label="N???i soi">
														
															<option value="3056">
															L????ng Minh H????ng
															</option>
														
															<option value="11176">
															soi ?????i tr??ng
															</option>
														
													</optgroup>
													
													<optgroup label="N???i ti???t">
														
															<option value="168">
															L?? Th??? Th??y H???i
															</option>
														
													</optgroup>
													
													<optgroup label="Ph??? khoa">
														
															<option value="2775">
															Ph???m B?? Nha
															</option>
														
													</optgroup>
													
													<optgroup label="S???n khoa">
														
															<option value="2775">
															Ph???m B?? Nha
															</option>
														
													</optgroup>
													
													<optgroup label="S???n ph??? khoa">
														
															<option value="2298">
															Cung Th??? Thu Th???y
															</option>
														
															<option value="2248">
															Nguy???n Qu???c Tu???n
															</option>
														
															<option value="7749">
															Nguy???n Th??? B??ch V??n
															</option>
														
															<option value="2978">
															Nguy???n ?????c Hinh
															</option>
														
															<option value="7746">
															Ph???m B?? Nha
															</option>
														
															<option value="2775">
															Ph???m B?? Nha
															</option>
														
															<option value="3092">
															Ph???m Th??? Hoa H???ng
															</option>
														
															<option value="4266">
															Tr???n Th??? Ph????ng Mai
															</option>
														
													</optgroup>
													
													<optgroup label="Tai - M??i - H???ng">
														
															<option value="4194">
															Cao Minh Th??nh
															</option>
														
															<option value="3056">
															L????ng Minh H????ng
															</option>
														
															<option value="4051">
															Nguy???n Quang Trung
															</option>
														
															<option value="3061">
															Ng?? Ng???c Li???n
															</option>
														
															<option value="706">
															Ph???m Kh??nh H??a
															</option>
														
															<option value="3049">
															Ph???m Th??? B??ch ????o
															</option>
														
															<option value="707">
															Ph???m Tr???n Anh
															</option>
														
															<option value="3054">
															Ph???m Tu???n C???nh
															</option>
														
															<option value="7744">
															T???ng Xu??n Th???ng
															</option>
														
													</optgroup>
													
													<optgroup label="Th???n kinh">
														
															<option value="3043">
															Nguy???n C??ng Hoan
															</option>
														
															<option value="2948">
															Nguy???n V??n H?????ng
															</option>
														
															<option value="40572">
															Nguy???n V??
															</option>
														
															<option value="2941">
															Ng?? ????ng Th???c
															</option>
														
													</optgroup>
													
													<optgroup label="Th???n - Ti???t ni???u">
														
															<option value="1993">
															V????ng Tuy???t Mai
															</option>
														
															<option value="3072">
															??inh Th??? Kim Dung
															</option>
														
															<option value="1983">
															????? Th??? Li???u
															</option>
														
													</optgroup>
													
													<optgroup label="Tim m???ch">
														
															<option value="112">
															Nguy???n L??n Vi???t
															</option>
														
															<option value="7712">
															Nguy???n L??n Hi???u
															</option>
														
													</optgroup>
													
													<optgroup label="Ung b?????u">
														
															<option value="3037">
															L?? V??n Qu???ng
															</option>
														
															<option value="3040">
															Nguy???n V??n Hi???u
															</option>
														
															<option value="40572">
															Nguy???n V??
															</option>
														
															<option value="3054">
															Ph???m Tu???n C???nh
															</option>
														
													</optgroup>
													
													</select>
												</div>
											</div>
										</div>
										<div class="booking-picker">
											<table class="weeks"></table>
										</div>
										<div class="loader">
											<div class="spinner"></div>
										</div>
									</div>
								</div>
							
						</div>
					</li>
				@endforeach
			@endif
					
				
	</ul>
	  <div class="pagination" style="margin-left: 15%">
        <span class="step-links">
   		{!! $drugstores->appends(request()->input())->links(); !!}
        </span>
    </div>
	 </div><!--Content nh?? thu???c-->
</div>
@endsection