<?php
if(!function_exists('ideal_chest_measurement')){

function ideal_chest_measurement(){
    ob_start();
?>

<script type="text/javascript">
    jQuery(document).ready(function(){
var danh_sach_vong_nguc_ly_tuong = [['71.25','72.5','73.75','75','76.25','76.25','77.5'],
['72.5','73.75','75','76.25','77.5','77.5','77.5'],
['73.75','75','76.25','77.5','77.5','77.5.5','77.5'],
['73.75','75','76.25','77.5','77.5','77.5','80'],
['75','76.25','77.5','77.5','80','80','81.25'],
['76.25','77.5','77.5','80','81.25','81.25','82.5'],
['76.25','77.5','77.5','80','81.25','82.5','82.5'],
['77.5','80','80','83.75','82.5','82.5','83.75'],
['77.5','80','81.25','82.5','83.75','83.75','85'],
['77.5','80','81.25','83.75','85','85','86.25'],
['80','81.25','82.5','83.75','85','86.25','87.5'],
['80','81.25','83.75','85','86.25','87.5','87.5'],
['80','82.5','83.75','86.25','87.5','88.75','90'],
['82.5','82.5','85','86.25','87.5','88.75','90'],
['82.5','83.75','85','85','88.75','90','91.25']
];
// console.log(danh_sach_vong_nguc_ly_tuong[0][0]);
$('input[name="but_check"]').click(function(){
    age =  parseInt($('#age').val());
    height =  parseInt($('#height').val());
    console.log(age);
    console.log(height);
    var ket_qua = 0;
    ket_qua = danh_sach_vong_nguc_ly_tuong[height][age];
    $('.text-result-vong-nguc').text(ket_qua+' cm');
})
    })
</script>
<style type="text/css">
    .caltable-form table{background:#ecf9f2;border:1px solid #eee;border-bottom:2px solid #006666;box-shadow:0 0 20px rgba(0,0,0,.1),0 10px 20px rgba(0,0,0,.05),0 20px 20px rgba(0,0,0,.05),0 30px 20px rgba(0,0,0,.05)}.caltable-form td{border:solid 1px #fff;padding:10px}.caltable-form tfoot{background-color:#ccf2ff;color:#fff;padding:10px}.caltable-form tbody{color:#000;padding:10px}.table-head{background-color:#006666;color:#fff;padding:10px;text-align:left}.caltable-form input[type=text]:focus,select:focus,textarea:focus{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}.caltable-form input[type=text],textarea{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}.caltable-form select{min-height:32px;background:#fff;border:1px solid #ccc;outline:0}.caltable-form input[type=text]:focus,select:focus,textarea:focus{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}input[type=text]:focus,select:focus,textarea:focus{min-height:32px}
.caltable-form .btn{background-color:#006666;border:0;border-radius:3px;box-shadow:0 0 2px 0 rgb(0 0 0 / 10%),0 2px 2px 0 rgb(0 0 0 / 20%;display:inline-block);color:#fff;font-size:1.105rem;line-height:1;padding:.75rem 1.5rem;text-decoration:none!important}

</style>
<form name="chart">
<div class="caltable-form">
 <table border="0" width="100%" cellspacing="2" cellpadding="2">
 <tbody><tr class="table-head"><td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chọn chi tiết của bạn</font></font></td></tr>
 <tr> 
 <td width="50%" height="25">&nbsp;
  <label for="age"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Độ tuổi </font></font></label><span class="red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></td>
 <td width="50%" height="25"> 
 <select size="1" name="slt_age" id="age">
 <option selected="" value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">--Lựa chọn--</font></font></option>
 <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15-20</font></font></option>
 <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20-25</font></font></option>
 <option value="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25-30</font></font></option>
 <option value="3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30-35</font></font></option>
 <option value="4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">35-40</font></font></option>
 <option value="5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">40-45</font></font></option>
 <option value="6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">45-50</font></font></option>
 </select>
 </td>
 </tr>
 <tr> 
 <td width="50%"><label for="height"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chiều cao </font></font></label><font class="red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font></td>
 <td width="50%" height="25"> 
<select size="1" name="slt_ht" id="height">
   <option selected="" value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">--Lựa chọn--</font></font></option>
   <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4 '10 ”(145 cm)</font></font></option>
   <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4 '11 ”(147,5 cm)</font></font></option>
   <option value="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '0 ”(150 cm)</font></font></option>
   <option value="3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '1 ”(152,5 cm)</font></font></option>
   <option value="4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '2 ”(155 cm)</font></font></option>
   <option value="5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '3 ”(157,5 cm)</font></font></option>
   <option value="6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '4 ”(160 cm)</font></font></option>
   <option value="7"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '5 ”(162,5 cm)</font></font></option>
   <option value="8"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '6 ”(165 cm)</font></font></option>
   <option value="9"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '7 ”(167,5 cm)</font></font></option>
   <option value="10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '8 ”(170 cm)</font></font></option>
   <option value="11"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '9 ”(172,5 cm)</font></font></option>
   <option value="12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '10 ”(175 cm)</font></font></option>
   <option value="13"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 '11 ”(177,5 cm)</font></font></option>
   <option value="14"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6 '0 ”(180 cm)</font></font></option>
</select>
 </td>
 </tr>
 <tr>
  <td>  <span class="red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Bắt buộc</font></font></td><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="button" value="Xem kết quả" name="but_check" onclickx="measure()" class="btn"></font></font>
   
</td>
</tr>
</tbody></table>


 </div>
 </form>

 <div class="caltable-form" id="gendercolor">
<table border="0" align="center" class="graybox" cellspacing="0" width="100%">

 <tbody>

 <tr height="30%"> 
 <td width="100%" colspan="3" style="padding-left:5px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Số đo vòng ngực lý tưởng của bạn phải là: </font></font><font color="#ff5500"><b><font class="text-result-vong-nguc" style="vertical-align: middle;"></font></b></font></td>
 </tr>
    
 
 </tbody></table>
 </div>

<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}