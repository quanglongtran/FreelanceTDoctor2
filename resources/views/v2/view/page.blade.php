@extends('v2/structor/main',['title'=> $page->title])
@section('content')
<div class="main-A">
	<div class="abu-cnt">
		<div id="top">
            <div class="link">
                <div class="nav">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="">{{$page->title}}</a></li>
                        @if(Session::get('user')!=null && Session::get('user')->user_type_id == 0)
                        <li class="admin-edit-link" style="margin-left: 10px;color: #e84f5e;"><a href="/sua-trang/{{$page->id}}">Sửa trang</a></li>
                        @endif
                    </ul> 
                    
                </div>
            </div> 
	    </div><!-- #top -->

	    <div class="top-new">
            {!!\App\Helpers\UploadFileHelper::correctPath($page->noi_dung)!!}
	   </div>
    </div>
    <br><br>
</div>
@endsection