<?php
if(!function_exists('test_your_happiness_score')){

function test_your_happiness_score(){
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
                jQuery(document).ready(function () {
                    $('#submit_btn').click(function () {
                        var sex = $("input[name='sex']:checked").val();
                        var age = $("input[name='age']").val();
                        var ethnicity = $("#ethnicity :selected").text();
                        if(ethnicity == 'Ch???n'){
                            alert('B???n ch??a ch???n d??n t???c!');
                            return false;
                        }
                        if(age == ""){
                            alert('B???n ch??a nh???p tu???i!');
                            return false;
                        }
                        if(!age.match(/^[0-9]+(\.[0-9]+)?$/)){
                            alert("Vui l??ng ch???n tu???i h???p l???!");
                            return false;
                        }
                        if (sex != 'male' && sex != 'female'){
                            alert('B???n ch??a ch???n gi???i t??nh');
                            return false;
                        }
                        if ($("input[name='q1']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q2']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q3']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q4']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q5']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q6']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q7']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q8']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q9']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q10']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q11']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q12']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q13']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q14']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q15']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q16']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q17']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q18']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q19']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q20']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q21']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q22']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q23']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q24']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q25']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q26']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q27']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q28']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q29']:checked").val() == undefined){
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }

                        var total = 0;
                        $.map($("input[name!='sex']:radio:checked"), function (params, id) {
                            total += parseInt($(params).val());
                        });
                        var total_ = total/29;
                        if(total_ > 0 && total_ <3 ){
                            $('#status').html("Kh??ng h???nh ph??c");
                            $('#content').html("N???u b???n tr??? l???i th??nh th???t v?? b??? ??i???m r???t th???p, c?? l??? b???n ??ang th???y t??nh h??nh c???a b???n th??n v?? b???n t???i t??? h??n th???c t???");
                        } else if(total_ >= 2 && total_ <= 3 ){
                            $('#status').html("H??i kh??ng h???nh ph??c");
                            $('#content').html("H??y th??? m???t s??? b??i t???p tr??n trang web n??y nh?? Gratitude Journal & Gratitude Lists , ho???c Gratitude Visit");
                        } else if(total_ >= 3 && total_ <= 4 ){
                            $('#status').html("Kh??ng th???c s??? h???nh ph??c");
                            $('#content').html("??i???m 3,5 s??? l?? con s??? trung b??nh ch??nh x??c c???a c??c c??u tr??? l???i h??i l??ng v?? kh??ng h??i l??ng. M???t s??? b??i t???p ???????c ????? c???p ??? tr??n ???? ???????c th??? nghi???m trong c??c nghi??n c???u khoa h???c v?? ???????c ch???ng minh l?? gi??p m???i ng?????i h???nh ph??c h??n l??u d??i.");
                        } else if(total_ ==4 ){
                            $('#status').html("H???nh ph??c v???a ph???i");
                            $('#content').html("Th???a m??n. ????y l?? nh???ng g?? m???t ng?????i b??nh th?????ng cho ??i???m.");
                        } else if(total_ >= 4 && total_ <= 5 ){
                            $('#status').html("Kh?? h???nh ph??c");
                            $('#content').html("");
                        } else if(total_ >= 5 && total_ <= 6 ){
                            $('#status').html("R???t h???nh ph??c");
                            $('#content').html("H???nh ph??c c?? nhi???u l???i ??ch h??n l?? ch??? c???m th???y t???t. N?? t????ng quan v???i nh???ng l???i ??ch nh?? s???c kh???e, h??n nh??n t???t h??n v?? ?????t ???????c m???c ti??u c???a b???n");
                        } else if(total_ == 6 ){
                            $('#status').html("Qu?? h???nh ph??c");
                            $('#content').html("Nghi??n c???u g???n ????y d?????ng nh?? cho th???y r???ng c?? m???t m???c ????? h???nh ph??c t???i ??u cho nh???ng vi???c nh?? l??m t???t ??? c?? quan ho???c tr?????ng h???c, ho???c ????? c?? l???i cho s???c kh???e, v?? r???ng qu?? h???nh ph??c c?? th??? li??n quan ?????n m???c ????? th???p h??n c???a nh???ng th??? nh?? v???y");
                        }
                        var round_ = Math.round(total_,2);
                        $('#total').html(round_);
                        $('#form_kq2').css('display', 'block');
                    });
                });
                function checkgender(){if (document.frmcal.sex[0].checked){gendercolor.className = "calculator-table-form blue";} else {gendercolor.className = "calculator-table-form pink"; } }
            </script>
            <div class="calculator-table-form blue" id="gendercolor">
                <form method="post" name="frmcal">

                    <table cellpadding="5" width="100%" class="bluebox2 tv12blue">
                        <tbody>
                            <tr class="table-head">
                                <td colspan="2">Tr??? l???i t???t c??? c??c c??u h???i m???t c??ch trung th???c</td>
                            </tr>
                            <tr>
                                <td>Gi???i t??nh</td>
                                <td><input type="radio" name="sex" value="male" onclick="checkgender()">Nam <input
                                        type="radio" name="sex" value="female" onclick="checkgender()">N??? </td>
                            </tr>
                            <tr>
                                <td width="50%">Tu???i</td>
                                <td width="50%">
                                    <input id="ag" type="text" maxlength="3" name="age" style="width: 65px"></td>
                            </tr>
                            <tr>
                                <td>D??n t???c</td>
                                <td><select name="ethnicity" style="width: 67px" id="ethnicity">
                                        <option value="-1">Ch???n</option>
                                        <option value="0">Ng?????i Ch??u ??</option>
                                        <option value="1">Ng?????i ch??u Phi</option>
                                        <option value="2">Ng?????i da tr???ng</option>
                                        <option value="3">Ng?????i T??y Ban Nha</option>
                                        <option value="4">C??c nh??m d??n c?? kh??c</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="1" cellpadding="0" cellspacing="0" bordercolor="#429fe2" width="100%"
                        class="content15">
                        <tbody>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">1.

                                </td>
                                <td width="312" class="bluebox2">
                                    T??i kh??ng c???m th???y ?????c bi???t h??i l??ng v???i c??ch s???ng c???a t??i?<sup class="red">*</sup>

                                    <br>
                                    <br>
                                    <input type="radio" name="q1" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q1" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q1" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q1" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q1" value="2">?????ng ??<br>
                                    <input type="radio" name="q1" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    2
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i r???t quan t??m ?????n ng?????i kh??c?<sup class="red">*</sup>

                                    <br>
                                    <br>

                                    <input type="radio" name="q2" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q2" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q2" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q2" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q2" value="5">?????ng ??<br>
                                    <input type="radio" name="q2" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    3
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i c???m th???y r???ng cu???c s???ng r???t b??? ??ch?<sup class="red">*</sup>
                                    <br>
                                    <br>


                                    <input type="radio" name="q3" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q3" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q3" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q3" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q3" value="5">?????ng ??<br>
                                    <input type="radio" name="q3" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    4
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i c?? t??nh c???m r???t ???m ??p ?????i v???i h???u h???t m???i ng?????i?<sup
                                        class="red">*</sup><br>
                                    <br>


                                    <input type="radio" name="q4" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q4" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q4" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q4" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q4" value="5">?????ng ??<br>
                                    <input type="radio" name="q4" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    5
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i hi???m khi th???c d???y v???i c???m gi??c ???????c ngh??? ng??i?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q5" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q5" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q5" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q5" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q5" value="2">?????ng ??<br>
                                    <input type="radio" name="q5" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    6
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i kh??ng ?????c bi???t l???c quan v??? t????ng lai?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q6" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q6" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q6" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q6" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q6" value="2">?????ng ??<br>
                                    <input type="radio" name="q6" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    7
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i th???y h???u h???t m???i th??? ?????u th?? v????<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q7" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q7" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q7" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q7" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q7" value="5">?????ng ??<br>
                                    <input type="radio" name="q7" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    8
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i lu??n cam k???t v?? tham gia?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q8" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q8" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q8" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q8" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q8" value="5">?????ng ??<br>
                                    <input type="radio" name="q8" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    9
                                </td>
                                <td width="312" class="bluebox2">
                                    Cu???c s???ng t???t ?????p?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q9" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q9" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q9" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q9" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q9" value="5">?????ng ??<br>
                                    <input type="radio" name="q9" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    10
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i kh??ng ngh?? r???ng th??? gi???i l?? m???t n??i t???t ?????p?<sup
                                        class="red">*</sup>
                                    <br>
                                    <br>
                                    <input type="radio" name="q10" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q10" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q10" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q10" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q10" value="2">?????ng ??<br>
                                    <input type="radio" name="q10" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">11.

                                </td>
                                <td width="312" class="bluebox2">
                                    T??i c?????i r???t nhi???u?<sup class="red">*</sup>

                                    <br>
                                    <br>
                                    <input type="radio" name="q11" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q11" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q11" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q11" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q11" value="5">?????ng ??<br>
                                    <input type="radio" name="q11" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    12
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i h??i l??ng v??? m???i th??? trong cu???c s???ng c???a m??nh?<sup class="red">*</sup>

                                    <br>
                                    <br>

                                    <input type="radio" name="q12" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q12" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q12" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q12" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q12" value="5">?????ng ??<br>
                                    <input type="radio" name="q12" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    13
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i kh??ng ngh?? m??nh tr??ng h???p d???n?<sup class="red">*</sup>
                                    <br>
                                    <br>


                                    <input type="radio" name="q13" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q13" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q13" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q13" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q13" value="2">?????ng ??<br>
                                    <input type="radio" name="q13" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    14
                                </td>
                                <td width="312" class="bluebox2">
                                    C?? m???t kho???ng c??ch gi???a nh???ng g?? t??i mu???n l??m v?? nh???ng g?? t??i ???? l??m?<sup
                                        class="red">*</sup><br>
                                    <br>


                                    <input type="radio" name="q14" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q14" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q14" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q14" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q14" value="2">?????ng ??<br>
                                    <input type="radio" name="q14" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    15
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i r???t h???nh ph??c?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q15" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q15" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q15" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q15" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q15" value="5">?????ng ??<br>
                                    <input type="radio" name="q15" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    16
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i t??m th???y v??? ?????p ??? m???t s??? th????<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q16" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q16" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q16" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q16" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q16" value="5">?????ng ??<br>
                                    <input type="radio" name="q16" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    17
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i lu??n c?? t??c d???ng vui v??? ?????i v???i ng?????i kh??c?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q17" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q17" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q17" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q17" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q17" value="5">?????ng ??<br>
                                    <input type="radio" name="q17" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    18
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i c?? th??? ph?? h???p (t??m th???i gian cho) m???i th??? t??i mu???n?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q18" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q18" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q18" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q18" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q18" value="5">?????ng ??<br>
                                    <input type="radio" name="q18" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    19
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i c???m th???y r???ng t??i kh??ng ?????c bi???t ki???m so??t cu???c s???ng c???a m??nh?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q19" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q19" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q19" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q19" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q19" value="2">?????ng ??<br>
                                    <input type="radio" name="q19" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    20
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i c???m th???y c?? th??? ?????m nh???n b???t c??? ??i???u g???<sup
                                        class="red">*</sup>
                                    <br>
                                    <br>
                                    <input type="radio" name="q20" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q20" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q20" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q20" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q20" value="5">?????ng ??<br>
                                    <input type="radio" name="q20" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">21.

                                </td>
                                <td width="312" class="bluebox2">
                                    T??i c???m th???y tinh th???n ho??n to??n t???nh t??o?<sup class="red">*</sup>

                                    <br>
                                    <br>
                                    <input type="radio" name="q21" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q21" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q21" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q21" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q21" value="5">?????ng ??<br>
                                    <input type="radio" name="q21" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    22
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i th?????ng tr???i nghi???m ni???m vui v?? s??? ph???n ch???n?<sup class="red">*</sup>

                                    <br>
                                    <br>

                                    <input type="radio" name="q22" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q22" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q22" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q22" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q22" value="5">?????ng ??<br>
                                    <input type="radio" name="q22" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    23
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i kh??ng th???y d??? d??ng ????? ????a ra quy???t ?????nh?<sup class="red">*</sup>
                                    <br>
                                    <br>


                                    <input type="radio" name="q23" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q23" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q23" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q23" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q23" value="2">?????ng ??<br>
                                    <input type="radio" name="q23" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    24
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i kh??ng c?? ?? ngh??a v?? m???c ????ch c??? th??? trong cu???c s???ng c???a m??nh?<sup
                                        class="red">*</sup><br>
                                    <br>


                                    <input type="radio" name="q24" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q24" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q24" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q24" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q24" value="2">?????ng ??<br>
                                    <input type="radio" name="q24" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    25
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i c???m th???y m??nh c?? r???t nhi???u n??ng l?????ng?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q25" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q25" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q25" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q25" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q25" value="5">?????ng ??<br>
                                    <input type="radio" name="q25" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    26
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i th?????ng c?? ???nh h?????ng t???t ?????n c??c s??? ki???n?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q26" value="1">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q26" value="2">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q26" value="3">Ph??n v??n<br>
                                    <input type="radio" name="q26" value="4">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q26" value="5">?????ng ??<br>
                                    <input type="radio" name="q26" value="6">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    27
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i kh??ng c?? ni???m vui v???i ng?????i kh??c?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q27" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q27" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q27" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q27" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q27" value="2">?????ng ??<br>
                                    <input type="radio" name="q27" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    28
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i kh??ng c???m th???y ?????c bi???t kh???e m???nh?<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q28" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q28" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q28" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q28" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q28" value="2">?????ng ??<br>
                                    <input type="radio" name="q28" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="34" class="bluebox2" valign="top">
                                    29
                                </td>
                                <td width="312" class="bluebox2">
                                    T??i kh??ng c?? nh???ng k??? ni???m ?????c bi???t vui v??? trong qu?? kh????<sup class="red">*</sup>

                                    <br>
                                    <br>


                                    <input type="radio" name="q29" value="6">R???t kh??ng ?????ng ??<br>
                                    <input type="radio" name="q29" value="5">Kh??ng ?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q29" value="4">Ph??n v??n<br>
                                    <input type="radio" name="q29" value="3">?????ng ?? m???t ph???n<br>
                                    <input type="radio" name="q29" value="2">?????ng ??<br>
                                    <input type="radio" name="q29" value="1">R???t ?????ng ??<br>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p align="left" class="red">* T???t c??? c??c c??u h???i cho b??i ki???m tra H???nh ph??c l?? B???t bu???c</p>
                                    <input type="button" value="X??c nh???n" class="flat-btn" id="submit_btn">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="calculator-table-form blue" style="padding-top: 20px; display: none;" id="form_kq2">

                <table border="0" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" bordercolor="#0593E2"
                    width="100%" class="content15">
                    <tbody>
                        <tr class="table-head">
                            <td height="20" colspan="2" align="middle" class="bgblue7" width="100%" id="status" style="text-align: center;"></td>
                        </tr>
                        <tr>
                            <td width="164" style="padding-left:5px" align="center" valign="middle"><b>
                                    <br>S??? ??i???m c???a b???n l??<br>
                                </b><br></td>

                            <td width="162" style="padding-left:5px">
                                <font size="4" color="#FF0000"><b id="total"></b></font>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" colspan="2" align="justify" style="padding-left:5px"
                                class="bluebox2 CalcDarkBgWhite1">
                                <p style="margin-left: 6;text-align:justify;" id="content">
                                    
                                </p>
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