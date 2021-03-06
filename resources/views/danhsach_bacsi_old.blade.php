



<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bac si Viet">
    <meta name="keywords" content="Medical, medihere, Doctor, HTML5, Bootstrap, Popular, custom, clinic, health-care, template, theme" />
    <meta name="author" content="Mostafiz">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <meta property="og:image" itemprop="thumbnailUrl" content="{{$thumbnail or null}}" />
					
    <link rel="apple-touch-icon" sizes="57x57" href="/public/images/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/public/images/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/public/images/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/public/images/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/public/images/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/public/images/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/public/images/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/public/images/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/public/images/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/public/images/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/public/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/public/images/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/public/images/favicon-16x16.png">
	<link rel="manifest" href="/public/images/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/public/images/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
    <title>{{$title or "Ch???n b???nh vi???n, b??c s??, ph??ng kh??m v?? tra c???u thu???c, b???nh ????? ch??m s??c s???c kh???e t???t nh??t | tdoctor.vn"}} </title>
    <!-- Stylesheets -->
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <!-- preloader css -->
    <link rel="stylesheet" href="/public/css/introLoader.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="/public/css/animate.css" type="text/css" />
    <!-- owl carousel styles -->
    <link rel="stylesheet" href="/public/css/owl.carousel.css" type="text/css" />
    <!-- date picker css -->
     <!-- main style -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/font-awesome.min.css">
    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300,500' rel='stylesheet' type='text/css'>
    <!-- modernizr -->
    <script src="/public/js/modernizr.js"></script>
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

	<body class="page-professional-list
		 not-logged-in 
		"
		data-customer-id=
		data-customer-type=>


        <header id="header" class="navbar-fixed-top">
            <div id="header-wrap">
                <div class="position">
                    <nav class="navbar navbar-default">
                        <div class="">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Logo ============================================= -->
                                <div id="logo">
                                    <a href="/" class="medihere-logo"><img src="/public/images/logo.png" alt="medihere Logo" title="medihere"></a>
                                </div>
                                <!-- #logo end -->
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <!-- unordered list starts here -->
                                <ul class="nav navbar-nav navbar-left">
                                    <li><a class="active" href="/hoi-bac-si"><i class="fa fa-fw fa-comments-o"></i>H???i b??c s??</a></li>
                                    <li><a href="/bai-viet"><i class="fa fa-fw fa-heartbeat"></i>B??i vi???t</a></li>
                                    <li><a href="/danh-sach/?specialities=xet-nghiem"><i class="fa fa-fw fa-flask"></i>X??t nghi???m</a></li>
                                    <li><a href="/benh"><i class="fa fa-bed" aria-hidden="true"></i>B???nh</a></li>
                                    <li><a href="/thuoc"><i class="fa fa-toggle-on"></i>Thu???c</a></li>
                                      <li><a href="/danh-sach/bac-si"><i class="fa fa-fw fa-user-md"></i>B??c s??</a></li>
                                        <li><a href="/danh-sach"><i class="fa fa-fw fa-hospital-o"></i>C?? s??? y t???</a></li>
                                          <li><a href="/khuyen-mai"><i class="fa fa-fw fa-gift"></i>Khuy???n m??i</a></li>
                                </ul>
                          @if(Session::get('user')!=null)      
                                <div class="user">
							<a href="/tai-khoan/ghi-nho/" class="favourite-count-container" title="Danh s??ch ???? ghi nh???">
								<i class="fa fa-bookmark" aria-hidden="true"></i> <span class="favourite-count">0</span>
							</a>
							
								<span class="name"><a href="/tai-khoan"><i class="fa fa-fw fa-user" aria-hidden="true"></i> @if(Session::get('user')!=null) {{Session::get('user')->fullname}} @else None @endif</a></span>
							

							<div class="user-dropdown">
							@if(Session::get('user')->user_type_id==2)
								<a class="" href="/tai-khoan/cau-hoi-moi-nhat/"><i class="fa fa-fw fa-comments-o" aria-hidden="true"></i> C??u h???i m???i nh???t</a>

							@endif

								<a class="" href="/tai-khoan/hoi-dap/"><i class="fa fa-fw fa-comments-o" aria-hidden="true"></i> H???i ????p c???a t??i</a>

								<a class="" href="/tai-khoan/nhan-xet/"><i class="fa fa-fw fa-commenting" aria-hidden="true"></i> Nh???n x??t ???? g???i</a>

								<a href="/tai-khoan/ghi-nho/" class=""><i class="fa fa-fw fa-bookmark-o" aria-hidden="true"></i> ???? ghi nh??? (<span class="favourite-count">0</span>)</a>

								

								

								

								<a class="" href="/tai-khoan/"><i class="fa fa-fw fa-info-circle" aria-hidden="true"></i> Th??ng tin t??i kho???n</a>

								<a class="" href="/tai-khoan/doi-mat-khau/"><i class="fa fa-fw fa-key" aria-hidden="true"></i> ?????i m???t kh???u</a>

								<a href="/dang-xuat" class="logout"><i class="fa fa-fw fa-sign-out" aria-hidden="true"></i> ????ng xu???t</a>
							</div>
							</div>
						@else
						<div class="user main-nav">
							<a class=" signup-overlay-trigger" href="/dang-ky/"><i class="fa fa-fw fa-user-plus" aria-hidden="true" rel="nofollow"></i> ????ng k??</a>
							<a class=" login-overlay-trigger" href="/dang-nhap/"><i class="fa fa-fw fa-sign-in" aria-hidden="true" rel="nofollow"></i><span class="unimportant">????ng nh???p</span></a>
						</div>
						@endif
							
						
						@if(!Request::is('/'))
						<form class="search" method="get" action="{{url('/tim-kiem')}}" name="global-search">
						<span class="location">
							<select id="location-switch">
								<option value="">C??? n?????c</option>
									<option value="H?? N???i">H?? N???i</option>
									<option value="H??? Ch?? Minh">H??? Ch?? Minh</option>
									<option value="An Giang">An Giang</option><option value="B?? R???a - V??ng T??u">B?? R???a - V??ng T??u</option><option value="B???c C???n">B???c C???n</option><option value="B???c Giang">B???c Giang</option><option value="B???c Li??u">B???c Li??u</option><option value="B???c Ninh">B???c Ninh</option><option value="B???n Tre">B???n Tre</option><option value="B??nh D????ng">B??nh D????ng</option><option value="B??nh ?????nh">B??nh ?????nh</option><option value="B??nh Ph?????c">B??nh Ph?????c</option><option value="B??nh Thu???n">B??nh Thu???n</option><option value="Cao B???ng">Cao B???ng</option><option value="C?? Mau">C?? Mau</option><option value="C???n Th??">C???n Th??</option><option value="???? N???ng">???? N???ng</option><option value="?????k N??ng">?????k N??ng</option><option value="?????k L???k">?????k L???k</option><option value="?????ng Nai">?????ng Nai</option><option value="??i???n Bi??n">??i???n Bi??n</option><option value="?????ng Th??p">?????ng Th??p</option><option value="Gia Lai">Gia Lai</option><option value="H?? Giang">H?? Giang</option><option value="H?? Nam">H?? Nam</option><option value="H?? T??nh">H?? T??nh</option><option value="H???i D????ng">H???i D????ng</option><option value="H???i Ph??ng">H???i Ph??ng</option><option value="H???u Giang">H???u Giang</option><option value="H??a B??nh">H??a B??nh</option><option value="H??ng Y??n">H??ng Y??n</option><option value="Kh??nh H??a">Kh??nh H??a</option><option value="Ki??n Giang">Ki??n Giang</option><option value="Kon Tum">Kon Tum</option><option value="Lai Ch??u">Lai Ch??u</option><option value="L???ng S??n">L???ng S??n</option><option value="L??o Cai">L??o Cai</option><option value="L??m ?????ng">L??m ?????ng</option><option value="Long An">Long An</option><option value="Nam ?????nh">Nam ?????nh</option><option value="Ngh??? An">Ngh??? An</option><option value="Ninh B??nh">Ninh B??nh</option><option value="Ninh Thu???n">Ninh Thu???n</option><option value="Ph?? Th???">Ph?? Th???</option><option value="Ph?? Y??n">Ph?? Y??n</option><option value="Qu???ng B??nh">Qu???ng B??nh</option><option value="Qu???ng Nam">Qu???ng Nam</option><option value="Qu???ng Ng??i">Qu???ng Ng??i</option><option value="Qu???ng Ninh">Qu???ng Ninh</option><option value="Qu???ng Tr???">Qu???ng Tr???</option><option value="S??n La">S??n La</option><option value="S??c Tr??ng">S??c Tr??ng</option><option value="T??y Ninh">T??y Ninh</option><option value="Th??i B??nh">Th??i B??nh</option><option value="Th??i Nguy??n">Th??i Nguy??n</option><option value="Thanh H??a">Thanh H??a</option><option value="Th???a Thi??n - Hu???">Th???a Thi??n - Hu???</option><option value="Ti???n Giang">Ti???n Giang</option><option value="Tr?? Vinh">Tr?? Vinh</option><option value="Tuy??n Quang">Tuy??n Quang</option><option value="V??nh Ph??c">V??nh Ph??c</option><option value="V??nh Long">V??nh Long</option><option value="Y??n B??i">Y??n B??i</option>
							</select>
						</span>

						<div class="inner">
							<div class="has-suggestion"><input name="q" id="search-input" value="" placeholder="tri???u ch???ng, b??c s??, c?? s??? y t???..." autocomplete="off" type="text"><div class="suggestion" style="display: none;"></div></div>
							<button type="submit"><i class="fa fa-search icon-search-not-loading"></i><i class="icon-search-loading"></i></button>
						</div>
					</form>
					@endif
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </header>
  <div id="main">
			
			
			
