<!-- Modal đăng nhạp hệ thống-->
<style type="text/css">
    .block-register .group-input label {
    text-align: left;
    font-weight: 300;
}
</style>
<div id="ajax_login_Modal" class="modal fade modal-sm" role="dialog" style="margin:auto;">
  <div class="modal-dialog" style="max-width: 100%;">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="row-close"style="margin-right: 5px;">
            <button type="button" class="close" data-dismiss="modal" style="display: inline-block;">&times;</button>
        </div>
        <div class="modal-body">
        
<!-- Modal đăng nhập hệ thống-->  
<section class="login-popup-static row" idx="register" style="padding: 0;">
    <?php $isLoginTag = false;?>
    <div class="alone pp white-bg rounded col-sm-12" style="padding-top: 0;">
        <div class="block-register" style="padding: 0">
            @if(Session::get('user')==null)
            <div class="group-labels clr">
                <label class="register-tab @if($errors->has('errorReg') || session('successReg') || !$isLoginTag) active @else <?php $isLoginTag = true;?> @endif"><span>Đăng ký</span></label>
                <label class="login-tab @if($errors->has('errorlogin') || $isLoginTag) active @endif"><span>Đăng nhập</span></label>
            </div>
            @endif
            <div class="tab-register @if($errors->has('errorReg') || session('successReg') || !$isLoginTag) active @endif">
                @if($errors->has('errorReg'))
                    <div class="alert alert-danger">
                        {{$errors->first('errorReg')}}
                    </div>
                @endif
                @if (session('successReg'))
                    <div class="alert alert-success">
                        {{session('successReg')}}
                    </div>
                @endif
                <form class="frm-submit-register" action="/v2/dang-ky-2" method="post" enctype="miltipart/form-data">
                    <input type="hidden" name="isAjax" value="true">
                    <input type="hidden" name="isFrame" value="true"/>
                    
                    <div hidden class="group-input text">
                        <label>GOTO</label>
                        <div>
                            <input class="goto" type="text" name="goto" placeholder="">
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="group-input">
                        <label>Họ và tên <span class="field-required">*</span></label>
                        <div>
                            <input placeholder="Nhập vào Họ và Tên" type="text" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="group-input">
                        <label>Điện thoại hoặc Email <span class="field-required">*</span></label>
                        <div>
                            <input placeholder="Nhập vào Điện thoại hoặc Email" type="text" name="mobile_phone" id="phone" required>
                        </div>
                    </div>
                    @if(false)
                    <div class="group-input hidden">
                        <label>Email <span class="field-required hidden">*</span></label>
                        <div>
                            <input type="text" name="email_info" id="email_info" autocomplete="off">
                        </div>
                    </div>
                    @endif
                    <div class="group-input" hidden>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>GIỚI TÍNH</label>
                                <select name="gender" class="form-control test" required="" id="gender"
                                        type="text">
                                    <option selected="selected" value="3">Khác</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group" hidden>
                                <label>LOẠI TÀI KHOẢN</label>
                                <select class="form-control test" name="type" required="">
                                    <option value="user" selected="selected">Bệnh nhân</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="group-input text" hidden>
                        <label>Đăng nhập</label>
                        <div>
                            <input type="text" name="email" id="user" placeholder="">
                        </div>
                    </div>
                    <div class="group-input text">
                        <label>Mật khẩu <span class="field-required">*</span></label>
                        <div>
                            <input type="password" name="password"
                                   placeholder="Mật khẩu để đăng nhập lần sau">
                        </div>
                    </div>
                    <div class="group-input text" style="display:  none; border: 1px solid #818181; padding: 10px">
                        <label>Mã code (Không bắt buộc)</label>
                        <div>
                            <input type="text" name="refer_id" value="<?php if(isset($_REQUEST['ref_code'])){ echo $_REQUEST['ref_code']; } ?>">
                        </div>
                        <?php
                        $is_doctor_refer = 'checked="checked"';
                        $is_clinic_refer = '';
                        if(isset($_REQUEST['ref_type']) && isset($_REQUEST['ref_code']) && $_REQUEST['ref_code'] != ''){ 
                            if($_REQUEST['ref_type'] == 3){
                                $is_doctor_refer = '';
                                $is_clinic_refer = 'checked="checked"';
                            }
                        }
                        if(isset($_REQUEST['isDoctorCreate'])){
                            echo '<input type="hidden" name="isDoctorCreate" value="1">';
                        }
                        ?>

                        <div style="clear: both; margin-top: 8px;">
                            <div class="doctor-refer" style="width: 100px;display: inline-block">
                                <input type="radio" id="doctor_refer" <?php echo $is_doctor_refer; ?> name="refer_type" value="2">
                                <label for="doctor_refer">Bác sĩ</label>
                            </div>
                            <div class="clinic-refer" style="width: 100px; display: inline-block;">
                                <input type="radio" id="clinic_refer" <?php echo $is_clinic_refer; ?> name="refer_type" value="3">
                                <label for="clinic_refer">Cơ sở y tế</label>
                            </div>
                        </div>
                    </div>
                    <div id="recaptcha-container"></div>
                    <br>
                    <div class="text-center" style="clear: both; margin-top:0">
                        <button id="sign-in-button" type="submit"
                                class="btn btn-ok btn-signin btn-rounded" value="">TIẾP TỤC
                        </button>
                    </div>

                </form>
            </div>
            <div class="tab-login @if($errors->has('errorlogin') || $isLoginTag) active @endif">
                <form class="form-login-ajax" method="post" action="/v2/dang-nhap-2" name="login">
                    <input type="hidden" name="isAjax" value="true">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" name="next" value="{{Request::get('next')}}"/>
                    <input type="hidden" name="isFrame" value="true"/>
                    <div class="group-input">
                        <label>Đăng nhập</label>
                        <div>
                            <input name="login" required="" type="text" placeholder="Tên đăng nhập / Phone / Email">
                        </div>
                    </div>
                    <div class="group-input">
                        <label>Mật khẩu</label>
                        <div>
                            <input name="password" required="" type="password" placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div hidden class="group-input text">
                        <label>GOTO</label>
                        <div>
                            <input class="goto" type="text" name="goto" placeholder="">
                        </div>
                    </div>
                    {{--<div class="req"><span>Quên mật khẩu?</span> <a href="#" class="alink">Tạo lại mật khẩu</a></div>--}}
                    <div class="req">
                        @if($errors->has('errorlogin'))
                            <div class="form-row">
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">
                                        &times;
                                    </button>
                                    <p style="color: #E84F5E;">{{$errors->first('errorlogin')}} </p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-ok btn-rounded" value="">Đăng nhập</button>
                    </div>
                </form>
                <script>
                    function getQueryParams(qs) {
                        qs = qs.split('+').join(' ');

                        var params = {},
                            tokens,
                            re = /[?&]?([^=]+)=([^&]*)/g;

                        while (tokens = re.exec(qs)) {
                            params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
                        }

                        return params;
                    }

                    var query = getQueryParams(document.location.search);
                    if (query.goto !== undefined) {
                        $(".goto").val(query.goto);
                    }
                </script>
            </div>

        </div>
    </div>
