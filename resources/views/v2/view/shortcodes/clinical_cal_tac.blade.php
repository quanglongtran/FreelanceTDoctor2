<?php
if(!function_exists('clinical_cal_tac')){

function clinical_cal_tac(){
    ob_start();
?>

<script type="text/javascript">

	function Trim(data){
		return data.trim();
	}
	function cal(){
var c1 = 0;
var c2 = 0;
var c3 = 0;
var td = 0;
var id = 0;
if(Trim(document.calculator.c1.value) == "")
{
		alert("Vui lòng nhập Nồng độ nito trước khi lọc!");
		document.calculator.c1.focus();
		return false;
		}
else if(isNaN(document.calculator.c1.value) ){
		alert("Vui lòng nhập đúng Nồng độ nito trước khi lọc!");
		document.calculator.c1.focus();
		return false;
		}
 else if ((document.calculator.c1.value!="") && ((document.calculator.c1.value<=3) || (document.calculator.c1.value>30))) 
	{
     alert("Vui lòng nhập đúng Nồng độ nito trước khi lọc!");
        document.calculator.c1.focus();
        return false;
	}
 else if (!calculator.c1.value.match(/^[0-9]+(\.[0-9]+)?$/))
	 {
		alert("Vui lòng nhập đúng Nồng độ nito trước khi lọc!");
		calculator.c1.focus();
		return false;
	}
			
else if(Trim(document.calculator.c2.value)== "") {
	alert("Vui lòng nhập Nồng độ nito sau khi lọc!");
	document.calculator.c2.focus();
		return false;
	}
else if(isNaN(document.calculator.c2.value)) {
	alert("Vui lòng nhập đúng Nồng độ nito sau khi lọc!");
	document.calculator.c2.focus();
		return false;
	}
	
	else if ((document.calculator.c2.value!="") && ((document.calculator.c2.value<=3) || (document.calculator.c2.value>30))) 
	{
     alert("Vui lòng nhập đúng Nồng độ nito sau khi lọc!");
        document.calculator.c2.focus();
        return false;
	}
 else if (!calculator.c2.value.match(/^[0-9]+(\.[0-9]+)?$/))
	 {
		alert("Vui lòng nhập đúng Nồng độ nito sau khi lọc!");
		calculator.c2.focus();
		return false;
	}
else if(Trim(document.calculator.c3.value)== "") {
	alert("Vui lòng nhập Nồng độ nito trước khi lọc ở lần lọc sau!");
	document.calculator.c3.focus();
		return false;
	}
else if(isNaN(document.calculator.c3.value)) {
	alert("Vui lòng nhập đúng Nồng độ nito trước khi lọc ở lần lọc sau!");
	document.calculator.c3.focus();
		return false;
	}
		else if ((document.calculator.c3.value!="") && ((document.calculator.c3.value<=3) || (document.calculator.c3.value>30))) 
	{
     alert("Vui lòng nhập đúng Nồng độ nito trước khi lọc ở lần lọc sau!");
        document.calculator.c3.focus();
        return false;
	}
 else if (!calculator.c3.value.match(/^[0-9]+(\.[0-9]+)?$/))
	 {
		alert("Vui lòng nhập đúng Nồng độ nito trước khi lọc ở lần lọc sau!");
		calculator.c3.focus();
		return false;
	}
	
	
else if(Trim(document.calculator.td.value)== "") {
	alert("Vui lòng nhập Thời gian lọc máu!");
	document.calculator.td.focus();
		return false;
	}
else if(isNaN(document.calculator.td.value)) {
	alert("Vui lòng nhập đúng Thời gian lọc máu!");
	document.calculator.td.focus();
		return false;
	}
	else if(Trim(document.calculator.id.value)== "") {
	alert("Vui lòng nhập Thời gian giữa 2 lần lọc máu!");
	document.calculator.id.focus();
		return false;
	}
else if(document.calculator.id.value==0) {
	alert("Vui lòng nhập Thời gian giữa 2 lần lọc máu!");
	document.calculator.id.focus();
		return false;
	}
else 
  {		
   var res = 0;
   c1=parseInt(document.calculator.c1.value);
   c2=parseInt(document.calculator.c2.value);
   c3=parseInt(document.calculator.c3.value);
   td=parseInt(document.calculator.td.value);
   id=parseInt(document.calculator.id.value);

   //TACure=(d*(a+b) + e*(b+c)) / (2* (d+e)
   res = ((td*(c1+c2))+(id*(c2+c3)))/(2*(td+id));
   r =res.toString();
	if(r.length>4)
		r=r.substring(0,4)
		//alert("Lean Body Weight = "+r+" Kgs.");
//var nwin = window.open('about:blank','newwin','scrollBars = no,width=420,height=160');
//nwin.moveTo(100,100);
	// document.calculator.action="tacResult.asp?mode=viewresult&r="+r;
	// document.calculator.submit();

	jQuery('.clinical_cal_tac-ketqua').text(r);
	return false;
}
}

    jQuery(document).ready(function(){
    	function format_tien_te(data){
			data = data.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
			return data.replace('.00', '');
		}

		$('.form-protein_catabolic_rate').on('submit', function(event){
			event.preventDefault();

		    ID = parseInt($('input[name="ID"]').val());
		    BUN = parseInt($('input[name="BUN"]').val());
		    WEIGHT = parseInt($('input[name="WEIGHT"]').val());
		    NITROGEN = parseInt($('input[name="NITROGEN"]').val());

		    gia_tri_1 = 0.22+( (0.036*BUN/24)/ ID );
		    gia_tri_2 = gia_tri_1 + ( (NITROGEN*150)/(ID*WEIGHT) );
		    $('.protein_catabolic_rate-kq1').text(format_tien_te(gia_tri_1));
		    $('.protein_catabolic_rate-kq2').text(format_tien_te(gia_tri_2));

		})

    })
</script>
<style type="text/css">
	.red {
    color: red;
}

.pink-table{background:#FAE9F6;border:1px solid #F24680;}.pink-table tr:nth-child(2n){background:#F3C0E3;}.pink-table tr{border-bottom:1px solid #E496D8;}.pink-table tr:first-child td,.pink-table tr.table-title td{background:#F24680; border-right:1px solid #E496D8;}.form-pink{background:#FAE9F6!important;}.btn-blue { background-color: #0F5885; color: #fff!important;}.btn-blue:hover{background:#0779A3;}.btn-orange:hover,.btn-blue:hover,.btn-pink:hover{text-decoration:none;}.btn-orange { background-color: #FF6501; color: #fff;}.btn-orange:hover{background:#D55201; color:#fff;}.btn-pink{ background-color:#F24680; color: #fff!important;}.btn-pink:hover{background:#D62060;}.flat-blue:hover,.flat-red:hover,.flat-pink:hover{background:#333; color:#fff; text-decoration:none;}.flat-pink{border:none;color:#fff!important; background:#DA39AA; padding:3px 15px; *padding:0 10px; *font-size:13px!important}.calculator-table,.calculator-table-form{margin:0 0 20px 0;color: #000000; width:90%; margin:0 auto; line-height:130%;}.calculator-table-form table,.calculator-table table{width:100%;color: #000000;} .calculator-table-form td,.calculator-table td{border-left:1px solid #fff;}.calculator-table-form td:nth-child(1),.calculator-table td:nth-child(1){border-left:none;}.calculator-table-form.blue table{background:#E6F4FE;border:1px solid #0F5885;}.calculator-table.blue table{background:#E6F4FE;}.calculator-table-form.pink table{background:#FBE4FD;border:1px solid #AD0054;} .calculator-table.pink table{background:#B30035;} .calculator-table-form.blue td:first-child{background:#CFEAFC}.calculator-table-form.pink td:first-child{background:#FFD6EB} .calculator-table-form tr.table-head td,.calculator-table tr.table-head td{color:#fff; font-weight:bold;}.calculator-table-form.blue tr.table-head td,.calculator-table.blue tr.table-head td{background:#0F5885;}.calculator-table-form input[type='radio'],.calculator-table-form input[type='checkbox']{margin-right:5px;}.calculator-table-form.blue tr.table-head td,.calculator-table-form.pink tr.table-head td{font-size:14px;}.calculator-table-form.blue tr.table-head td,.calculator-table.blue tr.table-head td{background:#0F5885;}.calculator-table-form.pink tr.table-head td,.calculator-table.pink tr.table-head td{background:#AD0054;} .calculator-table-form tr:last-child td{text-align:center;}.calculator-table-form tr.leftalign td{text-align:left!important;}.calculator-table-form td,.calculator-table td{border-right:0px solid #fff;border-bottom:1px solid #fff;padding:10px 5px;vertical-align:top;text-align:left;}.calculator-table-form tr:last-child td,.calculator-table:last-child td{border-bottom:none;}.mandatory-star{color:#f00;}.required{color:#B30000; text-align:left; float:left; padding-top:15px;}.calculator-table-form .flat-btn{border:0; color:#fff; margin-left:5px; cursor:pointer;} .calculator-table-form.blue .flat-btn, .result .flat-btn{background:#0F5885;color: #fff!important; font-size:13px; font-weight:600; /*border-radius:4px;*/ padding:8px 15px; display:inline-block;}.calculator-table-form.pink .flat-btn{background:#AD0054;color: #fff;font-weight:600; /*border-radius:4px;*/ font-size:13px;padding:8px 15px; display:inline-block;} .calculator-table-form.blue .flat-btn:hover{background:#0779A3; }.calculator-table-form.pink .flat-btn:hover{background:#D62060; }.highlight_field{border:1px solid #dfdfdf; margin:10px auto; padding:3px 0; font-size:22px; font-weight:600; text-align:center; color:#333; box-shadow:inset 0 2px 5px #d2d2d2}a:not([href]){color:#333!important; text-decoration:none;} .calc-facts{padding:0 0 10px; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; -o-box-sizing:border-box; /*border-top:3px solid #388BC1;*/line-height:130%;}.calc-facts table td{padding:5px 0;}.calc-facts h3{padding:8px 0; border-bottom:3px solid #0F5885; font-size: 18px; margin: 0 0 10px 0; font-weight: 600; text-decoration: none;}.calc-facts ul{margin-left:20px;}.report-content .calc-facts li,.calc-facts li{margin:10px 0; line-height:130%; list-style-type:disc; line-height: 130%;}.calcresult{border:1px solid #0F5885; border-top:none;border-radius:4px 4px 0 0 ; background:#E6F4FE}.calcresult .result,.result{text-align:center; padding:5px 0; margin-bottom:10px;}.result.final-result {text-align: left;}.highlight{color:#f00; font-weight:bold;}.calcresult h3{background:#0F5885; margin-top:0; padding:10px; color:#fff; border-radius:4px 4px 0 0 ;}.calcresult .content-inner{line-height:130%; margin:15px 0 0 0; padding:7px; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; -o-box-sizing:border-box; font-size:75%;}mark { background: #ff0;color: #000; padding-right:5px;}/*.flat-btn,.flat-btn.blue{padding:5px 10px; background:#0F5885; color:#fff; text-decoration:none; margin:10px 0 0 0; display:inline-block; border-radius:4px;font-size: 13px !important;}*/.flat-btn:hover{text-decoration:none; background:#333; color:#fff}.calcresult ul{margin-left:45px;} .calcresult li{margin:10px 0 0 0;}.calcresult table{width:95%; margin:15px auto; border:3px solid #0F5885; background:#fff;}.calcresult table td{padding:5px; border:1px solid #0F5885;}.calcnote,.calcresult table .note{font-style:italic; font-size:12px; padding:10px;}.calcresult.pink{background:#FBE4FD; border:1px solid #FF85AD;}.calcresult.pink h3{background:#FF85AD}.calcresult.pink table{border:3px solid #FF85AD;}.calcresult.pink table td{border:1px solid #FF85AD;}.flat-btn.pink{background: none repeat scroll 0 0 #FF85AD;}.flat-btn.pink:hover{text-decoration:none; background:#333; color:#fff}.other-calc{display:none;padding:8px 10px; position:relative; box-sizing:border-box; border:1px solid #dfdfdf; margin-top:10px; cursor:pointer; font-weight:600; font-size:16px;}.other-calc span.icon{float:right;}.other-calc-list{display:none;padding:0 8px; width:100%; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; -o-box-sizing:border-box; left:0; top:35px; background:#fdfdfd; display:block; border:1px solid #dfdfdf; position:absolute; z-index:1;}.other-calc-list li{display:block; margin:10px 0;}.other-calc-list li a{padding:3px 0; color:#333; display:block; font-size:14px; font-weight:400;}.other-calc-list li a:hover{color:#0F5885;}.calculator-table-form .form-control{font-size:18px!important}/**************** calculator style end **************/#callinks_cat input[type=radio]{position:absolute;opacity:0;z-index:-1}#callinks_cat .row .col-md-4{flex:1}.tabs{overflow:hidden}.tab{width:100%;color:#fff;overflow:hidden}.tab-label{display:flex;justify-content:space-between;padding:10px;font-weight:700;cursor:pointer}.one .tab-label{background:#009999}.two .tab-label{background:#c77f28}.three .tab-label{background:#64636e}.tab-label:hover{background:#003333}.tab-label::after{content:"\276F";width:1em;height:1em;text-align:center;transition:all .35s}.tab-precontent{max-height:0;color:#2c3e50;background:#fff;transition:all .35s}.tab-close{display:flex;justify-content:flex-end;padding:1em;font-size:.75em;background:#2c3e50;cursor:pointer}.tab-close:hover{background:#003333}#callinks_cat input[type=radio]:checked+.tab-label{background:#003333}#callinks_cat input[type=radio]:checked+.tab-label::after{-webkit-transform:rotate(90deg);transform:rotate(90deg)}#callinks_cat input[type=radio]:checked~.tab-precontent{max-height:250vh;margin-bottom:20px;border-radius:8px;box-shadow:0 4px 4px -2px rgba(0,0,0,.5)}</style>



</style>

<div class="calculator-table-form blue">
		<form name="calculator" method="post" onsubmit="return cal();">
		<table border="0" cellspacing="1" width="100%" align="center">
		<tbody><tr class="table-head">
		<td align="center" bgcolor="#0593E2" height="20" colspan="4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhập thông tin chi tiết
		</font></font></td></tr>
		<tr>
		<td width="70%" bgcolor="#CFEAFC" style="padding-left:5px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
		Nồng độ nito trước khi lọc (mg/dL) </font></font><font color="#FF0000"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font></td>
		<td width="30%" bgcolor="#E6F4FE" colspan="2" style="padding-left:5px"><font face="Arial" size="2">
		<input type="text" name="c1" size="15" maxlength="3" style="color: rgb(204, 204, 204);"> </font> </td>
		</tr>
		<tr>
		<td width="70%" bgcolor="#CFEAFC" style="padding-left:5px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
		Nồng độ nito sau khi lọc (mg/dL) </font></font><font color="#FF0000"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font></td>
		<td width="30%" bgcolor="#E6F4FE" colspan="2" style="padding-left:5px"><font face="Arial" size="2">
		<input type="text" name="c2" size="15" maxlength="3" style="color: rgb(204, 204, 204);"></font></td>
		</tr>
		<tr>
		<td width="70%" bgcolor="#CFEAFC" style="padding-left:5px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
		Nồng độ nito trước khi lọc ở lần lọc sau (mg/dL </font></font><font color="#FF0000"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font></td>
		<td width="30%" bgcolor="#E6F4FE" colspan="2" style="padding-left:5px"><font face="Arial" size="2">
		<input type="text" name="c3" size="15" maxlength="3" style="color: rgb(204, 204, 204);"> </font> </td>
		</tr>
		<tr>
		<td width="70%" bgcolor="#CFEAFC" style="padding-left:5px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
		Thời gian lọc máu (giờ) </font></font><font color="#FF0000"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font></td>
		<td width="30%" bgcolor="#E6F4FE" colspan="2" style="padding-left:5px"><font face="Arial" size="2">
		<input type="text" name="td" size="15" maxlength="3" style="color: rgb(204, 204, 204);"></font></td>
		</tr>
		<tr>
		<td width="70%" bgcolor="#CFEAFC" style="padding-left:5px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
		Thời gian giữa 2 lần lọc máu (giờ) </font></font><font color="#FF0000"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></font></td>
		<td width="30%" bgcolor="#E6F4FE" colspan="2" style="padding-left:5px"><font face="Arial" size="2">
		<input type="text" name="id" size="15" maxlength="3" style="color: rgb(204, 204, 204);"></font></td>
		</tr>
		<tr align="middle">
		<td colspan="2" align="right" width="36%" valign="top">
	<span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">* Bắt buộc</font></font></span>	<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="Tính toán" name="B1" class="flat-btn" style="color: rgb(204, 204, 204);"></font></font><input type="Reset" value="Reset" name="R1" class="flat-btn" style="color: rgb(204, 204, 204);">
		</td>
		</tr>
		</tbody></table>
		</form>	
		</div>


		<div class="calculator-table-form blue" id="gendercolor">
	<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
	<tbody>

<tr><td bgcolor="#F0F3F4" style="padding-left:5px" colspan="2"><font style="vertical-align: inherit;"></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;&nbsp;Nồng độ </font><font style="vertical-align: inherit;">trung bình theo thời gian </font><font style="vertical-align: inherit;">(TAC) của Urê là</font></font></td>
	<td><b>	<font color="#ff5500"><font color="#ff5500"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;<span class="clinical_cal_tac-ketqua">0</span></font></font></strong></font></font></b><p></p></td></tr>
<tr><td colspan="3"><br></td></tr>
	</tbody></table>
	</div>

<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}