@extends('v2/structor/main',['title'=> 'Hỏi đáp bác sĩ miễn phí', 'meta_keywords' => 'hỏi bác sĩ miễn phí, chat với bác sĩ miễn phí, hỏi đáp bác sĩ miễn phí, hỏi đáp sức khỏe, tư vấn sức khỏe miễn phí, bác sĩ tư vấn miễn phí, tư vấn sức khỏe trực tuyến, hỏi bác sĩ chuyên khoa'])
@section('content')
<style type="text/css">
	.is-android-webview .hide-on-webview-app,
	.is-iphone-webview .hide-on-webview-app{
		display: none;
	}
</style>
<div class="container">


	<div id="thread-create">
{{--		@if(Session::get('user')==null)--}}
{{--			<h3 >Vui lòng <a style="font-size: 28px;font-weight: bold;color: #2B96CC;" href="/?goto=/hoibacsi/datcauhoi">đăng nhập</a> trước khi đặt câu hỏi</h3>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--			</br>--}}
{{--		@else--}}
			<h3 >Đặt câu hỏi cho bác sĩ</h3>
			@if($errors->has('errorMs'))
				<div class="form-rowx">
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{$errors->first('errorMs')}}
					</div>
				</div>
			@endif
			@if($errors->has('successMs'))
				<div class="form-rowx">
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{$errors->first('successMs')}}
					</div>
				</div>
				<!-- Modal show bệnh án-->
<div id="thong_tin_dat_kham_Modal" class="modal fade modal-lg" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" data-dismiss="modal" style="display: inline-block;">&times;</button>
         <h3 class="modal-title">Đặt câu hỏi thành công <strong></strong></h3>       
      </div>
      <div class="modal-body">
        <div class="section-body-benhan section-thong-tin-thanh-toan">
        	Câu hỏi của bạn đã được gửi thành công. Bác sĩ sẽ tư vấn cho bạn, hãy kiểm tra lại trong ngày nhé. Hoặc nhắn với hỗ trợ để có thể chat với bác sĩ ngay!
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-warning" data-dismiss="modal">Đóng cửa sổ</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal show bệnh án--> 
<script type="text/javascript">
jQuery(document).ready(function(){
	$('#thong_tin_dat_kham_Modal').modal({
        backdrop: 'static',
        keyboard: false
    	});
    	$('.click-to-start-chat').first().click();
})
</script>
			@endif