</section>


      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){
        <?php
        if(isset($_REQUEST['collaborator'])){
        ?>
        
        
        <?php
        }
        ?>
        $('.register-tab').click(function(){
            $('.login-tab').removeClass('active');
            $('.tab-login').removeClass('active');
            $('.register-tab').addClass('active');
            $('.tab-register').addClass('active');
        })
        $('.login-tab').click(function(){
            $('.login-tab').addClass('active');
            $('.tab-login').addClass('active');
            $('.register-tab').removeClass('active');
            $('.tab-register').removeClass('active');
        })
        $('.btn-req-login').click(function (e) {
            $('.login-tab').addClass('active');
            $('.tab-login').addClass('active');
            $('.register-tab').removeClass('active');
            $('.tab-register').removeClass('active');
            <?php            
            $ref_type=isset($_REQUEST['ref_type']) ? $_REQUEST['ref_type'] : '';
            $ref_code=isset($_REQUEST['ref_code']) ? $_REQUEST['ref_code'] : '';
            ?>
            // eModal.iframe({url:'/frameLogin?v=1&rt=<?php echo $ref_type; ?>&rc=<?php echo $ref_code; ?>',title: 'Nhập thông tin người bệnh', size: eModal.size.sm});
            $('#ajax_login_Modal').modal({
                // backdrop: 'static',
                // keyboard: false
            });
        });
        $('.btn-req-login-login').click(function (e) {
            $('.login-tab').removeClass('active');
            $('.tab-login').removeClass('active');
            $('.register-tab').addClass('active');
            $('.tab-register').addClass('active');
            // eModal.iframe({url:'/frameLogin?type=login&v=1',title: 'Đăng nhập vào hệ thống', size: eModal.size.sm});
            $('#ajax_login_Modal').modal({
                // backdrop: 'static',
                // keyboard: false
            });
        });

        $('.btn-comment').click(function (e) {
            // eModal.iframe({url:'/frameLogin?type=login&v=1',title: 'Đăng nhập vào hệ thống', size: eModal.size.sm});
            $('#ajax_login_Modal').modal({});
        });
        $('body').on('click', '.btn-login-to-chat', function (e) {
            // eModal.iframe({url:$(this).attr('data-url'),title: 'Đăng nhập vào hệ thống', size: eModal.size.sm});
            if($(this).hasClass('auto-click')){
                document.cookie = "bi_auto_click="+$(this).attr('data-auto-click');
            }

            if($(this).hasClass('btn-them-benh-nhan')){
                $('input[name="refer_id"]').val($(this).attr('data-rc'));
                if($(this).attr('data-rt') == 2){
                    jQuery('#doctor_refer').click();
                }else{
                    jQuery('#clinic_refer').click();
                }
                if($('.frm-submit-register .isDoctorCreate').length == 0){
                    $('.frm-submit-register').append('<input class="isDoctorCreate" type="hidden" name="isDoctorCreate" value="true"/>');
                }
                $('.register-tab').click();
                $('.register-tab').addClass('active');
                $('.login-tab').removeClass('active');
            }else{
                $('.login-tab').click();
                $('.login-tab').addClass('active');
                $('.register-tab').removeClass('active');
            }
            $('#ajax_login_Modal').modal({});

        });

        $('.frm-submit-register').submit(function(event){
            event.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            
            $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(data)
               {
                   alert(data.detail); // show response from the php script.
                   if(data.success == true){
                        var data_submit = $('#ajax_login_Modal').attr('data-submit');
                        if(data_submit && data_submit != ''){
                            $(data_submit).removeClass('require-login').trigger('submit');
                        }else{
                            window.location.reload();
                        }
                   }
               },
               error: function(data){
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
               }
            });
        })

        $('.form-login-ajax').submit(function(event){
            event.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            
            $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(data)
               {
                   if(data.success == true){
                        var data_submit = $('#ajax_login_Modal').attr('data-submit');
                        if(data_submit && data_submit != ''){
                            $(data_submit).removeClass('require-login').trigger('submit');
                        }else{                            
                            window.location.reload();
                        }
                   }else{
                        alert(data.detail); // show response from the php script.
                   }
               },
               error: function(data){
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
               }
            });
        })
        
    })
</script>