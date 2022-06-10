<?php
if(!function_exists('shortcode_13')){

function shortcode_13(){
    ob_start();
?>


<script language="javascript">
                jQuery(document).ready(function ($) {
                    function format_tien_te(data){
                        data = data.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                        return data.replace('.00', '');
                    }

                  
                    $('[name="Main"]').submit(function(event){
                        event.preventDefault();
                        $('#form_kq2').show();
                        if($('[name="Month"]').val() == 0){
                            $('.ketqua').text('70-190');
                        }

                        var tuoi_theo_giay = Date.parse($('[name="Month"]').val()+' '+$('[name="Day"]').val()+' '+$('[name="Year"]').val());
                        var thoi_gian_chenh_lech = Date.now() - (tuoi_theo_giay );
                        var tuoi_theo_thang = thoi_gian_chenh_lech/1000/60/60/24/30;
                        var nhip_tho_trung_binh = 0;
                        console.log($('[name="Month"]').val()+' '+$('[name="Day"]').val()+' '+$('[name="Year"]').val());
                        console.log(tuoi_theo_giay);
                        console.log(thoi_gian_chenh_lech);
                        console.log(tuoi_theo_thang);
                        if(tuoi_theo_thang < 3){
                            $('.ketqua').text('34-57');
                            nhip_tho_trung_binh = (34+57)/2;
                        }
                        if(tuoi_theo_thang >= 3 && tuoi_theo_thang < 6){
                            $('.ketqua').text('33-55');
                            nhip_tho_trung_binh = (33+55)/2;
                        }
                        if(tuoi_theo_thang >= 6 && tuoi_theo_thang < 9){
                            $('.ketqua').text('31-52');
                            nhip_tho_trung_binh = (31+52)/2;
                        }
                        if(tuoi_theo_thang >= 9 && tuoi_theo_thang < 12){
                            $('.ketqua').text('30-50');
                            nhip_tho_trung_binh = (30+50)/2;
                        }
                        if(tuoi_theo_thang >= 12 && tuoi_theo_thang < 18){
                            $('.ketqua').text('28-46');
                            nhip_tho_trung_binh = (28+46)/2;
                        }
                        if(tuoi_theo_thang >= 18 && tuoi_theo_thang < 24){
                            $('.ketqua').text('25-40');
                            nhip_tho_trung_binh = (25+40)/2;
                        }
                        if(tuoi_theo_thang >= 24 && tuoi_theo_thang < 36){
                            $('.ketqua').text('22-34');
                            nhip_tho_trung_binh = (22+34)/2;
                        }
                        if(tuoi_theo_thang >= 36 && tuoi_theo_thang < 48){
                            $('.ketqua').text('21-29');
                            nhip_tho_trung_binh = (21+29)/2;
                        }
                        if(tuoi_theo_thang >= 48 && tuoi_theo_thang < 72){
                            $('.ketqua').text('20-27');
                            nhip_tho_trung_binh = (20+27)/2;
                        }
                        if(tuoi_theo_thang >= 72 && tuoi_theo_thang < 96){
                            $('.ketqua').text('18-24');
                            nhip_tho_trung_binh = (18+24)/2;
                        }
                        if(tuoi_theo_thang >= 96 && tuoi_theo_thang < 12*12){
                            $('.ketqua').text('16-22');
                            nhip_tho_trung_binh = (16+22)/2;
                        }
                        if(tuoi_theo_thang >= 12*12 && tuoi_theo_thang < 15*12){
                            $('.ketqua').text('15-21');
                            nhip_tho_trung_binh = (15+21)/2;
                        }
                        if(tuoi_theo_thang >= 15*12 && tuoi_theo_thang < 18*12){
                            $('.ketqua').text('13-19');
                            nhip_tho_trung_binh = (13+19)/2;
                        }
                        if(tuoi_theo_thang >= 18*12){
                            $('.ketqua').text('8-16');
                            nhip_tho_trung_binh = (8+16)/2;
                        }

                        $('#fm_timer').val(parseInt(thoi_gian_chenh_lech/1000/60*nhip_tho_trung_binh));
                    })
                });
            </script>

        
<div class="calculator-table-form blue" id="gendercolor">
    <form name="Main" onsubmixt="return check_life_span()" method="post">
                                <input type="hidden" name="hidVal" id="hidVal">
                                 <input type="hidden" name="hdnage" value="60">
                                <b></b><br><table cellpadding="0" cellspacing="0" class="tv12black">
                                    
                                  <tbody><tr>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ngày sinh</font></font></td>
                                    <td>
                                    <select class="formcolor" name="Month" size="1" style="width:120px" onchange="ChangeYear();">
                                        <option selected="" value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 1</font></font></option>
                                        <option value="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 2</font></font></option>
                                        <option value="3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 3</font></font></option>
                                        <option value="4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 4</font></font></option>
                                        <option value="5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 5</font></font></option>
                                        <option value="6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 6</font></font></option>
                                        <option value="7"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 7</font></font></option>
                                        <option value="8"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 8</font></font></option>
                                        <option value="9"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 9</font></font></option>
                                        <option value="10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 10</font></font></option>
                                        <option value="11"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 11</font></font></option>
                                        <option value="12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tháng 12</font></font></option>
                                      </select>
                                      <select class="formcolor" name="Day" size="1" onchange="ChangeYear();">
                                      
                                      <option selected="selected" value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></option>
                                      
                                      <option value="2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></option>
                                     
                                      <option value="3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></option>
                                     
                                      <option value="4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></option>
                                     
                                      <option value="5"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5</font></font></option>
                                     
                                      <option value="6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6</font></font></option>
                                     
                                      <option value="7"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">7</font></font></option>
                                     
                                      <option value="8"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">8</font></font></option>
                                     
                                      <option value="9"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">9</font></font></option>
                                     
                                      <option value="10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></option>
                                     
                                      <option value="11"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">11</font></font></option>
                                     
                                      <option value="12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12</font></font></option>
                                     
                                      <option value="13"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">13</font></font></option>
                                     
                                      <option value="14"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">14</font></font></option>
                                     
                                      <option value="15"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15</font></font></option>
                                     
                                      <option value="16"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">16</font></font></option>
                                     
                                      <option value="17"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">17</font></font></option>
                                     
                                      <option value="18"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">18</font></font></option>
                                     
                                      <option value="19"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">19</font></font></option>
                                     
                                      <option value="20"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></option>
                                     
                                      <option value="21"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">21</font></font></option>
                                     
                                      <option value="22"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">22</font></font></option>
                                     
                                      <option value="23"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">23</font></font></option>
                                     
                                      <option value="24"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">24</font></font></option>
                                     
                                      <option value="25"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25</font></font></option>
                                     
                                      <option value="26"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">26</font></font></option>
                                     
                                      <option value="27"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">27</font></font></option>
                                     
                                      <option value="28"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">28</font></font></option>
                                     
                                      <option value="29"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">29</font></font></option>
                                     
                                      <option value="30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></option>
                                     
                                      <option value="31"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">31</font></font></option>
                                     
                                      </select>
                                      <select class="formcolor" name="Year" size="1" onchange="ChangeYear();">
                                        <script language="javascript">
                                            sdate=new Date();
                                            var yy=''
                                            for(i=(sdate.getFullYear()-60);i<=sdate.getFullYear();i++)
                                            {   
                                                if (i==yy)
                                                {
                                                    document.write('<option selected value='+i+'>'+i+'</option>');
                                                }
                                                else
                                                {
                                                    document.write('<option value='+i+'>'+i+'</option>');
                                                }
                                            }   
                                        </script><option value="1961"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1961</font></font></option><option value="1962"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1962</font></font></option><option value="1963"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1963</font></font></option><option value="1964"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1964</font></font></option><option value="1965"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1965</font></font></option><option value="1966"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1966</font></font></option><option value="1967"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1967</font></font></option><option value="1968"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1968</font></font></option><option value="1969"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1969</font></font></option><option value="1970"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1970</font></font></option><option value="1971"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1971</font></font></option><option value="1972"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1972</font></font></option><option value="1973"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1973</font></font></option><option value="1974"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1974</font></font></option><option value="1975"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1975</font></font></option><option value="1976"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1976</font></font></option><option value="1977"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1977</font></font></option><option value="1978"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1978</font></font></option><option value="1979"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1979</font></font></option><option value="1980"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1980</font></font></option><option value="1981"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1981</font></font></option><option value="1982"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 1982</font></font></option><option value="1983"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1983</font></font></option><option value="1984"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1984</font></font></option><option value="1985"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1985</font></font></option><option value="1986"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1986</font></font></option><option value="1987"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1987</font></font></option><option value="1988"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1988</font></font></option><option value="1989"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1989</font></font></option><option value="1990"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1990</font></font></option><option value="1991"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1991</font></font></option><option value="1992"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1992</font></font></option><option value="1993"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1993</font></font></option><option value="1994"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1994</font></font></option><option value="1995"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1995</font></font></option><option value="1996"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1996</font></font></option><option value="1997"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1997</font></font></option><option value="1998"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1998</font></font></option><option value="1999"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1999</font></font></option><option value="2000"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2000</font></font></option><option value="2001"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2001</font></font></option><option value="2002"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2002</font></font></option><option value="2003"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2003</font></font></option><option value="2004"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2004</font></font></option><option value="2005"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2005</font></font></option><option value="2006"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2006</font></font></option><option value="2007"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2007</font></font></option><option value="2008"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2008</font></font></option><option value="2009"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2009</font></font></option><option value="2010"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2010</font></font></option><option value="2011"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2011</font></font></option><option value="2012"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2012</font></font></option><option value="2013"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2013</font></font></option><option value="2014"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2014</font></font></option><option value="2015"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2015</font></font></option><option value="2016"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2016</font></font></option><option value="2017"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2017</font></font></option><option value="2018"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2018</font></font></option><option value="2019"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2019</font></font></option><option value="2020"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 2020</font></font></option><option value="2021"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Năm 2021</font></font></option>
                                      </select></td>
                                  </tr>
                                  <tr>
                                 
                                    <td colspan="2">
                                      <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="Tính toán" id="submit1" name="submit1" class="flat-btn"></font></font></font></font>
                                       </td>
                                  </tr>
                                </tbody></table>
                              </form>
</div>


        <div class="calculator-table-form blue " style="padding-top: 20px;display: none;" id="form_kq2">
            <form name="form1">
                <table cellspacing="0" style="border-radius:5" cellpadding="4" width="100%" border="0" class="bluebox2 CalcDarkBgWhite1">
                    <tbody><tr>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đếm hơi thở</font></font></td><td>
                            <input name="fm_timer" type="text" id="fm_timer" class="highlight_field light-gray-grd">
                        </td>
                       </tr>
                        
                        
                        <tr>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tốc độ hô hấp</font></font></td><td>  <font color="#FF0000"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="ketqua">8-16</font></font></b></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> hơi thở mỗi phút
                            </font></font></td>
                       </tr>
                </tbody></table></form>
        </div>


<?php
$result = ob_get_contents();
ob_end_clean();
return $result;
}}