<?php
if(!function_exists('selfie_addiction_calculator')){

function selfie_addiction_calculator(){
    ob_start();
?>
  <style>
    /***************** calculator style --*********/
    .pink-table {
      background: #FAE9F6;
      border: 1px solid #F24680;
    }

    .pink-table tr:nth-child(2n) {
      background: #F3C0E3;
    }

    .pink-table tr {
      border-bottom: 1px solid #E496D8;
    }

    .pink-table tr:first-child td,
    .pink-table tr.table-title td {
      background: #F24680;
      border-right: 1px solid #E496D8;
    }

    .form-pink {
      background: #FAE9F6 !important;
    }

    .btn-blue {
      background-color: #0F5885;
      color: #fff !important;
    }

    .btn-blue:hover {
      background: #0779A3;
    }

    .btn-orange:hover,
    .btn-blue:hover,
    .btn-pink:hover {
      text-decoration: none;
    }

    .btn-orange {
      background-color: #FF6501;
      color: #fff;
    }

    .btn-orange:hover {
      background: #D55201;
      color: #fff;
    }

    .btn-pink {
      background-color: #F24680;
      color: #fff !important;
    }

    .btn-pink:hover {
      background: #D62060;
    }

    .flat-blue:hover,
    .flat-red:hover,
    .flat-pink:hover {
      background: #333;
      color: #fff;
      text-decoration: none;
    }

    .flat-pink {
      border: none;
      color: #fff !important;
      background: #DA39AA;
      padding: 3px 15px;
      *padding: 0 10px;
      *font-size: 13px !important
    }

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

    .highlight_field {
      border: 1px solid #dfdfdf;
      margin: 10px auto;
      padding: 3px 0;
      font-size: 22px;
      font-weight: 600;
      text-align: center;
      color: #333;
      box-shadow: inset 0 2px 5px #d2d2d2
    }

    a:not([href]) {
      color: #333 !important;
      text-decoration: none;
    }

    .calc-facts {
      padding: 0 0 10px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -o-box-sizing: border-box;
      /*border-top:3px solid #388BC1;*/
      line-height: 130%;
    }

    .calc-facts table td {
      padding: 5px 0;
    }

    .calc-facts h3 {
      padding: 8px 0;
      border-bottom: 3px solid #0F5885;
      font-size: 18px;
      margin: 0 0 10px 0;
      font-weight: 600;
      text-decoration: none;
    }

    .calc-facts ul {
      margin-left: 20px;
    }

    .report-content .calc-facts li,
    .calc-facts li {
      margin: 10px 0;
      line-height: 130%;
      list-style-type: disc;
      line-height: 130%;
    }

    .calcresult {
      border: 1px solid #0F5885;
      border-top: none;
      border-radius: 4px 4px 0 0;
      background: #E6F4FE
    }

    .calcresult .result,
    .result {
      text-align: center;
      padding: 5px 0;
      margin-bottom: 10px;
    }

    .result.final-result {
      text-align: left;
    }

    .highlight {
      color: #f00;
      font-weight: bold;
    }

    .calcresult h3 {
      background: #0F5885;
      margin-top: 0;
      padding: 10px;
      color: #fff;
      border-radius: 4px 4px 0 0;
    }

    .calcresult .content-inner {
      line-height: 130%;
      margin: 15px 0 0 0;
      padding: 7px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -o-box-sizing: border-box;
      font-size: 75%;
    }

    mark {
      background: #ff0;
      color: #000;
      padding-right: 5px;
    }

    /*.flat-btn,.flat-btn.blue{padding:5px 10px; background:#0F5885; color:#fff; text-decoration:none; margin:10px 0 0 0; display:inline-block; border-radius:4px;font-size: 13px !important;}*/
    .flat-btn:hover {
      text-decoration: none;
      background: #333;
      color: #fff
    }

    .calcresult ul {
      margin-left: 45px;
    }

    .calcresult li {
      margin: 10px 0 0 0;
    }

    .calcresult table {
      width: 95%;
      margin: 15px auto;
      border: 3px solid #0F5885;
      background: #fff;
    }

    .calcresult table td {
      padding: 5px;
      border: 1px solid #0F5885;
    }

    .calcnote,
    .calcresult table .note {
      font-style: italic;
      font-size: 12px;
      padding: 10px;
    }

    .calcresult.pink {
      background: #FBE4FD;
      border: 1px solid #FF85AD;
    }

    .calcresult.pink h3 {
      background: #FF85AD
    }

    .calcresult.pink table {
      border: 3px solid #FF85AD;
    }

    .calcresult.pink table td {
      border: 1px solid #FF85AD;
    }

    .flat-btn.pink {
      background: none repeat scroll 0 0 #FF85AD;
    }

    .flat-btn.pink:hover {
      text-decoration: none;
      background: #333;
      color: #fff
    }

    .other-calc {
      display: none;
      padding: 8px 10px;
      position: relative;
      box-sizing: border-box;
      border: 1px solid #dfdfdf;
      margin-top: 10px;
      cursor: pointer;
      font-weight: 600;
      font-size: 16px;
    }

    .other-calc span.icon {
      float: right;
    }

    .other-calc-list {
      display: none;
      padding: 0 8px;
      width: 100%;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -o-box-sizing: border-box;
      left: 0;
      top: 35px;
      background: #fdfdfd;
      display: block;
      border: 1px solid #dfdfdf;
      position: absolute;
      z-index: 1;
    }

    .other-calc-list li {
      display: block;
      margin: 10px 0;
    }

    .other-calc-list li a {
      padding: 3px 0;
      color: #333;
      display: block;
      font-size: 14px;
      font-weight: 400;
    }

    .other-calc-list li a:hover {
      color: #0F5885;
    }

    .calculator-table-form .form-control {
      font-size: 18px !important
    }

    /**************** calculator style end **************/
    #callinks_cat input[type=radio] {
      position: absolute;
      opacity: 0;
      z-index: -1
    }

    #callinks_cat .row .col-md-4 {
      flex: 1
    }

    .tabs {
      overflow: hidden
    }

    .tab {
      width: 100%;
      color: #fff;
      overflow: hidden
    }

    .tab-label {
      display: flex;
      justify-content: space-between;
      padding: 10px;
      font-weight: 700;
      cursor: pointer
    }

    .one .tab-label {
      background: #009999
    }

    .two .tab-label {
      background: #c77f28
    }

    .three .tab-label {
      background: #64636e
    }

    .tab-label:hover {
      background: #003333
    }

    .tab-label::after {
      content: "\276F";
      width: 1em;
      height: 1em;
      text-align: center;
      transition: all .35s
    }

    .tab-precontent {
      max-height: 0;
      color: #2c3e50;
      background: #fff;
      transition: all .35s
    }

    .tab-close {
      display: flex;
      justify-content: flex-end;
      padding: 1em;
      font-size: .75em;
      background: #2c3e50;
      cursor: pointer
    }

    .tab-close:hover {
      background: #003333
    }

    #callinks_cat input[type=radio]:checked+.tab-label {
      background: #003333
    }

    #callinks_cat input[type=radio]:checked+.tab-label::after {
      -webkit-transform: rotate(90deg);
      transform: rotate(90deg)
    }

    #callinks_cat input[type=radio]:checked~.tab-precontent {
      max-height: 250vh;
      margin-bottom: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 4px -2px rgba(0, 0, 0, .5)
    }
  </style>
  <meta property="og:image" content="https://www.medindia.net/patients/calculators/images/300_250/selfie.jpg">
  <link rel="image_src" href="https://www.medindia.net/patients/calculators/images/300_250/selfie.jpg">

  <script language="javascript">
    function calcsearch_valid() {
      var _input = document.getElementById('calcsearch').value.trim()
      if (_input.length < 3) { alert("Enter atleast 3 characters"); return false; }
      return true;
      document.frmcalc_search.submit();
    }

    function getsearchcalc(url1) {
      var calc_input = document.getElementById('calcsearch');
      var _list = document.getElementById('calcsearchlist').childNodes.length;
      document.getElementById('calcsearchlist').style.display = _list < 1 ? 'none' : 'block';
      calc_input.onkeyup = function () {
        document.getElementById('calcsearchdiv').style.display = "none";
        if (calc_input.value.length > 0) {
          document.getElementById('calcsearchdiv').style.display = "block";
          getcalclist(url1, calc_input.value);
        }
      }
    }

    function getcalclist(serviceurl, txt) {
      $.getJSON(serviceurl + '/includes-rwd/widgets/calculator/getcalc-search-details.asp?txt=' + txt, function (data) {
        $('#calcsearchlist a').remove();
        $.each(data.items, function (index, calc) {

          $('#calcsearchlist').append('<a href="' + calc.url + '">' + calc.calname + '</a>');
        });
        if ($("#calcsearchlist a").length < 1) {
          $('#calcsearchlist').css('display', 'none');
          $('.ajax-bx-close').css("display", "none");
        } else {
          $('#calcsearchlist').css('display', 'block');
          $('.ajax-bx-close').css("display", "block");
        }
      });
    }

  </script>



  <style>
    .table td {
      font-size: 18px !important;
    }

    .table-head td {
      color: #FFFFFF
    }

    ;

    .table .btn-primary {
      color: #FFFFFF;
      border-radius: 2px;
    }

    ;

    .table-bordered {
      border: 2px solid #54b4eb !important;
    }

    .calculator-table-form {
      font-size: 18px !important;
    }

    .calculator-table-form ul {
      margin-left: 20px;
    }

    .calculator-table-form.blue tr.table-head td,
    .calculator-table.blue tr.table-head td {
      font-size: 18px !important;
    }

    .calculator-table-form.pink tr.table-head td,
    .calculator-table.pink tr.table-head td {
      font-size: 18px !important;
    }

    .mandatory-star {
      color: #CC0000;
      font-weight: bold
    }


    .container {
      margin-right: auto;
      margin-left: auto;
      padding-left: 4px !important;

    }

    @media only screen and (max-width: 800px) {

      #no-more-tables table,
      #no-more-tables tbody,
      #no-more-tables td,
      #no-more-tables th,
      #no-more-tables thead,
      #no-more-tables tr {
        display: block
      }

      #no-more-tables thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px
      }

      #no-more-tables tr {
        border: 1px solid #ccc
      }

      #no-more-tables td {
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
        white-space: normal;
        text-align: left
      }

      #no-more-tables td:before {
        position: absolute;
        top: 6px;
        left: 6px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        text-align: left;
        font-weight: 700;
        content: attr(data-title)
      }

      #no-more-tables .no-data-title {
        padding-left: 5px !important
      }

      #no-more-tables .hide-data-title {
        display: none
      }
    }

    .calculator-table-form input[type=text],
    textarea {
      min-height: 32px;
      background: #fff;

      border: 1px solid #ccc;
      outline: none;
      padding-right: 5px;
      padding-left: 5px
    }

    .calculator-table-form select {
      min-height: 32px;
      background: #fff;

      border: 1px solid #ccc;
      outline: none;
    }

    .calculator-table-form input[type=text]:focus,
    textarea:focus,
    select:focus,
    select option:focus {
      min-height: 32px;
      background: #fff;

      border: 1px solid #ccc;
      outline: none;
      padding-right: 5px;
      padding-left: 5px
    }

    .calculator-table-form select {
      color: #7b7b7b;
    }

    .calculator-table-form select option {
      color: black;
    }
  </style>
  <style>
    #pop {
      padding: 0px 0px;
    }

    #example {
      position: relative;
    }

    .ref-link {
      font-size: 22px;
      color: #01adb9;
      text-decoration: none;
    }

    a.ref-link:hover {
      text-decoration: none;
    }

    .ref-tick sup {
      background: #00CCCC;
      color: #FFFFFF;
      margin: 2px;
      padding: 1px;
      font-size: 10px;
      top: -1.0em;
    }

    .refblack {
      color: #333333;
    }

    span.assign {
      background: #01adb9;
      border-radius: 0.8em;
      -moz-border-radius: 0.8em;
      -webkit-border-radius: 0.8em;
      color: #ffffff;
      display: inline-block;
      font-weight: bold;
      line-height: 1.6em;
      margin-right: 5px;
      text-align: center;
      width: 1.6em;
    }
  </style>

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

  <div class="calculator-table-form blue" id="gendercolor">

    <form name="h" method="post" >
      <table cellpadding="5" width="100%">
        <tr class="table-head">
          <td colspan="2">
            Nhập thông tin chi tiết của bạn
          </td>
        </tr>
        <tr>
          <td>Giới tính<span class="mandatory-star">*</span></td>
          <td><input type="radio" name="sex" value="Male" onclick="checkgender()">Nam <input type="radio" name="sex"
              value="Female" onclick="checkgender()">Nữ </td>
        </tr>
        <tr>
          <td width="50%">Tuổi<span class="mandatory-star">*</span></td>
          <td width="50%"><select name="age" id="age">
              <option value="-1">Chọn tuổi</option>

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

            </select></td>
        </tr>
        <tr>
          <td>Dân tộc<span class="mandatory-star">*</span></td>
          <td>
            <select name="ethnicity" id="ethnicity">
              <option value="Người Châu Á">Người Châu Á</option>
              <option value="Người châu Phi">Người châu Phi</option>
              <option value="Người da trắng">Người da trắng</option>
              <option value="Người Tây Ban Nha">Người Tây Ban Nha</option>
              <option value="Các nhóm dân cư khác">Các nhóm dân cư khác</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2"><span class="required">* Yêu cầu</span>
          </td>
        </tr>
        <tr>
          <td style="text-align: center" height="21" colspan="3">
            <input class="flat-btn" name="test" type="button"
              value="Làm bài kiểm tra" onClick="return Validate1()" ;> </td>

        </tr>
        <table border="0">
          <tr class="table-head">
          </tr>
          <tr id="hbt" style="display:none" class="table-head">
            <td height="18">
              Các câu hỏi
            </td>
            <td align="center" height="18" style="text-align: center;">1</td>
            <td align="center" height="18" style="text-align: center;">2</td>
            <td align="center" height="18" style="text-align: center;">3</td>
            <td align="center" height="18" style="text-align: center;">4</td>
            <td align="center" height="18" style="text-align: center;">5</td>
          </tr>
          <tr id="qn1" style="display:none">
            <td height="30">1. Chụp ảnh tự sướng mang lại cho tôi cảm giác tốt để tận hưởng cuộc sống xung quanh của mình tốt hơn

            </td>
            <td align="center" height="30"><input name="rd1" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd1" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd1" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd1" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd1" type="radio" value="5"></td>

          </tr>
          <tr id="qn2" style="display:none">
            <td height="30">2. Tôi có thể giảm hầu hết căng thẳng của mình bằng cách chụp ảnh tự sướng.


            </td>
            <td align="center" height="30"><input name="rd2" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd2" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd2" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd2" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd2" type="radio" value="5"></td>


          </tr>
          <tr id="qn3" style="display:none">
            <td height="30">3. Tôi cảm thấy tự tin khi chụp ảnh tự sướng


            </td>
            <td align="center" height="30"><input name="rd3" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd3" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd3" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd3" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd3" type="radio" value="5"></td>


          </tr>
          <tr id="qn4" style="display:none">
            <td height="30">4. Chụp các tư thế selfie khác nhau và đăng lên mạng xã hội giúp nâng cao vị thế xã hội của tôi


            </td>
            <td align="center" height="30"><input name="rd4" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd4" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd4" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd4" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd4" type="radio" value="5"></td>


          </tr>
          <tr id="qn5" style="display:none">
            <td height="30">5. Tôi trở nên tích cực hơn về bản thân khi tôi chụp ảnh tự sướng


            </td>
            <td align="center" height="30"><input name="rd5" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd5" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd5" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd5" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd5" type="radio" value="5"></td>



          </tr>
          <tr id="qn6" style="display:none">
            <td height="30">6. Chụp ảnh tự sướng giúp thay đổi tâm trạng của tôi ngay lập tức

            </td>
            <td align="center" height="30"><input name="rd6" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd6" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd6" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd6" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd6" type="radio" value="5"></td>



          </tr>
          <tr id="qn7" style="display:none">
            <td height="30">7. Tôi chụp ảnh tự sướng nhiều hơn và nhìn chúng một cách riêng tư để tăng cường sự tự tin của mình


            </td>
            <td align="center" height="30"><input name="rd7" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd7" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd7" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd7" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd7" type="radio" value="5"></td>



          </tr>
          <tr id="qn8" style="display:none">
            <td height="30">8. Chụp ảnh tự sướng lưu lại những kỷ niệm đẹp hơn về nhân dịp nào đó


            </td>
            <td align="center" height="30"><input name="rd8" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd8" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd8" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd8" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd8" type="radio" value="5"></td>


          </tr>
          <tr id="qn9" style="display:none">
            <td height="30">9. Tôi thường xuyên đăng ảnh tự chụp để nhận được nhiều lượt "thích" và bình luận trên mạng xã hội


            </td>
            <td align="center" height="30"><input name="rd9" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd9" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd9" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd9" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd9" type="radio" value="5"></td>


          </tr>
          <tr id="qn10" style="display:none">
            <td height="30">10. Chia sẻ ảnh tự chụp của tôi để thi đấu lành mạnh với bạn bè và đồng nghiệp của tôi


            </td>
            <td align="center" height="30"><input name="rd10" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd10" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd10" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd10" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd10" type="radio" value="5"></td>



          </tr>
          <tr id="qn11" style="display:none">
            <td height="30">11. Tôi tự chụp của mình trên mạng xã hội để nhận được nhiều sự chú ý


            </td>
            <td align="center" height="30"><input name="rd11" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd11" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd11" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd11" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd11" type="radio" value="5"></td>



          </tr>
          <tr id="qn12" style="display:none">
            <td height="30">12. Tôi dễ hòa nhập hơn trong nhóm đồng nghiệp của mình khi tôi chụp ảnh tự sướng và chia sẻ nó trên phương tiện truyền thông xã hội


            </td>
            <td align="center" height="30"><input name="rd12" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd12" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd12" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd12" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd12" type="radio" value="5"></td>



          </tr>
          <tr id="qn13" style="display:none">
            <td height="30">13. Tôi có thể thể hiện bản thân nhiều hơn thông qua ảnh tự sướng


            </td>
            <td align="center" height="30"><input name="rd13" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd13" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd13" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd13" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd13" type="radio" value="5"></td>



          </tr>
          <tr id="qn14" style="display:none">
            <td height="30">14. Tôi cảm thấy nổi tiếng hơn khi đăng ảnh tự chụp của mình trên mạng xã hội


            </td>
            <td align="center" height="30"><input name="rd14" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd14" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd14" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd14" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd14" type="radio" value="5"></td>



          </tr>
          <tr id="qn15" style="display:none">
            <td height="30">15. Chụp ảnh tự sướng giúp tôi cải thiện tâm trạng và khiến tôi cảm thấy hạnh phúc


            </td>
            <td align="center" height="30"><input name="rd15" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd15" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd15" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd15" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd15" type="radio" value="5"></td>



          </tr>
          <tr id="qn16" style="display:none">
            <td height="30">16. Tôi trở thành một thành viên chủ chốt của nhóm bạn của mình thông qua việc đăng ảnh tự sướng


            </td>
            <td align="center" height="30"><input name="rd16" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd16" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd16" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd16" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd16" type="radio" value="5"></td>


          </tr>
          <tr id="qn17" style="display:none">
            <td height="30">17. Bằng cách đăng ảnh tự chụp, tôi mong bạn bè bình luận về mình


            </td>
            <td align="center" height="30"><input name="rd17" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd17" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd17" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd17" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd17" type="radio" value="5"></td>



          </tr>
          <tr id="qn18" style="display:none">
            <td height="30">18. Khi tôi không chụp ảnh tự sướng, tôi cảm thấy bị tách biệt khỏi nhóm bạn đồng lứa của mình


            </td>
            <td align="center" height="30"><input name="rd18" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd18" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd18" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd18" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd18" type="radio" value="5"></td>



          </tr>
          <tr id="qn19" style="display:none">
            <td height="30">19. Tôi chụp ảnh tự sướng như những tài sản cho những kỷ niệm sau này


            </td>
            <td align="center" height="30"><input name="rd19" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd19" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd19" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd19" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd19" type="radio" value="5"></td>



          </tr>
          <tr id="qn20" style="display:none">
            <td height="30">20. Tôi sử dụng các công cụ chỉnh sửa ảnh để hoàn thiện ảnh tự sướng của mình trông đẹp hơn những người khác


            </td>
            <td align="center" height="30"><input name="rd20" type="radio" value="1"></td>
            <td align="center" height="30"><input name="rd20" type="radio" value="2"></td>
            <td align="center" height="30"><input name="rd20" type="radio" value="3"></td>
            <td align="center" height="30"><input name="rd20" type="radio" value="4"></td>
            <td align="center" height="30"><input name="rd20" type="radio" value="5"></td>



          </tr>


          <tr id="sub" style="display:none">
            <td height="21" colspan="3">
              <input class="flat-btn" name="Xác nhận" type="button" value="Xác nhận"
                id="submit_btn"> </td>
          </tr>
        </table>
      </table>
    </form>
  </div>
  <!-- <script language="javascript">
    document.onload = chec();
  </script> -->
  <div class="calculator-table-form blue" id="gendercolor_2" style="padding-top: 20px;display: none;">
    <table class="tv12black" cellpadding="5" cellspacing="1">
      <tbody>
        <tr class="table-head">
          <td colspan="2"><a align="justify">Kết quả</a></td>
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
          <td>Dân tộc</td>
          <td id="Ethnicity"></td>
        </tr>
        <tr>


        </tr>
        <tr>
          <td colspan="3" style="text-align: center;">
            Bạn thuộc nhóm Nghiện selfie (chụp ảnh tự sướng) <font color="red"><b id="nhom"></b></td>
        </tr>



        <tr>
          <td colspan="2">
            <div class="note"><b>Sự thật về chụp selfie: </b>Danny Bowman, được cho là người nghiện chụp selfie đầu tiên tại Anh.<br>
              Điều trị nghiện selfie ở Anh ghi nhận hơn 100 ca mỗi năm.<br>
              Càng tăng sự mong đợi về lượt “Thích” trên mạng xã hội, càng nhiều khả năng bạn bạn mắc chứng nghiện Selfie.<br>
              Hành vi thích chụp ảnh selfie quá đà có thể dẫn đến tổn thương não bộ đặc biệt là thiếu sự tự tin.<br>
              Các nghiên cưu cho thấy sự liên quan giữa nghiện chụp selfie với sự tự ti bản thân.
              </div>
            <div class="pad10"></div>

          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <script TYPE="text/javascript">
    jQuery(document).ready(function () {
      $('#submit_btn').click(function () {
        var sex = $("input[name='sex']:checked").val();
        var age = $("#age").val();
        var ethnicity = $("#ethnicity :selected").text();
        if($("input[name='rd1']:checked").val() != undefined){
          var rd1 = $("input[name='rd1']:checked").val();
        } else {
          var rd1 = 0;
        }
        if($("input[name='rd2']:checked").val() != undefined){
          var rd2 = $("input[name='rd2']:checked").val();
        } else {
          var rd2 = 0;
        }
        if($("input[name='rd3']:checked").val() != undefined){
          var rd3 = $("input[name='rd3']:checked").val();
        } else {
          var rd3 = 0;
        }
        if($("input[name='rd4']:checked").val() != undefined){
          var rd4 = $("input[name='rd4']:checked").val();
        } else {
          var rd4 = 0;
        }
        if($("input[name='rd5']:checked").val() != undefined){
          var rd5 = $("input[name='rd5']:checked").val();
        } else {
          var rd5 = 0;
        }
        if($("input[name='rd6']:checked").val() != undefined){
          var rd6 = $("input[name='rd6']:checked").val();
        } else {
          var rd6 = 0;
        }
        if($("input[name='rd7']:checked").val() != undefined){
          var rd7 = $("input[name='rd7']:checked").val();
        } else {
          var rd7 = 0;
        }
        if($("input[name='rd8']:checked").val() != undefined){
          var rd8 = $("input[name='rd8']:checked").val();
        } else {
          var rd8 = 0;
        }
        if($("input[name='rd9']:checked").val() != undefined){
          var rd9 = $("input[name='rd9']:checked").val();
        } else {
          var rd9 = 0;
        }
        if($("input[name='rd10']:checked").val() != undefined){
          var rd10 = $("input[name='rd10']:checked").val();
        } else {
          var rd10 = 0;
        }
        if($("input[name='rd11']:checked").val() != undefined){
          var rd11 = $("input[name='rd11']:checked").val();
        } else {
          var rd11 = 0;
        }
        if($("input[name='rd12']:checked").val() != undefined){
          var rd12 = $("input[name='rd12']:checked").val();
        } else {
          var rd12 = 0;
        }
        if($("input[name='rd13']:checked").val() != undefined){
          var rd13 = $("input[name='rd13']:checked").val();
        } else {
          var rd13 = 0;
        }
        if($("input[name='rd4']:checked").val() != undefined){
          var rd14 = $("input[name='rd14']:checked").val();
        } else {
          var rd14 = 0;
        }
        if($("input[name='rd15']:checked").val() != undefined){
          var rd15 = $("input[name='rd15']:checked").val();
        } else {
          var rd15 = 0;
        }
        if($("input[name='rd16']:checked").val() != undefined){
          var rd16 = $("input[name='rd16']:checked").val();
        } else {
          var rd16 = 0;
        }
        if($("input[name='rd17']:checked").val() != undefined){
          var rd17 = $("input[name='rd17']:checked").val();
        } else {
          var rd17 = 0;
        }
        if($("input[name='rd18']:checked").val() != undefined){
          var rd18 = $("input[name='rd18']:checked").val();
        } else {
          var rd18 = 0;
        }
        if($("input[name='rd19']:checked").val() != undefined){
          var rd19 = $("input[name='rd19']:checked").val();
        } else {
          var rd19 = 0;
        }
        if($("input[name='rd20']:checked").val() != undefined){
          var rd20 = $("input[name='rd20']:checked").val();
        } else {
          var rd20 = 0;
        }
        if ( Number(rd1) * Number(rd2) * Number(rd3)* Number(rd4)* Number(rd5) * Number(rd6) * Number(rd7)* Number(rd8) * Number(rd9) * Number(rd10) * Number(rd11) * Number(rd12) * Number(rd13) * Number(rd14) * Number(rd15) * Number(rd16) * Number(rd17) * Number(rd18) * Number(rd19)* Number(rd20) == 0) {
          alert('Hãy làm bài kiểm tra bằng cách trả lời từng câu, từ 1 đến 20!');
          return false;
        }
        var total = Number(rd1) + Number(rd2) + Number(rd3) + Number(rd4) + Number(rd5) + Number(rd6) + Number(rd7) + Number(rd8) + Number(rd9) + Number(rd10) + Number(rd11) + Number(rd12) + Number(rd13) + Number(rd14) + Number(rd15) + Number(rd16) + Number(rd17) + Number(rd18) + Number(rd19) + Number(rd20);
        if (sex == 'Male') {
          $('#form_sex').html('Nam');
        } else {
          $('#form_sex').html('Nữ');
        }
        if (total >= 34 && total <= 67){
          $('#nhom').html("Cấp tính");
        } else if (total >= 68 && total <= 100){
          $('#nhom').html("Kéo dài");
        } else if (total >= 0 && total <= 33){
          $('#nhom').html("Ranh giới");
        } 
        $('#form_age').html(age);
        $('#Ethnicity').html(ethnicity);
        $('#gendercolor_2').css('display', 'block');
      })
    });
    

    function Validate1() {
      gender = 0; for (i = 0; i < 2; i++) { if (h.sex[i].checked) { gender = 1; } }
      if (!gender) { alert("Vui lòng chọn giới tính!"); document.h.sex[0].focus(); return false; }
      if (document.h.age.value == "-1") { alert("Vui lòng chọn tuổi!"); return false; }

      else {
        ans = true;
      }
      document.getElementById("hbt").style.display = '';
      document.getElementById("qn1").style.display = '';
      document.getElementById("qn2").style.display = '';
      document.getElementById("qn3").style.display = '';
      document.getElementById("qn4").style.display = '';
      document.getElementById("qn5").style.display = '';
      document.getElementById("qn6").style.display = '';
      document.getElementById("qn7").style.display = '';
      document.getElementById("qn8").style.display = '';
      document.getElementById("qn9").style.display = '';
      document.getElementById("qn10").style.display = '';

      document.getElementById("qn11").style.display = '';
      document.getElementById("qn12").style.display = '';
      document.getElementById("qn13").style.display = '';
      document.getElementById("qn14").style.display = '';
      document.getElementById("qn15").style.display = '';

      document.getElementById("qn16").style.display = '';
      document.getElementById("qn17").style.display = '';
      document.getElementById("qn18").style.display = '';
      document.getElementById("qn19").style.display = '';
      document.getElementById("qn20").style.display = '';
      document.getElementById("sub").style.display = '';
    }

    function checkgender() { if (document.h.sex[0].checked) { gendercolor.className = "calculator-table-form blue"; } else { gendercolor.className = "calculator-table-form pink"; } }



    function Validateage(idd) {
      var time = document.getElementById(idd.id);
      if (!time.value.match(/^[0-9]+(\.[0-9]+)?$/)) { alert("Vui lòng nhập Tuổi hợp lệ"); time.value = ""; time.focus(); return false; }
    }
  </script>
<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}