<div id="page-title">
	<div class="background"></div>
	<div class="mask">
		<div class="position">
			<ul class="breadcrumbs">
				<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="/" itemprop="url"><span itemprop="title">Trang ch???</span></a>
				</li>
				<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="/danh-sach/bac-si/" itemprop="url"><span itemprop="title">B??c s??</span></a>
				</li>
				
				
				
			</ul>
			<h1>
				
		@if(request()->input('q')!==null)
	T??m ki???m b??c s?? theo t??? kh??a "{{urldecode(request()->input('q'))}}"			
	@else
		Danh s??ch b??c s??
	    @if(Session::has('province'))
	        </br>t???i {{$_COOKIE['province']}}
	    @endif
    @endif
	
		
	


<span class="weak">
	

	

	

	

	

	

	

</span>

			</h1>
		</div>
	</div>
</div>


@if(request()->input('q')!==null)
    <div id="nav-search">
        <div class="position">
            <ul>
                <li>
                    <span>T??m ki???m theo:</span>
                </li>
                
                <li>
                    <a href="/danh-sach/?q={{urldecode(request()->input('q'))}}">
                        C?? s??? y t??? ({{$clinic or '0' }})
                    </a>
                </li>
                
                
                <li>
                    <a href="/danh-sach/bac-si/?q={{request()->input('q')}}" class="active">
                        B??c s?? ({{$doctor or '0'}})
                    </a>
                </li>
                
                
                
                 <!-- 
                <li>
                    <a href="/dich-vu/?q={{request()->input('q')}}">
                        D???ch v??? ({{$service or '0'}} )
                    </a>
                </li>
                
                 -->
                
                <li>
                    <a href="/hoi-bac-si/danh-sach/?q={{request()->input('q')}}">
                        H???i b??c s?? ({{$question}})
                    </a>
                </li>
                
               
                
                
                <li>
                    <a href="/benh/tim-kiem/?q={{request()->input('q')}}" >
                        B???nh ({{$count or '0'}})
                    </a>
                </li>
                
                
                <li>
                    <a href="/thuoc/danh-sach/?q={{request()->input('q')}}">
                        Thu???c ({{$thuoc or '0'}})
                    </a>
                </li>
                
               
                
            </ul>
        </div>
    </div>
  @endif

