<?php
if(!function_exists('daily_calorie_requirement_for_age_lifestyle')){

function daily_calorie_requirement_for_age_lifestyle(){
    ob_start();
?>
<style>
        /***************** calculator style --*********/
        .calculator-table,
        .calculator-table-form {
            margin: 0 0 20px 0;
            color: #000000;
            width: 90%;
            margin: 0 auto;
            line-height: 130%;
        }

        .calculator-table-form table,
        .calculator-table table {
            width: 100%;
            color: #000000;
        }

        .calculator-table-form td,
        .calculator-table td {
            border-left: 1px solid #fff;
        }

        .calculator-table-form td:nth-child(1),
        .calculator-table td:nth-child(1) {
            border-left: none;
        }

        .calculator-table-form.blue table {
            background: #E6F4FE;
            border: 1px solid #0F5885;
        }

        .calculator-table.blue table {
            background: #E6F4FE;
        }

        .calculator-table-form.pink table {
            background: #FBE4FD;
            border: 1px solid #AD0054;
        }

        .calculator-table.pink table {
            background: #B30035;
        }

        .calculator-table-form.blue td:first-child {
            background: #CFEAFC
        }

        .calculator-table-form.pink td:first-child {
            background: #FFD6EB
        }

        .calculator-table-form tr.table-head td,
        .calculator-table tr.table-head td {
            color: #fff;
            font-weight: bold;
        }

        .calculator-table-form.blue tr.table-head td,
        .calculator-table.blue tr.table-head td {
            background: #0F5885;
        }

        .calculator-table-form input[type='radio'],
        .calculator-table-form input[type='checkbox'] {
            margin-right: 5px;
        }

        .calculator-table-form.blue tr.table-head td,
        .calculator-table-form.pink tr.table-head td {
            font-size: 14px;
        }

        .calculator-table-form.blue tr.table-head td,
        .calculator-table.blue tr.table-head td {
            background: #0F5885;
        }

        .calculator-table-form.pink tr.table-head td,
        .calculator-table.pink tr.table-head td {
            background: #AD0054;
        }

        .calculator-table-form tr:last-child td {
            text-align: center;
        }

        .calculator-table-form tr.leftalign td {
            text-align: left !important;
        }

        .calculator-table-form td,
        .calculator-table td {
            border-right: 0px solid #fff;
            border-bottom: 1px solid #fff;
            padding: 10px 5px;
            vertical-align: top;
            text-align: left;
        }

        .calculator-table-form tr:last-child td,
        .calculator-table:last-child td {
            border-bottom: none;
        }

        .mandatory-star {
            color: #f00;
        }

        .required {
            color: #B30000;
            text-align: left;
            float: left;
            padding-top: 15px;
        }

        .calculator-table-form .flat-btn {
            border: 0;
            color: #fff;
            margin-left: 5px;
            cursor: pointer;
        }

        .calculator-table-form.blue .flat-btn,
        .result .flat-btn {
            background: #0F5885;
            color: #fff !important;
            font-size: 13px;
            font-weight: 600;
            /*border-radius:4px;*/
            padding: 8px 15px;
            display: inline-block;
        }

        .calculator-table-form.pink .flat-btn {
            background: #AD0054;
            color: #fff;
            font-weight: 600;
            /*border-radius:4px;*/
            font-size: 13px;
            padding: 8px 15px;
            display: inline-block;
        }

        .calculator-table-form.blue .flat-btn:hover {
            background: #0779A3;
        }

        .calculator-table-form.pink .flat-btn:hover {
            background: #D62060;
        }


        a:not([href]) {
            color: #333 !important;
            text-decoration: none;
        }

        /*.flat-btn,.flat-btn.blue{padding:5px 10px; background:#0F5885; color:#fff; text-decoration:none; margin:10px 0 0 0; display:inline-block; border-radius:4px;font-size: 13px !important;}*/
        .flat-btn:hover {
            text-decoration: none;
            background: #333;
            color: #fff
        }


        .flat-btn.pink {
            background: none repeat scroll 0 0 #FF85AD;
        }

        .flat-btn.pink:hover {
            text-decoration: none;
            background: #333;
            color: #fff
        }

        .calculator-table-form .form-control {
            font-size: 18px !important
        }
    </style>

    <style type="text/css">
      
      td#right_col4 img {
    width: auto;
    margin: 5px;
}
    </style>

<script language="javascript">
    function checkgender() { if (document.calorie.sex[0].checked) { gendercolor.className = "calculator-table-form blue"; } else { gendercolor.className = "calculator-table-form pink"; } }
    jQuery(document).ready(function () {
      $('#submit_btn').click(function () {
        var ethnicity = $('#selectactivity :selected').text();
        var sex = $("input[name='sex']:checked").val();
        var age = $("#age").val();
        var activity_male = $("input[name='activity_male']:checked").val();
        var activity_female = $("input[name='activity_female']:checked").val();
        var activity_child = $("#activity_child :selected").text();
        if (ethnicity == "Chọn") {
          alert("Vui lòng chọn chủng tộc của bạn!");
          document.calorie.ethnicity.focus();
          return false;
        }
        if (age == "") {
          alert("Vui lòng chọn tuổi của bạn!");
          document.calorie.age.focus();
          return false;
        }

        if (age <= 3) {
          if (activity_child == "Chọn") {
            alert("Vui lòng chọn mức độ hoạt động của con bạn!");
            return false;
          }
        }
        if (age > 3 && age <= 11) {
          if (sex == 'Nam') {
            if (activity_male == undefined) {
              alert("Vui lòng chọn mức độ hoạt động của con bạn!");
              return false;
            }
          }
          if (sex == 'Nữ') {
            if (activity_female == undefined) {
              alert("Vui lòng chọn mức độ hoạt động của con bạn!");
              return false;
            }
          }
        }
        if (age > 11) {
          if (sex == 'Nam') {
            if (activity_male == undefined) {
              alert("Vui lòng chọn mức độ hoạt động của bạn!");
              return false;
            }
          }
          else {
            if (activity_female == undefined) {
              alert("Vui lòng chọn mức độ hoạt động của bạn!");
              return false;
            }
          }
        }
        var calorie = '';
        if (age >= 2 && age <= 3){
          $('#activity_level').html(activity_child);
          if(activity_child == 'Ít vận động'){
            calorie = '1.000';
          } else{
            calorie = '1.000 - 1.400';
          }
          
        }
        if (sex == 'Nam'){
          $('#activity_level').html(activity_male);
          if(age >= 4 && age <= 8){
            if (activity_male == 'Ít vận động'){
              calorie = '1.400';
            } else if (activity_male == 'Vận động vừa'){
              calorie = '1.400 - 1.600';
            } else {
              calorie = '1.600 - 2.000';
            }
          } else if (age >= 9 && age <= 13){
            if (activity_male == 'Ít vận động'){
              calorie = '1.800';
            } else if (activity_male == 'Vận động vừa'){
              calorie = '1.800 - 2.200';
            } else {
              calorie = '2.000 - 2.600';
            }
          } else if (age >= 14 && age <= 18){
            if (activity_male == 'Ít vận động'){
              calorie = '2.200';
            } else if (activity_male == 'Vận động vừa'){
              calorie = '2.400 - 2.800';
            } else {
              calorie = '2.800 - 3.200';
            }
          } else if (age >= 19 && age <= 30){
            if (activity_male == 'Ít vận động'){
              calorie = '2.400';
            } else if (activity_male == 'Vận động vừa'){
              calorie = '2.400 - 2.800';
            } else {
              calorie = '3.000';
            }
          } else if (age >= 31 && age <= 50){
            if (activity_male == 'Ít vận động'){
              calorie = '2.200';
            } else if (activity_male == 'Vận động vừa'){
              calorie = '2.400 - 2.600';
            } else {
              calorie = '2.800 - 3.000';
            }
          } else if (age >= 51){
            if (activity_male == 'Ít vận động'){
              calorie = '2.000';
            } else if (activity_male == 'Vận động vừa'){
              calorie = '2.200 - 2.400';
            } else {
              calorie = '2.400 - 2.800';
            }
          }
          
        }else {
          $('#activity_level').html(activity_female);
          if(age >= 4 && age <= 8){
            if (activity_female == 'Ít vận động'){
              calorie = '1.200';
            } else if (activity_female == 'Vận động vừa'){
              calorie = '1.400 - 1.600';
            } else {
              calorie = '1.400 - 1.800';
            }
          } else if (age >= 9 && age <= 13){
            if (activity_female == 'Ít vận động'){
              calorie = '1.600';
            } else if (activity_female == 'Vận động vừa'){
              calorie = '1.600 - 2.000';
            } else {
              calorie = '1.800 - 2.200';
            }
          } else if (age >= 14 && age <= 18){
            if (activity_female == 'Ít vận động'){
              calorie = '1.800';
            } else if (activity_female == 'Vận động vừa'){
              calorie = '2.000';
            } else {
              calorie = '2.400';
            }
          } else if (age >= 19 && age <= 30){
            if (activity_female == 'Ít vận động'){
              calorie = '2.000';
            } else if (activity_female == 'Vận động vừa'){
              calorie = '2.000 - 2.200';
            } else {
              calorie = '2.400';
            }
          } else if (age >= 31 && age <= 50){
            if (activity_female == 'Ít vận động'){
              calorie = '1.800';
            } else if (activity_female == 'Vận động vừa'){
              calorie = '2.000';
            } else {
              calorie = '2.200';
            }
          } else if (age >= 51){
            if (activity_female == 'Ít vận động'){
              calorie = '1.600';
            } else if (activity_female == 'Vận động vừa'){
              calorie = '1.800';
            } else {
              calorie = '2.000 - 2.200';
            }
          }
        }

        $('#form_sex').html(sex);
        $('#form_age').html(age + ' Tuổi');

        $('#calorie').html(calorie);
        $('#form_kq').css('display', 'block');
      })
    });


    function numeralsOnly(evt) {
      evt = (evt) ? evt : event;
      var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));

      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      return true;
    }

    function sex_image_change() {
      if (document.calorie.age.value > 3) {
        if (document.calorie.sex[0].checked == true) {
          document.getElementById('activity_male').style.display = 'inline';
          document.getElementById('activity_female').style.display = 'none';
          document.getElementById('activity_child').style.display = 'none';

          document.calorie.activity_female[0].checked = false;
          document.calorie.activity_female[1].checked = false;
          document.calorie.activity_female[2].checked = false;
          document.calorie.activity_child.value = ""
        }
        else {
          document.getElementById('activity_male').style.display = 'none';
          document.getElementById('activity_female').style.display = 'inline';
          document.getElementById('activity_child').style.display = 'none';

          document.calorie.activity_male[0].checked = false;
          document.calorie.activity_male[1].checked = false;
          document.calorie.activity_male[2].checked = false;
          document.calorie.activity_child.value = ""
        }
      }
      else {
        document.getElementById('activity_child').style.display = 'inline';
        document.getElementById('activity_male').style.display = 'none';
        document.getElementById('activity_female').style.display = 'none';

        document.calorie.activity_male[0].checked = false;
        document.calorie.activity_male[1].checked = false;
        document.calorie.activity_male[2].checked = false;

        document.calorie.activity_female[0].checked = false;
        document.calorie.activity_female[1].checked = false;
        document.calorie.activity_female[2].checked = false;
      }
    }
    function showcalorie() {
      document.getElementById("showflg1").style.display = "none"
      document.getElementById("showflg2").style.display = ""
    }

    function closecalorie() {
      document.getElementById("showflg1").style.display = ""
      document.getElementById("showflg2").style.display = "none"
    }

  </script>

  <div class="px10"></div>
  <div class="calculator-table-form blue " id="gendercolor">
    <form name="calorie" method="post" >
      <table id="tbl" border="0" cellpadding="5" cellspacing="1" width="100%" class="tv12black">
        <tr class="table-head">
          <td colspan="2">Nhập chi tiết của bạn</td>
        </tr>
        <tr>
          <td id="left_col1">Chủng tộc<span class="mandatory-star">*</span></td>
          <td id="right_col1">
            <select name="ethnicity" style="width:160px" id="selectactivity">
              <option value>Chọn</option>
              <option value="0">Người Châu Á</option>
              <option value="1">Người châu Phi</option>
              <option value="2">Người da trắng</option>
              <option value="3">Người Tây Ban Nha</option>
              <option value="4">Các nhóm dân cư khác</option>
            </select>
          </td>
        </tr>
        <tr>
          <td id="left_col2">Giới tính<span class="mandatory-star">*</span></td>
          <td id="right_col2">
            <input type="radio" name="sex" value="Nam" size="6" maxlength="3" checked
              onclick="sex_image_change();checkgender();"> Nam &nbsp;
            <input type="radio" name="sex" value="Nữ" size="6" maxlength="3"
              onclick="sex_image_change();checkgender();"> Nữ
          </td>
        </tr>
        <tr>
          <td id="left_col3">Tuổi<span class="mandatory-star">*</span></td>
          <td id="right_col3">
            <select size="1" name="age" onchange="sex_image_change()" id="age">

              <option selected value>Chọn</option>

              <option value="2">2</option>

              <option value="3">3</option>

              <option value="4">4</option>

              <option value="5">5</option>

              <option value="6">6</option>

              <option value="7">7</option>

              <option value="8">8</option>

              <option value="9">9</option>

              <option value="10">10</option>

              <option value="11">11</option>

              <option value="12">12</option>

              <option value="13">13</option>

              <option value="14">14</option>

              <option value="15">15</option>

              <option value="16">16</option>

              <option value="17">17</option>

              <option value="18">18</option>

              <option value="19">19</option>

              <option value="20">20</option>

              <option value="21">21</option>

              <option value="22">22</option>

              <option value="23">23</option>

              <option value="24">24</option>

              <option value="25">25</option>

              <option value="26">26</option>

              <option value="27">27</option>

              <option value="28">28</option>

              <option value="29">29</option>

              <option value="30">30</option>

              <option value="31">31</option>

              <option value="32">32</option>

              <option value="33">33</option>

              <option value="34">34</option>

              <option value="35">35</option>

              <option value="36">36</option>

              <option value="37">37</option>

              <option value="38">38</option>

              <option value="39">39</option>

              <option value="40">40</option>

              <option value="41">41</option>

              <option value="42">42</option>

              <option value="43">43</option>

              <option value="44">44</option>

              <option value="45">45</option>

              <option value="46">46</option>

              <option value="47">47</option>

              <option value="48">48</option>

              <option value="49">49</option>

              <option value="50">50</option>

              <option value="51">51</option>

              <option value="52">52</option>

              <option value="53">53</option>

              <option value="54">54</option>

              <option value="55">55</option>

              <option value="56">56</option>

              <option value="57">57</option>

              <option value="58">58</option>

              <option value="59">59</option>

              <option value="60">60</option>

              <option value="61">61</option>

              <option value="62">62</option>

              <option value="63">63</option>

              <option value="64">64</option>

              <option value="65">65</option>

              <option value="66">66</option>

              <option value="67">67</option>

              <option value="68">68</option>

              <option value="69">69</option>

              <option value="70">70</option>

              <option value="71">71</option>

              <option value="72">72</option>

              <option value="73">73</option>

              <option value="74">74</option>

              <option value="75">75</option>

              <option value="76">76</option>

              <option value="77">77</option>

              <option value="78">78</option>

              <option value="79">79</option>

              <option value="80">80</option>

              <option value="81">81</option>

              <option value="82">82</option>

              <option value="83">83</option>

              <option value="84">84</option>

              <option value="85">85</option>

              <option value="86">86</option>

              <option value="87">87</option>

              <option value="88">88</option>

              <option value="89">89</option>

              <option value="90">90</option>

              <option value="91">91</option>

              <option value="92">92</option>

              <option value="93">93</option>

              <option value="94">94</option>

              <option value="95">95</option>

              <option value="96">96</option>

              <option value="97">97</option>

              <option value="98">98</option>

              <option value="99">99</option>

            </select>
          </td>
        </tr>
        <tr>
          <td id="left_col4">Mức độ hoạt động<span class="mandatory-star">*</span></td>
          <td id="right_col4">
            <div id="activity_male" style="display:none;">
              <input type="radio" name="activity_male" value="Ít vận động">
              <img src="https://www.medindia.net/patients/calculators/images/calc-smallimages/sedentary-male.jpg" alt="Daily Calorie requirement for Age and Lifestyle: Sedentary Male"
                title="Daily Calorie requirement for Age and Lifestyle: Sedentary Male">Ít vận động<br>
              <input type="radio" name="activity_male" value="Vận động vừa">
              <img src="https://www.medindia.net/patients/calculators/images/calc-smallimages/moderately-active-male.jpg"
                alt="Daily Calorie requirement for Age and Lifestyle: Moderately Active Male"
                title="Daily Calorie requirement for Age and Lifestyle: Moderately Active Male">Vận động vừa<br>
              <input type="radio" name="activity_male" value="Vận động mạnh">
              <img src="https://www.medindia.net/patients/calculators/images/calc-smallimages/active-male.jpg" alt="Daily Calorie requirement for Age and Lifestyle: Active Male"
                title="Daily Calorie requirement for Age and Lifestyle: Active Male">Vận động mạnh<br>
            </div>
            <div id="activity_female" style="display:none;">
              <input type="radio" name="activity_female" value="Ít vận động">
              <img src="https://www.medindia.net/patients/calculators/images/calc-smallimages/sedentary-female.jpg"
                alt="Daily Calorie requirement for Age and Lifestyle: Sedentary Female"
                title="Daily Calorie requirement for Age and Lifestyle: Sedentary Female">Ít vận động<br>
              <input type="radio" name="activity_female" value="Vận động vừa">
              <img
                src="https://www.medindia.net/patients/calculators/images/calc-smallimages/moderately-active-female.jpg"
                alt="Daily Calorie requirement for Age and Lifestyle: Moderately Active Female"
                title="Daily Calorie requirement for Age and Lifestyle: Moderately Active Female">Vận động vừa<br>
              <input type="radio" name="activity_female" value="Vận động mạnh">
              <img src="https://www.medindia.net/patients/calculators/images/calc-smallimages/active-female.jpg" alt="Daily Calorie requirement for Age and Lifestyle: Active Female"
                title="Daily Calorie requirement for Age and Lifestyle: Active Female">Vận động mạnh<br>
            </div>
            <div id="activity_child">
              <select name="activity_child" style="width:140px" id="activity_child">
                <option value>Chọn</option>
                <option value="Ít vận động">Ít vận động</option>
                <option value="Vận động vừa">Vận động vừa</option>
                <option value="Vận động mạnh">Vận động mạnh</option>
              </select>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2" width="100%" height="22" align="left">
            <span class="required">* Yêu cầu</span>
            <input type="button" name="but" value="Xác nhận" class="flat-btn" id="submit_btn">
          </td>
        </tr>
      </table>
    </form>
  </div>
  <script language="javascript">
    document.onload = checkgender(); sex_image_change();
  </script>
  <div class="calculator-table-form blue" id="form_kq" style="display: none;">
    <br>
    <table class="tv12black" style="margin: auto;width: 100%;">
      <tbody>
        <tr class="table-head">
          <td colspan="2">Kết quả</td>
        </tr>
        <tr>
          <td>Giới tính</td>
          <td id="form_sex"></td>
        </tr>
        <tr>
          <td>Tuổi</td>
          <td id="form_age"></td>
        </tr>
        <tr>
          <td>Mức độ hoạt động</td>
          <td id="activity_level"></td>
        </tr>
        <tr bgcolor="">
          <td colspan="2" align="center">
            <table class="tv12black">
              <tbody>
                <tr>
                  <td align="center" style="line-height:150%">Nhu cầu calo hàng ngày của con bạn dựa trên độ tuổi,
                    tình dục và lối sống là <font class="tv12red" ><b id="calorie"></b></font> calo.</td>
                </tr>

              </tbody>
            </table>
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <div class="calcnote" style="text-align:left">Lưu ý: &nbsp; Máy tính này giúp bạn biết hàng ngày của mình
              yêu cầu calo. Chúng tôi khuyên bạn nên tham khảo ý kiến bác sĩ hoặc chuyên gia dinh dưỡng để xác nhận nếu bạn có
              những nghi ngờ.</div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}