@extends('v2/view/taikhoan',['title'=> 'Tài khoản'])
@section('taikhoan_content')

<div class="content-tk-home">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<section class="sec-acc-home">
		<form action="/taikhoan/doanhso" method="get">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="section-header">
			<h2><i class="fa fa-fw fa-list" aria-hidden="true"></i> Doanh số thu nhập</h2>
			<div><lable>Từ: <input value="{{$dateFrom}}" name="date_from" class="date-picker-field form-control" placeholder="dd/mm/yyyy" type="text"></lable></div>
			<div><lable>Đến: <input value="{{$dateTo}}" name="date_to" class="date-picker-field form-control" placeholder="dd/mm/yyyy" type="text"></lable></div>
			<div style="display: table; margin: 0 auto;"><input style="width: 200px" value="Tìm" class="form-control" type="submit"></div>

		</div>
			<script>
				$(".date-picker-field").datepicker({
					dateFormat:"dd/mm/yy"
				});
			</script>
		</form>
		<div class="section-body">
			<table class="table">
				<thead class="thead-light">
				<tr>
					<th scope="col"><strong>ID</strong></th>
					<th scope="col"><strong>Tên user</strong></th>
					<th scope="col"><strong>Đơn vị</strong></th>
					<th scope="col"><strong>Thành tiền</strong></th>
					<th scope="col"><strong>Vào lúc</strong></th>
				</tr>
				</thead>
				<tbody>

				@if(isset($callTimeWithDoctor))
					@foreach($callTimeWithDoctor as $calltime)
						<?php
							$userCall = \App\Users::where('email', $calltime->user_email)->first();
						?>
						<tr>
							<th scope="row">{{$calltime->call_time_id}}</th>
							<td><?php
                                if (isset($userCall->fullname))
                                {
                                    echo $userCall->fullname;
                                }
                                else {
                                    echo "<strong>Not found</strong>";
                                };?></td>
							<td>
								@if($calltime->type == 0)
									{{$calltime->times}} Phút
								@else
									{{round($calltime->times)}} Tin nhắn
								@endif
							</td>
							<td>{{number_format($calltime->times * $calltime->unit, 0, '', ',')}} Vnđ</td>
							<th scope="row">{{$calltime->created_at}}</th>

						</tr>
					@endforeach
				@endif
				</tbody>
			</table>
			<div class="pagination" style="float: right">
                    <span >
                        {!! $callTimeWithDoctor->appends(request()->input())->links(); !!}
                    </span>

			</div>

			<div>
				<strong>Tổng doanh số: {{number_format($total, 0, '', ',') }} Vnđ</strong>
			</div>
			<div style="clear: both;"></div>

		</div>

	</section>

</div>

@endsection