<div id="list" class="professionals has-aside">
	<div class="position">

		<div class="content">
			

		<div id="filter-cta">
			<a class="button secondary weak activator" href="#filter-summary">
			<i class="fa fa-filter fa-fw" aria-hidden="true"></i><span class="active">???n b??? l???c</span><span class="inactive">Hi???n b??? l???c</span>
			</a>
		</div>

		<div id="filter-summarys">
		<form class="form-inline" action="/danh-sach/bac-si/" method="get">
		 <div class="form-group">
   			<select name="province">
   			<?php $province = App\Province::all();
   			$select = request()->input('province');?>
   			<option value="">C??? n?????c</option>
   			
   			@foreach($province as $pr)
			<option value="{{$pr->province_url}}" @if($pr->province_url===$select)selected="selected" @endif>{{$pr->province_name}}</option>
			@endforeach
			
			</select>
  		</div>
		
	
  		 <div class="form-group">
   			<select name ="speciality">
			<option value="">Chuy??n khoa</option>
			<?php $specs = App\Speciality::all();$selectsp = request()->input('speciality');?>
			
			@foreach($specs as $sp)
				<option value="{{$sp->specialty_url}}" @if($sp->specialty_url===$selectsp)selected="selected" @endif>{{$sp->speciality_name}}</option>
			@endforeach
			</select>
  		</div>
		<button type="submit" class="btn btn-default">L???c k???t qu???</button>
		</form>
		
	</div>

<script type="text/html" id="full-filter-template">
	<form name="listing-filter" action="#" method="GET">
		<ul class="tab-content-triggers">
			<% for (var i = 0; i < obj.length; i++) { %>
				<li>
					<a href="#tab-<%= obj[i].name %>" class="has-icon icon-<%= obj[i].name %>"
						data-track-path="/danh-sach/bac-si/loc/tab/<%= obj[i].name %>"
						title="L???c danh s??ch b??c s?? theo <%= obj[i].displayName %> - danh s??ch c??c t??y ch???n">
						<%= obj[i].displayName %>
					</a>
				</li>
			<% } %>
		</ul>
		<div class="tab-content-container">
			<% for (var i = 0; i < obj.length; i++) { %>
				<div id="tab-<%= obj[i].name %>" class="tab-content filter-content">
					<div class="inner">
						<% for (var k = 0; k < 3; k++) { %>
							<ul>
								<% for (var j = Math.ceil(obj[i].options.length / 3)*k; j < Math.ceil(obj[i].options.length / 3)*(k + 1) && j < obj[i].options.length; j++) { %>
									<li>
										<label>
											<input type="checkbox" name="<%= obj[i].name %>" <% if (obj[i].options[j].checked) { %>checked<% } %>
												value="<%= obj[i].options[j].slug ? obj[i].options[j].slug : obj[i].options[j].name %>" />
											<span><%= obj[i].options[j].name %></span>
										</label>
									</li>
								<% } %>
							</ul>
						<% } %>
					</div>
					<div class="search">
						<input type="text" placeholder="T??m tr??n danh s??ch n??y..." />
					</div>
				</div>
			<% } %>
		</div>
		<div class="button-row">
			<button type="submit"><i class="fa fa-filter fa-fw" aria-hidden="true"></i> L???c danh s??ch</button>
		</div>
	</form>
