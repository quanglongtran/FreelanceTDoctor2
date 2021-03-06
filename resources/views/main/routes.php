<?php

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


Route::get('/', 'HomeController@index');
Route::get('/co-so-y-te/{id}/{speciality}','HomeController@chitiet_csyt')->name('id');
Route::get('/co-so-y-te/{id}/','HomeController@chitiet_csyt')->name('id');
Route::get('/nha-thuoc/{id}/','HomeController@chitiet_nhathuoc')->name('id');

Route::get('/api/v1/search','ApiController@search');
Route::post('/api/district','ApiController@district');

Route::get('/messages', 'MessagesController@index');


Route::get('/dang-xuat','HomeController@dangxuat');
Route::get('/hoi-bac-si', 'HomeController@hoibacsi');

Route::post('/hoi-bac-si/dat-cau-hoi', 'HomeController@hoibacsiPost');
Route::get('/hoi-bac-si/{id}','HomeController@hoibacsiview')->name('id');
Route::post('/hoi-bac-si/{id}','HomeController@bacsitraloi')->name('tra-loi');
//Route::post('/hoi-bac-si/{id}','HomeController@test');

Route::get('/hoi-bac-si/tuyen-chon/{id}','HomeController@hoibacsi_tuyenchon')->name('id');
Route::get('/hoi-bac-si/tuyen-chon/{id}/{khoa}','HomeController@hoibacsi_tuyenchon')->name('id');
Route::get('/danh-sach/hoi-bac-si', 'HomeController@hoibacsi_danhsach');
//Route::get('/danh-sach/hoi-bac-si{speciality}', 'HomeController@hoibacsi_danhsach');
Route::post('/comment','ApiController@comment');
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
Route::get('/danh-sach-nha-thuoc','HomeController@danhsach_nhathuoc');
Route::get('/danh-sach/bac-si','HomeControsearchDistanceller@bacsi_danhsach');
Route::get('/danh-sach/bac-si/{id}/','HomeController@bacsi_detail')->name('id');
Route::get('/danh-sach/bac-si/{id}/{speciality}/','HomeController@bacsi_detail')->name('id');

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
Route::get('/thuoc/{qid}','HomeController@chitietthuoc')->name('qid');

Route::get('/khuyen-mai','HomeController@khuyenmai');
Route::get('/khuyen-mai/{url}','HomeController@khuyenmaidetail')->name('url');
Route::post('/apilistkhuyenmai', 'HomeController@listkhuyenmai');

//
Route::get('bai-viet/chuyen-muc/{id}/{aslias}', 'HomeController@danhmuc');
Route::get('/bai-viet','HomeController@get');

Route::get('/bai-viet/{qid}','HomeController@chitietbaiviet')->name('qid');
Route::get('/chuyen-muc/{qid}','HomeController@chuyenmuc')->name('qid');

//-- #vngocvan
//-- Submit comment in article
//Route::post('/comment_article/{url}','ApiController@comment_article')->name('url');
Route::post('/comment_article/{url}','HomeController@comment')->name('url');
Route::post('/comment_doctor/{url}','HomeController@commentdoctor')->name('url');
Route::post('/comment_clinic/{url}','HomeController@commentclinic')->name('url');
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/event', 'MessagesController@indexEvent');

Route::get('/test',function()
{
    event(new App\Events\MessagesEvent());
    return "event fired";
});
//Route::post('/apiappfacebook','HomeController@LoginFacebookMobile');
Route::post('/apiappfacebook','HomeController@loginface');
Route::post('/check-account-exist','HomeController@checkAccountExist');

Route::get('/sale','HomeController@sale_ads');


Route::get('/nap-tien',				'NganLuongController@payment')->name('naptien');
Route::get('/nap-tien/{orderid}',	'NganLuongController@cancel')->name('huy_naptien');
Route::get('/ket-qua',				'NganLuongController@success')->name('ketqua_naptien');

Route::post('/nap-tien',			'NganLuongController@payment')->name('naptien');
Route::post('/nap-tien/{orderid}',	'NganLuongController@cancel')->name('huy_naptien');
Route::post('/ket-qua',				'NganLuongController@success')->name('ketqua_naptien');

// Thắng add 20181107
Route::post("/kiem-tra-vi-tien",     'NganLuongController@kiemtravitien');
Route::post("/nap-tien-vao-vi",      'NganLuongController@naptienvaovi');
Route::post("/lich-su-nap-tien",     'NganLuongController@lichsunaptien');
Route::get("/test-api",              'HomeController@testapi');
Route::post("/test-post-api",        'HomeController@testpostapi');
Route::get('/dangnhapcongtac',       'HomeController@collaborators_login');
Route::post('/dangnhapcongtac',      'HomeController@collaborators_post_login');
Route::get('/congtacvien/danhsach',  'HomeController@collaborators_danhsach');
Route::get('/congtacvien/thoigiandung',  'HomeController@collaborators_danhsach_thoigiandung');
Route::get('/congtacvien/dangky',    'HomeController@collaborators_dangky');
Route::post('/vi-tri/get',            'HomeController@getLocation');
Route::post('/vi-tri/set',            'HomeController@setLocation');
Route::post('/vi-tri/timkiem',        'HomeController@searchDistance');