<script type="text/javascript">
jQuery(document).ready(function(){
	var placeholder = 'Viết vào đây Các thông tin tối thiểu các bác sĩ cần bao gồm:'
	+'\n1. Tuổi, giới tính của bệnh nhân'
	+'\n2. Các bệnh cũ đã mắc, các thuốc đang dùng thường xuyên'
	+'\n3. Các triệu chứng hiện tại, thời điểm bắt đầu xuất hiện triệu chứng (mô tả càng chi tiết càng tốt)'
	+'\n4. Các xét nghiệm, phim chụp nếu có'
	+'\n5. Các thông tin khác nếu có';
			$('.textarea-placeholder').val(placeholder);
			$('.textarea-placeholder').focus(function(){
			    if($(this).val() == placeholder){
			        // reset the value only if it equals the initial one    
			        $(this).val('');
			    }
			});
			$('.textarea-placeholder').blur(function(){
			    if($(this).val() == ''){
			        $(this).val(placeholder);
			    }    
			});
			// remove the focus, if it is on by default
			$('.textarea-placeholder').blur();
	$('.question-new').submit(function(event){
		if($('.textarea-placeholder').val() == placeholder){
			event.preventDefault();
			$('.box-show-loading').removeClass('active');			
			alert('Vui lòng nhập chi tiết câu hỏi');
			$('.textarea-placeholder').focus();
		}
	})
});
</script>

			<form name="new-question" class="question-new @if(Session::get('user')==null) require-login @endif" action="/hoibacsi/datcauhoi" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<div class="form-group reset">
					<label style="display: inline-block;width: auto;border: 0 none;">
						<strong>Tóm tắt câu hỏi</strong>
						<span>*</span>
					</label>

					<input class="btn-req-loginx" name="title" maxlength="100" required type="text" autofocus>
				</div>

				<div class="form-group full">
					<label>
						<strong>Chi tiết câu hỏi</strong> <span>*</span>
					</label>
					<textarea class="btn-req-loginx textarea-placeholder" name="body" placeholder=""></textarea>
				</div>

				<div class="form-group full more-info show">
					<div class="form-info">
						<label><strong>Chuyên khoa:</strong></label>

						<select name="specialities" id="specialities" required>
							<option value="">Chọn chuyên khoa</option>
							@if(isset($specialities))
								@foreach($specialities as $sp)
									<option value="{{$sp->speciality_id}}">{{$sp->speciality_name}}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>

				<div hidden class="form-group left">
					<label><strong>Tên của bạn</strong><span>*</span></label>
					<input name="name" placeholder="Nhập vào tên của bạn." @if(Session::get('user')!=null) value="{{Session::get('user')->fullname}}" @endif type="text">
				</div>

				<div hidden class="form-group right">
					<label>
						<strong>Email của bạn</strong>
						<span>*</span>
					</label>

					<input name="email" required
						   @if(Session::get('user')==null) value="mail@facebook.com"
						   @elseif(Session::get('user')->email_info=='') value="mail@facebook.com"
						   @else value="{{Session::get('user')->email_info}}" @endif
						   type="text">
				</div>

				<input name="user_id" @if(Session::get('user')!=null) value="{{Session::get('user')->user_id}}" @endif type="hidden">
				@if(true || Session::get('user')!=null)
				<?php
				// var_dump($current_user);
				if(Session::get('user')!=null && $current_user->province_id != null && $current_user->district_id != null ){
					?>
					<input type="hidden" name="province" value="{{$current_user->province_id}}">
					<input type="hidden" name="district" value="{{$current_user->district_id}}">
					<?php
				}else{
				?>
				<div class="form-group left">
					<select required style="width: 100%" name="province" id="province" onchange="province_change()">
						<?php $province = App\Province::all();
						$select = request()->input('province');?>
						<option value="">Tỉnh/Thành phố</option>

						@foreach($province as $pr)
							<option value="{{$pr->id}}">{{$pr->name}}</option>
						@endforeach

					</select>
				</div>
				<div class="form-group right">
					<select required style="width: 100%" name="district" id="district">
						<option value="">Quận/huyện</option>
					</select>
				</div>
				<?php } ?>
				@endif
				<div style="clear: both"></div>
				<div class="form-group full hide-on-webview-app">
					<label>
						<strong>Ảnh chụp, giấy tờ xét nghiệm (nếu có)</strong>
{{--						<span>*</span>--}}
					</label>
					<input id="fileQA" name="fileQA" type="file" accept="image/*" onchangex="loadFile(event)">
					<img id="output" style="margin: auto; display: none" alt="Hình câu hỏi"/>
					<script>
						// var loadFile = function(event) {
						// 	var output = document.getElementById('output');
						// 	output.src = URL.createObjectURL(event.target.files[0]);
						// 	output.onload = function() {
						// 		URL.revokeObjectURL(output.src) // free memory
						// 	}
						// 	output.style.display = 'block';
						// };
					</script>
				</div>
				<button type="submit" class="btn btn-primary btn-click-gui-cau-hoi">Gửi câu hỏi</button>
			</form>

			<script type="text/javascript">
				function province_change(){
					var id=$("#province").val();
					var dataString = 'province='+id+'&_token={{csrf_token()}}';
					$.ajax({
						type: 'POST',
						url: '/api/district',
						data: dataString,
						cache: false,
						success: function(output) {
							var htmlDistrict = '';

							var districts = JSON.parse(output);
							for (var i =0; i < districts.length; i++) {
								var district = districts[i];
								htmlDistrict += '<option value="' + district.id + '">' + district.name + '</option>';
							}

							$('#district').html(htmlDistrict);
						}
					});
				}
				$('.question-new').submit(function(event){
					if($(this).hasClass('require-login')){		
						event.preventDefault();
						$('#ajax_login_Modal').modal({});
						$('#ajax_login_Modal').attr('data-submit', '.question-new');
						return false;					
					}else{
						var allow_submit_question = true;
						if($('.question-new [name="title"]').val() == ''){
							event.preventDefault();
							allow_submit_question = false;
							alert('Vui lòng nhập tiêu đề');
							$('.question-new [name="title"]').focus();
							return false;
						}
						if($('.question-new [name="body"]').val() == ''){
							event.preventDefault();
							allow_submit_question = false;
							alert('Vui lòng nhập nội dung');
							$('.question-new [name="body"]').focus();
							return false;
						}
						if($('.question-new [name="specialities"]').val() == ''){
							event.preventDefault();
							allow_submit_question = false;
							alert('Vui lòng chọn chuyên khoa');
							$('.question-new [name="specialities"]').focus();
							return false;
						}
						if($('.question-new [name="province"]').val() == ''){
							event.preventDefault();
							allow_submit_question = false;
							alert('Vui lòng chọn Tỉnh thành phố');
							$('.question-new [name="province"]').focus();
							return false;
						}
						if($('.question-new [name="district"]').val() == ''){
							event.preventDefault();
							allow_submit_question = false;
							alert('Vui lòng chọn Quận huyện');
							$('.question-new [name="district"]').focus();
							return false;
						}
						if(!allow_submit_question){
							event.preventDefault();
						}else{
							$('.box-show-loading').addClass('active');
						}
					}
				})
			</script>
{{--		@endif--}}

	</div>
	<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-7940791875056931"
     data-ad-slot="1435199857"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

</div>
@endsection
