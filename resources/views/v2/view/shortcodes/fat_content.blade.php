<?php
if(!function_exists('fat_content')){

function fat_content(){
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
                    var orders = [
                            {
                                "name": "B?? ???? ???????c ??un ch???y v?? b?? s???a tr??u l???ng",
                                "tab1": "46 g",
                                "tab2": "29,2 g",
                                "tab3": "11,9 g",
                                "tab4": "1,7 g"
                            },
                            {
                                "name": "D???u b?? khan",
                                "tab1": "99,48 g",
                                "tab2": "61,92 g",
                                "tab3": "28,73 g",
                                "tab4": "3,69 g"
                            },
                            {
                                "name": "D???u h???t lanh, ??p l???nh",
                                "tab1": "99.98 g",
                                "tab2": "8.98 g",
                                "tab3": "18.44 g",
                                "tab4": "67.85 g"
                            },
                            {
                                "name": "D???u c??y rum, salad ho???c n???u ??n, linoleic (H??n 70%)",
                                "tab1": "100 g",
                                "tab2": "6.2 g",
                                "tab3": "14.36 g",
                                "tab4": "74.62 g"
                            },
                            {
                                "name": "D???u h???t m??",
                                "tab1": "100 g",
                                "tab2": "6.3 g",
                                "tab3": "60 g",
                                "tab4": "29.3 g"
                            },
                            {
                                "name": "D???u h???t c???i",
                                "tab1": "100 g",
                                "tab2": "7.36 g",
                                "tab3": "63.28 g",
                                "tab4": "28.14 g"
                            },
                            {
                                "name": "D???u h???t ph???",
                                "tab1": "100 g",
                                "tab2": "7.4 g",
                                "tab3": "78 g",
                                "tab4": "10.2 g"
                            },
                            {
                                "name": "D???u ng?? v?? c???i d???u",
                                "tab1": "100 g",
                                "tab2": "8.03 g",
                                "tab3": "58.54 g",
                                "tab4": "29.11 g"
                            },
                            {
                                "name": "D???u ?????u ph???ng, salad ho???c n???u ??n",
                                "tab1": "100 g",
                                "tab2": "16.9 g",
                                "tab3": "46.2 g",
                                "tab4": "32 g"
                            },
                            {
                                "name": "D???u m???m l??a m??",
                                "tab1": "100 g",
                                "tab2": "18.8 g",
                                "tab3": "15.1 g",
                                "tab4": "61.7 g"
                            },
                            {
                                "name": "D???u y???n m???ch",
                                "tab1": "100 g",
                                "tab2": "19.62 g",
                                "tab3": "35.11 g",
                                "tab4": "40.87 g"
                            },
                            {
                                "name": "D???u c?? chua",
                                "tab1": "100 g",
                                "tab2": "19.7 g",
                                "tab3": "22.8 g",
                                "tab4": "53.1 g"
                            },
                            {
                                "name": "D???u c??m g???o",
                                "tab1": "100 g",
                                "tab2": "19.7 g",
                                "tab3": "39.3 g",
                                "tab4": "35 g"
                            },
                            {
                                "name": "D???u c?? h???i",
                                "tab1": "100 g",
                                "tab2": "19.87 g",
                                "tab3": "29.04 g",
                                "tab4": "40.32 g"
                            },
                            {
                                "name": "D???u tr?? xanh",
                                "tab1": "100 g",
                                "tab2": "21.1 g",
                                "tab3": "51.5 g",
                                "tab4": "23 g"
                            },
                            {
                                "name": "D???u c?? tr??ch",
                                "tab1": "100 g",
                                "tab2": "21.29 g",
                                "tab3": "56.56 g",
                                "tab4": "15.6 g"
                            },
                            {
                                "name": "D???u gan c?? tuy???t",
                                "tab1": "100 g",
                                "tab2": "22.61 g",
                                "tab3": "46.71 g",
                                "tab4": "22.54 g"
                            },
                            {
                                "name": "D???u h???t b??ng, salad ho???c n???u ??n",
                                "tab1": "100 g",
                                "tab2": "25.9 g",
                                "tab3": "17.8 g",
                                "tab4": "51.9 g"
                            },
                            {
                                "name": "D???u c?? m??i",
                                "tab1": "100 g",
                                "tab2": "29.89 g",
                                "tab3": "33.84 g",
                                "tab4": "31.87 g"
                            },
                            {
                                "name": "D???u c?? menhaden",
                                "tab1": "100 g",
                                "tab2": "30.43 g",
                                "tab3": "26.69 g",
                                "tab4": "34.2 g"
                            },
                            {
                                "name": "D???u h???t m??? h???u c??",
                                "tab1": "100 g",
                                "tab2": "46.6 g",
                                "tab3": "44 g",
                                "tab4": "5.2 g"
                            },
                            {
                                "name": "D???u c???",
                                "tab1": "100 g",
                                "tab2": "49.3 g",
                                "tab3": "37 g",
                                "tab4": "9.3 g"
                            },
                            {
                                "name": "D???u b?? ca cao",
                                "tab1": "100 g",
                                "tab2": "59.7 g",
                                "tab3": "32.9 g",
                                "tab4": "3 g"
                            },
                            {
                                "name": "D???u h???nh nh??n",
                                "tab1": "100 g",
                                "tab2": "8.2 g",
                                "tab3": "69.9 g",
                                "tab4": "17.4 g"
                            },
                            {
                                "name": "D???u ??c ch??",
                                "tab1": "100 g",
                                "tab2": "9.1 g",
                                "tab3": "22.8 g",
                                "tab4": "63.3 g"
                            },
                            {
                                "name": "D???u h???t nho",
                                "tab1": "100 g",
                                "tab2": "9.6 g",
                                "tab3": "16.1 g",
                                "tab4": "69.9 g"
                            },
                            {
                                "name": "D???u h?????ng d????ng, oleic cao (>70%)",
                                "tab1": "100 g",
                                "tab2": "9.86 g",
                                "tab3": "83.69 g",
                                "tab4": "3.8 g"
                            },
                            {
                                "name": "D???u h?????ng d????ng, linoleic (<60%)",
                                "tab1": "100 g",
                                "tab2": "10.1 g",
                                "tab3": "45.4 g",
                                "tab4": "40.1 g"
                            },
                            {
                                "name": "D???u h?????ng d????ng, linoleic (kho???ng 65%)",
                                "tab1": "100 g",
                                "tab2": "10.3 g",
                                "tab3": "19.5 g",
                                "tab4": "65.7 g"
                            },
                            {
                                "name": "D???u b??",
                                "tab1": "100 g",
                                "tab2": "11.56 g",
                                "tab3": "70.55 g",
                                "tab4": "13.49 g"
                            },
                            {
                                "name": "D???u m?? t???t",
                                "tab1": "100 g",
                                "tab2": "11.58 g",
                                "tab3": "59.19 g",
                                "tab4": "21.23 g"
                            },
                            {
                                "name": "D???u h?????ng d????ng, linoleic (m???t ph???n hydro h??a)",
                                "tab1": "100 g",
                                "tab2": "13 g",
                                "tab3": "46.2 g",
                                "tab4": "36.4 g"
                            },
                            {
                                "name": "D???u h???t anh t??c",
                                "tab1": "100 g",
                                "tab2": "13.5 g",
                                "tab3": "19.7 g",
                                "tab4": "62.4 g"
                            },
                            {
                                "name": "D???u oliu, salad ho???c n???u ??n",
                                "tab1": "100 g",
                                "tab2": "13.81 g",
                                "tab3": "72.96 g",
                                "tab4": "10.52 g"
                            },
                            {
                                "name": "D???u m??, salad ho???c n???u ??n",
                                "tab1": "100 g",
                                "tab2": "14.2 g",
                                "tab3": "39.7 g",
                                "tab4": "41.7 g"
                            },
                            {
                                "name": "D???u lecithin ?????u n??nh",
                                "tab1": "100 g",
                                "tab2": "15 g",
                                "tab3": "10.98 g",
                                "tab4": "45.32 g"
                            },
                            {
                                "name": "D???u ?????u n??nh, salad ho???c n???u ??n",
                                "tab1": "100 g",
                                "tab2": "15.65 g",
                                "tab3": "22.78 g",
                                "tab4": "57.74 g"
                            },
                            {
                                "name": "D???u h???t c???",
                                "tab1": "100 g",
                                "tab2": "81.5 g",
                                "tab3": "11.4 g",
                                "tab4": "1.6 g"
                            },
                            {
                                "name": "D???u d???a",
                                "tab1": "100 g",
                                "tab2": "86.5 g",
                                "tab3": "5.8 g",
                                "tab4": "1.8 g"
                            },
                            {
                                "name": "D???u c?? menhaden, hydro h??a ho??n to??n",
                                "tab1": "100 g",
                                "tab2": "95.6 g",
                                "tab3": "0 g",
                                "tab4": "0 g"
                            }
                        ];
                    $('#submit_btn').click(function () {
                        if ($("input[name='slt_oil']:checked").length < 1) { alert("Please select Oil or Ghee!"); chart.slt_oil[0].focus(); return false }
                        orders.map( function(order) {
                            $.map($("input[name='slt_oil']:checked"), function (params, id) {
                                if (order.name == $(params).val()) {
                                    $('#form_arr').append("<tr>");
                                    $('#form_arr').append("<td width='40%' class='tv12blue' style='background-color: #FFFFFF' align='justify'>" + $(params).val() + "</td>" );
                                    $('#form_arr').append("<td width='15%' class='tv12blue' style='background-color: #FFFFFF' align='justify'>" + order.tab1 + "</td>");
                                    $('#form_arr').append("<td width='15%' class='tv12blue' style='background-color: #FFFFFF' align='justify'>" + order.tab2 + "</td>");
                                    $('#form_arr').append("<td width='15%' class='tv12blue' style='background-color: #FFFFFF' align='justify'>" + order.tab3 + "</td>");
                                    $('#form_arr').append("<td width='15%' class='tv12blue' style='background-color: #FFFFFF' align='justify'>" + order.tab4 + "</td>");
                                    $('#form_arr').append("</tr>");
                                }
                            });
                        });
                        $('#form_kq2').css('display', 'block');
                    });
                    $('#Viewall').click(function () {
                        orders.map( function(order) {
                            $('#form_arr').append("<tr>");
                            $('#form_arr').append("<td width='40%' class='tv12blue' style='background-color: #FFFFFF' align='justify'>" + order.name + "</td>" );
                            $('#form_arr').append("<td width='15%' class='tv12blue' style='background-color: #FFFFFF' align='justify'>" + order.tab1 + "</td>");
                            $('#form_arr').append("<td width='15%' class='tv12blue' style='background-color: #FFFFFF' align='justify'>" + order.tab2 + "</td>");
                            $('#form_arr').append("<td width='15%' class='tv12blue' style='background-color: #FFFFFF' align='justify'>" + order.tab3 + "</td>");
                            $('#form_arr').append("<td width='15%' class='tv12blue' style='background-color: #FFFFFF' align='justify'>" + order.tab4 + "</td>");
                            $('#form_arr').append("</tr>");
                        });
                        $('#Viewall').css('display', 'none');
                    })
                });
            </script>

            <form name="chart">
                <div class="calculator-table-form blue " id="gendercolor">
                    <table border="0" width="100%" cellspacing="2" cellpadding="2">
                        <tbody>
                            <tr class="table-head">
                                <td id="select_food_title" colspan="2" class="tbold blue_header_tab header_white_font"
                                    style="padding: 8px; border:solid 1px #FFFFFF">Ch???n lo???i d???u</td>
                            </tr>
                            <tr>
                                <td align="justify" colspan="2">

                                    <div id="food_list" style="overflow-y:scroll; height: 260px; line-height: 25px;">
                                        <table id="tbl_food_list" cellspacing="0" border="0" cellpadding="2"
                                            class="gray_font" style="width: 100%; line-height:25px;">

                                            <tbody>
                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="B?? ???? ???????c ??un ch???y v?? b?? s???a tr??u l???ng">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">B?? ???? ???????c ??un ch???y v?? b?? s???a tr??u l???ng</td>
                                                </tr>


                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u b?? khan">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u b?? khan</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h???t lanh, ??p l???nh">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h???t lanh, ??p l???nh</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u c??y rum, salad ho???c n???u ??n, linoleic (H??n 70%)">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u c??y rum, salad ho???c n???u ??n, linoleic (H??n 70%)</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h???t m??">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h???t m??</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h???t c???i">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h???t c???i</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h???t ph???">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h???t ph???</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u ng?? v?? c???i d???u">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u ng?? v?? c???i d???u</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u ?????u ph???ng, salad ho???c n???u ??n">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u ?????u ph???ng, salad ho???c n???u ??n</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u m???m l??a m??">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u m???m l??a m??</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u y???n m???ch">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u y???n m???ch</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u c?? chua">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u c?? chua</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u c??m g???o">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u c??m g???o</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u c?? h???i">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u c?? h???i</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u tr?? xanh">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u tr?? xanh</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u c?? tr??ch">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u c?? tr??ch</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u gan c?? tuy???t">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u gan c?? tuy???t</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h???t b??ng, salad ho???c n???u ??n">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h???t b??ng, salad ho???c n???u ??n</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u c?? m??i">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u c?? m??i</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u c?? menhaden">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u c?? menhaden</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h???t m??? h???u c??">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h???t m??? h???u c??</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u c???">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u c???</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u b?? ca cao">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u b?? ca cao</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h???nh nh??n">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h???nh nh??n</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u ??c ch??">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u ??c ch??</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h???t nho">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h???t nho</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h?????ng d????ng, oleic cao (>70%)">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h?????ng d????ng, oleic cao (>70%)</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h?????ng d????ng, linoleic ( < 60%)">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h?????ng d????ng, linoleic ( < 60%)</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h?????ng d????ng, linoleic (kho???ng 65%)">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h?????ng d????ng, linoleic (kho???ng 65%)</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u b??">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u b??</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u m?? t???t">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u m?? t???t</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h?????ng d????ng, linoleic (m???t ph???n hydro h??a)">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h?????ng d????ng, linoleic (m???t ph???n hydro h??a)</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h???t anh t??c">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h???t anh t??c</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u oliu, salad ho???c n???u ??n">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u oliu, salad ho???c n???u ??n</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u m??, salad ho???c n???u ??n">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u m??, salad ho???c n???u ??n</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u lecithin ?????u n??nh">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u lecithin ?????u n??nh</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u ?????u n??nh, salad ho???c n???u ??n">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u ?????u n??nh, salad ho???c n???u ??n</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u h???t c???">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u h???t c???</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u d???a">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u d???a</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="D???u c?? menhaden, hydro h??a ho??n to??n">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">D???u c?? menhaden, hydro h??a ho??n to??n
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="button" value="Ki???m tra" class="flat-btn" name="but_check" id="submit_btn"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        <div class="calculator-table-form blue " style="padding-top: 20px;display: none;" id="form_kq2">
            <table align="center" border="0" cellpadding="10" width="100%" cellspacing="0" class="tv12blue bluebox2">
                <tbody>
                    <tr align="center">
                        <td bgcolor="#BBE1FB" style="padding: 5px;" colspan="2" align="center">
                            <b></b>
                            <font class="tv12blue"><b>H??m l?????ng ch???t b??o trong d???u th???c v???t / Ghee / D???u ??n</b></font>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#BBE1FB" style="padding: 5px;" colspan="2" align="center">
                            <center>
                                <table width="100%" cellpadding="10"
                                    style="border-style: solid; border-width: 1px; border-top-color:  #42a0e2; border-right-color:  #42a0e2; border-bottom-color:  #42a0e2; border-left-color:  #42a0e2"
                                    align="center">
                                    <tbody id="form_arr">
                                        <tr>
                                            <td width="50%" class="tv12red" style="background-color: #FFFFFF"
                                                align="left"><b>Th???c ph???m(100g)</b></td>
                                            <td width="15%" class="tv12red" style="background-color: #FFFFFF"
                                                align="left"><b>T???ng s??? ch???t b??o</b></td>
                                            <td width="15%" class="tv12red" style="background-color: #FFFFFF"
                                                align="left"><b>Ch???t b??o b??o h??a</b></td>
                                            <td width="10%" class="tv12red" style="background-color: #FFFFFF"
                                                align="left"><b>Ch???t b??o kh??ng b??o h??a ????n</b></td>
                                            <td width="10%" class="tv12red" style="background-color: #FFFFFF"
                                                align="left"><b>Ch???t b??o kh??ng b??o h??a ??a</b></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td width="100%" colspan="5" class="tv12blue"
                                                style="background-color: #FFFFFF" align="right">
                                                    <font color="#FF0000"><b id="Viewall" style="display: block;">View All</b></font>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <p>
                    Th??ng tin th?? v??? v??? h??m l?????ng ch???t b??o trong d???u th???c v???t ho???c d???u ??n:<br>
                        ???   Lipid ??? nhi???t ????? ph??ng ??? th??? r???n ???????c g???i l?? ch???t b??o trong khi ??? th??? l???ng ??? nhi???t ????? ph??ng ???????c g???i l?? d???u.<br>
                        ???   Ch???t b??o ???????c coi l?? ch???t dinh d?????ng gi??u n??ng l?????ng v?? m???t gam ch???t b??o ch???a 37 kJ n??ng l?????ng.<br>
                        ???   D???u v?? ch???t b??o g???m  b??o h??a, kh??ng b??o h??a ????n (MUFA), kh??ng b??o h??a ??a (PUFA) v?? axit b??o thi???t y???u (EFA).<br>
                        ???   D???u c??y rum, d???u h?????ng d????ng, d???u ng??, d???u ?????u n??nh v?? c?? l?? nh???ng ngu???n gi??u axit b??o kh??ng b??o h??a ??a.<br>
                        ???   Axit b??o Omega-3 l?? m???t lo???i PUFA gi??p gi???m nguy c?? m???c b???nh tim, duy tr?? nh???p tim b??nh th?????ng, gi???m huy???t ??p cao v?? ph??t tri???n n??o b??? c???a thai nhi.

                </p>
            </div>
        </div>


<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}