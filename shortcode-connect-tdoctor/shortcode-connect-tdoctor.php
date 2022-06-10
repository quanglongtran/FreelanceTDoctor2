<?php
   /*
   Plugin Name: Get data from tdoctor.vn
   Plugin URI: https://tdoctor.vn
   description:   Get data from tdoctor.vn
   Version: 1.0
   Author: Mr. Bun
   Author URI: https://sanwp.com
   License: GPL2
   */

// DB_CONNECTION=mysql
// DB_HOST=localhost
// DB_PORT=3306
// DB_DATABASE=zadmin_thanh20201a
// DB_USERNAME=thak209213b
// DB_PASSWORD=qCgkPRuu8xGDHkQZ

define('TDOCTOR_DB_DATABASE', 'zadmin_thanh20201a');
define('TDOCTOR_DB_USERNAME', 'tconnect');
define('TDOCTOR_DB_PASSWORD', 'ynymebugy');

// [bartag foo="foo-value"]
function tdoctor_bs_func( $atts ) {
    $a = shortcode_atts( array(
        'foo' => 'something',
        'bar' => 'something else',
    ), $atts );
    ob_start();

    tdoctor_get_bs_from_remote($atts);

    $content = ob_get_contents();
    ob_end_clean();
    return $content;
    return "foo = {$a['foo']}";
}
add_shortcode( 'tdoctor_bs', 'tdoctor_bs_func' );
function tdoctor_hoibs_func( $atts ) {
    $a = shortcode_atts( array(
        'foo' => 'something',
        'bar' => 'something else',
    ), $atts );
    ob_start();

    tdoctor_get_hoibs_from_remote($atts);

    $content = ob_get_contents();
    ob_end_clean();
    return $content;
    return "foo = {$a['foo']}";
}
add_shortcode( 'tdoctor_hoibs', 'tdoctor_hoibs_func' );

function tdoctor_get_link_htmlx($current_page, $total_page){

}
function tdoctor_get_link_html($current_page, $total_pages, $page_url = "")
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
            $previous_link = ($previous<=0)?1:$previous;
            $pagination .= '<li class="first"><a href="'.$page_url.'?tpage=1" title="First">«</a></li>'; //first link
            $pagination .= '<li><a href="'.$page_url.'?tpage='.$previous_link.'" title="Previous"><</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="'.$page_url.'?tpage='.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active"><a href="">'.$current_page.'</a></li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active"><a href="">'.$current_page.'</a></li>';
        }else{ //regular current link
            $pagination .= '<li class="active"><a href="">'.$current_page.'</a></li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="'.$page_url.'?tpage='.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
                $next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li><a href="'.$page_url.'?tpage='.$next_link.'" >></a></li>'; //next link
                $pagination .= '<li class="last"><a href="'.$page_url.'?tpage='.$total_pages.'" title="Last">»</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
}

