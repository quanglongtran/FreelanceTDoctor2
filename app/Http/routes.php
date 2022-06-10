<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

include_once 'routers_api_v3.php';
include_once 'routeV2.php';

Route::get('/doi-tac','ViewController@doitac');
Route::get('/ds-doi-tac','ViewController@doitac_list');

Route::get('/{id}.html','ViewController@index_html')->name('id');

Route::get('/image/resizes/{size}/{imagePath}', 'ImageController@flyResize')->where('imagePath', '(.*)');

Route::get('/get_app_versions','BaseController@get_app_versions');
Route::post('/get_app_versions','BaseController@get_app_versions');
Route::post('/sua-trang/{id}','ViewController@sua_trangPost')->name('id');
Route::post('/sua-danh-muc','ViewController@sua_danhmucPost');
Route::get('/sua-trang/{id}','ViewController@sua_trang');
Route::get('/trang/{url}','ViewController@trang');
Route::get('/hotro','ViewController@hotro');
Route::get('/create-sitemap','BaseController@createSitemap');
//======add for benh an===========
Route::get('/benhan','HomeController@getBenhan');
Route::get('/benhan/{id}','HomeController@getBenhanchitiet');
Route::post('/benhan','HomeController@postBenhan');
Route::post('/chuyen_benhan','HomeController@postChuyenBenhan');
//======add new api for chat===========
Route::post('/chatapi/get-agora-token','ChatRoomController@getAgoraToken');
Route::post('/chatapi/send-push-message','ChatRoomController@sendPushMessage');
Route::post('/chatapi/update-useragent','ChatRoomController@updateUserAgent');
Route::post('/chatapi/update-token','ChatRoomController@updateToken');
Route::get('/chatapi/get-user','ChatRoomController@getUser');
Route::post('/chatapi/get-user','ChatRoomController@getUser');
Route::get('/chatapi/get-token','ChatRoomController@getToken');
Route::post('/chatapi/send-message','ChatRoomController@sendMessage');
Route::post('/chatapi/get-messages','ChatRoomController@getMessages');
Route::get('/chatapi/get-avatar/{user_id}','ChatRoomController@getAvatar');
Route::post('/chatapi/get-list-rooms','ChatRoomController@getListRooms');
Route::post('/chatapi/get-list-rooms-update','ChatRoomController@getListRoomsUpdate');
Route::post('/chatapi/update-message-status','ChatRoomController@updateMessageStatus');
Route::post('/chatapi/get-list-doctor-rooms','ChatRoomController@getListDoctorRooms');
Route::post('/chatapi/add-doctor-rooms','ChatRoomController@addDoctorRooms');
//======add new api for chat===========
//======new api for new app version======
// Route::post('/api/v2/dang-ky-mobile','Apiv2Controller@postDangKyMobilev2');
Route::post('/api/v2/dang-ky-mobile','Apiv2Controller@postDangky3');
Route::get('/api/v2/bac-si','Apiv2Controller@getBacSi');
Route::post('/api/v2/bac-si','Apiv2Controller@getBacSi');
Route::post('/api/v2/bac-si-yeu-thich','Apiv2Controller@getBacSiYeuThich');
Route::post('/api/v2/bac-si-cua-toi','Apiv2Controller@getBacSiCuaToi');
Route::post('/api/v2/lich-nhac','Apiv2Controller@getLichNhac');
Route::post('/api/v2/lich-nhac-chi-tiet','Apiv2Controller@getLichNhacChiTiet');
Route::post('/api/v2/tintuc-mobile','Apiv2Controller@getTintucMobile');
Route::post('/api/v2/tintuc-mobile-chitiet','Apiv2Controller@getTintucChitietMobile');
Route::post('/api/v2/hoi-dap','Apiv2Controller@getHoidapMobile');
//======new api for new app version======

