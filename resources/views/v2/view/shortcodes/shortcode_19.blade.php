<?php
if(!function_exists('shortcode_19')){

function shortcode_19(){
    ob_start();
?>
<style type="text/css">
    #form_kq2.calculator-table-form tr:last-child td {text-align: left;}
</style>

<script language="javascript">
                jQuery(document).ready(function ($) {
                    function format_tien_te(data){
                        data = data.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                        return data.replace('.00', '');
                    }
                  
                    $('[name="pulse_chart"]').submit(function(event){
                        event.preventDefault();
                        $('#form_kq2').show();
                        
                        var ketqua1 = (parseInt($('[name="giatri2"]').val()) * parseInt($('[name="giatri3"]').val())) / (parseInt($('[name="giatri1"]').val()) * parseInt($('[name="giatri4"]').val()));
                        var bsa = Math.sqrt((parseInt($('[name="giatri5"]').val()) * parseInt($('[name="giatri6"]').val()))/3600);
                        $('.ketqua1').text( format_tien_te( ketqua1 ) +'(mL/phút)');
                        $('.ketqua2').text( format_tien_te( ketqua1*1.73/bsa ) +' (mL/phút/1,73 m2)');
                    })
                });
            </script>

        
<div class="calculator-table-form blue" id="gendercolor">
 <form name="pulse_chart" onsubmit="return pulsechart_validation();" style="display:inline">
    <table cellpadding="0" cellspacing="0">
      <tbody><tr class="table-head">
        <td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhập chi tiết của bạn</font></font></td>
      </tr>
    <tr>
        <td align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nồng độ Creatinin huyết tương (PCr)* (mg/dL)</font></font></td>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""><input type="number" name="giatri1" placeholder="nhập số" required></font></font></td>
    </tr>
    <tr>
        <td align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nồng độ Creatinin nước tiểu (UCr)* (mg/dL)</font></font></td>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""><input type="number" name="giatri2" placeholder="nhập số" required></font></font></td>
    </tr>
    <tr>
        <td align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thể tích nước tiểu toàn bộ* (mL)</font></font></td>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""><input type="number" name="giatri3" placeholder="nhập số" required></font></font></td>
    </tr>
    <tr>
        <td align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thời gian thu mẫu nước tiểu* (phút)</font></font></td>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""><input type="number" name="giatri4" placeholder="nhập số" required></font></font></td>
    </tr>
    <tr>
        <td align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chiều cao* (cm)</font></font></td>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""><input type="number" name="giatri5" placeholder="nhập số" required></font></font></td>
    </tr>
    <tr>
        <td align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cân nặng* (cm)</font></font></td>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""><input type="number" name="giatri6" placeholder="nhập số" required></font></font></td>
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
                    <td align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hệ số thanh thải Creatinin</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="ketqua1"></font></font></td>
                </tr>
                <tr>
                    <td align="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hệ số thanh thải Creatinin hiệu chỉnh</font></font></td>
                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="ketqua2"></font></font></td>
                </tr>
              
            </tbody></table>
        </div>


<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}