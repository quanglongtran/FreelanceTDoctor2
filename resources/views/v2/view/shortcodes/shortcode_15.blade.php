<?php
if(!function_exists('shortcode_15')){

function shortcode_15(){
    ob_start();
?>
 <style>
    .red { color: red; }
        .calculator-table-form table{background:#ebf3f4;border:1px solid #eee;border-bottom:2px solid #187681;box-shadow:0 0 20px rgba(0,0,0,.1),0 10px 20px rgba(0,0,0,.05),0 20px 20px rgba(0,0,0,.05),0 30px 20px rgba(0,0,0,.05)}.calculator-table-form td{border:solid 1px #fff;padding:10px}.calculator-table-form tfoot{background-color:#ccf2ff;color:#fff;padding:10px}.calculator-table-form tbody{color:#000;padding:10px}.calculator-table-form  tr.table-head {background-color:#187681;color:#fff;padding:10px;text-align:left}.calculator-table-form input[type=text]:focus,select:focus,textarea:focus{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}.calculator-table-form input[type=text],textarea{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}
        .calculator-table-form .flat-btn{align:center;background-color:#187681;border:0;border-radius:3px;box-shadow:0 0 2px 0 rgb(0 0 0 / 10%),0 2px 2px 0 rgb(0 0 0 / 20%);display:inline-block;color:#fff;font-size:1.105rem;line-height:1;padding: .65rem 1.2rem;text-decoration:none!important}.calculator-table-form select{min-height:32px;background:#fff;border:1px solid #ccc;outline:0}.calculator-table-form input[type=text]:focus,select:focus,textarea:focus{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}input[type=text]:focus,select:focus,textarea:focus{min-height:32px}.overlay-menu{height:100%;position:fixed;z-index:1;top:0;left:0;background-color:#f9f9f9;border:1px solid #f9f9f9;overflow-x:hidden;transition:all .17s cubic-bezier(.37,.15,.32,.94);-webkit-transition:all .17s cubic-bezier(.37,.15,.32,.94);z-index:1000000}
        .calculator-table-form tr:last-child td{text-align:center;}
        .flat-btn{cursor:pointer;margin:10px;background-color:#187681;border:0;border-radius:3px;box-shadow:0 0 2px 0 rgb(0 0 0 / 10%),0 2px 2px 0 rgb(0 0 0 / 20%);display:inline-block;color:#fff;font-size:.875rem;line-height:1;padding:.75rem 1.5rem;text-decoration:none!important}
        .flat-btn:hover{color:#fff;}
        .result{text-align:center;margin:15px;}.content11{font-size:14px;}
        .result .flat-btn{margin-bottom:15px;}
        .mandatory-star{color:#c00;}
        .calcnote {font-size:14px;}
        .pad10{padding:10px;}
        .required{color:#c00;}
        .btn:hover{color:#fff;}
        .relatedlinks a:hover{color:#0D71AF;}
        .flat-btn {  color: #fff!important;}.flat-btn:hover {  color: #fff!important;}
        .calcresult{border-radius:4px 4px 0 0 ; background:#ebf3f4}.calcresult .result,.result{text-align:center; padding:5px 0; margin-bottom:10px;}
        .calcresult table{width:95%; margin:15px auto; border:3px solid #187681; background:#fff;}.calcresult table td{padding:5px; border:1px solid #187681;}.calcnote,.calcresult table .note{font-style:italic; font-size:12px; padding:10px;}</style>
<script language="javascript">
                function checkgender() { if (document.immunization.r1[0].checked) { gendercolor.className = "calculator-table-form blue"; form_kq2.className = "calculator-table-form blue"; } else { gendercolor.className = "calculator-table-form pink"; form_kq2.className = "calculator-table-form pink"; } }
                jQuery(document).ready(function () {
                    $('[name="BMIform"]').submit(function (event) {                        
                        event.preventDefault();
                        var weight = parseInt($('[name="weight"]').val());
                        var hip = parseInt($('[name="hip"]').val());
                        if($('[name="sex"]').val() == 'male'){
                            var ketqua = (-76.76 + 4.15*hip - 0.082 * weight)/weight*10;
                            $('.ketqua1').text(format_tien_te(ketqua)+'%');
                            if(ketqua <= 12){
                                $('.ketqua2').text('quá ít mỡ, cần thêm mỡ');
                            }
                            if(ketqua > 12 && ketqua <= 20){
                                $('.ketqua2').text('ít mỡ (vận động viên)');
                            }
                            if(ketqua > 20 && ketqua <= 24){
                                $('.ketqua2').text('người mẫu fitness');
                            }
                            if(ketqua > 24 && ketqua <= 31){
                                $('.ketqua2').text('bình thường, chấp nhận được');
                            }
                            if(ketqua > 31){
                                $('.ketqua2').text('béo phì');
                            }
                        }else{
                            var ketqua = (-98.42 + 4.15*hip - 0.082 * weight)/weight;
                            $('.ketqua1').text(format_tien_te(ketqua)+'%');
                            if(ketqua <= 4){
                                $('.ketqua2').text('quá ít mỡ, cần thêm mỡ');
                            }
                            if(ketqua > 4 && ketqua <= 13){
                                $('.ketqua2').text('ít mỡ (vận động viên)');
                            }
                            if(ketqua > 13 && ketqua <= 17){
                                $('.ketqua2').text('người mẫu fitness');
                            }
                            if(ketqua > 17 && ketqua <= 25){
                                $('.ketqua2').text('bình thường, chấp nhận được');
                            }
                            if(ketqua > 25){
                                $('.ketqua2').text('béo phì');
                            }
                        }
                        //format_tien_te
                        $('#form_kq2').css('display', 'block');
                    })
                });
            </script>
            <div class="calculator-table-form blue" id="gendercolor">
<form name="BMIform" onsubmit="return;">
<input type="hidden" name="hdnhip">
<table cellpadding="0" cellspacing="0" class="tv12black">
      <tbody><tr class="table-head">
        <td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhập chi tiết</font></font></td>
    </tr>
 <tr>
  <td id="tabcol"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Giới tính </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span> </td>
 <td>
  <input type="radio" value="male" name="sex" onclickx="checkgender();" checked><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
 Nam giới </font></font><input type="radio" name="sex" value="female" onclickx="checkgender();"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
 Nữ giới</font></font></td>
 </tr>
  <tr> 
 <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cân nặng </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></td>
 <td>
   <input type="number" name="weight" size="10" onkeyup="conv(3)" class="innerc resform" maxlength="3" value="60" required>
    <input type="hidden" name="inches" value="0"> kg 
 </td>
 </tr>

 
<tr> 
<td id="tabcol3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chu vi hông </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></td>
 <td id="tbleft3">
                        <input size="10" type="number" name="hip" maxlength="3" value="60" required> cm
    </td>
 </tr>
   <tr> 
 <td colspan="2"> <span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" class="flat-btn" value=" Tính toán " name="B1"></font><span class="required"><font style="vertical-align: inherit;">bắt buộc</font></span></font>
</td>
 </tr>
 </tbody></table>
</form>
</div>
            

            <div class="report-content" id="form_kq2" style="padding-top: 10px; display: none;">
                <div class="calculator-table-form blue">
                    <table cellpadding="0" cellspacing="0" class="tv12black">
                      <tbody>
                        <tr class="table-head">
                            <td colspan=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Kết quả</font></font></td>
                            </tr>
                             <tr>
                              <td id="tabcol">Công thức độ béo của cơ thể chỉ ra rằng <span class="red ketqua1">16%</span> trọng lượng cơ thể của bạn là chất béo</td>
                             </tr>
                             <tr>
                              <td id="tabcol"><b>Kết luận</b> <span class="ketqua2"></span></td>
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