</script>

						


			<ul>
				@if(isset($doctors))
				  @foreach($doctors as $dr)
					<li>
						<div class="media">
							<a href="/danh-sach/bac-si/{{$dr->doctor_url}}-{{$dr->doctor_id}}/" class="hero-image" 
								style="background-image: url({{url('public/images/doctor/'.$dr->profile_image)}})">												
							</a>
							
								<a href="/danh-sach/bac-si/{{$dr->doctor_url}}-{{$dr->doctor_id}}/nha-khoa-tong-quat#nhan-xet" class="comments-summary " title="0 h??i l??ng, 2 nh???n x??t, 0 c??u tr??? l???i, 0 c???m ??n">
									
										<span class="like-count">
											<i class="fa fa-thumbs-o-up"></i> 0
										</span>
										<span class="comment-count">
											<i class="fa fa-comment-o"></i> 2
										</span>
									
									
								</a>
							
						</div>
						<div class="body">
							<div class="info">
								<h2>
									<a href="/danh-sach/bac-si/{{$dr->doctor_url}}-{{$dr->doctor_id}}/{{$dr->doctorspeciality->speciality->specialty_url or null}}">B??c s?? {{$dr->doctor_name}}</a>

									

									
								</h2>

								<div class="desc">
									
									@if(!empty($dr->doctor_description)|| $dr->doctor_description!='')	
									@if(strlen($dr->doctor_description)>200 && strpos($dr->doctor_description, ' ', 200)!="")
									{!!substr( $dr->doctor_description, 0, strpos($dr->doctor_description, ' ', 200) )!!}
									
										<a class="readmore" href="/danh-sach/bac-si/{{$dr->doctor_url}}-{{$dr->doctor_id}}/{{$dr->doctorspeciality->speciality->specialty_url or null}}">Xem ti???p <i class="fa fa-angle-double-right"></i></a>
									@endif
									@endif
									</div>

								<dl class="brief">
									

									
										<dt>
											<i class="fa fa-stethoscope"></i>
										</dt>
										<dd>
											@foreach($dr->specialities as $spec)
												<a href="/danh-sach/bac-si/?specialities={{$spec->speciality->specialty_url}}">{{$spec->speciality->speciality_name}}</a>
											   @if($spec!==$dr->specialities->last()),
											   @endif
											@endforeach
										</dd>
									

									

									
										<dt>
											<i class="fa fa-hospital-o"></i>
										</dt>
										<dd>
											
										     @foreach($dr->clinics as $cs)		
													<a href="/co-so-y-te/{{$cs->clinic->clinic_url}}-{{$cs->clinic->clinic_id}}">{{$cs->clinic->clinic_name}}</a>
												@if($cs!== $dr->clinics->last())
												,
												@endif	
											
											 @endforeach
												
										</dd>
									
								</dl>
							</div>
							<div class="call-to-action">
								

								<a href="#" class="sticky-nav-link action-favourite secondary weak button " title="Th??m v??o ghi nh???" data-professional-id="20143">
									<i class="fa fa-spinner fa-pulse loader"></i>
									<span class="added"><i class="fa fa-bookmark" aria-hidden="true"></i> ???? ghi nh???</span>
									<span class="unadded"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Ghi nh???</span>
								</a>
							</div>
						</div>
						<div class="actions" id="contact-20143">
							
						</div>
					</li>
					@endforeach
				@endif
					
				
			</ul>
			

			


    <div class="pagination">
        <div class="vh">26 k???t qu???.</div>
        <span class="step-links">
            

       <!--      <span class="current">
                Trang 1 / 3
            </span>
-->
            {!! $doctors->appends(request()->input())->links(); !!}
         <!--        <a href="?page=2">Sau <i class="fa fa-chevron-right"></i></a>
            -->
        </span>
    </div>


		</div>

		

