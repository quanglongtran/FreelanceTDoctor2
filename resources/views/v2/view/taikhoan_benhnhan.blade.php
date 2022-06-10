@extends('v2/view/taikhoan',['title'=> 'Bệnh nhân của tôi'])
@section('taikhoan_content')

<div class="content-tk-home">
<style type="text/css">
    span.email {
    max-width: 120px;
    overflow: hidden;
    display: inline-block;
    text-overflow: ellipsis;
}

.table-list-benh-nhan {white-space: nowrap;background: #f6f6f6;}
.payment-choice {
    display: none;
}

.content-tk-home .sec-acc-home {
    padding: 0;
    border: 0 none;
}

.content-tk-home {
    margin-top: 0;
}
</style>   
    <section class="sec-acc-home" style="margin-bottom: 20px;">
        <div class="section-header">
            
        </div>
        <div class="section-body-benhan">
            <table class="table table-list-benh-nhan">
                <thead class="thead-light">
                <tr>
                    <td colspan="6">
                        <?php
                        $user = Session::get('user');
                        $create_url = '';
                        $data_rc = '';
                        if($user->user_type_id == App\Users::TYPE_DOCTOR){
                            $create_url =  '&rt=2&rc='.$user->doctor->doctor_id;
                            $data_rc = $user->doctor->doctor_id;
                        }
                        if($user->user_type_id == App\Users::TYPE_CLINIC){
                            $create_url =  '&rt=3&rc='.$user->clinic->clinic_id;
                            $data_rc = $user->clinic->clinic_id;
                        }
                        ?>
                        <h2 style="margin-top: 15px;"><i class="fa fa-fw fa-list" aria-hidden="true"></i>
                        Danh sách bệnh nhân <button data-toggle="tooltip" title="Thêm bệnh nhân" type="button" data-doctor-id="{{$user->user_id}}" data-rt="{{$user->user_type_id}}" data-rc="{{$data_rc}}" class="btn btn-info btn-benh-an btn-login-to-chat btn-them-benh-nhan" data-url="/frameLogin?isDoctorCreate=1&v={{time()}}{{$create_url}}">Thêm bệnh nhân</button> <button data-toggle="tooltip" title="Gửi tin nhắn tới tất cả bệnh nhân" type="button" data-rt="{{$user->user_type_id}}" class="btn btn-info btn-benh-an btn-gui-tn-benh-nhan">Gửi tin nhắn tới tất cả bệnh nhân</button>
                        </h2>
                        <form action="" method="get">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div style="float: right;">
                                <input name="search" placeholder="Tìm kiếm" class="form-control" type="text" value="{{$search}}">
                            </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th scope="col"><strong>ID</strong></th>
                    <th scope="col"><strong>Họ Tên</strong></th>
                    <th scope="col"><strong>Email</strong></th>
                    <th scope="col"><strong>Số điện thoại</strong></th>
                    <th scope="col"><strong>Ngày Tạo</strong></th>
                    <th scope="col"><strong>Hành động</strong></th>
                </tr>
                </thead>
                <tbody>
                @if(isset($userList) && count($userList))
                    <?php $index = 0; ?>
                    @foreach($userList as $userItem)
                        <tr>
                            <td scope="row">{{++$index}}</td>
                            <td><a  data-toggle="tooltip" title="Nhấn vào để trò chuyện" class="click-to-start-chat" href="javascript:void(0);" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$userItem->fullname}}" data-chat-to="room_{{$userItem->user_id}}" data-chat-room="room_{{Session::get('user')->user_id}}_{{$userItem->user_id}}"><strong>{{$userItem->fullname}}</strong></a>
                                <a href="/taikhoan/benhnhan_detail/{{$userItem->user_id}}" targetx="_blank" style="padding: 0;font-size: 12px;" class="btn btn-info btn-benh-an" data-toggle="modalx" data-target="#them_benh_an_Modal">Xem thêm</a>
                            </td>
                            <td><span class="email">{{$userItem->email}}</span></td>
                            <td>{{$userItem->phone}}</td>
                            <td><?php
                                $created_at = $userItem->created_at;
                                if($created_at != null){
                                    $created_at_arr = explode(' ', $created_at);
                                    if(isset($created_at_arr[0])){
                                        echo $created_at_arr[0];
                                    }
                                }
                            ?></td>
                            <td>
                                <button data-toggle="tooltip" title="Nhấn vào để trò chuyện" data-my-name="{{Session::get('user')->fullname}}" data-client-name="{{$userItem->fullname}}" data-chat-to="room_{{$userItem->user_id}}" data-chat-room="room_{{Session::get('user')->user_id}}_{{$userItem->user_id}}" target="_blank" href="javascript:void(0);" type="button" data-patient-id="{{$userItem->user_id}}" data-title="{{$userItem->fullname}} ({{$userItem->phone}})" class="btn btn-info btn-benh-an click-to-start-chat" data-toggle="modalx" data-target="#them_benh_an_Modal">Chat</button>

                                <button type="button" data-patient-id="{{$userItem->user_id}}" data-title="{{$userItem->fullname}} ({{$userItem->phone}})" class="btn btn-info btn-benh-an btn-them-benh-an" data-toggle="modalx" data-target="#them_benh_an_Modal">Thêm bệnh án</button>

                                <button target="_blank" href="javascript:void(0);" type="button" data-patient-id="{{$userItem->user_id}}" data-title="{{$userItem->fullname}} ({{$userItem->phone}})" class="btn btn-info btn-benh-an btn-xem-benh-an" data-toggle="modalx" data-target="#them_benh_an_Modal">Xem bệnh án</button>
                                
                                <button target="_blank" href="javascript:void(0);" type="button" data-patient-id="{{$userItem->user_id}}" data-title="{{$userItem->fullname}} ({{$userItem->phone}})" class="btn btn-info btn-benh-an btn-chuyen-benh-an" data-toggle="modalx" data-target="#them_benh_an_Modal">Chuyển BS</button>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="pagination" style="float: right">
                            <span >
                                {!! $userList->appends(request()->input())->links(); !!}
                            </span>
                        </div></td>
                    </tr>
                </tfoot>                
                @endif
            </table>
            
        </div>
