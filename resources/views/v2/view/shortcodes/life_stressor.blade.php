<?php
if(!function_exists('life_stressor')){

function life_stressor(){
    ob_start();
?>
<script type="text/javascript">
    $(function () {
      $("input").each(function (index, element) {
        var $element = $(element);
        var defaultValue = $element.val();
        $element.css('color', '#ccc');
        $element.focus(function () {
          $element.css('color', '#000');
        });
        $element.blur(function (e) {
          var actualValue = $element.val();
          if (actualValue != defaultValue) {
            $element.css('color', '#000');
          } else {
            $element.css('color', '#ccc');
          }

        });
      });
    });
  </script>
<style type="text/css">
.calculator-table-form 
 input[type="checkbox"] {
    display: inline-block;
}
    .caltable-form table{background:#ecf9f2;border:1px solid #eee;border-bottom:2px solid #006666;box-shadow:0 0 20px rgba(0,0,0,.1),0 10px 20px rgba(0,0,0,.05),0 20px 20px rgba(0,0,0,.05),0 30px 20px rgba(0,0,0,.05)}.caltable-form td{border:solid 1px #fff;padding:10px}.caltable-form tfoot{background-color:#ccf2ff;color:#fff;padding:10px}.caltable-form tbody{color:#000;padding:10px}.table-head{background-color:#006666;color:#fff;padding:10px;text-align:left}.caltable-form input[type=text]:focus,select:focus,textarea:focus{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}.caltable-form input[type=text],textarea{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}.caltable-form select{min-height:32px;background:#fff;border:1px solid #ccc;outline:0}.caltable-form input[type=text]:focus,select:focus,textarea:focus{min-height:32px;background:#fff;border:1px solid #ccc;outline:0;padding-right:5px;padding-left:5px}input[type=text]:focus,select:focus,textarea:focus{min-height:32px}
.caltable-form .btn{background-color:#006666;border:0;border-radius:3px;box-shadow:0 0 2px 0 rgb(0 0 0 / 10%),0 2px 2px 0 rgb(0 0 0 / 20%);display:inline-block;color:#fff;font-size:1.105rem;line-height:1;padding:.75rem 1.5rem;text-decoration:none!important}

</style>
<script language="javascript">
          function checkgender() { if (document.chart.sex[0].checked) { gendercolor.className = "calculator-table-form blue"; } else { gendercolor.className = "calculator-table-form pink"; } }
          function check(count) {
            if (document.chart.sex[0].checked) {
              document.getElementById("ip_tbl").className = "bluebox2 blue_background"
              document.getElementById("ip_tbl1").className = "bluebox2 blue_background"
              document.getElementById("submit_btn").style.backgroundColor = "#0593E2"
              document.getElementById("submit_btn").style.Color = "#FFFFFF"

              age_l.className = "CalcDarkBgWhite1 tv12blue";
              age_r.className = "CalcLiteBgBlack";
              sex_l.className = "CalcDarkBgWhite1 tv12blue";
              sex_r.className = "CalcLiteBgBlack";
              ethinicity_l.className = "CalcDarkBgWhite1 tv12blue";
              ethinicity_r.className = "CalcLiteBgBlack";
              readlife.className = "CalcDarkBgWhite1 tv12blue";

              for (i = 1; i <= count + 1; i++) {
                //document.getElementById('cnt'+i).className = "CalcLiteBgBlack";
                document.getElementById('lifeevt' + i).className = "CalcLiteBgBlack";
                document.getElementById('eventid' + i).className = "CalcLiteBgBlack";
                document.getElementById("ip_tbl").className = "bluebox2 blue_background"
              }
            }
            if (document.chart.sex[1].checked) {
              document.getElementById("ip_tbl").className = "pinkbox2 pink_background"
              document.getElementById("ip_tbl1").className = "pinkbox2 pink_background"
              document.getElementById("submit_btn").style.backgroundColor = "#F394c6"
              document.getElementById("submit_btn").style.Color = "#FFFFFF"

              age_l.className = "CalcfemaleBg tv12blue";
              age_r.className = "CalcfemaleBg1";
              sex_l.className = "CalcfemaleBg tv12blue";
              sex_r.className = "CalcfemaleBg1";
              ethinicity_l.className = "CalcfemaleBg tv12blue";
              ethinicity_r.className = "CalcfemaleBg1";
              readlife.className = "CalcfemaleBg tv12blue";

              for (i = 1; i <= count + 1; i++) {
                //document.getElementById('cnt'+i).className = "CalcfemaleBg1";
                document.getElementById('lifeevt' + i).className = "CalcfemaleBg1";
                document.getElementById('eventid' + i).className = "CalcfemaleBg1";
                document.getElementById("ip_tbl").className = "pinkbox2 pink_background"
              }
            }
          }
          jQuery(document).ready(function () {
            $('#submit_btn').click(function () {
              var ethnicity = $("#ethnicity :selected").text();
              var sex = $("input[name='sex']:checked").val();
              var age = $("input[name='age']").val();
              if (document.chart.ethnicity.value == "-1") {
                alert("Vui lòng chọn dân tộc của bạn!");
                document.chart.ethnicity.focus();
                return false;
              }
              if ((sex != 'm') && (sex != 'f')) {
                alert("Vui lòng chọn giới tính!");
                return false;
              }
              if (age == "") {
                alert("Vui lòng chọn tuổi của bạn!");
                $("input[name='age']").focus();
                return false;
              }
              if (!age.match(/^[0-9]+(\.[0-9]+)?$/)) {
                alert("Vui lòng chọn tuổi hợp lệ!");
                $("input[name='age']").focus();
                return false;
              }
              if ((age <= 13) || (age >= 76)) {
                alert("Máy tính này hoạt động tốt nhất cho những người từ 14 đến 75 tuổi!");
                $("input[name='age']").focus();
                return false;
              }
              var total = 0;
              $.map($("input:checkbox:checked"), function (params, id) {
                total += parseInt($(params).val());
              });
              if (total <= 150){
                $('#muc_do').html('tương đối thấp');
              } else if (total > 150 && total <= 299){
                $('#muc_do').html('ở mức trung bình');
              } else if (total > 299 ){
                $('#muc_do').html('là cao');
              }
              if (sex == 'm') {
                $('#form_sex').html('Nam');
              } else {
                $('#form_sex').html('Nữ');
              }
              $('#form_age').html(age);
              $('#form_kq2').css('display', 'block');
            })
          })
          function numeralsOnly(evt) {
            evt = (evt) ? evt : event;
            var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              return false;
            }
            return true;
          }
          function mail() {
            document.mailform.submit();
          }
        </script>

        <div class="calculator-table-form blue" id="gendercolor">

          <form name="chart" method="post">
            <table id="ip_tbl1" border="0" align="center" cellpadding="5" cellspacing="0" width="100%">
              <tr class="table-head">
                <td colspan="2">Biểu đồ trầm cảm cuộc sống</td>
              </tr>
              <tr>
                <td id="ethinicity_l">Dân tộc<span class="mandatory-star">&nbsp;*</span></td>
                <td id="ethinicity_r" colspan="2" style="padding:10px;" valign="middle">
                  <select name="ethnicity" style="width:140px" id="ethnicity">
                    <option value="-1">Chọn</option>
                    <option value="0">Người Châu Á</option>
                    <option value="1">Người châu Phi</option>
                    <option value="2">Người da trắng</option>
                    <option value="3">Người Tây Ban Nha</option>
                    <option value="4">Các nhóm dân cư khác</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td id="sex_l">Giới tính<span class="mandatory-star">&nbsp;*</span></td>
                <td id="sex_r" colspan="2" style="padding:10px" valign="middle" onclick="check()">
                  <input type="radio" value="m" name="sex" onclick="checkgender('44')">Nam
                  <input type="radio" value="f" name="sex" onclick="checkgender('44')">Nữ
                </td>
              </tr>
              <tr>
                <td id="age_l" style="text-align: left;">Tuổi<span class="mandatory-star">&nbsp;*</span></td>
                <td id="age_r" colspan="2" style="padding:10px;text-align: left;" valign="middle">
                  <input type="text" name="age" size="8" style="width:140px" maxlength="2"
                    onKeyPress="return numeralsOnly(event)">
                </td>
              </tr>
            </table>

            <table width="100%">
              <tr height="50">
                <td id="readlife" colspan="2"><b>Đọc các sự kiện trong đời được liệt kê bên dưới và nếu bất kỳ sự kiện nào trong số này đã xảy ra trong hai năm qua, hãy chọn hộp.</b> </td>
              </tr>

              <tr>
                <td bgcolor="#ffffff" width="100%" colspan="2"><b>Hôn nhân và các mới quan hệ</b></td>
              </tr>

              <tr>

                <td id="lifeevt1" bgcolor="#FFF8F7">&nbsp;<span id="eventid1"><input type="checkbox" name="ck_event1"
                      value="73"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Ly hôn
                  <span id="cnt1" style="display:none">1.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt2" bgcolor="#FFF8F7">&nbsp;<span id="eventid2"><input type="checkbox" name="ck_event2"
                      value="39"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thêm một thành viên mới trong gia đình (có con, nhận con nuôi, người lớn tuổi chuyển đến, v.v.)
                  <span id="cnt2" style="display:none">2.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt3" bgcolor="#FFF8F7">&nbsp;<span id="eventid3"><input type="checkbox" name="ck_event3"
                      value="35"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Số lượng các cuộc tranh cãi với vợ / chồng thay đổi (tức là nhiều hơn hoặc ít hơn)
                  <span id="cnt3" style="display:none">3.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt4" bgcolor="#FFF8F7">&nbsp;<span id="eventid4"><input type="checkbox" name="ck_event4"
                      value="45"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Tái hôn
                  <span id="cnt4" style="display:none">4.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt5" bgcolor="#FFF8F7">&nbsp;<span id="eventid5"><input type="checkbox" name="ck_event5"
                      value="65"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Ly thân
                  <span id="cnt5" style="display:none">5.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt6" bgcolor="#FFF8F7">&nbsp;<span id="eventid6"><input type="checkbox" name="ck_event6"
                      value="50"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Hôn nhân
                  <span id="cnt6" style="display:none">6.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt7" bgcolor="#FFF8F7">&nbsp;<span id="eventid7"><input type="checkbox" name="ck_event7"
                      value="40"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Mang thai
                  <span id="cnt7" style="display:none">7.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt8" bgcolor="#FFF8F7">&nbsp;<span id="eventid8"><input type="checkbox" name="ck_event8"
                      value="39"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Khó khăn về chuyện Tình dục
                  <span id="cnt8" style="display:none">8.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt9" bgcolor="#FFF8F7">&nbsp;<span id="eventid9"><input type="checkbox" name="ck_event9"
                      value="29"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Con cái bỏ nhà ra đi (lí do kết hôn, học đại học, nhập ngũ, v.v.)
                  <span id="cnt9" style="display:none">9.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt10" bgcolor="#FFF8F7">&nbsp;<span id="eventid10"><input type="checkbox" name="ck_event10"
                      value="29"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Rắc rối ở rể hay làm dâu
                  <span id="cnt10" style="display:none">10.</span>
                </td>



              </tr>

              <tr>
                <td bgcolor="#ffffff" width="100%" colspan="2"><b>Tài chính</b></td>
              </tr>

              <tr>

                <td id="lifeevt11" bgcolor="#FFF8F7">&nbsp;<span id="eventid11"><input type="checkbox" name="ck_event11"
                      value="30"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Bị Tịch thu tài sản thế chấp hoặc vay nợ
                  <span id="cnt11" style="display:none">11.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt12" bgcolor="#FFF8F7">&nbsp;<span id="eventid12"><input type="checkbox" name="ck_event12"
                      value="17"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Vay tiền (mua xe, tivi, tủ đông, v.v.)
                  <span id="cnt12" style="display:none">12.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt13" bgcolor="#FFF8F7">&nbsp;<span id="eventid13"><input type="checkbox" name="ck_event13"
                      value="31"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thế chấp (mua nhà, cơ sở kinh doanh, v.v.)
                  <span id="cnt13" style="display:none">13.</span>
                </td>



              </tr>

              <tr>
                <td bgcolor="#ffffff" width="100%" colspan="2"><b>Công việc</b></td>
              </tr>

              <tr>

                <td id="lifeevt14" bgcolor="#FFF8F7">&nbsp;<span id="eventid14"><input type="checkbox" name="ck_event14"
                      value="47"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Bị sa thải trong công việc
                  <span id="cnt14" style="display:none">14.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt15" bgcolor="#FFF8F7">&nbsp;<span id="eventid15"><input type="checkbox" name="ck_event15"
                      value="36"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Chuyển sang một công việc khác
                  <span id="cnt15" style="display:none">15.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt16" bgcolor="#FFF8F7">&nbsp;<span id="eventid16"><input type="checkbox" name="ck_event16"
                      value="39"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Điều chỉnh hoạt động kinh doanh lớn
                  <span id="cnt16" style="display:none">16.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt17" bgcolor="#FFF8F7">&nbsp;<span id="eventid17"><input type="checkbox" name="ck_event17"
                      value="38"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi lớn về tình trạng tài chính (tồi tệ hơn hoặc tốt hơn rất nhiều so với bình thường)
                  <span id="cnt17" style="display:none">17.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt18" bgcolor="#FFF8F7">&nbsp;<span id="eventid18"><input type="checkbox" name="ck_event18"
                      value="15"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi về số lần gặp gỡ gia đình (tức là nhiều hơn hoặc ít hơn)
                  <span id="cnt18" style="display:none">18.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt19" bgcolor="#FFF8F7">&nbsp;<span id="eventid19"><input type="checkbox" name="ck_event19"
                      value="16"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi lớn trong thói quen ngủ (tức là nhiều hay ít)
                  <span id="cnt19" style="display:none">19.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt20" bgcolor="#FFF8F7">&nbsp;<span id="eventid20"><input type="checkbox" name="ck_event20"
                      value="18"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi lớn trong các hoạt động xã hội (tức là câu lạc bộ, xem phim, tham quan, v.v.)
                  <span id="cnt20" style="display:none">20.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt21" bgcolor="#FFF8F7">&nbsp;<span id="eventid21"><input type="checkbox" name="ck_event21"
                      value="19"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi về loại hình và / hoặc thời gian giải lao, nghỉ ngơi, thú vui
                  <span id="cnt21" style="display:none">21.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt22" bgcolor="#FFF8F7">&nbsp;<span id="eventid22"><input type="checkbox" name="ck_event22"
                      value="12"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Các ngày nghỉ lễ lớn
                  <span id="cnt22" style="display:none">22.</span>
                </td>



              </tr>
              <tr>

                <td id="lifeevt22" bgcolor="#FFF8F7">&nbsp;<span id="eventid22"><input type="checkbox" name="ck_event23"
                      value="44"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi lớn về sức khỏe hoặc hành vi của một thành viên trong gia đình
                  <span id="cnt22" style="display:none">23.</span>
                </td>



              </tr>


              <tr>

                <td id="lifeevt23" bgcolor="#FFF8F7">&nbsp;<span id="eventid23"><input type="checkbox" name="ck_event24"
                      value="28"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thành tựu cá nhân nổi bật
                  <span id="cnt23" style="display:none">24.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt24" bgcolor="#FFF8F7">&nbsp;<span id="eventid24"><input type="checkbox" name="ck_event25"
                      value="24"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi các thói quen cá nhân (tức là ăn mặc, hiệp hội, bỏ hút thuốc, v.v.)
                  <span id="cnt24" style="display:none">25.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt25" bgcolor="#FFF8F7">&nbsp;<span id="eventid25"><input type="checkbox" name="ck_event26"
                      value="13"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Nghỉ phép
                  <span id="cnt25" style="display:none">26.</span>
                </td>



              </tr>

              <tr>
                <td bgcolor="#ffffff" width="100%" colspan="2"><b>Luật pháp</b></td>
              </tr>

              <tr>

                <td id="lifeevt38" bgcolor="#FFF8F7">&nbsp;<span id="eventid26"><input type="checkbox" name="ck_event27"
                      value="4"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Bị giam giữ trong nhà tù
                  <span id="cnt38" style="display:none">27.</span>
                </td>



              </tr>
              <tr>

                <td id="lifeevt34" bgcolor="#FFF8F7">&nbsp;<span id="eventid27"><input type="checkbox" name="ck_event28"
                      value="11"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Vi phạm luật nhẹ (ví dụ như vé giao thông, đi ẩu, v.v.
                  <span id="cnt34" style="display:none">28.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt35" bgcolor="#FFF8F7">&nbsp;<span id="eventid28"><input type="checkbox" name="ck_event29"
                      value="29"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi lớn về trách nhiệm trong công việc (tức là thăng chức, cách chức, v.v.)
                  <span id="cnt35" style="display:none">29.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt36" bgcolor="#FFF8F7">&nbsp;<span id="eventid29"><input type="checkbox" name="ck_event30"
                      value="20"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Những thay đổi lớn về giờ giấc hoặc điều kiện làm việc (cực hơn hay nhàn hơn)
                  <span id="cnt36" style="display:none">30.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt37" bgcolor="#FFF8F7">&nbsp;<span id="eventid30"><input type="checkbox" name="ck_event31"
                      value="45"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Nghỉ hưu.
                  <span id="cnt37" style="display:none">31.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt39" bgcolor="#FFF8F7">&nbsp;<span id="eventid31"><input type="checkbox" name="ck_event32"
                      value="26"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Vợ / chồng bắt đầu hoặc ngừng làm việc
                  <span id="cnt39" style="display:none">32.</span>
                </td>
              </tr>
              <tr>

                <td id="lifeevt39" bgcolor="#FFF8F7">&nbsp;<span id="eventid32"><input type="checkbox" name="ck_event33"
                      value="23"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Những rắc rối với cấp trên
                  <span id="cnt39" style="display:none">33.</span>
                </td>
              </tr>

              <tr>
                <td bgcolor="#ffffff" width="100%" colspan="2"><b>Thay đổi lối sống</b></td>
              </tr>

              <tr>

                <td id="lifeevt40" bgcolor="#FFF8F7">&nbsp;<span id="eventi33"><input type="checkbox" name="ck_event34"
                      value="26"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Bắt đầu hoặc ngừng học chính thức
                  <span id="cnt40" style="display:none">34.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt41" bgcolor="#FFF8F7">&nbsp;<span id="eventid34"><input type="checkbox" name="ck_event35"
                      value="20"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi nơi cư trú
                  <span id="cnt41" style="display:none">35.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt42" bgcolor="#FFF8F7">&nbsp;<span id="eventid35"><input type="checkbox" name="ck_event36"
                      value="20"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Chuyển sang trường mới
                  <span id="cnt42" style="display:none">36.</span>
                </td>



              </tr>

              <tr>

                <td id="lifeevt43" bgcolor="#FFF8F7">&nbsp;<span id="eventid36"><input type="checkbox" name="ck_event37"
                      value="19"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi lớn trong hoạt tôn giáo (tức là nhiều hay ít)
                  <span id="cnt43" style="display:none">37.</span>
                </td>



              </tr>
              <tr>

                <td id="lifeevt43" bgcolor="#FFF8F7">&nbsp;<span id="eventid37"><input type="checkbox" name="ck_event38"
                      value="15"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi lớn trong thói quen ăn uống (nhiều hay ít, giờ ăn, môi trường xung quanh, v.v.)
                  <span id="cnt43" style="display:none">38.</span>
                </td>



              </tr>
              <tr>

                <td id="lifeevt43" bgcolor="#FFF8F7">&nbsp;<span id="eventid38"><input type="checkbox" name="ck_event39"
                      value="25"></span></td>
                <td style="white-space: pre-wrap;word-wrap: break-word; ">Thay đổi lớn về điều kiện sống (tức là nhà mới, tu sửa, xuống cấp, v.v.)
                  <span id="cnt43" style="display:none">39.</span>
                </td>



              </tr>

              <tr>

                <td colspan="2">
                  <font class="required">* Yêu cầu</font>
                  <input type="button" value="Xác nhận" name="but_check" class="flat-btn"
                    id="submit_btn">
                </td>
              </tr>
            </table>
          </form>
        </div>
      <script language="javascript">
        document.onload = check('44');
      </script><br>
      <div class="calculator-table-form blue" style="padding-top: 10px;display: none;" id="form_kq2">

        <table width="100%" cellpadding="7" cellspacing="1" class="tv12blue" bgcolor="#ffffff">
              <tbody><tr class="table-head"><td colspan="2">Kết quả:</td></tr>
          <tr>
            <td class="CalcDarkBgWhite1 tbold" align="center">Giới tính</td>
            <td class="CalcLiteBgBlack" id="form_sex"></td>
          </tr>
          <tr>
            <td class="CalcDarkBgWhite1 tbold" align="center">Tuổi</td>
            <td class="CalcLiteBgBlack" id="form_age"></td>
          </tr>
          <tr bgcolor="#edfbfe">
            <td colspan="2" align="center">
              <table width="100%" bgcolor="white" class="tv12blue" cellpadding="10">
                <tbody>
                  <tr>
                    <td align="justify" style="line-height:150%" valign="middle">
                    khả năng gặp phải vấn đề trầm cảm của bạn  <font class="tv12red"><b id="muc_do"></b></font></td>
                  </tr>
                  <tr>
                    <td>
                      Sự thật về trầm cảm:<br>
                              Trầm cảm có thể gồm ba loại<br>
                         Trầm cảm do cuộc sống thường ngày( công việc, gia đình ..)<br>
                         Trầm cảm do những vấn đề không lường trước( mất việc, ly hôn, bệnh tật,…)<br>
                         Trầm cảm do chấn thương (tai nạn nghiêm trọng, tai họa thiên nhiên)<br>
                              Cuộc sống mà không có trầm cảm sẽ khiến cho con người không hạnh phúc hơn và thành công hơn.<br>
                              Mỗi người sẽ phản ứng với những vấn đề trong cuộc sống khác nhau.<br>
                              Những giải pháp thư giãn như thở và thiền giúp giảm trầm cảm.<br>
                              Yoga tăng gấp đôi khả năng trong việc tăng độ dẻo dai, sức mạnh và độ bền cũng như giảm lo lắng và lo lắng.

                    </td>
                  </tr>
              </tbody></table>
            </td>
          </tr>
        
        </tbody></table>
    </div>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}