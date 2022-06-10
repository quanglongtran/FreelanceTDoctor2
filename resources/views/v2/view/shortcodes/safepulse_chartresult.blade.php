<?php
if(!function_exists('safepulse_chartresult')){

function safepulse_chartresult(){
    ob_start();
?>

<script type="text/javascript">
    jQuery(document).ready(function(){

		$('.tuoi-cua-ban-nhip-tim').on('change input', function(){
		    age =  parseInt($(this).val());
		    console.log(age);
		    var nhip_tim_toi_da = 220-age;
		    $('.nhip-tim-0').text(nhip_tim_toi_da);
		    $('.nhip-tim-1').text(parseInt(nhip_tim_toi_da*64/100) +' - '+parseInt(nhip_tim_toi_da*76/100));
		    $('.nhip-tim-2').text(parseInt(nhip_tim_toi_da*77/100) +' - '+parseInt(nhip_tim_toi_da*93/100));
		})
    })
</script>
<style type="text/css">
.pink-table{background:#FAE9F6;border:1px solid #F24680;}.pink-table tr:nth-child(2n){background:#F3C0E3;}.pink-table tr{border-bottom:1px solid #E496D8;}.pink-table tr:first-child td,.pink-table tr.table-title td{background:#F24680; border-right:1px solid #E496D8;}.form-pink{background:#FAE9F6!important;}.btn-blue { background-color: #0F5885; color: #fff!important;}.btn-blue:hover{background:#0779A3;}.btn-orange:hover,.btn-blue:hover,.btn-pink:hover{text-decoration:none;}.btn-orange { background-color: #FF6501; color: #fff;}.btn-orange:hover{background:#D55201; color:#fff;}.btn-pink{ background-color:#F24680; color: #fff!important;}.btn-pink:hover{background:#D62060;}.flat-blue:hover,.flat-red:hover,.flat-pink:hover{background:#333; color:#fff; text-decoration:none;}.flat-pink{border:none;color:#fff!important; background:#DA39AA; padding:3px 15px; *padding:0 10px; *font-size:13px!important}.calculator-table,.calculator-table-form{margin:0 0 20px 0;color: #000000; width:90%; margin:0 auto; line-height:130%;}.calculator-table-form table,.calculator-table table{width:100%;color: #000000;} .calculator-table-form td,.calculator-table td{border-left:1px solid #fff;}.calculator-table-form td:nth-child(1),.calculator-table td:nth-child(1){border-left:none;}.calculator-table-form.blue table{background:#E6F4FE;border:1px solid #0F5885;}.calculator-table.blue table{background:#E6F4FE;}.calculator-table-form.pink table{background:#FBE4FD;border:1px solid #AD0054;} .calculator-table.pink table{background:#B30035;} .calculator-table-form.blue td:first-child{background:#CFEAFC}.calculator-table-form.pink td:first-child{background:#FFD6EB} .calculator-table-form tr.table-head td,.calculator-table tr.table-head td{color:#fff; font-weight:bold;}.calculator-table-form.blue tr.table-head td,.calculator-table.blue tr.table-head td{background:#0F5885;}.calculator-table-form input[type='radio'],.calculator-table-form input[type='checkbox']{margin-right:5px;}.calculator-table-form.blue tr.table-head td,.calculator-table-form.pink tr.table-head td{font-size:14px;}.calculator-table-form.blue tr.table-head td,.calculator-table.blue tr.table-head td{background:#0F5885;}.calculator-table-form.pink tr.table-head td,.calculator-table.pink tr.table-head td{background:#AD0054;} .calculator-table-form tr:last-child td{text-align:center;}.calculator-table-form tr.leftalign td{text-align:left!important;}.calculator-table-form td,.calculator-table td{border-right:0px solid #fff;border-bottom:1px solid #fff;padding:10px 5px;vertical-align:top;text-align:left;}.calculator-table-form tr:last-child td,.calculator-table:last-child td{border-bottom:none;}.mandatory-star{color:#f00;}.required{color:#B30000; text-align:left; float:left; padding-top:15px;}.calculator-table-form .flat-btn{border:0; color:#fff; margin-left:5px; cursor:pointer;} .calculator-table-form.blue .flat-btn, .result .flat-btn{background:#0F5885;color: #fff!important; font-size:13px; font-weight:600; /*border-radius:4px;*/ padding:8px 15px; display:inline-block;}.calculator-table-form.pink .flat-btn{background:#AD0054;color: #fff;font-weight:600; /*border-radius:4px;*/ font-size:13px;padding:8px 15px; display:inline-block;} .calculator-table-form.blue .flat-btn:hover{background:#0779A3; }.calculator-table-form.pink .flat-btn:hover{background:#D62060; }.highlight_field{border:1px solid #dfdfdf; margin:10px auto; padding:3px 0; font-size:22px; font-weight:600; text-align:center; color:#333; box-shadow:inset 0 2px 5px #d2d2d2}a:not([href]){color:#333!important; text-decoration:none;} .calc-facts{padding:0 0 10px; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; -o-box-sizing:border-box; /*border-top:3px solid #388BC1;*/line-height:130%;}.calc-facts table td{padding:5px 0;}.calc-facts h3{padding:8px 0; border-bottom:3px solid #0F5885; font-size: 18px; margin: 0 0 10px 0; font-weight: 600; text-decoration: none;}.calc-facts ul{margin-left:20px;}.report-content .calc-facts li,.calc-facts li{margin:10px 0; line-height:130%; list-style-type:disc; line-height: 130%;}.calcresult{border:1px solid #0F5885; border-top:none;border-radius:4px 4px 0 0 ; background:#E6F4FE}.calcresult .result,.result{text-align:center; padding:5px 0; margin-bottom:10px;}.result.final-result {text-align: left;}.highlight{color:#f00; font-weight:bold;}.calcresult h3{background:#0F5885; margin-top:0; padding:10px; color:#fff; border-radius:4px 4px 0 0 ;}.calcresult .content-inner{line-height:130%; margin:15px 0 0 0; padding:7px; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; -o-box-sizing:border-box; font-size:75%;}mark { background: #ff0;color: #000; padding-right:5px;}/*.flat-btn,.flat-btn.blue{padding:5px 10px; background:#0F5885; color:#fff; text-decoration:none; margin:10px 0 0 0; display:inline-block; border-radius:4px;font-size: 13px !important;}*/.flat-btn:hover{text-decoration:none; background:#333; color:#fff}.calcresult ul{margin-left:45px;} .calcresult li{margin:10px 0 0 0;}.calcresult table{width:95%; margin:15px auto; border:3px solid #0F5885; background:#fff;}.calcresult table td{padding:5px; border:1px solid #0F5885;}.calcnote,.calcresult table .note{font-style:italic; font-size:12px; padding:10px;}.calcresult.pink{background:#FBE4FD; border:1px solid #FF85AD;}.calcresult.pink h3{background:#FF85AD}.calcresult.pink table{border:3px solid #FF85AD;}.calcresult.pink table td{border:1px solid #FF85AD;}.flat-btn.pink{background: none repeat scroll 0 0 #FF85AD;}.flat-btn.pink:hover{text-decoration:none; background:#333; color:#fff}.other-calc{display:none;padding:8px 10px; position:relative; box-sizing:border-box; border:1px solid #dfdfdf; margin-top:10px; cursor:pointer; font-weight:600; font-size:16px;}.other-calc span.icon{float:right;}.other-calc-list{display:none;padding:0 8px; width:100%; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; -o-box-sizing:border-box; left:0; top:35px; background:#fdfdfd; display:block; border:1px solid #dfdfdf; position:absolute; z-index:1;}.other-calc-list li{display:block; margin:10px 0;}.other-calc-list li a{padding:3px 0; color:#333; display:block; font-size:14px; font-weight:400;}.other-calc-list li a:hover{color:#0F5885;}.calculator-table-form .form-control{font-size:18px!important}/**************** calculator style end **************/#callinks_cat input[type=radio]{position:absolute;opacity:0;z-index:-1}#callinks_cat .row .col-md-4{flex:1}.tabs{overflow:hidden}.tab{width:100%;color:#fff;overflow:hidden}.tab-label{display:flex;justify-content:space-between;padding:10px;font-weight:700;cursor:pointer}.one .tab-label{background:#009999}.two .tab-label{background:#c77f28}.three .tab-label{background:#64636e}.tab-label:hover{background:#003333}.tab-label::after{content:"\276F";width:1em;height:1em;text-align:center;transition:all .35s}.tab-precontent{max-height:0;color:#2c3e50;background:#fff;transition:all .35s}.tab-close{display:flex;justify-content:flex-end;padding:1em;font-size:.75em;background:#2c3e50;cursor:pointer}.tab-close:hover{background:#003333}#callinks_cat input[type=radio]:checked+.tab-label{background:#003333}#callinks_cat input[type=radio]:checked+.tab-label::after{-webkit-transform:rotate(90deg);transform:rotate(90deg)}#callinks_cat input[type=radio]:checked~.tab-precontent{max-height:250vh;margin-bottom:20px;border-radius:8px;box-shadow:0 4px 4px -2px rgba(0,0,0,.5)}</style>


</style>

<div class="calcresult ">
<h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhập vào tuổi của bạn để xem kết quả</font></font></h3>
		<table cellpadding="0" cellspacing="0">      
			<tbody><tr><td colspan="3"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tuổi:</font></font></b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <input class="tuoi-cua-ban-nhip-tim" min="0" type="number" placeholder="Nhập tuổi của bạn" name=""> tuổi (18-75)</font></font></td></tr>
			<tr align="center">
				<td colspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhịp tim tối đa ước tính (tính bằng bpm) </font></font></td>
				<td><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="nhip-tim-0">0</font></font></b></td>
			</tr>
			<tr><td colspan="3"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nhịp tim mục tiêu (tính bằng bpm)</font></font></b></td></tr>
			<tr align="center">
				<td rowspan="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hoạt động thể lực</font></font></td>
				<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cường độ vừa</font></font></td>
				<td><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="nhip-tim-1">0 - 0</font></font></b></td>
			</tr>
			<tr align="center">
				<td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cường độ nặng</font></font></td>
				<td><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="nhip-tim-2">0 - 0</font></font></b></td>
			</tr>
			 	
		</tbody></table>
 </div>

<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}