<!-- Modal thêm bệnh án-->
<div id="them_benh_an_Modal" class="modal fade modal-lg" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" data-dismiss="modal" style="display: inline-block;">&times;</button>
         <h3 class="modal-title">Thêm bệnh án cho <strong></strong></h3>
       
      </div>
      <div class="modal-body">
        
        <form class=" form-horizontal" action=" " method="post" id="contact_form" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Triệu chứng:</label>
                <div class="inputGroupContainer">
                    <textarea rows="2" class="form-control trieu_chung" placeholder="Triệu chứng"></textarea>
                </div>
            </div>  
            <div class="form-group">
                <label class="control-label">Kết luận:</label>
                <div class="inputGroupContainer">
                    <textarea rows="4" class="form-control ket_luan" placeholder="Kết luận"></textarea>
                </div>
            </div>  
            <div class="form-group">
                <label class="control-label">Toa thuốc:</label>
                <div class="inputGroupContainer">
                    <textarea rows="4" class="form-control toa_thuoc" placeholder="Toa thuốc"></textarea>
                </div>
            </div> 
            <div class="form-group">
                <div class="form-group left">
                <label>
                    <strong>Ngày hẹn tái khám</strong>
                    <span>*</span>
                </label>
                <input class="ngay_tai_kham" name="appointment_at" required="required" type="datetime-local">
            </div>
            <div class="form-group">
                <label class="control-label">Ghi chú:</label>
                <div class="inputGroupContainer">
                    <textarea rows="2" class="form-control ghi_chu" placeholder="Ghi chú"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="inputGroupContainer">
                    <select class="form-group show_for_patient">
                        <option value="1">Hiển thị cho bệnh nhân</option>
                        <option value="0">Ẩn đi</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
            <input type="hidden" class="modal-field-patient_id" name="patient_id" value=""/>        
        </form>        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary activex btn-save-benhan"><span class="loadersmall"></span> Lưu lại </button>
        <button type="button" class="btn btn-default btn-warning" data-dismiss="modal">Đóng cửa sổ</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal thêm bệnh án-->

<!-- Modal show bệnh án-->
<div id="danh_sach_benh_an_Modal" class="modal fade modal-lg" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" data-dismiss="modal" style="display: inline-block;">&times;</button>
         <h3 class="modal-title">Bệnh án bệnh nhân <strong></strong></h3>       
      </div>
      <div class="modal-body">
        <div class="section-body-benhan">
            <table class="table table-list-benh-nhan">
                <thead class="thead-light">
                <tr>
                    <th scope="col"><strong>Triệu chứng</strong></th>
                    <th scope="col"><strong>Kết luận</strong></th>
                    <th scope="col"><strong>Toa thuốc</strong></th>
                    <th scope="col"><strong>Ngày tái khám</strong></th>
                    <th scope="col"><strong>Ghi chú</strong></th>
                    <th scope="col"><strong>Ngày Tạo</strong></th>
                </tr>
                </thead>
                <tbody class="danh-sach-show-benh-an">
                    
                </tbody>              
            </table>      
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-warning" data-dismiss="modal">Đóng cửa sổ</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal show bệnh án-->  

