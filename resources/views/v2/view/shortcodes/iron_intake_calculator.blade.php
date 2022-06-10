<?php
if(!function_exists('iron_intake_calculator')){

function iron_intake_calculator(){
	ob_start();
?>
<style type="text/css">
	.red {
    color: red;
}

.pink-table{background:#FAE9F6;border:1px solid #F24680;}.pink-table tr:nth-child(2n){background:#F3C0E3;}.pink-table tr{border-bottom:1px solid #E496D8;}.pink-table tr:first-child td,.pink-table tr.table-title td{background:#F24680; border-right:1px solid #E496D8;}.form-pink{background:#FAE9F6!important;}.btn-blue { background-color: #0F5885; color: #fff!important;}.btn-blue:hover{background:#0779A3;}.btn-orange:hover,.btn-blue:hover,.btn-pink:hover{text-decoration:none;}.btn-orange { background-color: #FF6501; color: #fff;}.btn-orange:hover{background:#D55201; color:#fff;}.btn-pink{ background-color:#F24680; color: #fff!important;}.btn-pink:hover{background:#D62060;}.flat-blue:hover,.flat-red:hover,.flat-pink:hover{background:#333; color:#fff; text-decoration:none;}.flat-pink{border:none;color:#fff!important; background:#DA39AA; padding:3px 15px; *padding:0 10px; *font-size:13px!important}.calculator-table,.calculator-table-form{margin:0 0 20px 0;color: #000000; width:90%; margin:0 auto; line-height:130%;}.calculator-table-form table,.calculator-table table{width:100%;color: #000000;} .calculator-table-form td,.calculator-table td{border-left:1px solid #fff;}.calculator-table-form td:nth-child(1),.calculator-table td:nth-child(1){border-left:none;}.calculator-table-form.blue table{background:#E6F4FE;border:1px solid #0F5885;}.calculator-table.blue table{background:#E6F4FE;}.calculator-table-form.pink table{background:#FBE4FD;border:1px solid #AD0054;} .calculator-table.pink table{background:#B30035;} .calculator-table-form.blue td:first-child{background:#CFEAFC}.calculator-table-form.pink td:first-child{background:#FFD6EB} .calculator-table-form tr.table-head td,.calculator-table tr.table-head td{color:#fff; font-weight:bold;}.calculator-table-form.blue tr.table-head td,.calculator-table.blue tr.table-head td{background:#0F5885;}.calculator-table-form input[type='radio'],.calculator-table-form input[type='checkbox']{margin-right:5px;}.calculator-table-form.blue tr.table-head td,.calculator-table-form.pink tr.table-head td{font-size:14px;}.calculator-table-form.blue tr.table-head td,.calculator-table.blue tr.table-head td{background:#0F5885;}.calculator-table-form.pink tr.table-head td,.calculator-table.pink tr.table-head td{background:#AD0054;} .calculator-table-form tr:last-child td{text-align:center;}.calculator-table-form tr.leftalign td{text-align:left!important;}.calculator-table-form td,.calculator-table td{border-right:0px solid #fff;border-bottom:1px solid #fff;padding:10px 5px;vertical-align:top;text-align:left;}.calculator-table-form tr:last-child td,.calculator-table:last-child td{border-bottom:none;}.mandatory-star{color:#f00;}.required{color:#B30000; text-align:left; float:left; padding-top:15px;}.calculator-table-form .flat-btn{border:0; color:#fff; margin-left:5px; cursor:pointer;} .calculator-table-form.blue .flat-btn, .result .flat-btn{background:#0F5885;color: #fff!important; font-size:13px; font-weight:600; /*border-radius:4px;*/ padding:8px 15px; display:inline-block;}.calculator-table-form.pink .flat-btn{background:#AD0054;color: #fff;font-weight:600; /*border-radius:4px;*/ font-size:13px;padding:8px 15px; display:inline-block;} .calculator-table-form.blue .flat-btn:hover{background:#0779A3; }.calculator-table-form.pink .flat-btn:hover{background:#D62060; }.highlight_field{border:1px solid #dfdfdf; margin:10px auto; padding:3px 0; font-size:22px; font-weight:600; text-align:center; color:#333; box-shadow:inset 0 2px 5px #d2d2d2}a:not([href]){color:#333!important; text-decoration:none;} .calc-facts{padding:0 0 10px; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; -o-box-sizing:border-box; /*border-top:3px solid #388BC1;*/line-height:130%;}.calc-facts table td{padding:5px 0;}.calc-facts h3{padding:8px 0; border-bottom:3px solid #0F5885; font-size: 18px; margin: 0 0 10px 0; font-weight: 600; text-decoration: none;}.calc-facts ul{margin-left:20px;}.report-content .calc-facts li,.calc-facts li{margin:10px 0; line-height:130%; list-style-type:disc; line-height: 130%;}.calcresult{border:1px solid #0F5885; border-top:none;border-radius:4px 4px 0 0 ; background:#E6F4FE}.calcresult .result,.result{text-align:center; padding:5px 0; margin-bottom:10px;}.result.final-result {text-align: left;}.highlight{color:#f00; font-weight:bold;}.calcresult h3{background:#0F5885; margin-top:0; padding:10px; color:#fff; border-radius:4px 4px 0 0 ;}.calcresult .content-inner{line-height:130%; margin:15px 0 0 0; padding:7px; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; -o-box-sizing:border-box; font-size:75%;}mark { background: #ff0;color: #000; padding-right:5px;}/*.flat-btn,.flat-btn.blue{padding:5px 10px; background:#0F5885; color:#fff; text-decoration:none; margin:10px 0 0 0; display:inline-block; border-radius:4px;font-size: 13px !important;}*/.flat-btn:hover{text-decoration:none; background:#333; color:#fff}.calcresult ul{margin-left:45px;} .calcresult li{margin:10px 0 0 0;}.calcresult table{width:95%; margin:15px auto; border:3px solid #0F5885; background:#fff;}.calcresult table td{padding:5px; border:1px solid #0F5885;}.calcnote,.calcresult table .note{font-style:italic; font-size:12px; padding:10px;}.calcresult.pink{background:#FBE4FD; border:1px solid #FF85AD;}.calcresult.pink h3{background:#FF85AD}.calcresult.pink table{border:3px solid #FF85AD;}.calcresult.pink table td{border:1px solid #FF85AD;}.flat-btn.pink{background: none repeat scroll 0 0 #FF85AD;}.flat-btn.pink:hover{text-decoration:none; background:#333; color:#fff}.other-calc{display:none;padding:8px 10px; position:relative; box-sizing:border-box; border:1px solid #dfdfdf; margin-top:10px; cursor:pointer; font-weight:600; font-size:16px;}.other-calc span.icon{float:right;}.other-calc-list{display:none;padding:0 8px; width:100%; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; -o-box-sizing:border-box; left:0; top:35px; background:#fdfdfd; display:block; border:1px solid #dfdfdf; position:absolute; z-index:1;}.other-calc-list li{display:block; margin:10px 0;}.other-calc-list li a{padding:3px 0; color:#333; display:block; font-size:14px; font-weight:400;}.other-calc-list li a:hover{color:#0F5885;}.calculator-table-form .form-control{font-size:18px!important}/**************** calculator style end **************/#callinks_cat input[type=radio]{position:absolute;opacity:0;z-index:-1}#callinks_cat .row .col-md-4{flex:1}.tabs{overflow:hidden}.tab{width:100%;color:#fff;overflow:hidden}.tab-label{display:flex;justify-content:space-between;padding:10px;font-weight:700;cursor:pointer}.one .tab-label{background:#009999}.two .tab-label{background:#c77f28}.three .tab-label{background:#64636e}.tab-label:hover{background:#003333}.tab-label::after{content:"\276F";width:1em;height:1em;text-align:center;transition:all .35s}.tab-precontent{max-height:0;color:#2c3e50;background:#fff;transition:all .35s}.tab-close{display:flex;justify-content:flex-end;padding:1em;font-size:.75em;background:#2c3e50;cursor:pointer}.tab-close:hover{background:#003333}#callinks_cat input[type=radio]:checked+.tab-label{background:#003333}#callinks_cat input[type=radio]:checked+.tab-label::after{-webkit-transform:rotate(90deg);transform:rotate(90deg)}#callinks_cat input[type=radio]:checked~.tab-precontent{max-height:250vh;margin-bottom:20px;border-radius:8px;box-shadow:0 4px 4px -2px rgba(0,0,0,.5)}</style>


        <div class="calculator-table-form blue">
          <form name="iron_intake" method="post">
            <input type="hidden" name="hdnrmifor" value="">
            <table border="0" cellpadding="5" cellspacing="0" width="100%">
              <tbody><tr class="table-head">
                <td colspan="3">Nhập thông tin chi tiết</td>
              </tr>
              <tr width="100%">
                <td colspan="3"> <b>Lượng sắt này dành cho</b><span class="red">*</span></td>
              </tr>
              <tr>
                <td colspan="3"><label> 
                  <input type="radio" name="rmifor" value="1" onclick="change('1');chec()" onchange="setdefault('age');">Sơ sinh</label>
                  <label><input type="radio" name="rmifor" value="2" onclick="change('2');chec()" onchange="setdefault('age');">Trẻ em</label>
                  <label><input type="radio" name="rmifor" checked="checked" value="3" onclick="change('3');chec()" onchange="setdefault('age');">Người lớn</label>
                </td>
              </tr>
              <tr>
                <td>Giới tính<span class="red">*</span>
                </td>
                <td>
                  <label><input type="radio" name="sex" value="Male" size="6" maxlength="3" onclick="chec();" checked="">
                    Nam &nbsp;</label>
                  <label><input type="radio" name="sex" value="Female" size="6" maxlength="3" onclick="chec();">
                    Nữ</label>
                </td>
              </tr>
              <tr>
                <td>Tuổi<span class="red">*</span></td>
                <td>
                  <label> <input type="text" name="age" value="lớn hơn 17 tuổi" class="definput" onkeypress="return numeralsOnly(event)" maxlength="2" onkeyup="chec();" onfocus="setfocus('age');" onblur="setblur('age');" style="width:130px">&nbsp;<span id="ytype">Tuổi</span></label>
                </td>
              </tr>
              <tr id="disp_pregnant" style="display:none">
                <td id="tabcol4">Bạn có đang mang thai không? (nếu là nữ)?<span class="red">*</span></td>
                <td id="tbleft4">
                  <label><input type="radio" name="pregnant" value="yes" size="6" onclick="chec();"> Có &nbsp;</label>
                  <input type="radio" name="pregnant" value="no" size="6" onclick="chec();"> Không
                </td>
              </tr>
              <tr id="disp_lactating" style="display:none">
                <td>Bạn đó đang cho con bú không? (nếu là nữ)?<span class="red">*</span></td>
                <td>
                  <input type="radio" name="lactating" value="yes" size="6" onclick="chec();"> Có &nbsp;
                  <input type="radio" name="lactating" value="no" size="6" onclick="chec();"> Không
                </td>
              </tr>
              <tr>
                <td>
                  <span class="red">* </span> Bắt buộc
                </td>
                <td colspan="2">
                  <input class="form_btn btn btn-primary" type="button" value="Tính toán">

                </td>
              </tr>
            </tbody></table>
          </form>
        </div><br>

        <div class="calculator-table-form blue" style="display: none;" id="form_kq">	
          <table>		
            <tbody><tr class="table-head"><td colspan="2">Kết quả</td></tr>
                  <tr>
                    <td>Giới tính</td>
                    <td id="form_sex"></td>
                  </tr>
                  <tr>
                    <td>Tuổi</td>
                    <td id="form_age"></td>
                  </tr>							
                  <tr>
                    <td colspan="2">Lượng sắt khuyến nghị hàng ngày cho con bạn là <b><font color="red" id="form_mg"></font> mg</b> / ngày.</td>
                  </tr>	
                    <tr><td colspan="3"><div class="note"><b>Ghi chú :</b> Kết quả này giúp bạn biết lượng sắt được khuyến nghị hàng ngày. Chúng tôi khuyên bạn nên tham khảo ý kiến bác sĩ hoặc chuyên gia dinh dưỡng để xác nhận nếu bạn có bất kỳ nghi ngờ nào.</div>
        </td></tr>				
        </tbody></table>
        </div>
    

<script language="javascript">
          function chec() {
            if (document.iron_intake.sex[1].checked == true && document.iron_intake.rmifor[0].checked == false) {

              if (document.iron_intake.age.value != "") {
                if (parseInt(document.iron_intake.age.value) > 13 && parseInt(document.iron_intake.age.value) < 51) {
                  document.getElementById('disp_pregnant').style.display = '';
                  document.getElementById('disp_lactating').style.display = 'none';

                  document.getElementById('disp_lactating').style.display = 'none';
                  if (document.iron_intake.pregnant[1].checked == true) {
                    document.getElementById('disp_lactating').style.display = '';
                    document.getElementById('disp_pregnant').style.display = '';
                  }
                  else {
                    document.getElementById('disp_pregnant').style.display = '';
                    document.getElementById('disp_lactating').style.display = 'none';
                    document.iron_intake.lactating[0].checked = false;
                    document.iron_intake.lactating[1].checked = false;
                  }
                }
                else {
                  document.getElementById('disp_pregnant').style.display = 'none';
                  document.getElementById('disp_lactating').style.display = 'none';
                  document.iron_intake.pregnant[0].checked = false;
                  document.iron_intake.pregnant[1].checked = false;
                  document.iron_intake.lactating[0].checked = false;
                  document.iron_intake.lactating[1].checked = false;
                }
              }
            }
            else {
              document.getElementById('disp_pregnant').style.display = 'none';
              document.getElementById('disp_lactating').style.display = 'none';
              document.iron_intake.pregnant[0].checked = false;
              document.iron_intake.pregnant[1].checked = false;
              document.iron_intake.lactating[0].checked = false;
              document.iron_intake.lactating[1].checked = false;
            }
          }


          function change(type) {
            document.iron_intake.hdnrmifor.value = type
            if (type == 1) {
              document.getElementById('ytype').innerHTML = "Tháng";
            }
            else {
              document.getElementById('ytype').innerHTML = "Tuổi";
            }
          }

          jQuery(document).ready(function () {
            $('.form_btn').click(function () {

              
              var sex = $("input[name='sex']:checked").val();
              var age = $("input[name='age']").val();
              var rmifor = $("input[name='rmifor']:checked").val();

              if (age != "") {
              if (rmifor == 1) {
                if ((parseInt(age) < 0) || (parseInt(age) > 12)) {
                  alert("Lượng Sắt cho Trẻ Sơ sinh dành cho những trẻ từ 0-12 tháng tuổi!!");
                  age.focus();
                  return false;
                }
              }
              if (rmifor == 2) {
                if ((parseInt(age) < 1) || (parseInt(age) > 17)) {
                  alert("Lượng Sắt cho Trẻ em dành cho những người từ 1-17 tuổi!");
                  age.focus();
                  return false;
                }
              }
              if (rmifor == 3) {
                if ((parseInt(age) < 18) || (parseInt(age) > 99)) {
                  alert("Lượng Sắt cho Người lớn dành cho những người trên 18 tuổi!");
                  age.focus();
                  return false;
                }
              }
            }
            if (sex == 'Female') {
              if (parseInt(age) > 13 && parseInt(age) < 51) {
                var pregnant = $("input[name='pregnant']:checked").val();
                var lactating = $("input[name='lactating']:checked").val();
                if (pregnant != 'no' && pregnant != 'yes') {
                  alert("Bạn có thai à? Vui lòng chọn Có / Không!");
                  return false;
                }
                if (pregnant == 'no') {
                  if (lactating != 'no' && lactating != 'yes') {
                    alert("Bạn đang cho con bú? Vui lòng chọn Có / Không!");
                    return false;
                  }
                }
              }
            }

            if ((age == "") || (age == "0-12 tháng") || (age == "1-17 tuổi") || (age == "lớn hơn 17 tuổi")) {
              alert("Vui lòng nhập tuổi của bạn");
              age.focus();
              return false;
            }

              if (rmifor == 1) {
                $('#form_age').html(age + ' tháng');
                if(age < 7) {
                  $('#form_mg').html('0.27');
                } else {
                  $('#form_mg').html('11');
                }
              } else if (rmifor == 2) {
                $('#form_age').html(age + ' tuổi');
                if(age < 4){
                  $('#form_mg').html('7');
                } else if(age >3 && age <9){
                  $('#form_mg').html('10');
                } else if(age >8 && age <14){
                  $('#form_mg').html('8');
                } else if(age >7 && age <19){
                  if (sex == 'Male') {
                    $('#form_mg').html('11');
                  } else {
                    $('#form_mg').html('15');
                  }
                  
                }
              } else {
                $('#form_age').html(age + ' tuổi');
                if(sex == 'Male'){
                  $('#form_mg').html('8');
                } else {
                  if (age >18 && age <51) {
                    $('#form_mg').html('18');
                  } else {
                    $('#form_mg').html('8');
                  }
                  if(pregnant == 'yes'){
                    $('#form_mg').html('27');
                  }
                  if(lactating == 'yes'){
                    $('#form_mg').html('9-10');
                  }
                }
              }
              sex = 'Nữ';
              if(sex == 'Male'){
              	sex = 'Nam';
              }
              $('#form_sex').html(sex);
              $('#form_kq').css('display', 'block');
            });
          });


          function numeralsOnly(evt) {
            evt = (evt) ? evt : event;
            var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              return false;
            }
            return true;
          }

          function setdefault(type) {
            if (type == "age") {
              if (document.iron_intake.rmifor[0].checked) {
                document.iron_intake.age.value = "0-12 tháng"
              }
              else if (document.iron_intake.rmifor[1].checked) {
                document.iron_intake.age.value = "1-17 tuổi"
              }
              else if (document.iron_intake.rmifor[2].checked) {
                document.iron_intake.age.value = "lớn hơn 17 tuổi"
              }
            }
          }

          function setfocus(type) {

            if (type == "age") {
              if (document.iron_intake.rmifor[0].checked) {
                if (document.iron_intake.age.value == "0-12 tháng") { document.iron_intake.age.value = "" }
              }
              else if (document.iron_intake.rmifor[1].checked) {
                if (document.iron_intake.age.value == "1-17 tuổi") { document.iron_intake.age.value = "" }
              }
              else if (document.iron_intake.rmifor[2].checked) {
                if (document.iron_intake.age.value == "lớn hơn 17 tuổi") { document.iron_intake.age.value = "" }
              }
            }
          }

          function setblur(type) {
            if (type == "age") {
              if (document.iron_intake.rmifor[0].checked) {
                if (document.iron_intake.age.value == "") { document.iron_intake.age.value = "0-12 tháng" }
              }
              else if (document.iron_intake.rmifor[1].checked) {
                if (document.iron_intake.age.value == "") { document.iron_intake.age.value = "1-17 tuổi" }
              }
              else if (document.iron_intake.rmifor[2].checked) {
                if (document.iron_intake.age.value == "") { document.iron_intake.age.value = "lớn hơn 17 tuổi" }
              }
            }
          }

        </script>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
 }}