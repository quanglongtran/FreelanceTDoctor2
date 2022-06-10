<?php
if(!function_exists('shortcode_23')){

function shortcode_23(){
    ob_start();
?>
 <script language="javascript">
                jQuery(document).ready(function () {
                    $('[name="BMIform"]').submit(function (event) {                        
                        event.preventDefault();
                        var age = parseInt($('[name="age"]').val());
                        var height = parseInt($('[name="height"]').val());
                        var weight = parseInt($('[name="pounds"]').val());
                        if($('[name="opt_mw"]').val() == 'm'){
                            var ketqua = 10*weight + 6.25*height - 5*age + 5;
                            $('.ketqua1').text(format_tien_te(ketqua)+'');
                        }else{
                            var ketqua = 10*weight + 6.25*height - 5*age + 161;
                            $('.ketqua1').text(format_tien_te(ketqua)+'');
                        }
                        //format_tien_te
                        $('#form_kq2').show();
                    })
                });
            </script>
            <center>
                <div class="calculator-table-form blue">
                    <form name="BMIform">
                        <table cellpadding="0" cellspacing="0" class="tv12black">
                                    <tbody><tr class="table-head"><td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhập chi tiết của bạn</font></font></td></tr>
                        <tr><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Giới tính </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span>
                        </td>
                        <td>
                        <input type="radio" checked="" value="m" name="opt_mw" onclickx="checkgender();" style="color: rgb(204, 204, 204);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Đàn ông&nbsp;
                        </font></font><input type="radio" value="w" name="opt_mw" onclickx="checkgender();" style="color: rgb(204, 204, 204);"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Phụ nữ&nbsp;
                        
                        </font></font></td>
                        </tr>
                        <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tuổi </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></td>
                        <td>
                        <input size="10" class="ageinput" type="text" name="age" onblurx="if(this.value==''){this.value='18-99'}" onfocusx="if(this.value=='18-99'){this.value=''};" onkeypressx="return numeralsOnly(event)" value="" maxlength="2" stylex="color: rgb(204, 204, 204);" placeholder="18-99" required>
                        </td>
                        </tr>       
                        
                        <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chiều cao </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></td>
                        <td>
                        <input type="text" name="height" size="10" onkeyupx="conv(3)" class="innerc resform" onkeypressx="return numeralsOnly(event)" maxlength="3" value="" stylex="color: rgb(204, 204, 204);" placeholder="170" required><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 
                        cm 
                        </font></font></td>
                        </tr>
                        <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trọng lượng </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></td>
                        <td>
                    <input size="10" type="text" name="pounds" onkeypressx="return numeralsOnly(event)" maxlength="3" value="" stylex="color: rgb(204, 204, 204);" placeholder="70" required>
                        kg
                        </td>
                        </tr>       
                        <tr>
                        <td colspan="2"><span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">* Yêu cầu</font></font></span>
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="Tính toán" id="but" class="flat-btn" name="but_send" onclick="rmr_cal()x" style="color: rgb(204, 204, 204);"></font></font>
                        </td>
                        </tr>
                        </tbody></table>
                    </form>
                </div>
            </center>

            <div class="report-content" id="form_kq2" style="padding-top: 10px; display: none;">
                <div class="calculator-table-form blue">
                    <table cellpadding="0" cellspacing="0" class="tv12black">
                      <tbody>
                        <tr class="table-head">
                            <td colspan=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Kết quả</font></font></td>
                            </tr>
                             <tr>
                              <td id="tabcol">Với độ tuổi, chiều cao, cân nặng của bạn, Tỷ lệ trao đổi chất khi nghỉ ngơi hoặc Tỷ lệ trao đổi chất cơ bản của bạn cần là <span class="red ketqua1"></span> calo/ngày.
Con số này là cơ sở cho việc ăn uống và tiêu thụ calo. Lập kế hoạch ( duy trì cân nặng hiện tại, giảm cân, tăng cân) dựa trên cơ sở số liệu trên.
 trọng lượng cơ thể của bạn là chất béo</td>
                             </tr>
                         </tbody>
                    </table>

                </div>
            </div>

<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}