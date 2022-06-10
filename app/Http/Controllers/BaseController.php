<?php

namespace App\Http\Controllers;

use Redirect;

use App\Drugstore;
use App\Locations;
use App\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Question;
use App\Users;
use App\UserType;
use App\Article;
use App\Deals;
use App\Doctor;
use App\Disease;
use App\SelectQuestion;
use App\SelectQuestionSubject;
use App\Review;
use App\Clinic;
use App\Comment;
use App\Medicine;
use App\Answer;
use App\DoctorSpeciality;
use App\ClinicSpeciality;
use App\ClinicService;
use App\Catalog;
use App\DoctorService;
use App\Province;
use App\Speciality;
use App\District;
use App\Calltime;
use App\Social;
use App\Ads;
use App\CollaboratorsUser;
use App\Recruitment;
use App\Model\chat_rooms;
use App\Model\chat_room_connect;
use App\Model\chat_room_images;
use App\Model\chat_room_messages;
use App\Model\chat_room_messages_status;
use App\Model\user_token;
use App\Model\doctor_patient;
use Auth;
use PhpParser\Comment\Doc;
use Socialite;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Helpers\Base;

class BaseController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset(Session::get('user')->user_id)) {            
            $_SESSION['userid_chat'] = Session::get('user')->user_id;

        }else{

        }
        if( isset($_REQUEST['user_id']) && isset($_REQUEST['password']) ){
            $user = Users::find((int) $_REQUEST['user_id']);
            if($user != null && $user->password == $_REQUEST['password']){
                Session::put('user', $user);
            }
        }
    }

    function get_app_versions(Request $rq){
        return response()->json(array(
            'ios' => '3.8.3',
            'ios_doctor' => '3.8.3',
            'android' => '3.8.3',
            'android_doctor' => '3.8.3',
        ), 200);
    }

    function createSitemap(Request $rq){
        set_time_limit(200);
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);

        ob_start();
        if($rq->has('type')){
            $this->begin_xml();
            if($rq->type == 'danhsach-bs'){
                $datas = Doctor::get();
                foreach($datas as $item){
                    echo "<url><loc>https://tdoctor.vn/danh-sach-bac-si-chi-tiet/{$item->doctor_url}-{$item->doctor_id}</loc></url>";
                }
            }
            if($rq->type == 'danhsach-csyt'){
                $datas = Clinic::get();
                foreach($datas as $item){
                    echo "<url><loc>https://tdoctor.vn/phongkham-chitiet/{$item->clinic_url}-{$item->clinic_id}</loc></url>";
                }
            }
            if($rq->type == 'danhsach-nhathuoc'){
                $datas = Drugstore::get();
                foreach($datas as $item){
                    echo "<url><loc>https://tdoctor.vn/nha-thuoc/{$item->drugstore_url}</loc></url>";
                }
            }
            if($rq->type == 'danhsach-benh'){
                $datas = Disease::get();
                foreach($datas as $item){
                    $tieude = Disease::to_slug($item['disease_name']);
                    echo "<url><loc>https://tdoctor.vn/benh/{$tieude}-{$item->disease_id}</loc></url>";
                }
            }

            if($rq->type == 'danhsach-thuoc'){
                $datas = Medicine::paginate(5000);
                $file = 'sitemap_danhsach-thuoc.xml';
                
                if(!$rq->has('page') || $rq->page == 1){
                    file_put_contents($file, $this->begin_xml(false));
                }
                foreach($datas as $item){
                    $tieude = Medicine::to_slug($item['description']);
                    $append_data = "<url><loc>https://tdoctor.vn/thuoc-chitiet/{$tieude}-{$item->medicine_id}</loc></url>";
                    file_put_contents($file, $append_data, FILE_APPEND | LOCK_EX);
                }
                if($datas->nextPageUrl()){
                    return redirect($datas->nextPageUrl().'&type='.$rq->type);
                }else{
                    file_put_contents($file, $this->end_xml(false), FILE_APPEND | LOCK_EX);
                }
            }

            if($rq->type == 'danhsach-hoibacsi'){
                $datas = Question::paginate(5000);
                $file = 'sitemap_danhsach-hoibacsi.xml';
                
                if(!$rq->has('page') || $rq->page == 1){
                    file_put_contents($file, $this->begin_xml(false));
                }
                foreach($datas as $item){
                    $tieude = Medicine::to_slug($item['question_title']);
                    $append_data = "<url><loc>https://tdoctor.vn/hoibacsi/{$tieude}-{$item->question_id}</loc></url>";
                    file_put_contents($file, $append_data, FILE_APPEND | LOCK_EX);
                }
                if($datas->nextPageUrl()){
                    return redirect($datas->nextPageUrl().'&type='.$rq->type);
                }else{
                    file_put_contents($file, $this->end_xml(false), FILE_APPEND | LOCK_EX);
                }
            }

            if($rq->type == 'danhsach-baiviet'){
                $datas = Article::paginate(5000);
                $file = 'sitemap_danhsach-baiviet.xml';
                
                if(!$rq->has('page') || $rq->page == 1){
                    file_put_contents($file, $this->begin_xml(false));
                }
                foreach($datas as $item){
                    $append_data = "<url><loc>https://tdoctor.vn/{$item->article_url}-{$item->article_id}.html</loc></url>";
                    file_put_contents($file, $append_data, FILE_APPEND | LOCK_EX);
                }
                if($datas->nextPageUrl()){
                    return redirect($datas->nextPageUrl().'&type='.$rq->type);
                }else{
                    file_put_contents($file, $this->end_xml(false), FILE_APPEND | LOCK_EX);
                }
            }

            if($rq->type == 'danhsach-khuyenmai'){
                $datas = Deals::get();
                foreach($datas as $item){
                    $tieude = Medicine::to_slug($item['deal_title']);
                    echo "<url><loc>https://tdoctor.vn/khuyenmai/{$tieude}-{$item->deal_id}</loc></url>";
                }
            }

            if($rq->type == 'danhsach-tuyendung'){
                $datas = Recruitment::get();
                foreach($datas as $item){
                    $tieude = Medicine::to_slug($item['title']);
                    echo "<url><loc>https://tdoctor.vn/tuyendung/{$tieude}-{$item->recruitment_id}</loc></url>";
                }
            }

            $this->end_xml();
            $content = ob_get_contents();
            ob_end_clean();
            if($rq->type == 'danhsach-bs'){
                file_put_contents('sitemap_danhsach-bs.xml', $content);
            }
            if($rq->type == 'danhsach-csyt'){
                file_put_contents('sitemap_danhsach-csyt.xml', $content);
            }
            if($rq->type == 'danhsach-nhathuoc'){
                file_put_contents('sitemap_danhsach-nhathuoc.xml', $content);
            }
            if($rq->type == 'danhsach-benh'){
                file_put_contents('sitemap_danhsach-benh.xml', $content);
            }
            if($rq->type == 'danhsach-tuyendung'){
                file_put_contents('sitemap_danhsach-tuyendung.xml', $content);
            }
            if($rq->type == 'danhsach-khuyenmai'){
                file_put_contents('sitemap_danhsach-khuyenmai.xml', $content);
            }

            echo '<h1>Tạo sitemap thành công!</h1>';
        }
