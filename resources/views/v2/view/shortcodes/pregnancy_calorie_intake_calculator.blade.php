<?php
if(!function_exists('pregnancy_calorie_intake_calculator')){

function pregnancy_calorie_intake_calculator(){
    ob_start();
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
// console.log(danh_sach_vong_nguc_ly_tuong[0][0]);
jQuery('.calculate').click((e) => {
  e.preventDefault();
    month =  parseInt(jQuery('#month').val());
    
    if (month > 0 && month < 13) {
      let text = "";
      switch (month) {
        case 1:
        case 2:
        case 3:
        text = 'Thai quý 1 (tháng 1 đến tháng 3): khoảng 1800 calo mỗi ngày.';
        break;
        case 4:
        case 5:
        case 6:
        text = 'Thai quý 2 (tháng 4 đến tháng 6): khoảng 2200 calo mỗi ngày.';
        break;
        case 7:
        case 8:
        case 9:
        text = 'Thai quý 3 (tháng 7 đến tháng 9): khoảng 2400 calo mỗi ngày.';
        break;
      default:
        break;
      }
      jQuery('.result').text(text);
    }
    
});
    });
</script>
<style type="text/css">
    .caltable-form table{background:#ecf9f2;border:1px solid #eee;border-bottom:2px solid #006666;box-shadow:0 0 20px rgba(0,0,0,.1),0 10px 20px rgba(0,0,0,.05),0 20px 20px rgba(0,0,0,.05),0 30px 20px rgba(0,0,0,.05)}.caltable-form td{border:solid 1px #fff;padding:10px}.caltable-form tfoot{background-color:#ccf2ff;color:#fff;padding:10px}.caltable-form tbody{color:#000;padding:10px}.table-head{background-color:#006666;color:#fff;padding:10px;text-align:left}.caltable-form input[type=text]:focus,select:focus,textarea:focus{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}.caltable-form input[type=text],textarea{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}.caltable-form select{min-height:32px;background:#fff;border:1px solid #ccc;outline:0}.caltable-form input[type=text]:focus,select:focus,textarea:focus{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}input[type=text]:focus,select:focus,textarea:focus{min-height:32px}
.caltable-form .btn{background-color:#006666;border:0;border-radius:3px;box-shadow:0 0 2px 0 rgb(0 0 0 / 10%),0 2px 2px 0 rgb(0 0 0 / 20%);display:inline-block;color:#fff;font-size:1.105rem;line-height:1;padding:.75rem 1.5rem;text-decoration:none!important}

</style>
<form name="chart">
<div class="caltable-form">
 <table border="0" width="100%" cellspacing="2" cellpadding="2">
 <tbody><tr class="table-head"><td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chọn chi tiết của bạn</font></font></td></tr>
 <tr> 
 <td width="50%" height="25">
  <label for="age"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chủng Tộc </font></font></label><span class="red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></td>
 <td width="50%" height="25"> 
 <select size="1" name="slt_ethnicity" id="ethnicity">
 <option selected="" value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">--Lựa chọn--</font></font></option>
 <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Người Châu Á</font></font></option>
 <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Người Châu Phi</font></font></option>
 <option value="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Người Gốc Âu</font></font></option>
 <option value="3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Người Mỹ Latinh</font></font></option>
 </select>
 </td>
 </tr>
 <tr> 
 <td width="50%"><label for="height"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tuổi </font></font></label><font class="red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font></td>
 <td width="50%" height="25"> 
<input size="1" name="slt_age" id="age" style="width: 120px">
</td>
</tr>
<tr> 
 <td width="50%"><label for="height"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thai kỳ tháng thứ: </font></font></label><font class="red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font></td>
 <td width="50%" height="25"> 
<input size="1" name="slt_month" id="month" style="width: 120px">
</td>
</tr>
<tr>
  <td></td>
  <td><button class="calculate">Tính Toán</button></td>
</tr>
</tbody>
</table>


 </div>
 </form>

 <div class="caltable-form" id="gendercolor">
<table border="0" align="center" class="graybox" cellspacing="0" width="100%">

 <tbody>

 <tr height="30%">
 <td width="100%" colspan="3" style="padding-left:5px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><p class="result"></p> </font></font><font color="#ff5500"><b><font class="text-result-vong-nguc" style="vertical-align: middle;"></font></b></font></td>
 </tr>
 </tbody></table>
 </div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}