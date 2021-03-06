@extends('v2/structor/main',['title'=> 'Nạp tiền'])
@section('content')

<div class="main-A">
	<div id="top">
            <div class="link">
                <div class="nav">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li>&nbsp;>&nbsp;</li>
                        <li><a href="">Quản lý tài khoản</a></li>
                    </ul> 
                    
                </div>
                
                  <h1 style="font-size: 18px;">Thông tin tài khoản</h1>
                 <div class="header ">
                    <a class="button create-thread" href="/hoibacsi/datcauhoi" title="Đặt câu hỏi cho bác sĩ, hoàn toàn miễn phí">
                        <i class="fa fa-commenting" aria-hidden="true"></i> Đặt câu hỏi miễn phí
                    </a>
                   </div>   
                
            </div> 
    </div><!-- #top -->	
    <div class="nl-nt-cnt">
            <aside class="as-nl-l">
                <section class="sec-nl-l">
                    <h3>Xin chào, {{Session::get('user')->fullname}}</h3>

                    <dl>
                        <dt>
                            <a href="/taikhoan/" class="active"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Thông tin tài khoản</a>
                        </dt>
                        
                        <dt>
                            <a href="/taikhoan/ghinho/" class=""><i class="fa fa-fw fa-bookmark-o" aria-hidden="true"></i> Đã ghi nhớ (0)</a>
                        </dt>
                        <dt>
                            <a href="/taikhoan/nhanxet/" class=""><i class="fa fa-fw fa-comments-o" aria-hidden="true"></i> Nhận xét đã gửi</a>
                        </dt>
                        <dt>
                            <a href="/taikhoan/hoidap/" class=""><i class="fa fa-fw fa-comments-o" aria-hidden="true"></i> Hỏi đáp của tôi</a>
                        </dt>
                        <dt>
                            <a href="/taikhoan/doimatkhau/" class=""><i class="fa fa-fw fa-key" aria-hidden="true"></i> Đổi mật khẩu</a>
                        </dt>
                        @if(Session::get('user')->user_type_id==0)
                        <dt>
                            <a href="/taikhoan/thembacsi" ><i class="fa fa-plus" aria-hidden="true"></i> Thêm bác sĩ</a>
                        </dt>
                        <dt>
                            <a href="/taikhoan/themcsyt" ><i class="fa fa-plus" aria-hidden="true"></i> Thêm csyt</a>
                        </dt>
                        <dt>
							<a href="/taikhoan/themnhathuoc" ><i class="fa fa-plus" aria-hidden="true"></i> Thêm nhà thuốc</a>
						</dt>
                        @endif
                        @if(Session::get('user')->user_type_id==2)
                        <dt>
                            <a href="/taikhoan/vietbai" ><i class="fa fa-plus" aria-hidden="true"></i> Gửi bài viết</a>
                        </dt>
                        @endif
                        <dt>
                            <a href="/dangxuat" class="logout" {{-- onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" --}}><i class="fa fa-fw fa-power-off" aria-hidden="true"></i> Đăng xuất</a>
                        </dt>

                    </dl>
                </section>
            </aside>
            <aside class="as-nl-r">
              @include('v2.view.nganluong')
            </aside>
        </div>
</div>
@endsection