<aside>
    <section class="collapsible-container collapsible-list collapsed">
        <h3>Chuy??n khoa</h3>

        <dl class="collapsible-target">
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=duoc" class="" title="D?????c">
                    <h5>D?????c</h5>
                    <span class="thread-count ">9195 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=kham-benh" class="" title="Kh??m b???nh">
                    <h5>Kh??m b???nh</h5>
                    <span class="thread-count ">3255 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=san-phu" class="" title="S???n ph??? khoa">
                    <h5>S???n ph??? khoa</h5>
                    <span class="thread-count ">1684 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=y-hoc-co-truyen" class="" title="Y h???c c??? truy???n">
                    <h5>Y h???c c??? truy???n</h5>
                    <span class="thread-count ">1673 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=rang-ham-mat" class="" title="R??ng - H??m - M???t">
                    <h5>R??ng - H??m - M???t</h5>
                    <span class="thread-count ">1660 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=tham-my" class="" title="Th???m m???">
                    <h5>Th???m m???</h5>
                    <span class="thread-count ">1611 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=nhi" class="" title="Nhi">
                    <h5>Nhi</h5>
                    <span class="thread-count ">1578 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=chan-doan-hinh-anh" class="" title="Ch???n ??o??n h??nh ???nh">
                    <h5>Ch???n ??o??n h??nh ???nh</h5>
                    <span class="thread-count ">1262 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=noi-tiet" class="" title="N???i ti???t">
                    <h5>N???i ti???t</h5>
                    <span class="thread-count ">1227 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=hoi-suc-cap-cuu" class="" title="H???i s???c - C???p c???u">
                    <h5>H???i s???c - C???p c???u</h5>
                    <span class="thread-count ">1175 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=nhan-khoa" class="" title="Nh??n khoa">
                    <h5>Nh??n khoa</h5>
                    <span class="thread-count ">999 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=tai-mui-hong" class="" title="Tai - M??i - H???ng">
                    <h5>Tai - M??i - H???ng</h5>
                    <span class="thread-count ">941 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=tim-mach" class="" title="Tim m???ch">
                    <h5>Tim m???ch</h5>
                    <span class="thread-count ">894 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=chan-thuong-chinh-hinh-cot-song" class="" title="Ch???n th????ng ch???nh h??nh - C???t s???ng">
                    <h5>Ch???n th????ng ch???nh h??nh - C???t s???ng</h5>
                    <span class="thread-count ">703 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=xet-nghiem" class="" title="X??t nghi???m">
                    <h5>X??t nghi???m</h5>
                    <span class="thread-count ">662 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=dinh-duong" class="" title="Dinh d?????ng">
                    <h5>Dinh d?????ng</h5>
                    <span class="thread-count ">654 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=da-lieu" class="" title="Da li???u">
                    <h5>Da li???u</h5>
                    <span class="thread-count ">653 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=da-khoa" class="" title="??a khoa">
                    <h5>??a khoa</h5>
                    <span class="thread-count ">594 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=gay-me-hoi-suc" class="" title="G??y m?? h???i s???c">
                    <h5>G??y m?? h???i s???c</h5>
                    <span class="thread-count ">576 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=tam-than" class="" title="T??m th???n">
                    <h5>T??m th???n</h5>
                    <span class="thread-count ">518 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=ung-buou" class="" title="Ung b?????u">
                    <h5>Ung b?????u</h5>
                    <span class="thread-count ">460 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=than-tiet-nieu" class="" title="Th???n - Ti???t ni???u">
                    <h5>Th???n - Ti???t ni???u</h5>
                    <span class="thread-count ">457 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=ho-hap" class="" title="H?? h???p">
                    <h5>H?? h???p</h5>
                    <span class="thread-count ">437 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=tieu-hoa-gan-mat" class="" title="Ti??u h??a - Gan m???t">
                    <h5>Ti??u h??a - Gan m???t</h5>
                    <span class="thread-count ">396 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=vat-ly-tri-lieu-phuc-hoi-chuc-nang" class="" title="V???t l?? tr??? li???u - Ph???c h???i ch???c n??ng">
                    <h5>V???t l?? tr??? li???u - Ph???c h???i ch???c n??ng</h5>
                    <span class="thread-count ">371 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=co-xuong-khop" class="" title="C?? X????ng Kh???p">
                    <h5>C?? X????ng Kh???p</h5>
                    <span class="thread-count ">359 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=giai-phau-benh" class="" title="Gi???i ph???u b???nh">
                    <h5>Gi???i ph???u b???nh</h5>
                    <span class="thread-count ">359 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=than-kinh" class="" title="Th???n kinh">
                    <h5>Th???n kinh</h5>
                    <span class="thread-count ">325 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=truyen-nhiem" class="" title="Truy???n nhi???m">
                    <h5>Truy???n nhi???m</h5>
                    <span class="thread-count ">320 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=huyet-hoc-truyen-mau" class="" title="Huy???t h???c - Truy???n m??u">
                    <h5>Huy???t h???c - Truy???n m??u</h5>
                    <span class="thread-count ">291 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=noi-soi" class="" title="N???i soi">
                    <h5>N???i soi</h5>
                    <span class="thread-count ">284 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=kiem-soat-nhiem-khuan" class="" title="Ki???m so??t nhi???m khu???n">
                    <h5>Ki???m so??t nhi???m khu???n</h5>
                    <span class="thread-count ">228 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=thu-y" class="" title="Th?? y">
                    <h5>Th?? y</h5>
                    <span class="thread-count ">175 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=nam" class="" title="Nam khoa">
                    <h5>Nam khoa</h5>
                    <span class="thread-count ">154 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=tham-do-chuc-nang" class="" title="Th??m d?? ch???c n??ng">
                    <h5>Th??m d?? ch???c n??ng</h5>
                    <span class="thread-count ">138 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=lao-khoa" class="" title="L??o khoa">
                    <h5>L??o khoa</h5>
                    <span class="thread-count ">130 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=hiem-muon-vo-sinh" class="" title="Hi???m mu???n - V?? sinh">
                    <h5>Hi???m mu???n - V?? sinh</h5>
                    <span class="thread-count ">105 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=di-truyen-sinh-hoc-phan-tu" class="" title="Di truy???n &amp; Sinh h???c ph??n t???">
                    <h5>Di truy???n &amp; Sinh h???c ph??n t???</h5>
                    <span class="thread-count ">72 b??c s??</span>
                </a>
            </dt>
            
            <dt>
                <a href="/danh-sach/bac-si/?specialities=di-ung-mien-dich" class="" title="D??? ???ng - Mi???n d???ch">
                    <h5>D??? ???ng - Mi???n d???ch</h5>
                    <span class="thread-count ">71 b??c s??</span>
                </a>
            </dt>
            
        </dl>

        <div class="collapse-trigger">
            <span class="trigger-expand"><i class="fa fa-chevron-down"></i></span>
            <span class="trigger-collapse"><i class="fa fa-chevron-up"></i></span>
        </div>
    </section>

    
        <section class="top-list">
            <h3>????ng quan t??m</h3>

            <ul>
                
                <li>
                    <a class="image" href="/tuyen-chon-bac-si/5-bac-si-dau-nganh-ve-chuyen-khoa-tim-mach-duoc-nhieu-nguoi-biet-den-tai-tp-ho-chi-minh-122/" style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/19_07_2016_04_14_22_302702.jpeg);" title="5 B??c s?? ?????u ng??nh v??? chuy??n khoa tim m???ch ???????c nhi???u ng?????i bi???t ?????n t???i TP. H??? Ch?? Minh"></a>

                    <div class="body">
                        <h4>
                            <a href="/tuyen-chon-bac-si/5-bac-si-dau-nganh-ve-chuyen-khoa-tim-mach-duoc-nhieu-nguoi-biet-den-tai-tp-ho-chi-minh-122/" title="5 B??c s?? ?????u ng??nh v??? chuy??n khoa tim m???ch ???????c nhi???u ng?????i bi???t ?????n t???i TP. H??? Ch?? Minh">
                                5 B??c s?? ?????u ng??nh v??? chuy??n khoa tim m???ch ???????c nhi???u ng?????i bi???t ?????n t???i TP. H??? Ch?? Minh
                            </a>
                        </h4>
                    </div>
                </li>
                
                <li>
                    <a class="image" href="/tuyen-chon-bac-si/5-tien-si-chuyen-khoa-chan-thuong-chinh-hinh-cot-song-tai-tphcm-1649/" style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/09_10_2016_07_56_38_002927.jpeg);" title="5 Ti???n s?? chuy??n khoa ch???n th????ng ch???nh h??nh c???t s???ng t???i TP.HCM "></a>

                    <div class="body">
                        <h4>
                            <a href="/tuyen-chon-bac-si/5-tien-si-chuyen-khoa-chan-thuong-chinh-hinh-cot-song-tai-tphcm-1649/" title="5 Ti???n s?? chuy??n khoa ch???n th????ng ch???nh h??nh c???t s???ng t???i TP.HCM ">
                                5 Ti???n s?? chuy??n khoa ch???n th????ng ch???nh h??nh c???t s???ng t???i TP.HCM 
                            </a>
                        </h4>
                    </div>
                </li>
                
                <li>
                    <a class="image" href="/tuyen-chon-bac-si/5-bac-si-nam-mat-tay-chuyen-khoa-san-tai-ha-noi-119/" style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/19_07_2016_03_51_50_142932.jpeg);" title="5 b??c s?? nam ???m??t tay??? chuy??n khoa s???n t???i H?? N???i"></a>

                    <div class="body">
                        <h4>
                            <a href="/tuyen-chon-bac-si/5-bac-si-nam-mat-tay-chuyen-khoa-san-tai-ha-noi-119/" title="5 b??c s?? nam ???m??t tay??? chuy??n khoa s???n t???i H?? N???i">
                                5 b??c s?? nam ???m??t tay??? chuy??n khoa s???n t???i H?? N???i
                            </a>
                        </h4>
                    </div>
                </li>
                
                <li>
                    <a class="image" href="/tuyen-chon-bac-si/5-bac-si-nam-mat-tay-chuyen-khoa-san-tai-tp-ho-chi-minh-155/" style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/19_07_2016_10_07_06_495082.jpeg);" title="5 b??c s?? nam ???m??t tay??? chuy??n khoa s???n t???i Tp. H??? Ch?? Minh"></a>

                    <div class="body">
                        <h4>
                            <a href="/tuyen-chon-bac-si/5-bac-si-nam-mat-tay-chuyen-khoa-san-tai-tp-ho-chi-minh-155/" title="5 b??c s?? nam ???m??t tay??? chuy??n khoa s???n t???i Tp. H??? Ch?? Minh">
                                5 b??c s?? nam ???m??t tay??? chuy??n khoa s???n t???i Tp. H??? Ch?? Minh
                            </a>
                        </h4>
                    </div>
                </li>
                
                <li>
                    <a class="image" href="/tuyen-chon-bac-si/5-bac-si-phau-thuat-than-kinh-noi-tieng-tai-tp-hcm-243/" style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/04_08_2016_09_51_26_177372.jpeg);" title="5 b??c s?? ph???u thu???t th???n kinh n???i ti???ng t???i Tp. HCM"></a>

                    <div class="body">
                        <h4>
                            <a href="/tuyen-chon-bac-si/5-bac-si-phau-thuat-than-kinh-noi-tieng-tai-tp-hcm-243/" title="5 b??c s?? ph???u thu???t th???n kinh n???i ti???ng t???i Tp. HCM">
                                5 b??c s?? ph???u thu???t th???n kinh n???i ti???ng t???i Tp. HCM
                            </a>
                        </h4>
                    </div>
                </li>
                
                <li>
                    <a class="image" href="/tuyen-chon-bac-si/5-bac-si-chuyen-khoa-gay-me-hoi-suc-tai-tp-hcm-257/" style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/08_08_2016_10_52_09_263564.jpeg);" title="5 B??c s?? chuy??n khoa g??y m?? h???i s???c t???i TP. HCM"></a>

                    <div class="body">
                        <h4>
                            <a href="/tuyen-chon-bac-si/5-bac-si-chuyen-khoa-gay-me-hoi-suc-tai-tp-hcm-257/" title="5 B??c s?? chuy??n khoa g??y m?? h???i s???c t???i TP. HCM">
                                5 B??c s?? chuy??n khoa g??y m?? h???i s???c t???i TP. HCM
                            </a>
                        </h4>
                    </div>
                </li>
                
                <li>
                    <a class="image" href="/tuyen-chon-bac-si/5-bac-si-phau-thuat-than-kinh-noi-tieng-tai-ha-noi-245/" style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/04_08_2016_10_28_43_627148.jpeg);" title="5 b??c s?? ph???u thu???t th???n kinh n???i ti???ng t???i H?? N???i"></a>

                    <div class="body">
                        <h4>
                            <a href="/tuyen-chon-bac-si/5-bac-si-phau-thuat-than-kinh-noi-tieng-tai-ha-noi-245/" title="5 b??c s?? ph???u thu???t th???n kinh n???i ti???ng t???i H?? N???i">
                                5 b??c s?? ph???u thu???t th???n kinh n???i ti???ng t???i H?? N???i
                            </a>
                        </h4>
                    </div>
                </li>
                
                <li>
                    <a class="image" href="/tuyen-chon-bac-si/5-bac-si-nu-chuyen-khoa-tieu-hoa-gan-mat-tai-tphcm-1686/" style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/09_10_2016_18_20_10_092350.jpeg);" title="5 b??c s?? n??? chuy??n khoa ti??u h??a gan m???t t???i Tp.HCM"></a>

                    <div class="body">
                        <h4>
                            <a href="/tuyen-chon-bac-si/5-bac-si-nu-chuyen-khoa-tieu-hoa-gan-mat-tai-tphcm-1686/" title="5 b??c s?? n??? chuy??n khoa ti??u h??a gan m???t t???i Tp.HCM">
                                5 b??c s?? n??? chuy??n khoa ti??u h??a gan m???t t???i Tp.HCM
                            </a>
                        </h4>
                    </div>
                </li>
                
                <li>
                    <a class="image" href="/tuyen-chon-bac-si/top-5-bac-si-tuoi-tre-tai-cao-chuyen-khoa-co-xuong-khop-tai-ha-noi-146/" style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/19_07_2016_09_01_17_254115.jpeg);" title="Top 5 B??c s?? tu???i tr??? t??i cao chuy??n khoa c?? x????ng kh???p t???i H?? N???i"></a>

                    <div class="body">
                        <h4>
                            <a href="/tuyen-chon-bac-si/top-5-bac-si-tuoi-tre-tai-cao-chuyen-khoa-co-xuong-khop-tai-ha-noi-146/" title="Top 5 B??c s?? tu???i tr??? t??i cao chuy??n khoa c?? x????ng kh???p t???i H?? N???i">
                                Top 5 B??c s?? tu???i tr??? t??i cao chuy??n khoa c?? x????ng kh???p t???i H?? N???i
                            </a>
                        </h4>
                    </div>
                </li>
                
                <li>
                    <a class="image" href="/tuyen-chon-bac-si/5-pho-giao-su-chuyen-khoa-ho-hap-tai-tp-hcm-241/" style="background-image: url(https://dwbxi9io9o7ce.cloudfront.net/images/04_08_2016_09_12_57_052447.jpeg);" title="5 Ph?? gi??o s?? chuy??n khoa h?? h???p t???i TP. HCM"></a>

                    <div class="body">
                        <h4>
                            <a href="/tuyen-chon-bac-si/5-pho-giao-su-chuyen-khoa-ho-hap-tai-tp-hcm-241/" title="5 Ph?? gi??o s?? chuy??n khoa h?? h???p t???i TP. HCM">
                                5 Ph?? gi??o s?? chuy??n khoa h?? h???p t???i TP. HCM
                            </a>
                        </h4>
                    </div>
                </li>
                
            </ul>

            <a href="/tuyen-chon-bac-si/" class="view-more">Xem t???t c??? c??c tuy???n ch???n</a>
        </section>
    