<!-- Modal chuyển bệnh án-->
<div id="chuyen_benh_an_Modal" class="modal fade modal-lg" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" data-dismiss="modal" style="display: inline-block;">&times;</button>
         <h3 class="modal-title">Chuyển bệnh nhân <strong></strong> cho bác sĩ khác</h3>       
      </div>
      <div class="modal-body">
        <div class="section-body-benhan">
            <div class="form-group">
                <label class="control-label">Nhập mã Bác sĩ cần chuyển đến:</label>
                <div class="inputGroupContainer">
                    <input type="text" class="form-control ma-bs" placeholder="Nhập mã BS"/>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
            <input type="hidden" class="modal-field-patient_id" name="patient_id" value=""/>      
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary activex btn-chuyen-benhan"><span class="loadersmall"></span> Chuyển </button>
        <button type="button" class="btn btn-primary btn-warning" data-dismiss="modal">Đóng cửa sổ</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal chuyển bệnh án-->   

<!-- Modal gửi tin nhắn bn-->
<div id="btn-gui-tn-benh-nhan_Modal" class="modal fade modal-lg" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;">
        <button type="button" class="close" data-dismiss="modal" style="display: inline-block;">&times;</button>
         <h3 class="modal-title">Gửi tin nhắn tới tất cả bệnh nhân</h3>       
      </div>
      <div class="modal-body">
        <div class="section-body-benhan">
            <div class="form-group">
                <label class="control-label">Nhập nội dung tin nhắn</label>
                <div class="inputGroupContainer">
                    <textarea class="form-control noi-dung-tin-nhan" placeholder="Nhập nội dung tin nhắn"></textarea>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
            <input type="hidden" class="modal-field-patient_id" name="patient_id" value=""/>      
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary activex btn-ajax-gui-tn-benh-nhan"><span class="loadersmall"></span> Gửi tin nhắn </button>
        <button type="button" class="btn btn-primary btn-warning" data-dismiss="modal">Đóng cửa sổ</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal chuyển bệnh án-->   

    </section>

</div>

