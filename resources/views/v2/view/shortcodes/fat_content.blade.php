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
                                "name": "Bơ đã được đun chảy và bơ sữa trâu lỏng",
                                "tab1": "46 g",
                                "tab2": "29,2 g",
                                "tab3": "11,9 g",
                                "tab4": "1,7 g"
                            },
                            {
                                "name": "Dầu bơ khan",
                                "tab1": "99,48 g",
                                "tab2": "61,92 g",
                                "tab3": "28,73 g",
                                "tab4": "3,69 g"
                            },
                            {
                                "name": "Dầu hạt lanh, ép lạnh",
                                "tab1": "99.98 g",
                                "tab2": "8.98 g",
                                "tab3": "18.44 g",
                                "tab4": "67.85 g"
                            },
                            {
                                "name": "Dầu cây rum, salad hoặc nấu ăn, linoleic (Hơn 70%)",
                                "tab1": "100 g",
                                "tab2": "6.2 g",
                                "tab3": "14.36 g",
                                "tab4": "74.62 g"
                            },
                            {
                                "name": "Dầu hạt mơ",
                                "tab1": "100 g",
                                "tab2": "6.3 g",
                                "tab3": "60 g",
                                "tab4": "29.3 g"
                            },
                            {
                                "name": "Dầu hạt cải",
                                "tab1": "100 g",
                                "tab2": "7.36 g",
                                "tab3": "63.28 g",
                                "tab4": "28.14 g"
                            },
                            {
                                "name": "Dầu hạt phỉ",
                                "tab1": "100 g",
                                "tab2": "7.4 g",
                                "tab3": "78 g",
                                "tab4": "10.2 g"
                            },
                            {
                                "name": "Dầu ngô và cải dầu",
                                "tab1": "100 g",
                                "tab2": "8.03 g",
                                "tab3": "58.54 g",
                                "tab4": "29.11 g"
                            },
                            {
                                "name": "Dầu đậu phộng, salad hoặc nấu ăn",
                                "tab1": "100 g",
                                "tab2": "16.9 g",
                                "tab3": "46.2 g",
                                "tab4": "32 g"
                            },
                            {
                                "name": "Dầu mầm lúa mì",
                                "tab1": "100 g",
                                "tab2": "18.8 g",
                                "tab3": "15.1 g",
                                "tab4": "61.7 g"
                            },
                            {
                                "name": "Dầu yến mạch",
                                "tab1": "100 g",
                                "tab2": "19.62 g",
                                "tab3": "35.11 g",
                                "tab4": "40.87 g"
                            },
                            {
                                "name": "Dầu cà chua",
                                "tab1": "100 g",
                                "tab2": "19.7 g",
                                "tab3": "22.8 g",
                                "tab4": "53.1 g"
                            },
                            {
                                "name": "Dầu cám gạo",
                                "tab1": "100 g",
                                "tab2": "19.7 g",
                                "tab3": "39.3 g",
                                "tab4": "35 g"
                            },
                            {
                                "name": "Dầu cá hồi",
                                "tab1": "100 g",
                                "tab2": "19.87 g",
                                "tab3": "29.04 g",
                                "tab4": "40.32 g"
                            },
                            {
                                "name": "Dầu trà xanh",
                                "tab1": "100 g",
                                "tab2": "21.1 g",
                                "tab3": "51.5 g",
                                "tab4": "23 g"
                            },
                            {
                                "name": "Dầu cá trích",
                                "tab1": "100 g",
                                "tab2": "21.29 g",
                                "tab3": "56.56 g",
                                "tab4": "15.6 g"
                            },
                            {
                                "name": "Dầu gan cá tuyết",
                                "tab1": "100 g",
                                "tab2": "22.61 g",
                                "tab3": "46.71 g",
                                "tab4": "22.54 g"
                            },
                            {
                                "name": "Dầu hạt bông, salad hoặc nấu ăn",
                                "tab1": "100 g",
                                "tab2": "25.9 g",
                                "tab3": "17.8 g",
                                "tab4": "51.9 g"
                            },
                            {
                                "name": "Dầu cá mòi",
                                "tab1": "100 g",
                                "tab2": "29.89 g",
                                "tab3": "33.84 g",
                                "tab4": "31.87 g"
                            },
                            {
                                "name": "Dầu cá menhaden",
                                "tab1": "100 g",
                                "tab2": "30.43 g",
                                "tab3": "26.69 g",
                                "tab4": "34.2 g"
                            },
                            {
                                "name": "Dầu hạt mỡ hữu cơ",
                                "tab1": "100 g",
                                "tab2": "46.6 g",
                                "tab3": "44 g",
                                "tab4": "5.2 g"
                            },
                            {
                                "name": "Dầu cọ",
                                "tab1": "100 g",
                                "tab2": "49.3 g",
                                "tab3": "37 g",
                                "tab4": "9.3 g"
                            },
                            {
                                "name": "Dầu bơ ca cao",
                                "tab1": "100 g",
                                "tab2": "59.7 g",
                                "tab3": "32.9 g",
                                "tab4": "3 g"
                            },
                            {
                                "name": "Dầu hạnh nhân",
                                "tab1": "100 g",
                                "tab2": "8.2 g",
                                "tab3": "69.9 g",
                                "tab4": "17.4 g"
                            },
                            {
                                "name": "Dầu óc chó",
                                "tab1": "100 g",
                                "tab2": "9.1 g",
                                "tab3": "22.8 g",
                                "tab4": "63.3 g"
                            },
                            {
                                "name": "Dầu hạt nho",
                                "tab1": "100 g",
                                "tab2": "9.6 g",
                                "tab3": "16.1 g",
                                "tab4": "69.9 g"
                            },
                            {
                                "name": "Dầu hướng dương, oleic cao (>70%)",
                                "tab1": "100 g",
                                "tab2": "9.86 g",
                                "tab3": "83.69 g",
                                "tab4": "3.8 g"
                            },
                            {
                                "name": "Dầu hướng dương, linoleic (<60%)",
                                "tab1": "100 g",
                                "tab2": "10.1 g",
                                "tab3": "45.4 g",
                                "tab4": "40.1 g"
                            },
                            {
                                "name": "Dầu hướng dương, linoleic (khoảng 65%)",
                                "tab1": "100 g",
                                "tab2": "10.3 g",
                                "tab3": "19.5 g",
                                "tab4": "65.7 g"
                            },
                            {
                                "name": "Dầu bơ",
                                "tab1": "100 g",
                                "tab2": "11.56 g",
                                "tab3": "70.55 g",
                                "tab4": "13.49 g"
                            },
                            {
                                "name": "Dầu mù tạt",
                                "tab1": "100 g",
                                "tab2": "11.58 g",
                                "tab3": "59.19 g",
                                "tab4": "21.23 g"
                            },
                            {
                                "name": "Dầu hướng dương, linoleic (một phần hydro hóa)",
                                "tab1": "100 g",
                                "tab2": "13 g",
                                "tab3": "46.2 g",
                                "tab4": "36.4 g"
                            },
                            {
                                "name": "Dầu hạt anh túc",
                                "tab1": "100 g",
                                "tab2": "13.5 g",
                                "tab3": "19.7 g",
                                "tab4": "62.4 g"
                            },
                            {
                                "name": "Dầu oliu, salad hoặc nấu ăn",
                                "tab1": "100 g",
                                "tab2": "13.81 g",
                                "tab3": "72.96 g",
                                "tab4": "10.52 g"
                            },
                            {
                                "name": "Dầu mè, salad hoặc nấu ăn",
                                "tab1": "100 g",
                                "tab2": "14.2 g",
                                "tab3": "39.7 g",
                                "tab4": "41.7 g"
                            },
                            {
                                "name": "Dầu lecithin đậu nành",
                                "tab1": "100 g",
                                "tab2": "15 g",
                                "tab3": "10.98 g",
                                "tab4": "45.32 g"
                            },
                            {
                                "name": "Dầu đậu nành, salad hoặc nấu ăn",
                                "tab1": "100 g",
                                "tab2": "15.65 g",
                                "tab3": "22.78 g",
                                "tab4": "57.74 g"
                            },
                            {
                                "name": "Dầu hạt cọ",
                                "tab1": "100 g",
                                "tab2": "81.5 g",
                                "tab3": "11.4 g",
                                "tab4": "1.6 g"
                            },
                            {
                                "name": "Dầu dừa",
                                "tab1": "100 g",
                                "tab2": "86.5 g",
                                "tab3": "5.8 g",
                                "tab4": "1.8 g"
                            },
                            {
                                "name": "Dầu cá menhaden, hydro hóa hoàn toàn",
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
                                    style="padding: 8px; border:solid 1px #FFFFFF">Chọn loại dầu</td>
                            </tr>
                            <tr>
                                <td align="justify" colspan="2">

                                    <div id="food_list" style="overflow-y:scroll; height: 260px; line-height: 25px;">
                                        <table id="tbl_food_list" cellspacing="0" border="0" cellpadding="2"
                                            class="gray_font" style="width: 100%; line-height:25px;">

                                            <tbody>
                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Bơ đã được đun chảy và bơ sữa trâu lỏng">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Bơ đã được đun chảy và bơ sữa trâu lỏng</td>
                                                </tr>


                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu bơ khan">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu bơ khan</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hạt lanh, ép lạnh">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hạt lanh, ép lạnh</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu cây rum, salad hoặc nấu ăn, linoleic (Hơn 70%)">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu cây rum, salad hoặc nấu ăn, linoleic (Hơn 70%)</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hạt mơ">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hạt mơ</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hạt cải">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hạt cải</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hạt phỉ">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hạt phỉ</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu ngô và cải dầu">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu ngô và cải dầu</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu đậu phộng, salad hoặc nấu ăn">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu đậu phộng, salad hoặc nấu ăn</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu mầm lúa mì">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu mầm lúa mì</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu yến mạch">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu yến mạch</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu cà chua">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu cà chua</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu cám gạo">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu cám gạo</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu cá hồi">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu cá hồi</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu trà xanh">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu trà xanh</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu cá trích">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu cá trích</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu gan cá tuyết">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu gan cá tuyết</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hạt bông, salad hoặc nấu ăn">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hạt bông, salad hoặc nấu ăn</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu cá mòi">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu cá mòi</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu cá menhaden">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu cá menhaden</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hạt mỡ hữu cơ">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hạt mỡ hữu cơ</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu cọ">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu cọ</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu bơ ca cao">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu bơ ca cao</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hạnh nhân">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hạnh nhân</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu óc chó">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu óc chó</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hạt nho">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hạt nho</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hướng dương, oleic cao (>70%)">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hướng dương, oleic cao (>70%)</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hướng dương, linoleic ( < 60%)">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hướng dương, linoleic ( < 60%)</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hướng dương, linoleic (khoảng 65%)">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hướng dương, linoleic (khoảng 65%)</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu bơ">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu bơ</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu mù tạt">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu mù tạt</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hướng dương, linoleic (một phần hydro hóa)">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hướng dương, linoleic (một phần hydro hóa)</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hạt anh túc">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hạt anh túc</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu oliu, salad hoặc nấu ăn">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu oliu, salad hoặc nấu ăn</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu mè, salad hoặc nấu ăn">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu mè, salad hoặc nấu ăn</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu lecithin đậu nành">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu lecithin đậu nành</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu đậu nành, salad hoặc nấu ăn">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu đậu nành, salad hoặc nấu ăn</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu hạt cọ">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu hạt cọ</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu dừa">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu dừa</td>
                                                </tr>

                                                <tr bgcolor="#FFFFFF">
                                                    <td width="5%"><input type="checkbox" name="slt_oil" value="Dầu cá menhaden, hydro hóa hoàn toàn">
                                                    </td>
                                                    <td width="60%" style="padding-left: 3px">Dầu cá menhaden, hydro hóa hoàn toàn
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
                                <td colspan="2"><input type="button" value="Kiểm tra" class="flat-btn" name="but_check" id="submit_btn"></td>
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
                            <font class="tv12blue"><b>Hàm lượng chất béo trong dầu thực vật / Ghee / Dầu ăn</b></font>
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
                                                align="left"><b>Thực phẩm(100g)</b></td>
                                            <td width="15%" class="tv12red" style="background-color: #FFFFFF"
                                                align="left"><b>Tổng số chất béo</b></td>
                                            <td width="15%" class="tv12red" style="background-color: #FFFFFF"
                                                align="left"><b>Chất béo bão hòa</b></td>
                                            <td width="10%" class="tv12red" style="background-color: #FFFFFF"
                                                align="left"><b>Chất béo không bão hòa đơn</b></td>
                                            <td width="10%" class="tv12red" style="background-color: #FFFFFF"
                                                align="left"><b>Chất béo không bão hòa đa</b></td>
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
                    Thông tin thú vị về hàm lượng chất béo trong dầu thực vật hoặc dầu ăn:<br>
                        ❖   Lipid ở nhiệt độ phòng ở thể rắn được gọi là chất béo trong khi ở thể lỏng ở nhiệt độ phòng được gọi là dầu.<br>
                        ❖   Chất béo được coi là chất dinh dưỡng giàu năng lượng vì một gam chất béo chứa 37 kJ năng lượng.<br>
                        ❖   Dầu và chất béo gồm  bão hòa, không bão hòa đơn (MUFA), không bão hòa đa (PUFA) và axit béo thiết yếu (EFA).<br>
                        ❖   Dầu cây rum, dầu hướng dương, dầu ngô, dầu đậu nành và cá là những nguồn giàu axit béo không bão hòa đa.<br>
                        ❖   Axit béo Omega-3 là một loại PUFA giúp giảm nguy cơ mắc bệnh tim, duy trì nhịp tim bình thường, giảm huyết áp cao và phát triển não bộ của thai nhi.

                </p>
            </div>
        </div>


<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}