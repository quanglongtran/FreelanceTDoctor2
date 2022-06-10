@extends('v2/structor/main',['title'=> 'Chi tiết Bệnh nhân'.$benhnhan->fullname, 'description' => $benhnhan->fullname ])
@section('content')

<div class="content-tk-home" style="
    width: 1280px;
    margin: auto;
    max-width: 100%;
">
	<section class="sec-acc-home" style="margin-bottom: 20px;">
		<div class="section-body-benhan">
			<div style="clear: both;"></div>
			<?php
			if($benhnhan !=null){
			?>
			<div class="form-group">
					<label>
						<strong>Họ và tên:</strong> 
					</label>
					{{$benhnhan->fullname}}
			</div>
			<div class="form-group">
					<label>
						<strong>Email:</strong> 
					</label>
					{{$benhnhan->email_info}}
			</div>
			<div class="form-group">
					<label>
						<strong>Điện thoại:</strong> 
					</label>
					{{$benhnhan->phone}}
			</div>
			<div class="form-group">
					<label>
						<strong>Địa chỉ:</strong> 
					</label>
					{{$diachi}}
			</div>
			<?php
			}
			?>
			<div style="clear: both;"></div>
			<h2>Danh sách câu hỏi đã gửi ({{count($questions)}})</h2>
			<?php $questions_show = $questions; ?>
			@include('v2.view.danhsach_cauhoi')
		</div>

	</section>

</div>

@endsection