function tdoctor_get_bs_from_remote($atts){
    $specialty_url = $atts['specialty_url'];
    $servername = "localhost";   
    $username = TDOCTOR_DB_USERNAME;
    $password = TDOCTOR_DB_PASSWORD;
    $dbname = TDOCTOR_DB_DATABASE;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    $current_page = 1;
    if(isset($_REQUEST['tpage'])){
        $current_page = (int) $_REQUEST['tpage'];
    }

    $sql = "SELECT * FROM `doctor` where doctor_id IN (Select doctor_id from doctor_speciality WHERE speciality_id IN (Select speciality_id from speciality WHERE specialty_url='$specialty_url')) ORDER BY `doctor`.`doctor_id`  DESC LIMIT ".(($current_page - 1)*20).",".($current_page*20);
    $sql_total = "SELECT (doctor_id) FROM `doctor` where doctor_id IN (Select doctor_id from doctor_speciality WHERE speciality_id IN (Select speciality_id from speciality WHERE specialty_url='$specialty_url')) ";
    $result_total = $conn->query($sql_total);
    // echo $result_total->num_rows;
    $total_pages = 0;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {        
    $total_pages = ceil($result_total->num_rows / 20);
    
      // output data of each row
        ?>
<style type="text/css">
.list-doctor-from-tdoctor .avatar a {
    width: 100px;
    height: 100px;
    display: block;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    margin: auto;
}
.list-doctor-from-tdoctor .content, 
.list-doctor-from-tdoctor .avatar {
    padding-top: 25px;
}
.list-doctor-from-tdoctor .avatar {
    /*float: left;*/
    height: 200px;
    padding: 10px;
    margin-top: 15px;
}
.list-doctor-from-tdoctor .content {
    padding-left: 25px;
}
.list-doctor-from-tdoctor .name a {
    color: #2fa4e7;
    text-transform: uppercase;
    font-weight: bold;
}
.list-doctor-from-tdoctor #chat a {
    background: #fff;
    color: #ff749c;
    font-size: 12px;
    border: 1px solid #00a2a2;
    border-radius: 5px;
    padding: 1px 5px;
    display: inline-block;
}
.list-doctor-from-tdoctor > li {
    list-style: none;
    border-bottom: 1px solid #e84f5e;
}
</style>
        <?php
        echo '<ul class="list-doctor-from-tdoctor">';
      while($row = $result->fetch_object()) {
        // var_dump($row);
        $url_bs = 'https://tdoctor.vn/danh-sach-bac-si-chi-tiet/'.$row->doctor_url.'-'.$row->doctor_id.'';
        ?>
<li>
    <div class="row">
 <div class="col-sm-2 avatar">
  <div style="text-align: center; font-weight: bold;color: #E84F5E;">
   TDOCTOR: <?php echo $row->doctor_id; ?>
  </div>
  <a href="<?php echo $url_bs; ?>" style="background-image: url('https://tdoctor.vn/public/images/doctor/<?php echo $row->profile_image; ?>');"></a>
 </div>
 <!--Avatar-->

 <div class="col-sm-10 content">
  <div class="name">
   <a href="<?php echo $url_bs; ?>"><?php echo $row->doctor_name; ?></a>
  </div>
  <!--Name-->
  <div class="desc"><?php echo $row->doctor_description; ?></div>
  <!--Description-->
  <div>
   <i class="fa fa-map-marker" aria-hidden="true"></i>
   <b>Địa chỉ: </b>
   <a style=" color: #2fa4e7;" href="https://tdoctor.vn/danh-sach-bac-si">
    <?php echo $row->doctor_address; ?>
   </a>
  </div>
  <!--Address-->
  <div>
   <p>
    <i class="fa fa-hospital-o"></i><b> Nơi công tác:</b> <?php echo $row->doctor_clinic; ?>
   </p>
  </div>
  <!--Clinic-->
  <div id="chat">
   
   <a href="https://tdoctor.vn/goto/<?php echo $row->doctor_id; ?>-2" class="bt button secondary" title="Chat với <?php echo $row->doctor_name; ?>">
    Chat Với <?php echo $row->doctor_name; ?></a><br />
  </div>
  <!--Chat-->
  <div>
   <p style="font-weight: bold; float: left; margin-right: 10px;">
    <b>Giờ làm việc: </b><?php echo $row->doctor_timework; ?>
   </p>
   <p style="font-weight: bold; color: #E84F5E;">
    <?php
        if($row->price != null)
        {
            echo $row->price;
        }
        else
        {
            echo 1000;
        }
    ?>
     Vnđ/Phút</p>
  </div>
  <!--Time work-->
 </div>
 </div>
</li>

        <?php
      }
        echo '</ul>';

        echo tdoctor_get_link_html($current_page, $total_pages);
    } else {
      echo "không tìm thấy";
    }
    $conn->close();
}

