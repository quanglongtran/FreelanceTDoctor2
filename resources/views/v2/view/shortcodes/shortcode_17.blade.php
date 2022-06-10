<?php
if(!function_exists('shortcode_17')){

function shortcode_17(){
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

                        $('.ketqua').text( format_tien_te( Math.sqrt( (parseInt($('[name="cannang"]').val()) * parseInt($('[name="chieucao"]').val())) / 3600 ) ) );
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
        <td align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cân nặng (kg)</font></font></td>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""><input type="number" name="cannang" placeholder="Cân nặng" required></font></font></td>
    </tr>
    <tr>
        <td align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chiều cao (cm)</font></font></td>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""><input type="number" name="chieucao" placeholder="Chiều cao" required></font></font></td>
    </tr>
      <tr>
        <td colspan="2"><span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">* Yêu cầu</font></font></span>
          <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input class="flat-btn" type="submit" value="Tính toán" name="but_send" style="color: rgb(204, 204, 204);"></font></font>
          <input class="flat-btn" type="reset" value="Nhập lại" style="color: rgb(204, 204, 204);"></td>
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
                <td colspan="2" align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">
                        Với chiều cao và cân nặng đã cho, diện tích bề mặt cơ thể của bạn là </font></font><font class="tv12red tbold"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="ketqua">1,07 m </font></font><sup><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">2</font></font></sup></font></td>
              </tr>
            </tbody></table>
        </div>


<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}