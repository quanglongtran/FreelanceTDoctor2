<?php
if(!function_exists('calculators_calorie')){

function calculators_calorie(){
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
<script language="javascript">
    function checkgender() { if (document.infant.sex[0].checked) { gendercolor.className = "calculator-table-form blue"; } else { gendercolor.className = "calculator-table-form pink"; } }
    jQuery(document).ready(function () {
      $('#submit_btn').click(function () {
        var pounds = $("input[name='pounds']").val();
        var sex = $("input[name='sex']:checked").val();
        var height = $("input[name='height']").val();
        var weight = $("input[name='weight']").val();
        var age = $("#age").val();
        var feet = $("#feet").val();
        var inches = $("#inches").val();
        var activity = $("#selectactivity").val();
        var text_activity = $('#selectactivity :selected').text();
        if (pounds == "") {
          alert("Nh???p c??n n???ng c???a b???n");
          pounds.focus();
          return false;
        }
        if ((pounds != "")) {
          if (!pounds.match(/^[0-9]+(\.[0-9]+)?$/)) {
            alert("Vui l??ng nh???p ????ng ?????nh d???ng c??n n???ng!");
            infant.pounds.focus();
            return false;
          }
          if ((pounds < 30 || pounds > 250)) {
            alert("Vui l??ng nh???p ????ng ?????nh d???ng c??n n???ng!");
            infant.pounds.focus();
            return false;
          }
        }
        if (height == "") {
          alert("h??y nh???p chi???u cao c???a b???n!");
          document.infant.height.focus();
          return false;
        }

        if (!height.match(/^[0-9]+(\.[0-9]+)?$/)) {
          alert("Vui l??ng nh???p ????ng ?????nh d???ng chi???u cao!");
          infant.height.focus();
          return false;
        }
        if ((height <= 121) || (height >= 212)) {
          alert("Vui l??ng nh???p ????ng ?????nh d???ng chi???u cao!");
          infant.height.focus();
          return false;
        }
        if (pounds !== "") {
          weight = parseInt(pounds);
          r = weight.toString();

          if (r.length > 4)
            r = r.substring(0, 5)
          weight = Math.round(r);

          if (age == "") {
            alert("H??y ch???n tu???i c???a b???n");
            document.infant.age.focus();
            return false;
          }

          if (activity == "") {
            alert("H??y ch???n m???c ????? v???n ?????ng c???a b???n");
            document.infant.activity.focus();
            return false;
          }
        }
        var bmv = 0;
        if (sex == 'Nam'){
          bmv = (10*weight) + (6.25*height) - (5*age) + 5;
        }else {
          var bmv_test = (10*weight) + (6.25*height) - (5*age) - 161;
          if(text_activity == '??t v???n ?????ng'){
            bmv = bmv_test*1.2;
          } else if (text_activity == 'V???n ?????ng nh??? '){
            bmv = bmv_test*1.375;
          } else if (text_activity == 'V???n ?????ng v???a '){
            bmv = bmv_test*1.55;
          } else if (text_activity == 'V???n ?????ng m???nh '){
            bmv = bmv_test*1.725;
          } else {
            bmv = bmv_test*1.9;
          }
        }

        $('#form_sex').html(sex);
        $('#form_age').html(age + ' Tu???i');
        $('#form_activity').html(text_activity);
        $('#form_weight').html(weight + ' kg' + ' (' + pounds + ' Pounds' + ')');
        $('#form_height').html(height + ' cm' + ' (' + feet + ' Feet ' + inches + ' Inches' + ')');
        $('#form_calories').html(bmv);
        $('#form_kqq').css('display', 'block');
      })
    });


    function chec() {

      if (document.infant.sex[0].checked == true) {
        document.getElementById("ip_tbl").className = "bluebox2 blue_background"
        document.getElementById("personal_details_title").className = "blue_header_tab header_white_font tbold"
        document.getElementById("submit_btn").style.backgroundColor = "#0593E2"
        document.getElementById("submit_btn").style.Color = "#FFFFFF"

        for (j = 1; j < 7; j++) {
          document.getElementById('tabcol' + j).className = "CalcDarkBgWhite1";
          document.getElementById('tbleft' + j).className = "CalcLiteBgBlack";
        }
        tabcol7.className = "CalcDarkBgWhite1"

        tbord.className = "blueborder7 blueline7";
        document.infant.sub_btn.className = "CalcDarkBgWhite";
      }
      else {
        document.getElementById("ip_tbl").className = "pinkbox2 pink_background"
        document.getElementById("personal_details_title").className = "pink_header_tab header_white_font tbold"
        document.getElementById("submit_btn").style.backgroundColor = "#F394c6"
        document.getElementById("submit_btn").style.Color = "#FFFFFF"

        for (j = 1; j < 7; j++) {
          document.getElementById('tabcol' + j).className = "CalcfemaleBg";
          document.getElementById('tbleft' + j).className = "CalcfemaleBg1";
        }

        tabcol7.className = "CalcfemaleBg"
        tbord.className = "CalcFemalel1 CalcFemalel2";
        document.infant.sub_btn.className = "CalcFemaleBgr1";

      }
    }

    function conv(aa) {
      var ft = 0, inc = 0, ht = 0;
      if (aa == 1 || aa == 2) {
        ft = document.infant.opt2.value;
        inc = document.infant.opt3.value;
        var ss = ft * 12;
        var tot = ss + parseInt(inc);
        var val = tot * 2.54;
        document.infant.height.value = Math.round(val);
      }
      else {
        ht = document.infant.height.value;
        if (ht != "") {
          var cm = Math.round(ht / 2.54);
          var div = parseInt(cm / 12);
          var md = cm % 12;
          document.infant.opt2.value = div;
          document.infant.opt3.value = md;
        }
      }
    }
  </script>
  <div class="calculator-table-form blue" id="gendercolor">
    <form method="POST" name="infant">
      <input type="hidden" name="weight">
      <table border="0" width="100%" cellpadding="7" cellspacing="1" bgcolor="#FFFFFF" class="blue_font_arial">
        <tr class="table-head">
          <td colspan="2">Nh???p th??ng tin chi ti???t c???a b???n t???i ????y</td>
        </tr>
        <tr>
          <td id="tabcol1" width="40%" class="CalcDarkBgWhite1"><b>Gi???i t??nh</b><span class="red">*</span>
          </td>
          <td id="tbleft1" width="60%" class="CalcLiteBgBlack">
            <input type="radio" value="Nam" checked name="sex" onClick="checkgender();">
            Nam <input type="radio" name="sex" value="N???" onClick="checkgender();">
            N???
          </td>
        </tr>

        <tr>
          <td id="tabcol2" class="CalcDarkBgWhite1"><b>C??n n???ng</b><span class="red">*</span></td>
          <td id="tbleft2" class="CalcLiteBgBlack">
            <input size="10" type="text" name="pounds" maxlength="3" placeholder="70">
            &nbsp;
            Kg
          </td>
        </tr>
        <tr>
          <td id="tabcol3" class="CalcDarkBgWhite1"><b>Chi???u cao</b><span class="red">*</span></td>
          <td id="tbleft3" class="CalcLiteBgBlack">
            <input type="text" name="height" size="10" onKeyUp="conv(3)" class="innerc resform" maxlength="3"
              placeholder="170">
            <input type="hidden" name="inches" value="0">
            &nbsp;
            <input type="hidden" name="selheight">
            cm &nbsp; (or)
            &nbsp;<br>
          </td>
        </tr>
        <tr>
          <td id="tabcol4" class="CalcDarkBgWhite1">&nbsp;</td>
          <td id="tbleft4" class="CalcLiteBgBlack">
            <select name="opt2" onChange="conv(1)" id="feet">
              <option name="feet" value="4">4'</option>
              <option name="feet" value="5" selected="selected">5'</option>
              <option name="feet" value="6">6'</option>
            </select>

            Feet&nbsp;&nbsp;
            <select name="opt3" onChange="conv(2)" id="inches">
              <option name="inches" value="0">0&quot;</option>
              <option name="inches" value="1">1&quot;</option>
              <option name="inches" value="2">2&quot;</option>
              <option name="inches" value="3">3&quot;</option>
              <option name="inches" value="4">4&quot;</option>
              <option name="inches" value="5">5&quot;</option>
              <option name="inches" value="6">6&quot;</option>
              <option name="inches" value="7" selected="selected">7&quot;</option>
              <option name="inches" value="8">8&quot;</option>
              <option name="inches" value="9">9&quot;</option>
              <option name="inches" value="10">10&quot;</option>
              <option name="inches" value="11">11&quot;</option>
            </select>
            &nbsp;Inches
          </td>
        </tr>
        <tr>
          <td id="tabcol5" class="CalcDarkBgWhite1"><b>Tu???i</b><span class="red">*</span></td>
          <td id="tbleft5" class="CalcLiteBgBlack">
            <select size="1" name="age" id="age">
              <option selected value>Ch???n</option>
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
            </select>Tu???i
          </td>
        </tr>
        <tr>
          <td id="tabcol6" class="CalcDarkBgWhite1"><b>M???c ????? v???n ?????ng</b><span class="red">*</span></td>
          <td id="tbleft6" class="CalcLiteBgBlack">
            <select size="1" name="activity" id="selectactivity">
              <option value>Ch???n</option>
              <option value="1.2">??t v???n ?????ng</option>
              <option value="1.375">V???n ?????ng nh???</option>
              <option value="1.55">V???n ?????ng v???a </option>
              <option value="1.725">V???n ?????ng m???nh</option>
              <option value="1.9">V???n ?????ng r???t m???nh</option>
            </select>
          </td>
        </tr>
        <tr>
          <td id="tabcol7" colspan="2" width="100%" height="22" align="left">
            <font class="required">* Y??u c???u </font>
            <input type="button" name="but" value="Nh???p" class="flat-btn" id="submit_btn">
          </td>
        </tr>
      </table>
    </form>
  </div>
  <div class="calculator-table-form blue " id="form_kqq" style="padding-top: 20px;display: none;">
    <table align="center" border="0" cellpadding="10" width="100%" cellspacing="0" class="tv12blue bluebox2">
      <tbody>
        <tr>
          <td align="justify" width="100%" bgcolor="#BBE1FB" style="padding: 5px" colspan="2">
            <table width="100%" cellpadding="10" bgcolor="white" class="tv12blue">
              <tbody>
                <tr>
                  <td colspan="3" align="center">Th??ng tin do b???n cung c???p nh?? sau</td>
                </tr>

                <tr>
                  <td width="15%"></td>
                  <td><b>Tu???i</b></td>
                  <td align="left"><b id="form_age"></b></td>
                </tr>

                <tr>
                  <td width="15%"></td>
                  <td><b>M???c ????? v???n ?????ng</b></td>
                  <td align="left"><b id="form_activity"></b></td>
                </tr>

                <tr>
                  <td width="15%"></td>
                  <td><b>Gi???i t??nh</b></td>
                  <td><b id="form_sex"></b></td>
                </tr>

                <tr>
                  <td width="15%"></td>
                  <td><b>C??n n???ng</b></td>
                  <td><b id="form_weight"></b></td>
                </tr>

                <tr>
                  <td width="15%"></td>
                  <td align="left"><b>Chi???u cao</b></td>
                  <td align="left"><b id="form_height"></b></td>
                </tr>
                <tr>
                  <td colspan="3"></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td width="100%" class="tbold CalcDarkBgWhite1">
            <p align="center">

              Nhu c???u calo h??ng ng??y c???a b???n theo c??ng th???c Harris-Benedict:</p>
            <table width="100%" cellpadding="10" align="center">
              <tbody>
                <tr>
                  <td width="50%" class="tbold CalcDarkBgWhite1" style="background-color: #FFFFFF" align="justify">
                  </td>

                </tr>
                <tr>
                  <td width="50%" class="tbold CalcDarkBgWhite1" style="background-color: #FFFFFF" align="justify">
                    <center>
                      <font color="#FF0000"><b id="form_calories">1313</b></font> calories
                    </center>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>

        <tr>
          <td colspan="2" align="justify">
            <h2>M???t s??? ??i???u c???n nh???</h2>
              N??ng l?????ng b???n n???p v??o=n??ng l?????ng ti??u th???: c??n n???ng b???n ???????c duy tr??<br>
              N??ng l?????ng b???n n???p v??o>n??ng l?????ng ti??u th???: c??n n???ng b???n s??? t??ng l??n<br>
              N??ng l?????ng b???n n???p v??o n??ng l?????ng ti??u th???: c??n n???ng b???n s??? gi???m xu???ng<br>


            <br><br>
            <h2>M???t v??i s??? th???t th?? v??? v??? n??ng l?????ng.</h2>
            N??ng l?????ng c???a b???n n???p v??o c???n ph??n b??? ?????ng ?????u nh?? 45-65% t??? tinh b???t, 10-35% t??? ch???t ?????m v?? 20-50% t??? ch???t b??o.<br>
            D???a v??o s??? thay ?????i sinh h???c trong c?? th???, thanh thi???u ni??n lu??n c???n n??ng l?????ng r???t l???n.<br>
            Ph??? n??? c?? thai c???n th??m 300 calories h???ng ng??y<br>
            C?? 2 c??ng th???c t??nh l?????ng calories c???n thi???t : Benedict v?? Katch-McArdle.<br>
            ??n th???c ??n nhi???u n??ng l?????ng ??t ch???t b??o c?? l???i cho c?? th??? b???n, c?? gi??p l?????ng c??n n???ng l?? t?????ng ph?? h???p.<br>
            N???u nh?? b???n n???p nhi???u calories h??n b???n c???n, b???n s??? kh?? gi???m c??n h??n nhi???u.<br>
            C??c lo???i h???t ch???a r???t nhi???u calories, ngo??i ra c??n ch???a c??? protein, ch???t x??, ch???t b??o, vitamin v?? kho??ng ch???t<br>

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