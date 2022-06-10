@extends('v2/structor/main',['title'=> $title])
@section('content')
<script type="text/javascript">

	$(document).ready(function(){		
		let path = window.location.pathname + "/";
		let aList = $(".sec-acc").find('a');
		for(let i = 0; i < aList.length; i++) {
			let href = $(aList[i]).attr('href');

			if (href === path) {
				$(aList[i]).addClass("active");
			}
		}
	});
</script>
<div class="main-A">
	<div id="account" class="has-aside">
		<div id="top">
            <div class="doctor-title-section">
                <h1 style="">{{$title}}</h1>
                <?php if(isset($show_button_hoi_dap)){ echo '<a href="/hoibacsi" style="color: #fff;" class="btn btn-primary btn-benh-an btn-them-benh-an">Hỏi đáp chung</a>'; } ?>
            </div> 

	 </div><!-- #top -->
	 <hr>
	<div class="cont-tk">
			<aside class="as-tk <?php if(Session::get('user')->user_type_id != 0){ echo 'hidden'; } ?>">
				<section class="sec-acc">
					<h3>Xin chào, {{Session::get('user')->fullname}}
						@if(Session::get('user')->user_type_id==2)
						<span style="color: #e84f5e;font-weight: 700;">{{Session::get('user')->doctor->doctor_id}}</span>
						@endif
						@if(Session::get('user')->user_type_id==3)
						<span style="color: #e84f5e;font-weight: 700;">{{Session::get('user')->clinic->clinic_id}}</span>
						@endif
					</h3>
					<dl>
						<dt>
							<a href="/taikhoan/"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Thông tin tài khoản</a>
						</dt>
						
						<dt>
							<a href="/taikhoan/ghinho/" class=" "  ><i class="fa fa-fw fa-bookmark-o" aria-hidden="true"></i> Đã ghi nhớ (0)</a>
						</dt>
						<dt>
							<a href="javascript:void(0);" ><i class="fa fa-fw fa-comments-o" aria-hidden="true"></i> Nhận xét đã gửi</a>
						</dt>
						<dt>
							<a href="/taikhoan/hoidap/" ><i class="fa fa-fw fa-comments-o" aria-hidden="true"></i> Hỏi đáp của tôi</a>
						</dt>
						<dt>
							<a href="/taikhoan/henlichkham/" ><i class="fa fa-fw fa-comments-o" aria-hidden="true"></i> Danh sách đặt lịch khám</a>
						</dt>
						<dt>
							<a href="/taikhoan/doimatkhau/" ><i class="fa fa-fw fa-key" aria-hidden="true"></i> Đổi mật khẩu</a>
						</dt>

						@if(Session::get('user')->user_type_id==3)
							<dt>
								<a href="/taikhoan/sua-thong-tin-csyt/" ><i class="fa fa-hospital-o" aria-hidden="true"></i> Sửa thông tin Cơ sở y tế</a>
							</dt>
							<dt>
								<a href="/taikhoan/benhnhan/" ><i class="fa fa-fw fa-user" aria-hidden="true"></i> Bệnh nhân của tôi</a>
							</dt>
							<dt>
								<a href="/taikhoan/vietbai/" ><i class="fa fa-plus" aria-hidden="true"></i> Gửi bài viết</a>
							</dt>
							<dt>
								<a href="/taikhoan/tuyendung/" ><i class="fa fa-handshake" aria-hidden="true"></i> Đăng tuyển dụng</a>
							</dt>
						@endif

						@if(Session::get('user')->user_type_id==0)
						<dt>
							<a href="/create-sitemap" ><i class="fa fa-plus" aria-hidden="true"></i> Cập nhật Sitemap</a>
						</dt>
						<dt>
							<a href="/taikhoan/danh-muc" ><i class="fa fa-list" aria-hidden="true"></i> Danh mục tin tức</a>
						</dt>
						<dt>
							<a href="/taikhoan/thembacsi/" ><i class="fa fa-plus" aria-hidden="true"></i> Thêm bác sĩ</a>
						</dt>
						<dt>
							<a href="/taikhoan/themcsyt/" ><i class="fa fa-plus" aria-hidden="true"></i> Thêm csyt</a>
						</dt>
						<dt>
							<a href="/taikhoan/themnhathuoc/" ><i class="fa fa-plus" aria-hidden="true"></i> Thêm nhà thuốc</a>
						</dt>
						<dt>
							<a href="/taikhoan/tuyendung/" ><i class="fa fa-handshake" aria-hidden="true"></i> Đăng tuyển dụng</a>
						</dt>
						<dt>
							<a href="/taikhoan/doanh-thu-bac-si/" ><i class="fa fa-list" aria-hidden="true"></i> Doanh thu bác sĩ</a>
						</dt>
						<dt>
							<a href="/taikhoan/henlichkham" ><i class="fa fa-list" aria-hidden="true"></i> Danh sách đặt tư vấn</a>
						</dt>
						<dt>
							<a href="/taikhoan/admin-recharge" ><i class="fa fa-list" aria-hidden="true"></i> Nạp tiền cho tài khoản</a>
						</dt>

						@endif
						@if(Session::get('user')->user_type_id==2)
							<dt>
								<a href="/taikhoan/benhnhan/" ><i class="fa fa-fw fa-user" aria-hidden="true"></i> Bệnh nhân của tôi</a>
							</dt>
							<dt>
								<a href="/taikhoan/vietbai/" ><i class="fa fa-plus" aria-hidden="true"></i> Gửi bài viết</a>
							</dt>
							<dt>
								<a href="/taikhoan/lamsang/" ><i class="fa fa-rss-square" aria-hidden="true"></i> Lâm sàng</a>
							</dt>
							<dt>
								<a href="/taikhoan/thongbao/" ><i class="fa fa-fire" aria-hidden="true"></i> Thông báo</a>
							</dt>
							<dt>
								<a href="/taikhoan/doanhso/" ><i class="fa fa-list" aria-hidden="true"></i> Doanh số</a>
							</dt>
						@endif
						<dt>
							<a href="/dangxuat" class="logout" {{-- onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" --}}><i class="fa fa-fw fa-power-off" aria-hidden="true"></i> Đăng xuất</a>
						</dt>

					</dl>
				</section>
			</aside>
			
			@yield('taikhoan_content')
			
		</div>
	</div>

	<input type="hidden" name="csrfmiddlewaretoken" value="gbuq7WSx8WlnCDBnDiNS8NPgizVPFAgG">
</div>
{{-- <form id="frm-logout" action="/dangxuat" method="POST" style="display: none;">
    			{{ csrf_field() }}
		</form> --}}
<?php 
if(Session::get('user')->user_type_id==0){
?>
<style type="text/css">
	.content-tk-home {
    max-width: 60%;
    float: left;
}
</style>
<?php
}
?>
@endsection
