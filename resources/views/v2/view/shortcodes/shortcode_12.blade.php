<?php
if(!function_exists('shortcode_12')){

function shortcode_12(){
    ob_start();
?>


<script language="javascript">
                jQuery(document).ready(function ($) {
                    function format_tien_te(data){
                        data = data.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                        return data.replace('.00', '');
                    }

                  
                    $('[name="pulse_chart"]').submit(function(event){
                        event.preventDefault();
                        $('#form_kq2').show();
                        if($('[name="slt_age"]').val() == 0){
                            $('.ketqua').text('70-190');
                        }
                        if($('[name="slt_age"]').val() == 1){
                            $('.ketqua').text('80-160');
                        }
                        if($('[name="slt_age"]').val() == 2){
                            $('.ketqua').text('80-130');
                        }
                        if($('[name="slt_age"]').val() == 3){
                            $('.ketqua').text('80-120');
                        }
                        if($('[name="slt_age"]').val() == 4){
                            $('.ketqua').text('75-115');
                        }
                        if($('[name="slt_age"]').val() == 5){
                            $('.ketqua').text('70-100');
                        }
                        if($('[name="slt_age"]').val() == 6){
                            $('.ketqua').text('60-100');
                        }
                    })
                });
            </script>

        
<div class="calculator-table-form blue" id="gendercolor">
 <form name="pulse_chart" onsubmit="return pulsechart_validation();" style="display:inline">
    <table cellpadding="0" cellspacing="0">
      <tbody><tr class="table-head">
        <td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chọn chi tiết của bạn</font></font></td>
      </tr>
      <tr>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tuổi </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span> </td>
        <td>
        <select name="slt_age" required>
            <!-- <option value="" selected="selected"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lựa chọn</font></font></option> -->
            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0-1 tháng tuổi</font></font></option>
            <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1-11 tháng tuổi</font></font></option>
            <option value="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1-2 tuổi</font></font></option>
            <option value="3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3-4 tuổi</font></font></option>
            <option value="4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5-6 tuổi</font></font></option>
            <option value="5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">7-9 tuổi</font></font></option>
            <option value="6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">>10 tuổi</font></font></option>
            
         </select>
        </td>
      </tr>
      <tr>
        <td colspan="2"><span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">* Yêu cầu</font></font></span>
          <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input class="flat-btn" type="submit" value="Nộp" name="but_send" style="color: rgb(204, 204, 204);"></font></font>
          <input class="flat-btn" type="reset" value="Reset" style="color: rgb(204, 204, 204);"></td>
      </tr>
    </tbody></table>
  </form>
</div>


        <div class="calculator-table-form blue " style="padding-top: 20px;display: none;" id="form_kq2">
            <table cellpadding="0" cellspacing="0">
              <tbody><tr class="table-head">
                <td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Kết quả</font></font></td>
              </tr>
              <tr>
                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhịp tim</font></font></td>
                <td><font color="#FF0000"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""><span class="ketqua"></span> nhịp mỗi phút</font></font></b></font></td>
              </tr>
                <tr>
                <td colspan="2">
                <div class="calcnote"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lưu ý: Nên hỏi ý kiến &ZeroWidthSpace;&ZeroWidthSpace;bác sĩ để được tư vấn trong trường hợp có nghi ngờ hoặc cần điều trị.</font></font></div></td>
              </tr>
            </tbody></table>
        </div>


<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}