//facebook
Route::get('/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('/facebook/callback', 'Auth\AuthController@handleProviderCallback');
//api
Route::get('/api/v0.1/article','ApiController@article');
Route::get('/api/v0.1/article/{id}','ApiController@articleWhereId');

Route::get('/api/v0.1/deals','ApiController@deals');
Route::get('/api/v0.1/deals/{id}','ApiController@dealsWhereId');

Route::get('/api/v0.1/doctor','ApiController@doctor');
Route::get('/api/v0.1/doctor/{id}','ApiController@doctorWhereId');
Route::get('/api/v0.1/doctor_speciality/{id}','ApiController@doctorWhereSpeciality');
Route::post('/api/v0.1/doctor/get/timework','ApiController@doctorTimeWorkWithId');
Route::post('/api/v0.1/doctor/update/timework','ApiController@doctorUpdateTimeWork');

Route::post('/api/v0.1/notify/get','ApiController@notifyWithDoctorId');
Route::post('/api/v0.1/notify/add','ApiController@notifyAdd');
Route::post('/api/v0.1/notify/upload-image','ApiController@apiUploadImgNotify');

Route::post('/api/v0.1/clinical_achievements/get','ApiController@clinicalAchievementsWithDoctorId');
Route::post('/api/v0.1/clinical_achievements/add','ApiController@clinicalAchievementsAdd');
Route::post('/api/v0.1/clinical_achievements/remove','ApiController@clinicalAchievementsRemove');
Route::post('/api/v0.1/clinical_achievements/upload-image','ApiController@apiUploadImgClinicalAchievements');
Route::post('/api/v0.1/clinical_achievements/upload-images','ApiController@apiUploadImgsClinicalAchievements');

Route::get('/api/v0.1/clinic','ApiController@clinic');
Route::get('/api/v0.1/clinic/{id}','ApiController@clinicWhereId');

Route::get('/api/v0.1/service/{id}','ApiController@serviceWhereId');

Route::get('/api/v0.1/specialities/{id}','ApiController@specialitiesWhereId');

Route::get('/api/v0.1/question','ApiController@question');
Route::get('/api/v0.1/question/{id}','ApiController@questionWhereId');

Route::get('/api/v0.1/answers/{id}','ApiController@answersWhereId');
Route::get('/api/v0.1/answersWhere/{id}','ApiController@answersMainWhereId');

//thuốc
Route::get('/api/v0.1/medicine','ApiController@medicine');
Route::get('/api/v0.1/medicine/{id}','ApiController@medicineWhereId');

//bệnh
Route::get('/api/v0.1/disease','ApiController@disease');
Route::get('/api/v0.1/disease/{id}','ApiController@diseaseWhereId');

Route::get('/api/v0.1/user/{id}','ApiController@userWhereId');

Route::group(['prefix' => 'api/v0.1'], function () {
    // Route::post('/short', 'UrlMapperController@store');
    Route::post('/login', 'ApiController@login_api');
    Route::group(['middleware' => ['jwt.auth']], function (){
        Route::post('/dat-cau-hoi', 'ApiController@hoibacsiPost');
        Route::get('/get-cau-hoi', 'ApiController@getQuestion');
    });
});

// appointment schedule
Route::post('/api/v0.1/appointment_schedule','ApiController@appointmentSchedule');
Route::get('/api/v0.1/appointment_schedule/add','ApiController@appointmentScheduleAdd');

//hunglam quen-mat-khau
Route::get('/ve-chung-toi', 'HomeController@aboutUs');
Route::get('/tuyen-dung', 'HomeController@recruitment');
Route::get('/lien-he', 'HomeController@contactUs');
Route::get('/quy-trinh-giai-quyet-tranh-chap', 'HomeController@disputeResolution');
Route::get('/chinh-sach-bao-mat-thong-tin-khach-hang', 'HomeController@informationSecurityCustomer');
Route::get('/quen-mat-khau', 'HomeController@resetPassword');
Route::get('/dang-xay-dung', 'HomeController@construction');
Route::get('/huong-dan-user', 'HomeController@userGuide');
Route::get('/huong-dan-bac-si', 'HomeController@professionalGuide');
Route::get('/huong-dan-phong-kham', 'HomeController@placeGuide');
Route::get('/vou-cher', 'HomeController@voucher');


//Route::get('/', 'HomeController@index');
Route::get('/co-so-y-te/{id}/{speciality}','ViewController@chitiet_csyt')->name('id');
Route::get('/co-so-y-te/{id}/','ViewController@chitiet_csyt')->name('id');
Route::get('/nha-thuoc/{id}/','HomeController@chitiet_nhathuoc')->name('id');

Route::get('/api/v1/search','ApiController@search');
Route::post('/api/district','ApiController@district');

Route::get('/messages', 'MessagesController@index');


Route::get('/dang-xuat','HomeController@dangxuat');
Route::get('/hoi-bac-si', 'ViewController@hoibacsi');

Route::post('/hoi-bac-si/dat-cau-hoi', 'HomeController@hoibacsiPost');
Route::get('/hoi-bac-si/{id}','ViewController@hoibacsiview')->name('id');
Route::post('/hoi-bac-si/{id}','HomeController@bacsitraloi')->name('tra-loi');
//Route::post('/hoi-bac-si/{id}','HomeController@test');

Route::get('/hoi-bac-si/tuyen-chon/{id}','HomeController@hoibacsi_tuyenchon')->name('id');
Route::get('/hoi-bac-si/tuyen-chon/{id}/{khoa}','HomeController@hoibacsi_tuyenchon')->name('id');
Route::get('/danh-sach/hoi-bac-si', 'HomeController@hoibacsi_danhsach');
//Route::get('/danh-sach/hoi-bac-si{speciality}', 'HomeController@hoibacsi_danhsach');
Route::post('/comment','ApiController@comment');
Route::post('/sua-comment','HomeController@suaComment');
Route::post('/deal_comment','HomeController@dealcomment');
//Route::get('/bai-viet', 'HomeController@listbaiviet');
//Route::get('/bai-viet/{id}','HomeController@baivietdetail')->name('id');
//Route::get('bai-viet/chuyen-muc/{id}/{aslias}', 'HomeController@danhmuc');
//Route::get('/bai-viet', 'HomeController@get');

//Route::get('/bai-viet/{qid}','HomeController@chitietbaiviet')->name('qid');
//Route::get('/chuyen-muc/{qid}','HomeController@chuyenmuc')->name('qid');

Route::get('/benh/tim-kiem','HomeController@timkiem');

Route::get('/tim-kiem','HomeController@timkiem');

Route::get('/danh-sach','HomeController@danhsach_csyt');
Route::get('/danh-sach-tuyen-dung','ViewController@danhsach_tuyendung');
Route::get('/danh-sach-nha-thuoc','HomeController@danhsach_nhathuoc');
Route::get('/danh-sach/bac-si','ViewController@viewDoctors');
Route::get('/danh-sach/bac-si/{id}/','ViewController@bacsi_detail')->name('id');
Route::get('/danh-sach/bac-si/{id}/{speciality}/','ViewController@bacsi_detail')->name('id');


Route::get('/chuyen-khoa','HomeController@chuyenkhoa');
Route::get('/chuyen-khoa/{id}/','HomeController@chuyenkhoadetail');
Route::post('/api/v1/{method}','ApiController@v1');
Route::post('/api/v1/professional/comment/create','ApiController@professionalcommentcreate');

Route::get('/dang-ky','HomeController@getdangky');
Route::post('/dang-ky','HomeController@postDangky');
Route::post('/dangkyapp','HomeController@postDangkyApp');
Route::post('/check/existphone','HomeController@checkPhoneExist');

// Thang add 20181110 start
Route::post('/cap-nhat-user','HomeController@postCapNhatApp');
// Thang add 20181110 end

Route::post('/infodoctor','HomeController@postInfoDoctor');

Route::get('/dang-nhap','HomeController@dangnhap');
Route::post('/dang-nhap-mobile','HomeController@postDangNhapMobile');

Route::post('/apiapp','HomeController@testMobile');

Route::post('/test-mobile','HomeController@testMobile');


//Route::post('/apiapp-mobile','HomeController@apiappMobile');

Route::post('/dang-nhap','HomeController@postDangnhap');
Route::post('/times-call','HomeController@timesCall');
Route::post('/times-call-v2','HomeController@timesCallV2');
Route::post('/times-call-v2-userid','HomeController@timesCallV2WithUserId');

//social login
Route::get('/redirect/{social}', 'Auth\LoginController@redirect');
Route::get('/callback/{social}', 'Auth\LoginController@callback');


//Route::get('/dang-xuat','HomeController@logout');

Route::get('/tai-khoan','HomeController@taikhoan');
Route::get('/tai-khoan/{method}','HomeController@taikhoan_method')->name('method');

Route::post('/tai-khoan/viet-bai','HomeController@vietbai');
Route::post('/tai-khoan/them-bac-si','HomeController@thembacsi');
Route::post('/tai-khoan/doi-mat-khau','HomeController@doimatkhau');
Route::post('/tai-khoan/them-csyt','HomeController@themcsyt');
Route::post('/tai-khoan/them-nha-thuoc','HomeController@themnhathuoc');

Route::get('/benh','HomeController@benh');
Route::get('/benh/{qid}','HomeController@chitietbenh')->name('qid');
Route::get('/thuoc','HomeController@thuoc');
Route::get('/thuoc/danh-sach','HomeController@thuoc');
Route::get('/thuoc/{qid}','ViewController@chitietthuoc')->name('qid');

Route::get('/khuyen-mai','HomeController@khuyenmai');
Route::get('/khuyen-mai/{url}','ViewController@khuyenmaidetail')->name('url');
Route::post('/apilistkhuyenmai', 'HomeController@listkhuyenmai');

//
Route::get('bai-viet/chuyen-muc/{id}/{aslias}', 'HomeController@danhmuc');

Route::get('/bai-viet','ViewController@baiviet');
Route::get('/bai-viet/{qid}','ViewController@chitietbaiviet');

Route::get('/bai-viet-old','HomeController@get');
Route::get('/bai-viet-old/{qid}','HomeController@chitietbaiviet')->name('qid');

Route::get('/chuyen-muc/{qid}','HomeController@chuyenmuc')->name('qid');

//-- #vngocvan
//-- Submit comment in article
//Route::post('/comment_article/{url}','ApiController@comment_article')->name('url');
Route::post('/comment_article/{url}','HomeController@comment')->name('url');
Route::post('/comment_doctor/{url}','HomeController@commentdoctor')->name('url');
Route::post('/comment_clinic/{url}','HomeController@commentclinic')->name('url');
Route::auth();

//Route::get('/home', 'HomeController@index');

Route::get('/event', 'MessagesController@indexEvent');

Route::get('/test',function()
{
    event(new App\Events\MessagesEvent());
    return "event fired";
});
//Route::post('/apiappfacebook','HomeController@LoginFaceb/danh-sachookMobile');
Route::post('/apiappfacebook','HomeController@loginface');
Route::post('/loginface','HomeController@loginfaceweb');
Route::post('/logingg','HomeController@loginggweb');
Route::post('/check-account-exist','HomeController@checkAccountExist');

Route::get('/sale','HomeController@sale_ads');


//Route::get('/nap-tien',				'NganLuongController@payment')->name('naptien');
//Route::get('/nap-tien/{orderid}',	'NganLuongController@cancel')->name('huy_naptien');
//Route::get('/ket-qua',				'NganLuongController@success')->name('ketqua_naptien');

//Route::post('/nap-tien',			'NganLuongController@payment')->name('naptien');
//Route::post('/nap-tien/{orderid}',	'NganLuongController@cancel')->name('huy_naptien');
//Route::post('/ket-qua',				'NganLuongController@success')->name('ketqua_naptien');

// Thắng add 20181107
Route::post("/kiem-tra-vi-tien",     'NganLuongController@kiemtravitien');
Route::post("/nap-tien-vao-vi",      'NganLuongController@naptienvaovi');
Route::post("/lich-su-nap-tien",     'NganLuongController@lichsunaptien');
Route::get("/test-api",              'HomeController@testapi');
Route::post("/test-post-api",        'HomeController@testpostapi');
Route::get('/dangnhapcongtac',       'HomeController@collaborators_login');
Route::post('/dangnhapcongtac',      'HomeController@collaborators_post_login');
Route::get('/congtacvien/danhsach',  'HomeController@collaborators_danhsach');
Route::get('/congtacvien/danhsachnaptien',  'HomeController@collaborators_danhsachnaptien');
Route::get('/congtacvien/thoigiandung',  'HomeController@collaborators_danhsach_thoigiandung');
Route::get('/congtacvien/dangky',    'HomeController@collaborators_dangky');

Route::post('/vi-tri/get',            'HomeController@getLocation');
Route::post('/vi-tri/set',            'HomeController@setLocation');
Route::post('/vi-tri/timkiem',        'HomeController@searchDistance');


Route::post('/api/chuyen-khoa',             'HomeController@apiChuyenKhoa');
Route::post('/api/danh-sach-cau-hoi',       'HomeController@apidscauhoi');
Route::post('/api/danh-sach/bac-si',        'HomeController@apiDanhSachBacSi');
Route::post('/api/danh-sach/phong-kham',    'HomeController@apiDanhSachPhongKham');
Route::post('/api/doi-mat-khau',            'HomeController@apiDoiMatKhau');
Route::post('/api/danh-sach/tinh-thanh',    'HomeController@apiDanhSachTinhThanh');

Route::get('/api/update/version',    'HomeController@apiVersion');
Route::post('/api/thanh-toan-tin-nhan',    'HomeController@thanhToanTinNhan');
Route::post('/api/thanh-toan-tin-nhan-2',    'HomeController@thanhToanTinNhan2');

////////////////////////////////////////////// v2 ///////////////////////////////////////////////////////
Route::post('/v2/dang-nhap', 'ViewController@postDangnhap');
Route::post('/v2/dang-nhap-2', 'ViewController@postDangnhap2');
Route::post('/v2/dang-ky', 'ViewController@postDangky');
Route::post('/v2/dang-ky-2', 'ViewController@postDangky2');
Route::get('/dangxuat','ViewController@dangxuat');

Route::get('/', 'ViewController@index')->name('front.index.get');
Route::get('/home', 'ViewController@index');
Route::get('/frameLogin', 'ViewController@frameLogin');
Route::get('/tao-tai-khoan','ViewController@gettaotaikhoan');
Route::post('/tao-tai-khoan','ViewController@posttaotaikhoan');


Route::get('/danh-sach-bac-si', 'ViewController@viewDoctors');
Route::get('/danh-sach-bac-si/{vitri}/{chuyen_khoa}', 'ViewController@viewDoctors_new');
Route::get('/goto/{id}', 'ViewController@gotoDetails')->name('goto');
Route::get('/danh-sach-bac-si-chi-tiet/{url}', 'ViewController@bacsi_detail');
Route::get('/tuyendung/{url}', 'ViewController@tuyendung_chitiet');
Route::get('/danh-sach-bac-si-chi-tiet/{url}/{speciality}/','ViewController@bacsi_detail');
Route::get('/bacsi-cuatoi/','ViewController@bacsi_cuatoi');
Route::get('/csyt-cuatoi/','ViewController@csyt_cuatoi');

Route::get('/thuoc-danhsach','ViewController@danhsach_thuoc');
Route::get('/thuoc-chitiet/{id}','ViewController@chitietthuoc'); 

Route::get('/danhsach-phongkham','ViewController@danhsach_csyt');
Route::get('/phongkham{id}/','ViewController@gotoPKDetails');
Route::get('/bacsi{id}/','ViewController@gotoBSDetails');
Route::get('/phongkham-chitiet/{id}/','ViewController@chitiet_csyt');
Route::get('/phongkham-chitiet/{id}/{speciality}','ViewController@chitiet_csyt');

Route::get('/tim-kiem','ViewController@timkiem');

Route::get('/benh','ViewController@benh');
Route::get('/benh/tim-kiem','ViewController@timkiem');
Route::get('/benh/{qid}','ViewController@chitietbenh');

Route::get('/baiviet','ViewController@baiviet');
Route::get('/baiviet/{qid}','ViewController@chitietbaiviet');
Route::get('/chuyenmuc/{qid}','ViewController@chuyenmuc');
Route::get('/tags/{qid}','ViewController@tags');

Route::post('/hoibacsi/datcauhoi', 'ViewController@hoibacsiPost');
Route::post('/hoibacsi/{id}','ViewController@bacsitraloi');
Route::get('/hoidapchung', 'ViewController@hoidapchung');
Route::get('/hoibacsi', 'ViewController@hoibacsi');
Route::get('/hoibacsi/{chuyen_khoa}/{vitri}', 'ViewController@hoibacsi_new');
Route::get('/hoidapchung/{chuyen_khoa}/{vitri}', 'ViewController@hoidapchung_new');
Route::get('/hoibacsi/tuyenchon/{id}','ViewController@hoibacsi_tuyenchon');
Route::get('/hoibacsi/{id}','ViewController@hoibacsiview');
Route::get('/henlichkham', 'ViewController@henlichkham');
Route::get('/henlichkham-csyt', 'ViewController@henlichkham_csyt');
Route::post('/henlichkham', 'ViewController@henlichkhampost');

Route::post('/apihoibacsi/datcauhoi', 'ViewController@apiHoiBacSiPost');
Route::post('/apihoibacsi/danhsach', 'ViewController@apiDanhSachCauHoi');
Route::post('/apihoibacsi/danhsachcauchuatraloi', 'ViewController@apiNumberQuestionDoctor');
Route::post('/apihoibacsi/traloicauhoi', 'ViewController@apiTraLoiCauHoi');
Route::post('/traloicauhoiweb', 'ViewController@userComment');
Route::get('/traloicauhoiweb', 'ViewController@userCommentGet');
Route::post('/api/upload-image', 'ViewController@apiUploadHinh');
Route::post('/apihoibacsi/danhsachbinhluan', 'ViewController@apiDanhSachBinhLuan');

Route::post('/apihoibacsi/traloi/{id}','ViewController@apiBacSiTraLoi');

Route::get('/chuyenkhoa','ViewController@chuyenkhoa');
Route::get('/chuyenkhoa/{id}/','ViewController@chuyenkhoadetail');

Route::get('/danh-sach-tin-tuc','ViewController@danhsach_tintuc');
Route::get('/danh-sach-nha-thuoc','ViewController@danhsach_nhathuoc');
Route::get('/nha-thuoc/{id}/','ViewController@chitiet_nhathuoc');

Route::get('/vechungtoi', 'ViewController@aboutUs');

Route::get('/khuyenmai','ViewController@khuyenmai');
Route::get('/khuyenmai/{url}','ViewController@khuyenmaidetail');

Route::get('/taikhoan','ViewController@taikhoan');

Route::get('/taikhoan/sua-thong-tin-csyt','ViewController@getChangeClinicInfo');
Route::post('/taikhoan/sua-thong-tin-csyt','ViewController@postChangeClinicInfo');

Route::get('/taikhoan/benhnhan_detail/{id}','ViewController@taikhoan_benh_nhan_detail');
Route::get('/benhnhan_detail/{id}','ViewController@benh_nhan_detail');
Route::get('/taikhoan/{method}','ViewController@taikhoan_method');
Route::post('/taikhoan/doimatkhau','ViewController@doimatkhau');
Route::post('/taikhoan/thembacsi','ViewController@thembacsi');
Route::post('/taikhoan/themcsyt','ViewController@themcsyt');
Route::post('/taikhoan/themnhathuoc','ViewController@themnhathuoc');
Route::post('/taikhoan/vietbai','ViewController@vietbai');
Route::post('/taikhoan/lamsang','ViewController@lamsang');
Route::post('/taikhoan/thongbao','ViewController@thongbao');
Route::post('/taikhoan/tuyendung','ViewController@tuyendung');
Route::post('/taikhoan/admin-recharge-update','ViewController@update_balance');
Route::get('/naptien','ViewController@payment')->name('naptien');
Route::get('/nap-tien/{orderid}',	'ViewController@cancel')->name('huy_nap-tien');
Route::get('/ket-qua',				'ViewController@success')->name('ket-qua_nap-tien');

Route::post('/naptien','ViewController@payment')->name('naptien');
Route::post('/nap-tien/{orderid}',	'ViewController@cancel')->name('huy_naptien');
Route::post('/ket-qua',				'ViewController@success')->name('ketqua_naptien');

Route::get('/lienhe', 'ViewController@contactUs');
Route::get('/quytrinh-giaiquyet-tranhchap', 'ViewController@disputeResolution');
Route::get('/chinhsach-baomat-thongtin-khachhang', 'ViewController@informationSecurityCustomer');

Route::get('/chat','ViewController@chatDoc');
Route::get('/recharge','ViewController@recharge');

Route::get('/dat-lich-hen','ViewController@datlichhen');
Route::post('/dat-lich-hen','ViewController@postdatlichhen');

Route::get('/dang-ky-bac-si','ViewController@registerDoctor');
Route::post('/dang-ky-bac-si','ViewController@registerDoctorPost');

Route::get('/dang-ky-phong-kham','ViewController@getRegisterClinic')->name('clinic.register.get');
Route::post('/dang-ky-phong-kham','ViewController@postRegisterClinic')->name('clinic.register.post');


//////////////////////////////////////// Route En /////////////////////////////////////////////

$str_enController = 'ViewController';

Route::get('/en', $str_enController.'@index');

Route::post('/en/dang-nhap', $str_enController.'@postDangnhap');
Route::post('/en/dang-ky', $str_enController.'@postDangky');
Route::get('/en/dangxuat',$str_enController.'@dangxuat');

Route::get('/en/danh-sach-bac-si', $str_enController.'@viewDoctors');
Route::get('/en/danh-sach-bac-si-chi-tiet/{url}', $str_enController.'@bacsi_detail');
Route::get('/en/danh-sach-bac-si-chi-tiet/{url}/{speciality}/',$str_enController.'@bacsi_detail');

Route::get('/en/danhsach-phongkham',$str_enController.'@danhsach_csyt');
Route::get('/en/phongkham-chitiet/{id}/',$str_enController.'@chitiet_csyt');
Route::get('/en/phongkham-chitiet/{id}/{speciality}',$str_enController.'@chitiet_csyt');

Route::get('/en/benh',$str_enController.'@benh');
Route::get('/en/benh/tim-kiem',$str_enController.'@timkiem');
Route::get('/en/benh/{qid}',$str_enController.'@chitietbenh');

Route::get('/en/thuoc-danhsach',$str_enController.'@danhsach_thuoc');
Route::get('/en/thuoc-chitiet/{id}',$str_enController.'@chitietthuoc');

Route::get('/en/danh-sach-nha-thuoc',$str_enController.'@danhsach_nhathuoc');
Route::get('/en/nha-thuoc/{id}/',$str_enController.'@chitiet_nhathuoc');

Route::post('/en/hoibacsi/datcauhoi', $str_enController.'@hoibacsiPost');
Route::get('/en/hoibacsi', $str_enController.'@hoibacsi');
Route::get('/en/hoibacsi/tuyenchon/{id}',$str_enController.'@hoibacsi_tuyenchon');
Route::get('/en/hoibacsi/{id}',$str_enController.'@hoibacsiview');
Route::post('/en/hoibacsi/{id}',$str_enController.'@bacsitraloi');
Route::get('/en/chuyenkhoa',$str_enController.'@chuyenkhoa');
Route::get('/en/chuyenkhoa/{id}/',$str_enController.'@chuyenkhoadetail');

Route::get('/en/baiviet',$str_enController.'@baiviet');
Route::get('/en/baiviet/{qid}',$str_enController.'@chitietbaiviet');
Route::get('/en/chuyenmuc/{qid}',$str_enController.'@chuyenmuc');

Route::get('/en/vechungtoi', $str_enController.'@aboutUs');

Route::get('/en/khuyenmai',$str_enController.'@khuyenmai');
Route::get('/en/khuyenmai/{url}',$str_enController.'@khuyenmaidetail');

Route::get('/en/taikhoan',$str_enController.'@taikhoan');
Route::get('/en/taikhoan/{method}',$str_enController.'@taikhoan_method');
Route::post('/en/taikhoan/doimatkhau',$str_enController.'@doimatkhau');
Route::post('/en/taikhoan/thembacsi',$str_enController.'@thembacsi');
Route::post('/en/taikhoan/themcsyt',$str_enController.'@themcsyt');
Route::post('/en/taikhoan/themnhathuoc',$str_enController.'@themnhathuoc');
Route::post('/en/taikhoan/vietbai',$str_enController.'@vietbai');

Route::get('/en/naptien',$str_enController.'@payment')->name('en-naptien');
Route::get('/en/naptien/{orderid}', $str_enController.'@cancel')->name('en-huy_nap-tien');
Route::get('/en/ket-qua',               $str_enController.'@success')->name('en-ket-qua_nap-tien');

Route::post('/en/naptien',$str_enController.'@payment')->name('en-naptien');
Route::post('/en/naptien/{orderid}',    $str_enController.'@cancel')->name('en-huy_nap-tien');
Route::post('/en/ket-qua',              $str_enController.'@success')->name('en-ket-qua_nap-tien');

Route::post('/naptien','ViewController@payment')->name('nap-tien');
Route::post('/nap-tien/{orderid}',  'ViewController@cancel')->name('huy_naptien');
Route::post('/ket-qua',             'ViewController@success')->name('ketqua_naptien');

Route::get('/en/tim-kiem',$str_enController.'@timkiem');

Route::get('/en/lienhe', $str_enController.'@contactUs');
Route::get('/en/quytrinh-giaiquyet-tranhchap', $str_enController.'@disputeResolution');
Route::get('/en/chinhsach-baomat-thongtin-khachhang', $str_enController.'@informationSecurityCustomer');

Route::get('/en/chat',$str_enController.'@chatDoc');
Route::get('/en/recharge',$str_enController.'@recharge');
Route::get('/404','ViewController@page404');