</aside>

	</div>
</div>

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
											<span class="cancelled" title="Bu???i kh??m n??y ???? b??? h???y"><%= obj[i].slots[j].startFormatted %></span>
										<% } else if (obj[i].slots[j].past) { %>
											<span class="past" title="Bu???i kh??m n??y ???? k???t th??c"><%= obj[i].slots[j].startFormatted %></span>
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
									<i class="fa fa-calendar-times-o" aria-hidden="true"></i> B??c s?? <%=professionalName%> kh??ng c?? ca tr???c n??o trong 3 tu???n t???i.
								<% } else if (placeName) { %>
									<i class="fa fa-calendar-times-o" aria-hidden="true"></i> B??c s?? kh??ng c?? ca tr???c n??o trong 3 tu???n t???i t???i <%=placeName%>.
								<% } %>
							</td>
						<% } %>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</script>

<div class="global-thread-create-cta">
	<a href="/hoi-bac-si/dat-cau-hoi/" class="button">
		<i class="fa fa-question-circle" aria-hidden="true"></i>
		<strong>H???i b??c s??</strong>
		<span>mi???n ph??</span>
	</a>
</div>


			
			<input name="csrfmiddlewaretoken" value="ZPSo31DHOOuFKv1BD8gTdDyX5aUmOfmU" type="hidden">
		</div>
		
     <div class="global-thread-create-cta">
	<a href="/hoi-bac-si/dat-cau-hoi/" class="button">
		<i class="fa fa-question-circle" aria-hidden="true"></i>
		<strong>H???i b??c s??</strong>
		<span>mi???n ph??</span>
	</a>
