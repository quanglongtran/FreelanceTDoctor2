<?php
if(!function_exists('happiness_test')){

function happiness_test(){
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
                        var ethnicity = $("#ethnicity :selected").text();
                        if (ethnicity == 'Ch???n') {
                            alert('B???n ch??a ch???n ch???ng t???c!');
                            return false;
                        }
                        if (sex != 'male' && sex != 'female') {
                            alert('B???n ch??a ch???n gi???i t??nh');
                            return false;
                        }
                        if ($("input[name='q1']:checked").val() == undefined) {
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q2']:checked").val() == undefined) {
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q3']:checked").val() == undefined) {
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q4']:checked").val() == undefined) {
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }
                        if ($("input[name='q5']:checked").val() == undefined) {
                            alert('B???n ch??a tr??? l???i c??u h???i!');
                            return false;
                        }

                        var total_ = 0;
                        $.map($("input[name!='sex']:radio:checked"), function (params, id) {
                            total_ += parseInt($(params).val());
                        });
                        if (total_ >= 31 && total_ <= 35) {
                            $('#muc_do').html("C???c k?? h??i l??ng");
                            $('#content').html("B???n c???c k?? h??i l??ng. ??i???m s??? n??y cho th???y b???n y??u cu???c s???ng hi???n t???i. c???m th???y th?? v??? v?? m???i th??? ??ang di???n ra t???t ?????p v???i b???n.");
                        } else if (total_ >= 26 && total_ <= 30) {
                            $('#muc_do').html("H??i l??ng");
                            $('#content').html("H??i l??ng. B???n th???y th??ch cu???c s???ng c???a b???n, h???u h???t c??c l??nh v???c trong cu???c s???ng ?????u thu???n l???i v???i b???n.");
                        } else if (total_ >= 21 && total_ <= 25) {
                            $('#muc_do').html("H??i l??ng ??t");
                            $('#content').html("B???n h??i l??ng ??t. Nh??n chung b???n h??i l??ng v???i cu???c s???ng c???a m??nh nh??ng m???t s??? l??nh v???c c??n c???n c???i thi???n. b???n mu???n chuy???n sang m???t c???p ????? cao h??n b???ng c??ch thay ?????i cu???c s???ng.");
                        } else if (total_ == 20) {
                            $('#muc_do').html("Trung l???p");
                            $('#content').html("B???n h??i l??ng ??? m???c trung b??nh.");
                        } else if (total_ >= 15 && total_ <= 19) {
                            $('#muc_do').html("Kh??ng h??i l??ng ??t");
                            $('#content').html("B???n ??ang kh??ng h??i l??ng ????ng k???. C?? r???t nhi???u l??nh v???c trong cu???c s???ng c???a b???n c?? v???n ?????. C???n thay ?????i th??i ?????, l???i suy ngh?? v?? c??c ho???t ?????ng s???ng. S??? b???t h???nh c?? th??? l?? tr??? ng???i cho m???t s??? ho???t ?????ng b??nh th?????ng, t?? v???n c?? th??? c?? ??ch cho b???n.");
                        } else if (total_ >= 10 && total_ <= 14) {
                            $('#muc_do').html("Kh??ng h??i l??ng");
                            $('#content').html("V??? c?? b???n, b???n kh??ng h??i l??ng v???i cu???c s???ng hi???n t???i c???a m??nh. B???n c???n s??? tr??? gi??p t??? chuy??n gia.");
                        } else if (total_ >= 5 && total_ <= 9) {
                            $('#muc_do').html("C???c k?? kh??ng h??i l??ng");
                            $('#content').html("V??? c?? b???n, b???n kh??ng h??i l??ng v???i cu???c s???ng hi???n t???i c???a m??nh. B???n c???n s??? tr??? gi??p t??? chuy??n gia.");
                        }
                        $('#total').html(total_);
                        $('#form_kq2').css('display', 'block');
                    });
                });
                function checkgender() { if (document.frmcal.sex[0].checked) { gendercolor.className = "calculator-table-form blue"; } else { gendercolor.className = "calculator-table-form pink"; } }
            </script>
            <div class="calculator-table-form blue auto-scrollx" id="gendercolor">
                <form method="post" name="frmcal">

                    <table cellpadding="5" width="100%" class="bluebox2 tv12blue">
                        <tbody>
                            <tr class="table-head">
                                <td colspan="2">Ki???m tra m???c ????? h???nh ph??c c???a b???n</td>
                            </tr>
                            <tr>
                                <td>Gi???i t??nh</td>
                                <td><input type="radio" name="sex" value="male" onclick="checkgender()">Nam <input
                                        type="radio" name="sex" value="female" onclick="checkgender()">N??? </td>
                            </tr>
                            <tr>
                                <td>Ch???ng t???c</td>
                                <td><select name="ethnicity" style="width: 100px" id="ethnicity">
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
                    <table border="0">

                        <tbody>

                            <tr>
                                <td bgcolor="#FF99CC" height="21">
                                    <p style="margin-left: 3; margin-right: 3"><b></b></p>
                                </td>
                                <td align="center" bgcolor="#FF82C0" height="21"><b>C???c k?? kh??ng ?????ng ??</b></td>
                                <td align="center" bgcolor="#FF55AA" height="21"><b>Kh??ng ?????ng ??</b></td>
                                <td align="center" bgcolor="#FF379B" height="21"><b>Kh??ng ?????ng ?? ??t</b></td>
                                <td align="center" bgcolor="#FF2492" height="21"><b>Kh??ng ?????ng ?? c??ng kh??ng ph???n ?????i</b></td>
                                <td align="center" bgcolor="#FF0984" height="21"><b>?????ng ?? ??t</b></td>
                                <td align="center" bgcolor="#F00078" height="21"><b>?????ng ??</b></td>
                                <td align="center" bgcolor="#E80074" height="21"><b>C???c k?? ?????ng ??</b></td>
                            </tr>
                            <tr>
                                <td height="21"><b>Trong h???u h???t c??c m???t, cu???c s???ng c???a t??i g???n gi???ng cu???c s???ng l?? t?????ng c???a t??i.</b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="1"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="2"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="3"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="4"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="5"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="6"></b></td>
                                <td align="center" height="21"><b><input name="q1" type="radio" value="7"></b></td>

                            </tr>
                            <tr>
                                <td height="21"><b>Nh??n chung ??i???u ki???n s???ng c???a t??i ho??n h???o.</b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="1"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="2"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="3"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="4"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="5"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="6"></b></td>
                                <td align="center" height="21"><b><input name="q2" type="radio" value="7"></b></td>
                            </tr>
                            <tr>
                                <td height="21"><b>T??i th???y h??i l??ng v???i cu???c s???ng c???a t??i.</b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="1"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="2"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="3"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="4"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="5"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="6"></b></td>
                                <td align="center" height="21"><b><input name="q3" type="radio" value="7"></b></td>
                            </tr>
                            <tr>
                                <td height="21"><b>Cho ?????n nay t??i ???? c?? ???????c nh???ng ??i???u quan tr???ng m?? t??i mu???n trong ?????i m??nh.</b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="1"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="2"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="3"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="4"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="5"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="6"></b></td>
                                <td align="center" height="21"><b><input name="q4" type="radio" value="7"></b></td>
                            </tr>
                            <tr>
                                <td height="22"><b>N???u t??i c?? th??? s???ng l???i cu???c ?????i c???a m??nh, t??i s??? h???u nh?? kh??ng thay ?????i g??.</b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="1"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="2"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="3"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="4"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="5"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="6"></b></td>
                                <td align="center" height="22"><b><input name="q5" type="radio" value="7"></b></td>
                            </tr>
                            <tr>

                                <td colspan="8">
                                    <input type="button" value="N???p" class="flat-btn" id="submit_btn">
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
                        <tr>
                            <td width="164" style="padding-left:5px; text-align: center;" align="center"
                                valign="middle"><b>
                                    T???ng ??i???m c???a b???n l??: <font size="4" color="#FF0000"><b id="total"></b></font>
                                </b><br></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                <b>M???c ????? h???nh ph??c c???a b???n l??: </b>
                                <font size="4" color="#FF0000"><b id="muc_do"></b></font>
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" colspan="2" align="justify" style="padding-left:5px;"
                                class="bluebox2 CalcDarkBgWhite1">
                                <p style="margin-left: 6;text-align:justify; text-align: center;" id="content">

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