function tdoctor_get_hoibs_from_remote($atts){
    $specialty_url = $atts['specialty_url'];
    $servername = "localhost";  
    $username = TDOCTOR_DB_USERNAME;
    $password = TDOCTOR_DB_PASSWORD;
    $dbname = TDOCTOR_DB_DATABASE;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    $current_page = 1;
    if(isset($_REQUEST['tpage'])){
        $current_page = (int) $_REQUEST['tpage'];
    }

    $sql = "SELECT * FROM `question` where user_id IN (Select user_id from user WHere refer_id IS NULL || refer_id = 0 || refer_type IS NULL || refer_type = 0) AND speciality_id  IN (Select speciality_id from speciality WHERE specialty_url='$specialty_url') ORDER BY `question`.`question_id`  DESC LIMIT ".(($current_page - 1)*20).",".($current_page*20);
    $sql_total = "SELECT * FROM `question` where user_id IN (Select user_id from user WHere refer_id IS NULL || refer_id = 0 || refer_type IS NULL || refer_type = 0) AND speciality_id  IN (Select speciality_id from speciality WHERE specialty_url='$specialty_url')";
    $result_total = $conn->query($sql_total);
    // echo $result_total->num_rows;
    $total_pages = 0;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {        
    $total_pages = ceil($result_total->num_rows / 20);
    
      // output data of each row
        ?>
<style type="text/css">
.list-doctor-from-tdoctor .avatar a {
    width: 100px;
    height: 100px;
    display: block;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    margin: auto;
}
.list-doctor-from-tdoctor .content, 
.list-doctor-from-tdoctor .avatar {
    padding-top: 25px;
}
.list-doctor-from-tdoctor .avatar {
    /*float: left;*/
    height: 200px;
    padding: 10px;
    margin-top: 15px;
}
.list-doctor-from-tdoctor .content {
    padding-left: 25px;
}
.list-doctor-from-tdoctor .name a {
    color: #2fa4e7;
    text-transform: uppercase;
    font-weight: bold;
}
.list-doctor-from-tdoctor #chat a {
    background: #fff;
    color: #ff749c;
    font-size: 12px;
    border: 1px solid #00a2a2;
    border-radius: 5px;
    padding: 1px 5px;
    display: inline-block;
}
.list-doctor-from-tdoctor > li {
    list-style: none;
    border-bottom: 1px solid #e84f5e;
}
.answer ul li span.image{
    width: 15%;
    float: left;
    width: 30px;
    height: 30px;
    display: block;
    padding-right: 10px;
    background-size: contain;
    background: url(https://dwbxi9io9o7ce.cloudfront.net/public/img/default-place.f4706672a682.jpg?1b03e0c301da) 50% 50%/cover;
    margin-right: 5px;
    border-radius: 50%;
}

ul.list-doctor-from-tdoctor h3 {
    font-size: 20px;
    margin: 0;
    margin-top: 20px;
}

ul.list-doctor-from-tdoctor h4 {
    font-size: 15px;
    margin: 0;
}

.answer li, .answer ul {
    list-style: none;
    padding: 0;
}

p.noi-dung-cau-hoi {
    padding: 0;
    margin: 0;
    line-height: 22px;
}

ul.list-doctor-from-tdoctor p.small {
    margin: 0;
}

.answer span {
    font-weight: 700;
}

ul.list-doctor-from-tdoctor a {
    color: #00a2a2;
}

ul.list-doctor-from-tdoctor h3 a {
    color: #2B96CC;
}

.list-doctor-from-tdoctor-question > li {
    padding-bottom: 20px;
}
</style>
        <?php
        echo '<ul class="list-doctor-from-tdoctor list-doctor-from-tdoctor-question">';
      while($row = $result->fetch_object()) {
        // var_dump($row);
        $url = 'https://tdoctor.vn/hoibacsi/'.$row->question_url.'-'.$row->question_id.'';
        ?>
<li>
    <div class="row">
        <div class="col-sm-12">
            <h3><a href="<?php echo $url; ?>"><?php echo $row->question_title; ?></a></h3>
            <p class="small">Hỏi bởi <a href="javascript:void(0);"><?php echo $row->fullname; ?></a> tại <?php echo $row->address; ?> hỏi lúc: <?php echo $row->created_at; ?></p>
            <p class="noi-dung-cau-hoi">
                <?php echo $row->question_content; ?>
            </p>
            <?php
            $get_answer = "SELECT * FROM answer JOIN user on answer_user_id = user.user_id JOIN doctor on doctor.user_id = user.user_id WHERE `question_id` =".$row->question_id ." LIMIT 0,1";
            $result_answer = $conn->query($get_answer);
            if ($result_answer->num_rows > 0) { 
                while($row_answer = $result_answer->fetch_object()) {
                    // var_dump($row_answer);
                    ?>
                    <div class="answer">
                        <span>Được trả lời bởi</span> 
                        <ul>
                            <li>
                                <span class="image "<?php if(!empty($row_answer->profile_image)){ echo 'style="background-image: url(https://tdoctor.vn/public/images/doctor/'; if(strpos($row_answer->profile_image,'http')===false){ echo '/'; } echo $row_answer->profile_image.')"'; } ?>></span>
                                <h4>
                                    <a href="https://tdoctor.vn/danh-sach-bac-si-chi-tiet/<?php echo $row_answer->doctor_url.'-'.$row_answer->doctor_id; ?>">
                                        <?php echo $row_answer->doctor_name; ?>
                                    </a>
                                </h4>
                                <?php if(strlen($row_answer->doctor_description)>200 && strpos($row_answer->doctor_description, ' ', 200)!="") { ?>

                                    <span><?php echo substr( $row_answer->doctor_description, 0, strpos($row_answer->doctor_description, ' ', 200) ); ?></span>
                                <?php }else{ 
                                    echo $row_answer->doctor_description;
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                    <?php
                    break;
                }
            }
            ?>
        </div>
    </div>
</li>

        <?php
      }
        echo '</ul>';

        echo tdoctor_get_link_html($current_page, $total_pages);
    } else {
      echo "không tìm thấy";
    }
    $conn->close();
}