</div>
       <!-- footer starts -->
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                    <div class="col-md-4 article footer-widget1">
                            <h3>B??i vi???t M???i Nh???t</h3>
                            <ul class="popular-posts">
                           
                        
                       
                     @if($article)
                           @foreach($article as $art)
                            
                                                

                                <li>
                                     <a href="{!! url('bai-viet/'.$art['article_id'])!!}">

                                        <img src="@if(!empty($art->image))@if(strpos($art->image,'http')===false)/public/images/@endif{{$art->image}}@endif"  alt="#"/>
                                    </a>
                                    <?php \Carbon\Carbon::setLocale('vi') ?>
                                    <h4><a href="{!! url('bai-viet/'.$art['article_id'])!!}">{!!$art['article_title']!!} </a></h4>
                                    <span><i class="fa fa-calendar">{!! \Carbon\Carbon::parse(($art['created_at']))->toFormattedDateString() !!}   {!! \Carbon\Carbon::createFromTimeStamp(strtotime($art['created_at']))->diffForHumans() !!}</i></span>
                                </li>
                            
                               @endforeach
                    @endif  
                        
              
                            </ul>
                        </div>

                        <div class="col-md-4 footer-widget2">
                            <h3>Th??ng tin li??n h???</h3>
                            <span>283/97 C??ch M???ng Th??ng 8, Ph?????ng 12, Qu???n 10, TP.HCM,
