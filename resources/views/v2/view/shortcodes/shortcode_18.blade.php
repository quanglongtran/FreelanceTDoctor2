<?php
if(!function_exists('shortcode_18')){

function shortcode_18(){
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
                        var na = parseInt($('[name="na"]').val());
                        var gluc = parseInt($('[name="gluc"]').val());
                       
                        var ketqua = na + 1.6*(gluc-100)/100;
                        $('.ketqua1').text(format_tien_te(ketqua)+'');
                    
                        //format_tien_te
                        $('#form_kq2').css('display', 'block');
                    })
                });
            </script>
            <div class="calculator-table-form blue" id="gendercolor">
<form name="BMIform" onsubmit="return;">
<table border="0" cellpadding="5" cellspacing="1" width="100%" class="tv12black">
    <tbody><tr class="table-head"><td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhập chi tiết của bạn</font></font></td></tr>   
    <tr>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Natri (Na) </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></td>
    <td><input maxlength="5" name="na" class="grayinput" value="154 - 308" onfocus="if(this.value=='154 - 308'){this.value=''};" onblur="if(this.value==''){this.value='154 - 308'}" onkeypress="return isNumberKey(event)" required><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">  mg / dl</font></font></td>
    </tr>
    <tr>
    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Glucose </font></font><span class="mandatory-star"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span>   </td>
    <td><input maxlength="3" name="gluc" class="grayinput" value="101 - 500" onfocus="if(this.value=='101 - 500'){this.value=''};" onblur="if(this.value==''){this.value='101 - 500'}" onkeypress="return isNumberKey(event)" required><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">  mg / dl</font></font></td>
    </tr>
    <tr>
    <td colspan="2">
    <span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span>
    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input onclickx="calcNa(this.form);" type="submit" value=" Tính toán " class="flat-btn"></font><span class="required"><font style="vertical-align: inherit;">bắt buộc</font></span></font>
    <input type="reset" value="Reset" class="flat-btn">
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
                              <td id="tabcol">Đối với mức natri và glucose đã cho, Natri đã hiệu chỉnh là <span class="red ketqua1">0</span> mg / dl </td>
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