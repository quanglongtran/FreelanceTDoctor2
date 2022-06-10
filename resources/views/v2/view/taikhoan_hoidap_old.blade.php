@extends('v2/view/taikhoan',['title'=> 'Hỏi đáp của tôi', 'show_button_hoi_dap' => true])
@section('taikhoan_content')

<script type="text/javascript">
	$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(".tab-content").show();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        tab.fadeIn();
    });
});
</script>
<style type="text/css">
	
</style>
<div class="content-tk-home">
	<div id="tabs-container">
    	<ul class="tabs-menu">
        	<li class="current"><a href="#tab-1">Câu hỏi mới ({{$count_questions}})</a></li>	
        	<li><a href="#tab-2">Đã trả lời ({{count($answers)}})</a></li>
        </ul>
	</div>
	<div class="tab-tk-ans">
		@if(count($questions))
        <div id="tab-1" class="tab-content">
    	<?php $questions_show = $questions; ?>
		@include('v2.view.danhsach_cauhoi')
		@if(false)
     	@foreach($questions as $question)
     	<article>	
			<div class="question">
				<h3><a href="/hoibacsi/{{$question['question_url']}}-{{$question['question_id']}}">{{$question->question_title}}</a></h3>

				<div class="post-meta-data">
					<span class="user">
						@if($question->hiding_creator == 0)
							{{Session::get('user')->fullname}}
					    @else<span class="user">Giấu Tên</span>
					    	@endif
					</span>
					<span class="time">
						Hỏi lúc {{$question->created_at}}
					</span>
				</div>

				<div class="body">
					<p>{{$question->question_content}}</p>

					<div class="thank-count">
						<i class="fa fa-heart-o" aria-hidden="true"></i>
						<span></span>
						người cám ơn bài viết
					</div>
				</div>
			</div>
					
		</article>
     	@endforeach
     	@endif
        <div style="padding-bottom:10px;">{!!$questions->links()!!}</div>
        </div>
        @endif

      	@if(count($answers)) 
        <div id="tab-2" class="tab-content">
           	<div id="answered">
           		<?php $questions_show = $answers; ?>
				@include('v2.view.danhsach_cauhoi')
				@if(false)
				@foreach($answers as $question)
					<article>
						<div class="question">
							<h3><a href="/hoibacsi/{{$question['question_url']}}-{{$question['question_id']}}">{{$question->question_title}}</a></h3>

							<div class="post-meta-data">
								<span class="user">
									@if($question->hiding_creator == 0)
										{{$question->fullname}}
								    @else<span class="user">Giấu Tên</span>
								    	@endif
									
								</span>

								<span class="time">
									Hỏi lúc {{$question->created_at}}
								</span>
							</div>

							<div class="body">
								<p>{{$question->question_content}}</p>

								<div class="thank-count">
									<i class="fa fa-heart-o" aria-hidden="true"></i>
									<span></span>
									người cám ơn bài viết
								</div>
							</div>
						</div>
				</article>
			@endforeach
			@endif
			<div style = "padding-bottom:10px;">{!!$answers->links()!!}</div>
			</div>
        </div>
        @endif
    </div>
</div>
@endsection