<script type="text/javascript">
    $('.btn-xem-benh-an').click(function(){
        $('#danh_sach_benh_an_Modal .modal-title strong').text($(this).attr('data-title'));
        $('.modal-field-patient_id').val($(this).attr('data-patient-id'));
        $('.danh-sach-show-benh-an').html('');
        $.ajax({
            type: 'get',
            url: '/benhan',
            data: {
                create_for : $(this).attr('data-patient-id')
            },
            cache: false,
            success: function(res) {
                console.log(res);
                // alert("Tải bệnh án thành công!");
                // location.reload();
                res.data.data.forEach(function(item, index){
                    $('.danh-sach-show-benh-an').prepend('<tr>'
                        +'<td>'+item.trieu_chung+'</td>'
                        +'<td>'+item.ket_luan+'</td>'
                        +'<td>'+item.toa_thuoc+'</td>'
                        +'<td>'+((item.ngay_tai_kham == '0000-00-00 00:00:00') ? '': item.ngay_tai_kham)+'</td>'
                        +'<td>'+item.ghi_chu+'</td>'
                        +'<td>'+item.created_at+'</td>'
                    +'</tr>');
                });
                $('#danh_sach_benh_an_Modal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            },
            error: function(res){
                alert('Có lỗi xảy ra, vui lòng thử lại!');
            }
        });
        
    })
    var tin_nhan_da_gui = 0;
    $('.btn-ajax-gui-tn-benh-nhan').click(function(){
        if($('.noi-dung-tin-nhan').val() == ''){
            alert('Vui lòng nhập nội dung tin nhắn!');
            $('.noi-dung-tin-nhan').focus();
            return ;
        }
        if(!$(this).hasClass('active')){
            $(this).addClass('active');
            $.ajax({
                type: 'GET',
                url: '/taikhoan/benhnhan',
                data: {
                    get_json : 1
                },
                cache: false,
                success: function(res) {
                    console.log(res);
                    tin_nhan_da_gui = 0;
                    if(res.status == true && res.data && res.data.length > 0){
                        message = $('.noi-dung-tin-nhan').val();
                        myName = $('.logo-username').text();
                        currentID = 'room_'+'{{$user->user_id}}';
                        for (var i = 0; i < res.data.length; i++) {
                            chat_to = 'room_'+res.data[i].user_id;
                            create_room = currentID+'_'+res.data[i].user_id;
                            clientName = res.data[i].fullname;
                            func_send_message_to_room_real(message, chat_to, create_room, myName, clientName, currentID, res.data);
                        }
                    }
                    // $('.btn-ajax-gui-tn-benh-nhan.active').removeClass('active');
                    // $('#them_benh_an_Modal').modal('hide');
                },
                error: function(res){
                    // $('.btn-ajax-gui-tn-benh-nhan.active').removeClass('active');
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            });
        }else{
            alert("Vui lòng chờ hệ thống xử lý yêu cầu hiện tại. Nếu chờ quá lâu bạn có thể tải lại trang để thử lại!")
        }
    })
    $('.btn-gui-tn-benh-nhan').click(function(){
        $('#btn-gui-tn-benh-nhan_Modal').modal({
            backdrop: 'static',
            keyboard: false
        });
    })
    $('.btn-them-benh-an').click(function(){
        $('#them_benh_an_Modal .modal-title strong').text($(this).attr('data-title'));
        $('.modal-field-patient_id').val($(this).attr('data-patient-id'));
        $('#them_benh_an_Modal').modal({
            backdrop: 'static',
            keyboard: false
        });
    })
    $('.btn-save-benhan').click(function(){
        if($('#them_benh_an_Modal .trieu_chung').val() == ''){
            alert('Vui lòng nhập triệu chứng!');
            $('#them_benh_an_Modal .trieu_chung').focus();
            return ;
        }
        if($('#them_benh_an_Modal .ket_luan').val() == ''){
            alert('Vui lòng nhập kết luận!');
            $('#them_benh_an_Modal .ket_luan').focus();
            return ;
        }
        if(!$(this).hasClass('active')){
            $(this).addClass('active');
            $.ajax({
                type: 'POST',
                url: '/benhan',
                data: {
                    create_for : $('#them_benh_an_Modal .modal-field-patient_id').val(),
                    trieu_chung : $('#them_benh_an_Modal .trieu_chung').val(),
                    ket_luan : $('#them_benh_an_Modal .ket_luan').val(),
                    ngay_tai_kham : $('#them_benh_an_Modal .ngay_tai_kham').val(),
                    toa_thuoc : $('#them_benh_an_Modal .toa_thuoc').val(),
                    ghi_chu : $('#them_benh_an_Modal .ghi_chu').val(),
                    show_for_patient : $('#them_benh_an_Modal .show_for_patient').val(),
                },
                cache: false,
                success: function(res) {
                    alert("Tạo bệnh án thành công!");

                    $('#them_benh_an_Modal .trieu_chung').val(''),
                    $('#them_benh_an_Modal .ket_luan').val(''),
                    $('#them_benh_an_Modal .ngay_tai_kham').val(''),
                    $('#them_benh_an_Modal .toa_thuoc').val(''),
                    $('#them_benh_an_Modal .ghi_chu').val('');
                    $('.btn-save-benhan.active').removeClass('active');
                    $('#them_benh_an_Modal').modal('hide');
                },
                error: function(res){
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            });
        }else{
            alert("Vui lòng chờ hệ thống xử lý yêu cầu hiện tại. Nếu chờ quá lâu bạn có thể tải lại trang để thử lại!")
        }
    })
    $('.btn-chuyen-benh-an').click(function(){
        $('#chuyen_benh_an_Modal .modal-title strong').text($(this).attr('data-title'));
        $('#chuyen_benh_an_Modal .modal-field-patient_id').val($(this).attr('data-patient-id'));
        $('#chuyen_benh_an_Modal').modal({
            backdrop: 'static',
            keyboard: false
        });

    })
    $('.btn-chuyen-benhan').click(function(){
        if($('#chuyen_benh_an_Modal .ma-bs').val() == ''){
            alert('Vui lòng nhập mã bác sĩ!');
            $('#chuyen_benh_an_Modal .ma-bs').focus();
            return ;
        }
        if(!$(this).hasClass('active')){
            $(this).addClass('active');
            $.ajax({
                type: 'POST',
                url: '/chuyen_benhan',
                data: {
                    create_for : $('#chuyen_benh_an_Modal .modal-field-patient_id').val(),
                    mabs : $('#chuyen_benh_an_Modal .ma-bs').val(),
                },
                cache: false,
                success: function(res) {
                    console.log(res);
                    $('.btn-chuyen-benhan.active').removeClass('active');
                    if(res.status == true){
                        alert("Chuyển bệnh nhân thành công!");
                        $('#chuyen_benh_an_Modal .ma-bs').val('');                        
                        $('#chuyen_benh_an_Modal').modal('hide');
                    }else{
                        alert(res.message);
                    }
                },
                error: function(res){
                    $('.btn-chuyen-benhan.active').removeClass('active');
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                }
            });
        }else{
            alert("Vui lòng chờ hệ thống xử lý yêu cầu hiện tại. Nếu chờ quá lâu bạn có thể tải lại trang để thử lại!")
        }
    })
</script>

@endsection