</span>
                            <span> Vi???t Nam</span>
                            <br>
                            <span>bacsivietok@gmail.com
</span>
                            <br>
                            <span>H??? tr???: 0981.405.925
<br>
Skype : netbotvn
                            </span>

                            <div class="footer-socials">
                                <h4>K???t n???i v???i ch??ng t??i</h4>
                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                                fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                               <div class="fb-page" data-href="https://www.facebook.com/B%C3%A1c-S%C4%A9-Vi%E1%BB%87t-971050299703719/" data-tabs="timeline" data-width="340" data-height="246" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Bacsyviet-1580363511992683/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Bacsyviet-1580363511992683/">Bacsyviet</a></blockquote></div>

                               
                            </div>
                        </div>

                        <div class="col-md-4 footer-widget1">
                            <h3>Khuy???n M??i N???i B???t</h3>
                            <ul class="popular-posts">
                        @if($deals)
                         <?php $i = 0;?>
                            @foreach($deals as $deal)
                               @if($i<5)
                              <li>
                                    <a href="/khuyen-mai/{{\App\Deals::strtoUrl($deal->deal_title)}}-{{$deal->deal_id}}">
                                        <img src="/public/images/{!!$deal['image']!!}"  alt="#"/>
                                    </a>
                                    <h4><a href="/khuyen-mai/{{\App\Deals::strtoUrl($deal->deal_title)}}-{{$deal->deal_id}}">{!!$deal['deal_title']!!} </a></h4>
                                    
                
                    
                                        <span style="color:#ff749c;margin-right: 20px;">{!!$deal['price']!!}<span class="currency">???</span></span>
                                        <span style="color: #eee;text-decoration: line-through;">{!!$deal['old_price']!!}</span><span class="currency">???</span>
                    
                
                                  
                                   
                                    <?php \Carbon\Carbon::setLocale('vi') ?>
                                    <span><i class="fa fa-calendar">{!! \Carbon\Carbon::parse(($deal['created_at']))->toFormattedDateString() !!}   {!! \Carbon\Carbon::createFromTimeStamp(strtotime($deal['created_at']))->diffForHumans() !!}</i></span>
                                </li>
                                @endif
                                <?php $i+=1;?>
                            @endforeach
                        @endif
                        </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div id="back-top">
                <a class="back-top" href="#slider"><i class="fa fa-angle-up"></i></a>
            </div>
            <div class="footer-bottom text-center">
               <div class="disclaimer">
               <p style="font-size: 1.5em;"><?php @include('counter.php');?></p></br>
				<p>
					Website ???????c s??? h???u v?? qu???n l?? b???i: <strong>C??ng ty C??? ph???n BacSiViet</strong>. Tr??? s??? ch??nh: 283/97 C??ch M???ng Th??ng 8, Ph?????ng 12, Qu???n 10, TP.HCM, Vi???t Nam
				</p>
				<!-- <p>Gi???y ch???ng nh???n ????ng k?? kinh doanh s??? <strong class="registration-number">*******</strong> do S??? K??? ho???ch v?? ?????u t?? TP H??? Ch?? Minh c???p ng??y *****</p> -->
				<p>C??c th??ng tin tr??n web site n??y ch??? mang t??nh ch???t tham kh???o. Ch??ng t??i kh??ng ch???u tr??ch nhi???m n??o do vi???c ??p d???ng c??c th??ng tin tr??n web site n??y g??y ra.</p>
			</div>
			 
            </div>
           
        </footer>
    </main>
    <!-- main page ends -->
	
    <!-- Jquery and javascript files -->
     <script type="text/javascript" src="/public/js/vilib.js"></script>
    <!-- <script type="text/javascript" src="/public/js/jquery-2.1.1.js"></script> -->
    <!-- date picker js -->
    <script type="text/javascript" src="/public/js/datepicker.js"></script>
    <!-- bootstrap 3.3.6 js -->
    <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
    <!-- owl carousel js-->
    <script type="text/javascript" src="/public/js/owl.carousel.js"></script>
    <!-- smooth scroll js -->
    <script type="text/javascript" src="/public/js/smoothscroll.js"></script>
    <!-- preloader js -->
    <script type="text/javascript" src="/public/js/jquery.introLoader.pack.min.js"></script> 
    <!-- custom scripts -->
    <script type="text/javascript" src="/public/js/script.js"></script>
     
     <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.tdoctor.vn/public/js/analytics.js','ga');

  ga('create', 'UA-97538710-1', 'auto');
  ga('send', 'pageview');

</script>

</body>

</html>