?>
<style type="text/css">
    body {
    text-align: center;
}
</style>
<form>
    <h1>Cập nhật site map</h1>
    <label>Chọn site map <br/>
        <select name="type">
            <option value="danhsach-bs">danhsach-bs</option>
            <option value="danhsach-csyt">danhsach-csyt</option>
            <option value="danhsach-nhathuoc">danhsach-nhathuoc</option>
            <option value="danhsach-benh">danhsach-benh</option>
            <option value="danhsach-thuoc">danhsach-thuoc</option>
            <option value="danhsach-hoibacsi">danhsach-hoibacsi</option>
            <option value="danhsach-baiviet">danhsach-baiviet</option>
            <option value="danhsach-khuyenmai">danhsach-khuyenmai</option>
            <option value="danhsach-tuyendung">danhsach-tuyendung</option>
        </select>
    </label><br/>
    <label> <br/>
        <button>Cập nhật</button>
    </label>
</form>
<?php
        exit;
    }
    function render_content_bs(){

    }
    function begin_xml($is_echo = true){
        $content = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        if($is_echo){
            echo $content;
        }
        return $content;
    }
    function end_xml($is_echo = true){
        $content = '</urlset>';
        if($is_echo){
            echo $content;
        }
        return $content;
    }
    function render_xml($data){
        $this->begin_xml();
?>
    <sitemap><loc>https://sanwp.com/post-sitemap.xml</loc><lastmod>2021-04-22T16:07:43+07:00</lastmod></sitemap>
    <sitemap>
        <loc>https://sanwp.com/page-sitemap.xml</loc>
        <lastmod>2021-05-14T09:26:55+07:00</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://sanwp.com/product-sitemap.xml</loc>
        <lastmod>2021-06-20T15:49:15+07:00</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://sanwp.com/category-sitemap.xml</loc>
        <lastmod>2021-04-22T16:07:43+07:00</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://sanwp.com/product_cat-sitemap.xml</loc>
        <lastmod>2021-06-20T15:49:15+07:00</lastmod>
    </sitemap>
<?php
        $this->end_xml();
    }
    
}
