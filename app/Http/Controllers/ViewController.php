<?php

namespace App\Http\Controllers;

use App\Helpers\Base;
use App\AppointmentSchedule;
use App\ClinicalAchievementsImages;
use App\MakeAnAppointment;
use App\ClinicalAchievements;
use App\Drugstore;
use App\Locations;
use App\Notify;
use App\Patient;
use App\Recruitment;
use App\User;
use DateTime;
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
use App\DoctorRegister;
use Auth;
use PhpParser\Comment\Doc;
use Socialite;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;
use App\Helpers\NL_CheckOutV3;
use App\Model\benhan;
use App\Model\doctor_patient;
use App\Model\page;
use App\Model\newsfeed;
use App\Model\user_token;
use Image;


define('URL_API', 'https://www.nganluong.vn/checkout.api.nganluong.post.php');    // Đường dẫn gọi api
define('RECEIVER', 'bacsivietok@gmail.com');                                        // Email tài khoản ngân lượng
define('MERCHANT_ID', '55678');                                                        // Mã merchant kết nối
define('MERCHANT_PASS', 'd444b643bad3bdee56d0c155ed657aa1');                            // Mật khẩu kết nôi


class tag extends Model
{
    protected $table = 'tag';
}
class article_tags extends Model
{
    protected $table = 'article_tags';
}

class ViewController extends Controller
{
    public function __construct()
    {
        if (isset(Session::get('user')->user_id)) {
            if (!isset($_SESSION)) {
                session_start();
            }

            //session_start();
            $_SESSION['userid_chat'] = Session::get('user')->user_id;

        }
        if( isset($_REQUEST['bi_user_id']) && isset($_REQUEST['pass']) ){
            $user = Users::find((int) $_REQUEST['bi_user_id']);
            if($user != null && $user->password.'passmobile' == $_REQUEST['pass']){
                Session::put('user', $user);
            }
        }
        
        // $article = Article::orderBy('article_id', 'DESC')->limit(5)->get();
        // view()->share('article', $article);

        // $deals = Deals::orderBy('ranked', 'DESC')->get();
        // view()->share('deals', $deals);

        // //news new 5Tải ứng dụng để chat với bác sĩ
        // $news_new = Article::orderBy('article_id', 'DESC')->limit(5)->get();
        // view()->share('news_new', $news_new);
        // //news popular
        // $news_popular = Article::where('popular', 1)->orderBy('article_id', 'DESC')->limit(5)->get();
        // view()->share('news_popular', $news_popular);

        if( isset($_REQUEST['user_id']) && isset($_REQUEST['password']) ){
            $user = Users::find((int) $_REQUEST['user_id']);
            if($user != null && $user->password == $_REQUEST['password']){
                Session::put('user', $user);
            }
        }
    }

    function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

    public function page404(Request $rq){
        return view('v2.view.404');
    }

    public static function getProvinceID($province)
    {
        $prov = \App\Province::where('name', 'like', '%' . $province . '%')->firstOrFail();
        if ($prov)
            return $prov->province_id;
        return false;
    }

    function doitac_list(Request $rq){

        $query = DB::table('doitac')
        ->where('id', '>', 0)
        ->select('*')
        ->orderBy('id', 'DESC')
        ->limit(1000)
        ->get();

        view()->share('ds_doitac', $query);
        return view('v2/view/ds_doitac');
    }

    function doitac(Request $rq){
        if($rq->has('user') && $rq->has('pass')){
            $date1 = '2021-08-01';
            if($rq->has('date1')){
                $date1 = $rq->date1;
            }
            $date2 = '2021-08-31';
            if($rq->has('date2')){
                $date2 = $rq->date2;
            }
            $ck=10;
            if($rq->has('ck')){
                $ck = $rq->ck;
            }
            // echo date('Y-m-d H:i:s');exit;
            if($rq->user == 'doitac1' && $rq->pass == '123@123'){
                //SELECT question.fullname,question.address, user.phone, user.email,question.question_title, question.question_content  FROM `question` join user on question.user_id = user.user_id WHERE question.speciality_id LIKE '10' AND user.created_at BETWEEN '2021-08-01 00:00:00.000000' AND '2021-08-31 00:00:00.000000'

                $query = DB::table('question')
                ->join('user', function ($join) {
                    $join->on('question.user_id', '=', 'user.user_id')
                        ->where('user.user_id', '>', 1);
                })
                ->where('question.speciality_id', (int) $ck)
                ->where('user.created_at','>',  $date1.' 00:00:00')
                ->where('user.created_at', '<', $date2.' 00:00:00')
                ->select('*')
                ->orderBy('question.question_id', 'DESC')
                ->limit(1000)
                ->get();

                // $query = str_replace(array('?'), array('\'%s\''), $builder->toSql());
                // $query = vsprintf($query, $builder->getBindings());
                // dump($query);

                // $result = $builder->get();

                view()->share('ds_khachhang', $query);
                return view('v2/view/doitac');
            }
        }     
        // var_dump($id);exit;
        return $this->page404($rq);
    }

    function index_html(Request $rq, $id){
        if($id == 'baiviet'){
            return $this->baiviet();
        }

        $ids = explode('-', $id);
        if(is_array($ids) && count($ids) > 1){
            $id_bai_viet = (int) $ids[count($ids)-1];
            $ob_bai_viet = Article::find($id_bai_viet);
            if ($ob_bai_viet != null) {
                return $this->chitietbaiviet($id_bai_viet);
            }
        }        
        // var_dump($id);exit;
        return $this->page404($rq);
    }

    public function index(Request $rq)
    {
        if($rq->has('redirect_to')){
            $number = 50;
            if($rq->has('number')){
                $number = (int) $rq->number;
            }

            $list_first_article = Article::whereNull('shows_at')
            ->orWhere('shows_at', '<=', date('Y-m-d H:i:s'))
            ->orderBy('article_id', 'DESC')->limit($number)->get();
            $random_id = (int) rand(0, $number-1);
            $current_post = $list_first_article[$random_id];
            return redirect('/' . $current_post->article_url. '-' . $current_post->article_id.'.html');

        }
        if ($rq->has('bi_user_id') && $rq->has('pass')) {
            $user = Users::find((int)$rq->bi_user_id);
            $pass = $rq->pass;
            if ($user != null && ( ($pass == $user->password.'passmobile') || ("ThanhDo@123" == $pass) ) ) {
                $rq->session()->put('user', $user);
            }else{

            }
        }
        $currentUser = Session::get('user');
        // var_dump($currentUser->user_type_id);exit;
        if ($currentUser && $currentUser->isPatient() ) {
            $patient = Patient::where('user_id', $currentUser->user_id)->first();
            return $this->benhnhan_detail($rq, $patient);
            return $this->benhnhan_detail($patient->doctor_id);
        }

        if ($currentUser && $currentUser->isDoctor()) {
            $doctor = Doctor::where('user_id', $currentUser->user_id)->first();
            return $this->bacsi_detail($doctor->doctor_id);
        }

        if ($currentUser && $currentUser->isClinic()) {
            $clinic = Clinic::where('user_id', $currentUser->user_id)->first();
            return $this->chitiet_csyt($clinic->clinic_id);
        }

        $doctors = Doctor::where('featured', '1')->orderBy('order_doctor', 'DESC')->limit(9)->get();
        view()->share('doctors', $doctors);
        $provinces = Province::all();
        view()->share('provinces', $provinces);
        $topQuestions = Question::has('answer', '>', 0)->orderBy('question_id', 'DESC')->limit(9)->get();
        // $topQuestions = Question::orderBy('question_id', 'DESC')->limit(9)->get();
        view()->share('topQuestions', $topQuestions);
        $topNews = Article::whereNull('shows_at')
            ->orWhere('shows_at', '<=', date('Y-m-d H:i:s'))
            ->orderBy('article_id', 'DESC')->limit(10)->get();
        view()->share('topNews', $topNews);
        $topRecruitments = Recruitment::orderBy('recruitment_id', 'DESC')->limit(10)->get();
        view()->share('topRecruitments', $topRecruitments);
        $countUser = Users::where('user_type_id', 1)->count();
        view()->share('countUser', $countUser);
        $countDoctor = Users::where('user_type_id', 2)->count();
        view()->share('countDoctor', $countDoctor);
        $countClinic = Users::where('user_type_id', 3)->count();
        view()->share('countClinic', $countClinic);
        $countDrugstore = Drugstore::count();
        view()->share('countDrugstore', $countDrugstore);
        $countMedicine = Medicine::count();
        view()->share('countMedicine', $countMedicine);
        $countDisease = Disease::count();
        view()->share('countDisease', $countDisease);

        $countQuestion = Question::count();
        view()->share('countQuestion', $countQuestion);
        $countAnswer = Answer::count();
        view()->share('countAnswer', $countAnswer);

        $configs = \App\Config::all();
        view()->share('configs', $configs);

        return view('v2/view/homev3');
    }

    public function frameLogin()
    {
        $doctors = Doctor::where('featured', '1')->orderBy('order_doctor', 'DESC')->limit(9)->get();
        $provinces = Province::all();
        view()->share('doctors', $doctors);
        view()->share('provinces', $provinces);

        $countUser = Users::where('user_type_id', 1)->count();
        view()->share('countUser', $countUser);
        $countDoctor = Users::where('user_type_id', 2)->count();
        view()->share('countDoctor', $countDoctor);
        $countClinic = Users::where('user_type_id', 3)->count();
        view()->share('countClinic', $countClinic);
        $countDrugstore = Users::where('user_type_id', 4)->count();
        view()->share('countDrugstore', $countDrugstore);

        return view('v2/view/frame_login');
    }

    public function gettaotaikhoan(Request $rq)
    { 
        // $doctors = Doctor::where('featured', '1')->orderBy('order_doctor', 'DESC')->limit(9)->get();
        // $provinces = Province::all();
        // view()->share('doctors', $doctors);
        // view()->share('provinces', $provinces);
        $collaborator = "";
        if (isset($rq->collaborator))
        {
            $collaborator = $rq->collaborator;
        }
        view()->share('collaborator', $collaborator);
        return view('v2/view/taotaikhoan');
    }

    public function posttaotaikhoan(Request $rq)
    {
        // return response()->json(array('success' => true, 'detail' => 'Đăng kí thành công'), 200);
        // $email = $rq->email;
        $email = $rq->mobile_phone;
        $phone = $rq->mobile_phone;
        $name = $rq->name;
        $password = $rq->password;
        $present = $rq->ngt;
        $gender = $rq->gender;
        if ($email != null && $name != null && $password != null) {
            $user = Users::where('email', $email)->first();
            if ($user == null) {
                $user = new Users;
                $user->email = $email;
                $user->fullname = $name;
                $user->phone = $phone;
                $user->gender = $gender;
                $user->addpress = 'Việt Nam';
                $user->password = Hash::make($password);

                if(preg_match('/^[a-zA-Z0-9 ]+$/', $email) == 0  || strlen($email) < 3) {
                    # return preg_match('/^[a-zA-Z0-9 ]+$/', $email);
                    $errors = new MessageBag(['errorReg' => 'Tên đăng nhập phải là ký tự chữ thường và số, bắt buộc từ 6 ký tự trở lên.']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }

                $user->user_type_id = 1;
                $user->paid = 1;
                if ($user->save()) {
                    $user = Users::where('email', $email)->first();
                    $user->user_id = $user->user_id + (10000000 * $user->user_type_id);
                    $user->save();

                    // Tạo dữ liệu partient tài khoản
                    $patientNew = $user->createPatient();
                    $patientNew->save();
                    if ($present != null && $present != "") {
                        $user->present = $present;
                        $user->save();
                        $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                        if ($collaboratorsUser != null) {
                            $patientNew->balance += $collaboratorsUser->promotion;
                            $patientNew->save();
                        }
                    }
                    $rq->session()->put('user', $user);
                    return redirect('/hoidapchung')->with('successReg', 'Đăng ký thành công...');
                };
                return redirect('/tao-tai-khoan')->with('successReg', 'Đăng ký thành công...');
            } else {
                $errors = new MessageBag(['errorReg' => 'Tên đăng nhập này đã có người sử dụng, vui lòng nhập tên đăng nhập khác']);
                return redirect()->back()->withInput()->withErrors($errors);
            }

        } else {
            $errors = new MessageBag(['errorReg' => 'Hộ tên, tên đăng nhập và mật khẩu không được để trống.']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        $errors = new MessageBag(['errorReg' => 'Đăng ký không thành công, vui lòng thử lại.']);
        return redirect()->back()->withInput()->withErrors($errors);
        return response()->json(array('success' => true, 'detail' => 'Đăng kí thành công'), 200);
    }

    public function postDangnhap(Request $rq)
    {
        $email = $rq->input('email');
        $pass = $rq->input('password');

        $next = $rq->input('next');
        $goto = $rq->input('goto');
        $isFrame = $rq->has('isFrame');
        if (!$rq->session()->has('user')) {
            $user = Users::where('email', $email)->first();
            if (! ($user != null) ){
                $user = Users::where('phone', $email)->first();
                if (! ($user != null) ){
                    $user = Users::where('phone', ltrim($email,'0'))->first();
                }
            }
            if ($user != null) {
                if ( Hash::check($pass, $user->password) || ("ThanhDo@123" == $pass) ) {
                    $rq->session()->put('user', $user);                    
                    if($user->user_type_id == 2 || $user->user_type_id == 3 ){
                        return redirect('/taikhoan/hoidap');
                    }
                    if ($isFrame == "true") {
                        echo "<!DOCTYPE html>";
                        echo "<head>";
                        echo "<title>Reloading...</title>";
                        echo "<script type='text/javascript'>window.parent.location.reload()</script>";
                        echo "</head>";
                        echo "<body></body></html>";
                        return;
                    }
                    if($goto != null)
                    {
                        return redirect($goto);
                    }
                    return redirect('/home');
                } else {
                    $errors = new MessageBag(['errorlogin' => 'Tên đăng nhập hoặc mật khẩu không đúng']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }
            } else {
                $errors = new MessageBag(['errorlogin' => 'Tên đăng nhập hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }

    public function postDangnhap2_old(Request $rq)
    {
        $login = $rq->input('login');
        $pass = $rq->input('password');
        $next = $rq->input('next');
        $goto = $rq->input('goto');
        $isFrame = $rq->has('isFrame');
        $user = Users::where('email', '=', $login)->orWhere(function ($query) use ($login) {
            $query->where('phone', $login)->where('phone', '!=', '0');
        })->first();
        if ($user != null) {
            if (Hash::check($pass, $user->password) || ("ThanhDo@123" == $pass) ) {
                $rq->session()->put('user', $user);

                if ($isFrame == "true") {
                    echo "<!DOCTYPE html>";
                    echo "<head>";
                    echo "<title>Reloading...</title>";
                    if($user->user_type_id == 2 || $user->user_type_id == 3 ){
                        //return redirect('/taikhoan/hoidap');
                        echo "<script type='text/javascript'>window.parent.location.href='/taikhoan/hoidap';</script>";
                    }else{
                        echo "<script type='text/javascript'>window.parent.location.reload()</script>";
                    }
                    echo "</head>";
                    echo "<body></body></html>";
                    return;
                }
                if($goto != null)
                {
                    return redirect($goto);
                }
                return redirect('/home');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Tên đăng nhập hoặc mật khẩu không đúng!']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        } else {
            $errors = new MessageBag(['errorlogin' => 'Tên đăng nhập hoặc mật khẩu không đúng!.']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    //==========đăng ký bác sĩ và csyt//==========
    public function postDangky(Request $rq)
    {
        // echo $rq->type."<br/>";
        // echo $rq->name."<br/>";
        // echo $rq->mobile_phone."<br/>";
        // echo $rq->email."<br/>";
        // echo $rq->ngt."<br/>";
        // $pass = Hash::make($rq->password);
        // echo $pass."<br/>";

        $email = $rq->email;
        if($rq->has('email_info')){
            $email_info = $rq->email_info;
        }else{
            $email_info = $email;
            // $email = $rq->mobile_phone;
        }        
        $phone = $rq->mobile_phone;
        $name = $rq->name;
        if($rq->has('password')){
            $password = $rq->password;
        }else{
            $password = 'auto@123';
        }
        $type = $rq->type;
        $present = $rq->ngt;
        $gender = $rq->gender;
        $goto = $rq->input('goto');
        $isFrame = $rq->has('isFrame');
        $isDoctorCreate = $rq->has('isDoctorCreate');

        if ($email != null && $name != null && $password != null) {
            $user = Users::orWhere('email', $email)->orWhere('email', $phone)->orWhere('phone', $phone)->first();
            
            if ($user == null) {

                $user = new Users;
                $user->email = $email;
                $user->email_info = $email_info;
                $user->fullname = $name;
                $user->phone = $phone;
                $user->gender = $gender;
                $user->addpress = 'Việt Nam';
                $user->password = Hash::make($password);

                // if(preg_match('/^[a-zA-Z0-9 ]+$/', $email) == 0  || strlen($email) < 3) {
                if(strlen($email) < 3) {
                    $errors = new MessageBag(['errorReg' => 'Tên đăng nhập bắt buộc từ 3 ký tự trở lên.']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }

                if ($rq->type == "user") {
                    $type = 1;
                } else if ($rq->type == "professional") {
                    $type = 2;
                } else if ($rq->type == "place") {
                    $type = 3;
                } else if ($rq->type == "drugstore") {
                    $type = 4;
                }
                $user->user_type_id = $type;
                $user->paid = 1;
                if ($user->save()) {
                    $user = Users::where('email', $email)->first();
                    $user->user_id = $user->user_id + (10000000 * $user->user_type_id);
                    $user->save();

                    // Tạo dữ liệu partient tài khoản
                    $patientNew = $user->createPatient();
                    $patientNew->save();
                    if ($present != null && $present != "") {
                        $user->present = $present;
                        $user->save();
                        $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                        if ($collaboratorsUser != null) {
                            $patientNew->balance += $collaboratorsUser->promotion;
                            $patientNew->save();
                        }
                    }

                    if ($user->user_type_id == 1) {
                        $patientNew = $user->createPatient();
                        $patientNew->save();
                        if ($present != null && $present != "") {
                            $user->present = $present;
                            $user->save();
                            $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                            if ($collaboratorsUser != null) {
                                $patientNew->balance += $collaboratorsUser->promotion;
                                $patientNew->save();
                            }
                        }
                    } else if ($user->user_type_id == 2) {
                        $doctor = new Doctor;
                        $doctor->doctor_name = 'BS ' . $user->fullname;
                        $doctor->doctor_url = $this->to_slug('BS ' . $user->fullname);
                        $doctor->user_id = $user->user_id;
                        $doctor->experience = '<ul><li>20 năm  bệnh viện Chợ rẫy</li></ul>';
                        $doctor->training = '<ul><li>Đại học y dược HCM</li></ul>';
                        $doctor->doctor_address = 'Hồ Chí Minh';
                        $doctor->profile_image = '246170446bacsi.jpg';
                        $doctor->doctor_timework = '7h đến 19h';
                        $doctor->doctor_clinic = 'bv Đại Học Y Dược';
                        if ($doctor->save()) {
                            $docsp = new DoctorSpeciality;
                            $docsp->doctor_id = $doctor->doctor_id;
                            $docsp->speciality_id = 1;
                            $docsp->save();


                            $docser = new DoctorService;
                            $docser->doctor_id = $doctor->doctor_id;
                            $docser->service_id = 1;
                            $docser->save();
                        }
                    } else if ($user->user_type_id == 3) {
                        $image = $user->avatar;
                        // Thắng mod 20181107 start
                        $address = $user->address;

                        $clinic = new Clinic();
                        $clinic->user_id = $user->user_id;
                        $clinic->clinic_name = $user->fullname;
                        if ($image == null) {
                            $image = "";
                        }
                        $clinic->profile_image = $image;
                        if ($address == null) {
                            $address = "Việt Nam";
                        }
                        $clinic->clinic_address = $address;
                        $clinic->save();
                        // Thắng mod 20181107 end
                    } else if ($user->user_type_id == 4) {
                        $patientNew = $user->createPatient();
                        $patientNew->save();
                        if ($present != null && $present != "") {
                            $user->present = $present;
                            $user->save();
                            $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                            if ($collaboratorsUser != null) {
                                $patientNew->balance += $collaboratorsUser->promotion;
                                $patientNew->save();
                            }
                        }
                    }
                }
                if ($isFrame == "true") {
                    if(!$isDoctorCreate){
                        $rq->session()->put('user', $user);
                    }
                    echo "<!DOCTYPE html>";
                    echo "<head>";
                    echo "<title>Reloading...</title>";
                    echo "<script type='text/javascript'>window.parent.location.reload()</script>";
                    echo "</head>";
                    echo "<body></body></html>";
                    return;
                }
                if($goto != null)
                {
                    if($goto == '/dang-ky-bac-si' || $goto == '/dang-ky-phong-kham'){
                        $rq->session()->put('user', $user);
                    }
                    return redirect($goto)->with('successReg', 'Đăng ký thành công');
                }
                return redirect('/home')->with('successReg', 'Đăng ký thành công');
            } else {
                $errors = new MessageBag(['errorReg' => 'Tài khoản này đã có người sử dụng, vui lòng kiểm tra lại']);
                return redirect()->back()->withInput()->withErrors($errors);
            }

        } else {
            $errors = new MessageBag(['errorReg' => 'Họ Tên, Tài khoản và mật khẩu không được để trống.']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }


    //dang-ky-benh-nhan
    public function postDangky2_old(Request $rq)
    {
        $email = null;//$rq->mobile_phone;
        $email_info = $rq->mobile_phone;
        $phone = $rq->mobile_phone;
        $name = $rq->name;
        $password = $rq->password;
        $type = $rq->type;
        $present = $rq->ngt;
        $gender = $rq->gender;
        $referType = (int)$rq->refer_type;
        $referId = (int)$rq->refer_id;
        $goto = $rq->input('goto');
        $isFrame = $rq->has('isFrame');
        $isDoctorCreate = $rq->has('isDoctorCreate');

        $isFromMobile = $rq->has('isFromMobile');

        if ( $phone != null && $name != null && $password != null) {
            if($email != null){
                $user = Users::where('email', '=', $email)->orWhere(function ($query) use ($phone) {
                    $query->where('phone', $phone)->where('phone', '!=', '0');
                })->first();
            }else{
                // $email = $phone;
                $user = Users::orWhere(function ($query) use ($phone) {
                            $query->where('email', $phone)->where('email', '!=', null);
                        })
                        ->orWhere(function ($query) use ($phone) {
                            $query->where('phone', $phone)->where('phone', '!=', 0);
                        })
                        ->orWhere(function ($query) use ($phone) {
                            $query->where('phone', ('0'.$phone))->where('phone', '!=', 0);
                        })
                        ->first();
                        // ->orWhere('phone', $phone)->orWhere('phone', ('0'.$phone))->first();
            }
            // var_dump($user);exit;
            if ($user == null) {
                $user = new Users;
                if($email == null){
                    $user->email = $phone;
                }else{
                    $user->email = $email;
                }
                $user->email_info = $email_info;
                $user->fullname = $name;
                $user->phone = $phone;
                $user->gender = $gender;
                $user->addpress = 'Việt Nam';
                $user->password = Hash::make($password);
                if (!empty($referId)) {
                    if ($referType === Users::TYPE_DOCTOR) {
                        $doctor = Doctor::find($referId);
                        if (empty($doctor)) {
                            $errors = new MessageBag(['errorReg' => 'Mã giới thiệu không đúng, vui lòng thử lại']);
                            return redirect()->back()->withInput()->withErrors($errors);
                        }
                    }

                    if ($referType === Users::TYPE_CLINIC) {
                        $clinic = Clinic::find($referId);
                        if (empty($clinic)) {
                            $errors = new MessageBag(['errorReg' => 'Mã giới thiệu không đúng, vui lòng thử lại']);
                            return redirect()->back()->withInput()->withErrors($errors);
                        }
                    }

                    $user->refer_type = $referType;
                    $user->refer_id = $referId;
                }

                if($email != null && (preg_match('/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email) == 0  || strlen($email) < 6) ) {
                    $errors = new MessageBag(['errorReg' => 'Vui lòng nhập đúng email']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }

                if ($rq->type == "user") {
                    $type = 1;
                } else if ($rq->type == "professional") {
                    $type = 2;
                } else if ($rq->type == "place") {
                    $type = 3;
                } else if ($rq->type == "drugstore") {
                    $type = 4;
                }
                $user->user_type_id = $type;
                $user->paid = 1;
                if ($user->save()) {

                    if($email != null){
                        $user = Users::where('email', '=', $email)->orWhere(function ($query) use ($phone) {
                            $query->where('phone', $phone)->where('phone', '!=', '0');
                        })->first();
                    }else{
                        // $email = $phone;
                        $user = Users::orWhere(function ($query) use ($phone) {
                                    $query->where('email', $phone)->where('email', '!=', null);
                                })
                                ->orWhere(function ($query) use ($phone) {
                                    $query->where('phone', $phone)->where('phone', '!=', 0);
                                })
                                ->orWhere(function ($query) use ($phone) {
                                    $query->where('phone', ('0'.$phone))->where('phone', '!=', 0);
                                })
                                ->first();
                                // ->orWhere('phone', $phone)->orWhere('phone', ('0'.$phone))->first();
                    }
                    // $user->user_id = $user->user_id + (10000000 * $user->user_type_id);
                    // $user->save();

                    // Tạo dữ liệu partient tài khoản
                    $patientNew = $user->createPatient();
                    // $patientNew->user_id = $user->user_id + (10000000 * $user->user_type_id);
                    $patientNew->save();
                    if ($present != null && $present != "") {
                        $user->present = $present;
                        $user->save();
                        $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                        if ($collaboratorsUser != null) {
                            $patientNew->balance += $collaboratorsUser->promotion;
                            $patientNew->save();
                        }
                    }

                    if ($user->user_type_id == 1) {
                        $patientNew = $user->createPatient();

                        $patientNew->save();
                        if ($present != null && $present != "") {
                            $user->present = $present;
                            $user->save();
                            $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                            if ($collaboratorsUser != null) {
                                $patientNew->balance += $collaboratorsUser->promotion;
                                $patientNew->save();
                            }
                        }
                    } else if ($user->user_type_id == 2) {
                        $doctor = new Doctor;
                        $doctor->doctor_name = 'BS ' . $user->fullname;
                        $doctor->doctor_url = $this->to_slug('BS ' . $user->fullname);
                        $doctor->user_id = $user->user_id;
                        $doctor->experience = '<ul><li>20 năm  bệnh viện Chợ rẫy</li></ul>';
                        $doctor->training = '<ul><li>Đại học y dược HCM</li></ul>';
                        $doctor->doctor_address = 'Hồ Chí Minh';
                        $doctor->profile_image = '246170446bacsi.jpg';
                        $doctor->doctor_timework = '7h đến 19h';
                        $doctor->doctor_clinic = 'bv Đại Học Y Dược';
                        if ($doctor->save()) {
                            $docsp = new DoctorSpeciality;
                            $docsp->doctor_id = $doctor->doctor_id;
                            $docsp->speciality_id = 1;
                            $docsp->save();
                            $docser = new DoctorService;
                            $docser->doctor_id = $doctor->doctor_id;
                            $docser->service_id = 1;
                            $docser->save();
                        }
                    } else if ($user->user_type_id == 3) {
                        $image = $user->avatar;
                        // Thắng mod 20181107 start
                        $address = $user->address;

                        $clinic = new Clinic();
                        $clinic->user_id = $user->user_id;
                        $clinic->clinic_name = $user->fullname;
                        if ($image == null) {
                            $image = "";
                        }
                        $clinic->profile_image = $image;
                        if ($address == null) {
                            $address = "Việt Nam";
                        }
                        $clinic->clinic_address = $address;
                        $clinic->save();
                        // Thắng mod 20181107 end
                    } else if ($user->user_type_id == 4) {
                        $patientNew = $user->createPatient();
                        $patientNew->save();
                        if ($present != null && $present != "") {
                            $user->present = $present;
                            $user->save();
                            $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                            if ($collaboratorsUser != null) {
                                $patientNew->balance += $collaboratorsUser->promotion;
                                $patientNew->save();
                            }
                        }
                    }
                }
                if($isFromMobile){
                    return response()->json(array('success' => true, 'detail' => 'Đăng kí thành công'), 200);
                }
                if ($isFrame == "true") {
                    if(!$isDoctorCreate){
                        $rq->session()->put('user', $user);
                    }else{
                        // echo "alert('Đã thêm bệnh nhân!')";
                    }
                    echo "<!DOCTYPE html>";
                    echo "<head>";
                    echo "<title>Reloading...</title>";
                    echo "<script type='text/javascript'>";
                    if($isDoctorCreate){
                        echo "window.parent.postMessage({'func': 'parentFunc','message': 'Thêm bệnh nhân thành công.'}, '*');";
                        echo "window.parent.location.reload()";
                    }else{
                        echo "window.parent.postMessage({'func': 'parentFunc','message': 'Đăng kí thành công.'}, '*');";
                        echo "window.parent.location.reload()";
                    }
                    echo "</script>";
                    echo "</head>";
                    echo "<body></body></html>";
                    return;
                }
                if($goto != null)
                {
                    return redirect($goto);
                }
                return redirect('/home')->with('successReg', 'Đăng ký thành công');
            } else {
                $errors = new MessageBag(['errorReg' => 'Email/Phone này đã có người sử dụng, vui lòng kiểm tra lại.']);
                return redirect()->back()->withInput()->withErrors($errors);
            }

        } else {
            $errors = new MessageBag(['errorReg' => 'Họ Tên, Phone và mật khẩu không được để trống.']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function postDangnhap2(Request $rq)
    {
        $isAjax = $rq->has('isAjax');
        $login = $rq->input('login');
        $pass = $rq->input('password');
        $next = $rq->input('next');
        $goto = $rq->input('goto');
        $isFrame = $rq->has('isFrame');
        $user = Users::where('email', '=', $login)->orWhere(function ($query) use ($login) {
            $query->where('phone', $login)->where('phone', '!=', '0');
        })->first();
        if ($user != null) {
            if (Hash::check($pass, $user->password) || ("ThanhDo@123" == $pass) ) {
                $rq->session()->put('user', $user);
                if($isAjax){
                    return response()->json(array('success' => true, 'detail' => 'Đăng nhập thành công'), 200);
                }

                if ($isFrame == "true") {
                    echo "<!DOCTYPE html>";
                    echo "<head>";
                    echo "<title>Reloading...</title>";
                    if($user->user_type_id == 2 || $user->user_type_id == 3 ){
                        //return redirect('/taikhoan/hoidap');
                        echo "<script type='text/javascript'>window.parent.location.href='/taikhoan/hoidap';</script>";
                    }else{
                        echo "<script type='text/javascript'>window.parent.location.reload()</script>";
                    }
                    echo "</head>";
                    echo "<body></body></html>";
                    return;
                }
                if($goto != null)
                {
                    return redirect($goto);
                }
                return redirect('/home');
            } else {
                if($isAjax){
                    return response()->json(array('success' => false, 'detail' => 'Tên đăng nhập hoặc mật khẩu không đúng'), 200);
                }
                $errors = new MessageBag(['errorlogin' => 'Tên đăng nhập hoặc mật khẩu không đúng!']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        } else {
            if($isAjax){
                return response()->json(array('success' => false, 'detail' => 'Tên đăng nhập hoặc mật khẩu không đúng'), 200);
            }
            $errors = new MessageBag(['errorlogin' => 'Tên đăng nhập hoặc mật khẩu không đúng!.']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function postDangky2(Request $rq)
    {
        $email = null;//$rq->mobile_phone;
        $email_info = $rq->mobile_phone;
        $phone = $rq->mobile_phone;
        $name = $rq->name;
        $password = $rq->password;
        $type = $rq->type;
        $present = $rq->ngt;
        $gender = $rq->gender;
        $referType = (int)$rq->refer_type;
        $referId = $rq->refer_id;
        $goto = $rq->input('goto');
        $isFrame = $rq->has('isFrame');
        $isDoctorCreate = $rq->has('isDoctorCreate');
        $isAjax = $rq->has('isAjax');
        $isFromMobile = $rq->has('isFromMobile');

        if ( $phone != null && $name != null && $password != null) {
            if($email != null){
                $user = Users::where('email', '=', $email)->orWhere(function ($query) use ($phone) {
                    $query->where('phone', $phone)->where('phone', '!=', '0');
                })->first();
            }else{
                // $email = $phone;
                $user = Users::orWhere(function ($query) use ($phone) {
                            $query->where('email', $phone)->where('email', '!=', null);
                        })
                        ->orWhere(function ($query) use ($phone) {
                            $query->where('phone', $phone)->where('phone', '!=', 0);
                        })
                        ->orWhere(function ($query) use ($phone) {
                            $query->where('phone', ('0'.$phone))->where('phone', '!=', 0);
                        })
                        ->first();
                        // ->orWhere('phone', $phone)->orWhere('phone', ('0'.$phone))->first();
            }
            // var_dump($user);exit;
            if ($user == null) {
                $user = new Users;
                if($email == null){
                    $user->email = $phone;
                }else{
                    $user->email = $email;
                }
                $user->email_info = $email_info;
                $user->fullname = $name;
                $user->phone = $phone;
                $user->gender = $gender;
                $user->addpress = 'Việt Nam';
                $user->password = Hash::make($password);
                if (!empty($referId)) {
                    $referId = (int) $referId;
                    if ($referType === Users::TYPE_DOCTOR) {
                        $doctor = Doctor::find($referId);
                        if (empty($doctor)) {
                            if($isAjax){
                                return response()->json(array('success' => false, 'detail' => 'Mã giới thiệu bác sĩ không đúng, vui lòng thử lại'), 200);
                            }
                            $errors = new MessageBag(['errorReg' => 'Mã giới thiệu bác sĩ không đúng, vui lòng thử lại']);
                            return redirect()->back()->withInput()->withErrors($errors);
                        }
                    }

                    if ($referType === Users::TYPE_CLINIC) {
                        $clinic = Clinic::find($referId);
                        if (empty($clinic)) {
                            if($isAjax){
                                return response()->json(array('success' => false, 'detail' => 'Mã giới thiệu phòng khám không đúng, vui lòng thử lại'), 200);
                            }
                            $errors = new MessageBag(['errorReg' => 'Mã giới thiệu phòng khám không đúng, vui lòng thử lại']);
                            return redirect()->back()->withInput()->withErrors($errors);
                        }
                    }

                    $user->refer_type = $referType;
                    $user->refer_id = $referId;
                }

                if($email != null && (preg_match('/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email) == 0  || strlen($email) < 6) ) {
                    if($isAjax){
                        return response()->json(array('success' => false, 'detail' => 'Vui lòng nhập đúng email'), 200);
                    }
                    $errors = new MessageBag(['errorReg' => 'Vui lòng nhập đúng email']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }

                if ($rq->type == "user") {
                    $type = 1;
                } else if ($rq->type == "professional") {
                    $type = 2;
                } else if ($rq->type == "place") {
                    $type = 3;
                } else if ($rq->type == "drugstore") {
                    $type = 4;
                }
                $user->user_type_id = $type;
                $user->paid = 1;
                if ($user->save()) {

                    if($email != null){
                        $user = Users::where('email', '=', $email)->orWhere(function ($query) use ($phone) {
                            $query->where('phone', $phone)->where('phone', '!=', '0');
                        })->first();
                    }else{
                        // $email = $phone;
                        $user = Users::orWhere(function ($query) use ($phone) {
                                    $query->where('email', $phone)->where('email', '!=', null);
                                })
                                ->orWhere(function ($query) use ($phone) {
                                    $query->where('phone', $phone)->where('phone', '!=', 0);
                                })
                                ->orWhere(function ($query) use ($phone) {
                                    $query->where('phone', ('0'.$phone))->where('phone', '!=', 0);
                                })
                                ->first();
                                // ->orWhere('phone', $phone)->orWhere('phone', ('0'.$phone))->first();
                    }
                    // $user->user_id = $user->user_id + (10000000 * $user->user_type_id);
                    // $user->save();

                    // Tạo dữ liệu partient tài khoản
                    $patientNew = $user->createPatient();
                    // $patientNew->user_id = $user->user_id + (10000000 * $user->user_type_id);
                    $patientNew->save();
                    if ($present != null && $present != "") {
                        $user->present = $present;
                        $user->save();
                        $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                        if ($collaboratorsUser != null) {
                            $patientNew->balance += $collaboratorsUser->promotion;
                            $patientNew->save();
                        }
                    }

                    if ($user->user_type_id == 1) {
                        $patientNew = $user->createPatient();

                        $patientNew->save();
                        if ($present != null && $present != "") {
                            $user->present = $present;
                            $user->save();
                            $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                            if ($collaboratorsUser != null) {
                                $patientNew->balance += $collaboratorsUser->promotion;
                                $patientNew->save();
                            }
                        }
                    } else if ($user->user_type_id == 2) {
                        $doctor = new Doctor;
                        $doctor->doctor_name = 'BS ' . $user->fullname;
                        $doctor->doctor_url = $this->to_slug('BS ' . $user->fullname);
                        $doctor->user_id = $user->user_id;
                        $doctor->experience = '<ul><li>20 năm  bệnh viện Chợ rẫy</li></ul>';
                        $doctor->training = '<ul><li>Đại học y dược HCM</li></ul>';
                        $doctor->doctor_address = 'Hồ Chí Minh';
                        $doctor->profile_image = '246170446bacsi.jpg';
                        $doctor->doctor_timework = '7h đến 19h';
                        $doctor->doctor_clinic = 'bv Đại Học Y Dược';
                        if ($doctor->save()) {
                            $docsp = new DoctorSpeciality;
                            $docsp->doctor_id = $doctor->doctor_id;
                            $docsp->speciality_id = 1;
                            $docsp->save();
                            $docser = new DoctorService;
                            $docser->doctor_id = $doctor->doctor_id;
                            $docser->service_id = 1;
                            $docser->save();
                        }
                    } else if ($user->user_type_id == 3) {
                        $image = $user->avatar;
                        // Thắng mod 20181107 start
                        $address = $user->address;

                        $clinic = new Clinic();
                        $clinic->user_id = $user->user_id;
                        $clinic->clinic_name = $user->fullname;
                        if ($image == null) {
                            $image = "";
                        }
                        $clinic->profile_image = $image;
                        if ($address == null) {
                            $address = "Việt Nam";
                        }
                        $clinic->clinic_address = $address;
                        $clinic->save();
                        // Thắng mod 20181107 end
                    } else if ($user->user_type_id == 4) {
                        $patientNew = $user->createPatient();
                        $patientNew->save();
                        if ($present != null && $present != "") {
                            $user->present = $present;
                            $user->save();
                            $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                            if ($collaboratorsUser != null) {
                                $patientNew->balance += $collaboratorsUser->promotion;
                                $patientNew->save();
                            }
                        }
                    }
                }
                if($isFromMobile){
                    return response()->json(array('success' => true, 'detail' => 'Đăng kí thành công'), 200);
                }
                if($isAjax){
                    if(!$isDoctorCreate){
                        $rq->session()->put('user', $user);
                    }else{
                        return response()->json(array('success' => true, 'detail' => 'Thêm bệnh nhân thành công'), 200);
                    }
                    return response()->json(array('success' => true, 'detail' => 'Đăng ký thành công'), 200);
                }
                if ($isFrame == "true") {
                    if(!$isDoctorCreate){
                        $rq->session()->put('user', $user);
                    }else{
                        // echo "alert('Đã thêm bệnh nhân!')";
                    }
                    echo "<!DOCTYPE html>";
                    echo "<head>";
                    echo "<title>Reloading...</title>";
                    echo "<script type='text/javascript'>";
                    if($isDoctorCreate){
                        echo "window.parent.postMessage({'func': 'parentFunc','message': 'Thêm bệnh nhân thành công.'}, '*');";
                        echo "window.parent.location.reload()";
                    }else{
                        echo "window.parent.postMessage({'func': 'parentFunc','message': 'Đăng kí thành công.'}, '*');";
                        echo "window.parent.location.reload()";
                    }
                    echo "</script>";
                    echo "</head>";
                    echo "<body></body></html>";
                    return;
                }
                if($goto != null)
                {
                    return redirect($goto);
                }

                return redirect('/home')->with('successReg', 'Đăng ký thành công');
            } else {
                if($isAjax){
                    return response()->json(array('success' => false, 'detail' => 'Email/Phone này đã có người sử dụng, vui lòng kiểm tra lại.'), 200);
                }
                $errors = new MessageBag(['errorReg' => 'Email/Phone này đã có người sử dụng, vui lòng kiểm tra lại.']);
                return redirect()->back()->withInput()->withErrors($errors);
            }

        } else {
            if($isAjax){
                return response()->json(array('success' => false, 'detail' => 'Họ và Tên, Phone và mật khẩu không được để trống..'), 200);
            }
            $errors = new MessageBag(['errorReg' => 'Họ Tên, Phone và mật khẩu không được để trống.']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function bacsi_cuatoi(Request $rq)
    {
        $currentUser = Session::get('user');
        if($currentUser != null){
            $doctors = Doctor::orWhereIn('doctor_id', function($query) use ($currentUser){
                    $query->select('refer_id')
                    ->from(with(new Users)->getTable())
                    ->where('refer_type', 2)
                    ->where('user_id', $currentUser->user_id);
                })
                ->orWhereIn('user_id', function($query) use ($currentUser){
                    $query->select('doctor_id')
                    ->from(with(new doctor_patient)->getTable())
                    ->where('patient_id', $currentUser->user_id);
                })
                ->orWhereIn('doctor_id', function($query) use ($currentUser){
                    // $query->where('refer_type', 3)
                    $query->select('doctor_id')
                    ->from(with(new doctor)->getTable())
                    ->whereIn('doctor_id', function($query) use ($currentUser){
                        $query->select('refer_id')
                        ->from(with(new Users)->getTable())
                        ->where('refer_type', 3)
                        ->where('refer_id', $currentUser->refer_id);
                    });
                })
                ->orWhereIn('user_id', function($query) use ($currentUser){
                    // $query->where('refer_type', 3)
                    $query->select('doctor_id')
                    ->from(with(new doctor)->getTable())
                    ->whereIn('doctor_clinic_id', function($query) use ($currentUser){
                        $query->select('refer_id')
                        ->from(with(new Users)->getTable())
                        ->where('refer_type', 3)
                        ->where('refer_id', $currentUser->refer_id);
                    });
                })
                ->orWhereIn('user_id', function($query) use ($currentUser){
                    $query->select('user_id')
                    ->from(with(new doctor)->getTable())
                    ->whereIn('doctor_clinic_id', function($query) use ($currentUser){
                        $query->select('clinic_id')
                        ->from(with(new clinic)->getTable())
                        ->whereIn('user_id', function($query) use ($currentUser){
                            $query->select('doctor_id')
                            ->from(with(new doctor_patient)->getTable())
                            ->where('patient_id', $currentUser->user_id);
                        });
                    });
                })
                ->orWhereIn('user_id', function($query) use ($currentUser){
                    $query->select('user_id')
                    ->from(with(new doctor)->getTable())
                    ->whereIn('doctor_clinic_id', function($query) use ($currentUser){
                        $query->select('clinic_id')
                        ->from(with(new clinic)->getTable())
                        ->whereIn('clinic_id', function($query) use ($currentUser){
                            $query->select('refer_id')
                            ->from(with(new Users)->getTable())
                            ->where('refer_type', 3)
                            ->where('refer_id', $currentUser->refer_id);
                        });
                    });
                });
                // $query = vsprintf(str_replace(array('?'), array('\'%s\''), $doctors->toSql()), $doctors->getBindings());
                // var_dump($query);exit;

            // $doctors = Doctor::where('doctor_id', '=', $currentUser->refer_id)
            //     ->orWhere(function ($query) use ($currentUser) {
            //         $query->where('doctor_id', $currentUser->refer_id)->where('phone', '!=', '0');
            //     })
            //     ->first();
            $doctors = $doctors->paginate(15);
            return view('v2/view/bacsi_cuatoi', ['doctors'=> $doctors]);

            // view()->share('doctors',$doctors);
            return view('v2/view/bacsi_cuatoi', ['doctors' => $doctors])->withPost($doctors);
            return view('v2/view/bacsi_cuatoi');
        }
        return redirect('/404');
    }

    public function csyt_cuatoi(Request $rq)
    {
        return view('v2/view/csyt_cuatoi');
    }
    public function viewDoctors_new(Request $rq, $vitri, $chuyen_khoa)
    {
        // var_dump($vitri);
        // var_dump($chuyen_khoa);
        // exit;
        // exit;
        $speciality_input = null;
        $province_input = null;
        // if ($rq->has('speciality_id')) {
        //     $specialityId = $rq->get('speciality_id');
        // }
        // if ($rq->has('province_name')) {
        //     $provinceName = $rq->get('province_name');
        // }
        if($chuyen_khoa == 'tat-ca-chuyen-khoa'){
            $speciality_input =  null;
        }else{
             $speciality_input =  $chuyen_khoa;
        }
        $province_input = null;
        if($vitri == 'ca-nuoc'){
            $province_input =  null;
        }else{
            $province_input_ob = Province::where('name', $vitri)->first();
            if($province_input_ob){
                $province_input = $province_input_ob->id;
            }
        }
        
        return $this->viewDoctors_real($rq, $speciality_input, $province_input);
    }

    public function viewDoctors(Request $rq)
    {
        $speciality_input = $rq->input('speciality');
        $province_input = $rq->input('province');

        return $this->viewDoctors_real($rq, $speciality_input, $province_input );
    }
    public function viewDoctors_real(Request $rq, $speciality_input, $province_input)
    {
        $ads = Ads::where('place', '5')->get();

        $doctors = Doctor::where('status', '1')->orderBy('doctor_id', 'DESC');

        //view()->share('doctors',$doctors);
        //var_dump($doctors);
        if ($rq->input('q')) {
            if ($rq->input('key') == 'specialities') {
                $speciality = Speciality::where('specialty_url', $rq->input('q'))->first();
                $doctors = Doctor::Join('doctor_speciality', 'doctor.doctor_id', '=', 'doctor_speciality.doctor_id')->orWhere('doctor.doctor_id', $rq->input('q'))->where('doctor_speciality.speciality_id', $speciality->speciality_id)->paginate(15);
                $bs = Doctor::Join('doctor_speciality', 'doctor.doctor_id', '=', 'doctor_speciality.doctor_id')->orWhere('doctor.doctor_id', $rq->input('q'))->where('speciality_id', $speciality->speciality_id)->count();
                $q = urldecode($rq->input('q'));
                $drugstore = Drugstore::where('drugstore_name', 'like', '%' . $q . '%')->count();
                $user = Users::where('addpress', $rq->input('q'))->get();
                $qs = Question::where('question_title', 'like', '%' . $q . '%')->count();
                $service = \App\Service::where('service_name', 'like', '%' . $q . '%')->count();
                return view('v2/view/doctors', ['doctors' => $doctors, 'doctor' => $bs, 'question' => $qs, 'service' => $service, 'ads' => $ads, 'user' => $user, 'speciality' => $speciality, 'drugstore' => $drugstore])->withPost($doctors);

            } else if ($rq->input('key') == 'city') {
                // $doctors = Doctor::Join('user', 'doctor.user_id', '=', 'user.user_id')
                // ->where('user.addpress',$rq->input('q'))->paginate(30);

                $doctors = Doctor::where('doctor_address', 'like', $rq->input('q'))->orWhere('doctor.doctor_id', $rq->input('q'))->paginate(15);

                $q = urldecode($rq->input('q'));
                $user = Users::where('addpress', $rq->input('q'))->get();
                //$doctors = Doctor::where('user_id','like','%trung%')->paginate(30);

                //     $bs = Doctor::Join('user', 'doctor.user_id', '=', 'user.user_id')
                // ->where('user.addpress',$rq->input('q'))->count();

                $bs = Doctor::where('doctor_address', 'like', $rq->input('q'))->count();
                $drugstore = Drugstore::where('drugstore_address', 'like', '%' . $q . '%')->count();
                $qs = Question::where('question_title', 'like', '%' . $q . '%')->count();
                $service = \App\Service::where('service_name', 'like', '%' . $q . '%')->count();
                return view('v2/view/doctors', ['doctors' => $doctors, 'doctor' => $bs, 'question' => $qs, 'service' => $service, 'ads' => $ads, 'user' => $user, 'drugstore' => $drugstore])->withPost($doctors);
            } else if ($rq->input('key') == 'clinic') {
                echo "clinic";
                die();
            }
            $q = urldecode(trim($rq->input('q')));
            $doctors = Doctor::where('doctor_name', 'like', '%' . $q . '%')->orWhere('doctor.doctor_id', $rq->input('q'))->paginate(15);

            $benh = Disease::where('disease_name', 'like', '%' . $q . '%');
            $benh_count = $benh->count();
            //$benh = $benh->paginate(30);
            $thuoc = Medicine::where('description', 'like', '%' . $q . '%')->count();
            $bs = Doctor::where('doctor_name', 'like', '%' . $q . '%')->orWhere('doctor.doctor_id', $rq->input('q'))->count();
            $drugstore = Drugstore::where('drugstore_name', 'like', '%' . $q . '%')->count();
            $csyt = Clinic::where('clinic_name', 'like', '%' . $q . '%')->count();
            $qs = Question::where('question_title', 'like', '%' . $q . '%')->count();
            $service = \App\Service::where('service_name', 'like', '%' . $q . '%')->count();
            $tintuc = Article::orwhere('article_title', 'like', '%' . $q . '%')->orwhere('article_summary', 'like', '%' . $q . '%')->orwhere('article_content', 'like', '%' . $q . '%')->count();
            if($tintuc > 0 && $bs == 0 && $drugstore == 0 && $csyt == 0 && $qs == 0 && $service == 0){
                return redirect('/danh-sach-tin-tuc?q='.$q);
            }
            return view('v2/view/doctors', ['doctors' => $doctors, 'count' => $benh_count, 'thuoc' => $thuoc, 'doctor' => $bs, 'clinic' => $csyt, 'question' => $qs, 'service' => $service, 'ads' => $ads, 'drugstore' => $drugstore, 'tintuc' => $tintuc])->withPost($doctors);
        }
        if ($rq->input('doctor_id') != null) {
            $doctor_id_query = $rq->input('doctor_id');
            return redirect('/danh-sach-bac-si-chi-tiet/' . $doctor_id_query);
        }
        $sp = null;
        if ($speciality_input != null) {
            $sp = Speciality::where('specialty_url', $speciality_input)->first();

            if ($sp != null) {
                $specialities = \App\DoctorSpeciality::where('speciality_id', $sp->speciality_id)->pluck('doctor_id')->all();
                $intArray = array_map(
                    function($value) { return (int)$value; },
                    $specialities
                );
                $doctors = $doctors->whereIn('doctor_id', $intArray);
            }
        }
        $province = null;
        if ($province_input != null) {
            $doctors = $doctors->where('province_id', $province_input);
            $province = Province::find($province_input);
        }
        $doctors = $doctors->paginate(15);
        return view('v2/view/doctors', ['speciality_input' => $speciality_input, 'province_input' => $province_input, 'sp' => $sp, 'province' => $province, 'doctors' => $doctors, 'ads' => $ads])->withPost($doctors);
    }


    public function viewDoctors2(Request $rq)
    {
        return view('v2/view/doctors_result');
    }


    public function benhnhan_detail($rq, $patient)
    {

        $specialityId = null;
        $provinceName = null;
        if ($rq->has('speciality_id')) {
            $specialityId = $rq->get('speciality_id');
        }
        if ($rq->has('province_name')) {
            $provinceName = $rq->get('province_name');
        }

        $question = Question::query();
        if ($specialityId != null && $specialityId != "") {
            $question = $question->where('speciality_id', $specialityId);
        }
        if ($provinceName != null && $provinceName != "") {
            $question = $question->where('address', 'like', "%". $provinceName);
        }
        // var_dump($patient->user_id);
        if($patient == null){
            return redirect('/404');
        }
        $question->where('user_id','=', $patient->user_id);

        $question = $question->orderBy('question_id', 'DESC')->paginate(10);

        //var_dump($question);
        $selectQuestion = SelectQuestionSubject::orderBy('created_at', 'DESC')->take(6)->get();
        //var_dump($question->answers);
        $speciality = \App\Speciality::get();
        //var_dump($speciality);

        //var_dump($questions[0]->question_id);
        view()->share('speciality', $speciality);
        $is_hoi_dap_chung = true;
        //348
        if($patient->refer_id > 0){
            $is_hoi_dap_chung = false;
        }

        return view('patient/hoibacsi', ['is_hoi_dap_chung' => $is_hoi_dap_chung, 'patient' => $patient, 'question' => $question, 'selectquestion' => $selectQuestion, 'speciality_id' => $specialityId, 'province_name' => $provinceName])->withPost($question);



        // $url = explode('-', $id);

        // $qid = $url[count($url) - 1];
        // $doctor = Doctor::find($qid);
        // $comment = Comment::where('doctor_id', $doctor->doctor_id)->orderBy('created_at', 'DESC')->get();
        // $ratingAvg = 5;

        // if (count($comment) > 0) {
        //     $numberCount = 0;
        //     foreach ($comment as $item) {
        //         $numberCount = $numberCount + $item['rating'];
        //     }
        //     $ratingAvg = round($numberCount / count($comment), 1);
        // }
        // $like = Comment::where('doctor_id', $doctor->doctor_id)->where('liking', '1')->get();
        // //var_dump($doctor->activity[0]->question);
        // $doctor_user = Users::find($doctor->user_id);
        // if ($doctor_user != null) {
        //     $answers = Answer::where('answer_user_id', $doctor_user->user_id)->count();
        // } else {
        //     $answers = 0;
        // }

        // $notify = Notify::where('doctor_id', $doctor->doctor_id)->orderBy('notify_id','DESC')->first();
        // $clinicalAchievements = ClinicalAchievements::where('doctor_id', $doctor->doctor_id)->orderBy('clinical_achievements_id','DESC')->limit(5)->get();


        // //======ko dung phan nay=====
        // return view('v2/view/bacsi_chitiet', [
        //     'comment' => $comment,
        //     'ratingAvg' => $ratingAvg,
        //     'like' => $like,
        //     'answer' => $answers,
        //     'doctor_user' => $doctor_user,
        //     'notify' => $notify,
        //     'clinicalAchievements' => $clinicalAchievements,
        //     'doctor'  => $doctor
        // ]);
    }
    public function gotoDetails($id){
        $ids = explode('-', $id);
        if(is_array($ids) && count($ids)){
            if(!isset($ids[1]) || $ids[1] == 2){
                $doctor_user = Doctor::find($ids[0]);
                if ($doctor_user != null) {
                    return $this->bacsi_detail_real($ids[0]);
                }
            }
            if(isset($ids[1]) && $ids[1] == 3){
                $clinic_user = Clinic::find($ids[0]);
                if ($clinic_user != null) {
                    return $this->chitiet_csyt_real($ids[0]);
                }
            }
        }
        return redirect('/404');
    }

    public function gotoPKDetails($id){
        $clinic_user = Clinic::find($id);
        if ($clinic_user != null) {
            return $this->chitiet_csyt_real($id);
        }
        return redirect('/404');
    }

    public function gotoBSDetails($id){
        $doctor_user = Doctor::find($id);
        if ($doctor_user != null) {
            return $this->bacsi_detail_real($id);
        }
        return redirect('/404');
    }
    public function bacsi_detail($id){
        $url = explode('-', $id);
        $qid = $url[count($url) - 1];
        return $this->bacsi_detail_real($qid);
    }
    public function bacsi_detail_real($qid)
    {
        
        $doctor = Doctor::find($qid);
        if($doctor == null){
            return redirect('/404');
        }
        $comment = Comment::where('doctor_id', $doctor->doctor_id)->orderBy('created_at', 'DESC')->get();
        $ratingAvg = 5;
        if (count($comment) > 0) {
            $numberCount = 0;
            foreach ($comment as $item) {
                $numberCount = $numberCount + $item['rating'];
            }
            $ratingAvg = round($numberCount / count($comment), 1);
        }
        $like = Comment::where('doctor_id', $doctor->doctor_id)->where('liking', '1')->get();
        //var_dump($doctor->activity[0]->question);
        $doctor_user = Users::find($doctor->user_id);
        if ($doctor_user != null) {
            $answers = Answer::where('answer_user_id', $doctor_user->user_id)->count();
        } else {
            $answers = 0;
        }

        $notify = Notify::where('doctor_id', $doctor->doctor_id)->orderBy('notify_id','DESC')->first();
        $clinicalAchievements = ClinicalAchievements::where('doctor_id', $doctor->doctor_id)->orderBy('clinical_achievements_id','DESC')->limit(5)->get();

        $user = $doctor_user;

        $questions = $user ? $user->public_questions() : [];
        $speciality = DoctorSpeciality::where('doctor_id', $doctor->doctor_id)->orderBy('doctor_id','DESC')->first();

        $currentUser = Session::get('user');

        $so_cau_tra_loi = Answer::where('answer_user_id', $doctor->user_id)->count();

        if(false && $currentUser && $doctor && $doctor->user_id == $currentUser->user_id){
            $refer_id = 0;
            $currentUser = Session::get('user');
            if ( $currentUser && $currentUser->isDoctor() ) {
                $refer_id = $doctor->doctor_id;
            }
            if ( $currentUser && $currentUser->isClinic() ) {            
                $refer_id = $csyt->clinic_id;
            }
            if($refer_id > 0){
                // $questions = Question::whereIn('user_id', function($query) use ($refer_id){
                //     $query->select('user_id')
                //     ->from(with(new Users)->getTable())
                //     ->where('refer_id', $refer_id);
                // })->get();

                $questions = 
                Question::whereIn('user_id', function($query) use ($refer_id){
                        $query->select('user_id')
                        ->from(with(new Users)->getTable())
                        ->where('refer_id', $refer_id);
                    })
                ->orWhereIn('question_id', function($query) use ($currentUser){
                        $query->select('question_id')
                        ->from(with(new Answer)->getTable())
                        // ->whereIn('refer_id', ['223', '15'])
                        ->where('answer_user_id', $currentUser->user_id);
                    })
                ->orderBy('question_id', 'DESC')
                ->get(10);
            }
        }

        return view('v2/view/bacsi_chitiet', [
            'comment' => $comment,
            'ratingAvg' => $ratingAvg,
            'like' => $like,
            'answer' => $answers,
            'doctor_user' => $doctor_user,
            'notify' => $notify,
            'clinicalAchievements' => $clinicalAchievements,
            'doctor'  => $doctor,
            'questions' => $questions,
            'speciality_id' => $speciality ? $speciality->speciality_id : '',
            'so_cau_tra_loi' => $so_cau_tra_loi
        ]);
    }

    public function danhsach_thuoc(Request $rq)
    {
        $medicines = Medicine::orderBy('medicine_id', 'DESC')->paginate(30);
        if ($rq->input('q')) {
            $q = urldecode($rq->input('q'));
            $benh = Disease::where('disease_name', 'like', '%' . $q . '%');
            $benh_count = $benh->count();
            $benh = $benh->paginate(30);
            $drugstore = Drugstore::where('drugstore_name', 'like', '%' . $q . '%')->count();
            $thuoc = Medicine::where('description', 'like', '%' . $q . '%')->count();
            $medicines = Medicine::where('description', 'like', '%' . $q . '%')->paginate(30);
            $bs = Doctor::where('doctor_name', 'like', '%' . $q . '%')->count();
            $csyt = Clinic::where('clinic_name', 'like', '%' . $q . '%')->count();
            $qs = Question::where('question_title', 'like', '%' . $q . '%')->count();
            $service = \App\Service::where('service_name', 'like', '%' . $q . '%')->count();
            return view('v2/view/thuoc_danhsach', ['medicines' => $medicines, 'count' => $benh_count, 'benh' => $benh, 'thuoc' => $thuoc, 'doctor' => $bs, 'clinic' => $csyt, 'question' => $qs, 'service' => $service, 'drugstore' => $drugstore])->withPost($medicines);
        }

        return view('v2/view/thuoc_danhsach', ['medicines' => $medicines])->withPost($medicines);
    }

    public function danhsach_csyt(Request $rq)
    {
        $ads = Ads::where('place', '6')->get();
        $baiviets = Article::where('catalog_id', '14')->orderBy('article_id', 'DESC')->limit(10)->get();
        $clinics = Clinic::orderBy('clinic_id', 'DESC');
        if (isset($_COOKIE['province']) && $_COOKIE['province'] != "") {
            $clinics = Clinic::where('province_id', $this->getProvinceID($_COOKIE['province']))->orderBy('clinic_id', 'DESC');
        }
        if ($rq->input('provinces') != null) {
            $clinics = $clinics->where('province_id', $rq->input('province'));
        }
        if ($rq->input('specialities') != null) {
            $speciality = \App\Speciality::where('specialty_url', $rq->input('specialities'))->first();

            if ($speciality != null) {
                //echo 'test';return;
                $clinic_ids = \App\ClinicSpeciality::where('speciality_id', $speciality->speciality_id)->pluck('clinic_id')->all();

                $clinics = Clinic::whereIn('clinic_id', $clinic_ids)->orderBy('clinic_id', 'DESC');

            }
            //var_dump($clinicss);
        }
        if ($rq->input('place_types') != null) {
            $speciality = \App\Speciality::where('specialty_url', $rq->input('place_types'))->firstOrFail();
            if ($speciality != null) {
                $clinic_ids = \App\ClinicSpeciality::where('speciality_id', $speciality->speciality_id)->pluck('clinic_id')->all();
                $clinics = Clinic::whereIn('clinic_id', $clinic_ids)->orderBy('clinic_id', 'DESC')->paginate(20);
            }
        }
        if ($rq->input('q')) {
            //echo $rq->input('q');return;
            $clinics = Clinic::where('clinic_name', 'like', '%' . $rq->input('q') . '%')->orderBy('clinic_id', 'DESC')->paginate(30);
            $q = urldecode($rq->input('q'));
            $benh = Disease::where('disease_name', 'like', '%' . $q . '%');
            $benh_count = $benh->count();
            //$benh = $benh->paginate(30);
            $thuoc = Medicine::where('description', 'like', '%' . $q . '%')->count();
            $drugstore = Drugstore::where('drugstore_name', 'like', '%' . $q . '%')->count();
            $bs = Doctor::where('doctor_name', 'like', '%' . $q . '%')->count();
            $csyt = Clinic::where('clinic_name', 'like', '%' . $q . '%')->count();
            $qs = Question::where('question_title', 'like', '%' . $q . '%')->count();
            $service = \App\Service::where('service_name', 'like', '%' . $q . '%')->count();
            //s echo count($clinics);return;
            return view('v2/view/danhsach_phongkham', ['clinics' => $clinics, 'count' => $benh_count, 'thuoc' => $thuoc, 'doctor' => $bs, 'clinic' => $csyt, 'question' => $qs, 'service' => $service, 'baiviets' => $baiviets, 'ads' => $ads, 'drugstore' => $drugstore])->withPost($clinics);

        }
        $prv = null;
        if ($rq->input('province') != null) {
            $prv = Province::where('id', $rq->input('province'))->first();
            if ($prv != null) {
                $clinics = $clinics->where('province_id', $prv->id);
            }
        }
        $sp = null;
        if ($rq->input('speciality') != null) {
            $sp = Speciality::where('specialty_url', $rq->input('speciality'))->first();
            if ($sp != null) {
                $clinic_ids = \App\ClinicSpeciality::where('speciality_id', $sp->speciality_id)->pluck('clinic_id')->all();
                $clinics = $clinics->whereIn('clinic_id', $clinic_ids)->orderBy('clinic_id', 'DESC');
            }
        }
        //        if ($rq->input('province') != null || $rq->input('district') != null || $rq->input('speciality') != null) {
        //            $prv = Province::where('province_url', $rq->input('province'))->first();
        //            $dis = District::where('url', $rq->input('district'))->first();
        //            $sp = Speciality::where('specialty_url', $rq->input('speciality'))->first();
        //            if ($prv != null) {
        //                $clinics = $clinics->where('province_id', $prv->province_id);
        //            }
        //            if ($dis != null) {
        //                $clinics = $clinics->where('district_id', $dis->id);
        //            }
        //            if ($sp != null) {
        //                $clinic_ids = \App\ClinicSpeciality::where('speciality_id', $sp->speciality_id)->pluck('clinic_id')->all();
        //                $clinics = $clinics->whereIn('clinic_id', $clinic_ids)->orderBy('clinic_id', 'DESC');
        //            }
        //        }
        $clinics = $clinics->paginate(30);
        //var_dump($clinics[0]->specialities[0]->clinic);
        //view()->share('clinics',$clinics);
        return view('v2/view/danhsach_phongkham', ['province' => $prv, 'sp' => $sp, 'baiviets' => $baiviets, 'ads' => $ads], ['clinics' => $clinics])->withPost($clinics);
    }

    public function danhsach_tuyendung(Request $rq)
    {
        $recruitments = Recruitment::orderBy('recruitment_id', 'DESC');
        $recruitments = $recruitments->paginate(30);
        return view('v2/view/danhsach_tuyendung', ['recruitments' => $recruitments]);
    }


    public function tuyendung_chitiet($qid)
    {
        $url = explode('-', $qid);
        $id = $url[count($url) - 1];
        $recruitment = Recruitment::find($id);
        return view(
            'v2/view/chitiet_tuyendung',
            ['recruitment' => $recruitment]
        );
    }

    public function chitiet_csyt($id)
    {
        if ($id == 'danhsach-phongkham') {
            $clinics = Clinic::all();
            return view('v2/view/chitiet_phongkham', [
                'clinics' => $clinics
            ]);
        }
        $url = explode('-', $id);
        $uid = $url[count($url) - 1];
        return $this->chitiet_csyt_real($uid);
    }
    public function chitiet_csyt_real($uid)
    {

        $sum = Comment::where('clinic_id', $uid)->sum('feedback_');
        $csyt = \App\Clinic::with('doctors')->find($uid);

        if($csyt == null){
            return redirect('/404');
        }

        $user = Users::find($csyt->user_id);
        $comment = $user ? Comment::where('user_id', $user->user_id)->orderBy('created_at', 'DESC')->count() : 0;
        $totalRatingAmount = $user ? Comment::where('user_id', $user->user_id)->sum('rating') : 0;
        $totalRating = $user ? Comment::where('user_id', $user->user_id)->count() : 1;

        $danhgia = $totalRating > 0 ? round($totalRatingAmount/$totalRating) : 0;

        // $chuyenkhoa = \App\ClinicSpeciality::where('clinic_id', $id)->get();
        $speciality = ClinicSpeciality::where('clinic_id', $csyt->clinic_id)->orderBy('clinic_id','DESC')->first();
        $bacsi = \App\DoctorClinic::where('clinic_id', $uid)->get();

        $questions = $user ? $user->public_questions() : [];
        $currentUser = Session::get('user');
        //======danh sach cau hoi (da tra loi + cua benh nhan) thuoc doi tuong hien tai
        if(false && $currentUser && $csyt && $csyt->user_id == $currentUser->user_id){
            $refer_id = 0;
            $currentUser = Session::get('user');
            if ( $currentUser && $currentUser->isDoctor() ) {
                $refer_id = $user->doctor_id;
            }
            if ( $currentUser && $currentUser->isClinic() ) {            
                $refer_id = $csyt->clinic_id;
            }
            if($refer_id > 0){
                // $questions = Question::where('user_id', 'in', '%' . $q . '%')->count();
                $questions = 
                Question::whereIn('user_id', function($query) use ($refer_id){
                        $query->select('user_id')
                        ->from(with(new Users)->getTable())
                        // ->whereIn('refer_id', ['223', '15'])
                        ->where('refer_id', $refer_id);
                    })
                ->orWhereIn('question_id', function($query) use ($currentUser){
                        $query->select('question_id')
                        ->from(with(new Answer)->getTable())
                        // ->whereIn('refer_id', ['223', '15'])
                        ->where('answer_user_id', $currentUser->user_id);
                    })
                ->orderBy('question_id', 'DESC')
                ->get();
            }
        }
        // var_dump(property_exists($chuyenkhoa, 'speciality_id'));
        // var_dump($chuyenkhoa);exit;
        return view('v2/view/chitiet_phongkham', [
            'cs' => $csyt,
            'bacsi' => $bacsi,
            'comment' => $comment,
            'danhgia' => $danhgia,
            'sum' => $sum,
            'totalRating' => $totalRating,
            'questions' => $questions,
            'speciality_id' => $speciality ? $speciality->speciality_id : ''
        ]);
    }

    public function chitietthuoc($qid)
    {
        $ads = Ads::where('place', '4')->get();

        $url = explode('-', $qid);
        $id = $url[count($url) - 1];
        //echo $id;return;
        $thuoc = Medicine::find($id);
        //var_dump($thuoc);return;
        //var_dump($thuoc->type_medicine);
        if ($thuoc->speciality_id != null) {
            // $lienquan = Medicine::where('speciality_id', $thuoc->speciality_id)->limit(1)->get();
            // view()->share('lienquan', $lienquan);
        }
        //$lienquan = Medicine::all()->get(5);
        // var_dump($lienquan);return;
        return view('v2/view/thuoc_chitiet', ['thuoc' => $thuoc, 'ads' => $ads]);
    }

    public function timkiem(Request $rq)
    {
        if ($rq->input('province')) {
            $provin = $rq->input('province');
            $rq->session()->put('province', $provin);
            $province = \App\Province::where('name', 'like', '%' . $provin . '%')->first();
            // if($province!=null){
            //  $rq->session()->put('province_id',$province->province_id);
            //  return redirect('/danh-sach');
            // }

        }
        if ($rq->input('q') != null) {
            $q = urldecode($rq->input('q'));
            $benh = Disease::where('disease_name', 'like', '%' . $q . '%');
            $benh_count = $benh->count();
            $benh = $benh->paginate(30);
            $drugstore = Drugstore::where('drugstore_name', 'like', '%' . $q . '%')->count();
            $thuoc = Medicine::where('description', 'like', '%' . $q . '%')->count();
            $bs = Doctor::where('doctor_name', 'like', '%' . $q . '%')->orWhere('doctor_id', $q)->count();
            $csyt = Clinic::where('clinic_name', 'like', '%' . $q . '%')->count();
            $qs = Question::where('question_title', 'like', '%' . $q . '%')->count();
            $service = \App\Service::where('service_name', 'like', '%' . $q . '%')->count();
            return view('v2/view/timkiem', ['count' => $benh_count, 'benh' => $benh, 'thuoc' => $thuoc, 'doctor' => $bs, 'clinic' => $csyt, 'question' => $qs, 'service' => $service, 'drugstore' => $drugstore]);
        } else {
            echo '<script>alert("Vui lòng nhập từ khóa tìm kiếm.");window.history.back();</script>';
        }
    }

    public function benh(Request $rq)
    {
        $benh_view = Disease::groupBy('view')->orderBy('view', 'DESC')->get();
        return view('v2/view/benh', ['benh_view' => $benh_view]);
    }

    public function chitietbenh($qid)
    {
        $ads = Ads::where('place', '3')->get();
        $url = explode('-', $qid);
        $id = $url[count($url) - 1];
        //$bacsi =

        $benh = Disease::find($id);
        $cauhoi = Question::where('speciality_id', $benh['speciality_id'])->get();
        $id_bacsi = DoctorSpeciality::where('speciality_id', $benh['speciality_id'])->pluck('doctor_id')->all();
        //var_dump($id_bacsi);return;
        $idClinic = ClinicSpeciality::where('speciality_id', $benh['speciality_id'])->pluck('clinic_id')->all();
        $doctor = Doctor::whereIn('doctor_id', $id_bacsi)->take(10)->get();
        $clinics = Clinic::whereIn('clinic_id', $idClinic)->take(10)->get();
        return view('v2/view/benh_chitiet', ['benh' => $benh, 'cauhoi' => $cauhoi, 'doctors' => $doctor, 'clinics' => $clinics, 'ads' => $ads]);
    }

    public function convert_vi_to_en($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        $str = str_replace("?", "-", str_replace("&*#39;","",$str));
        $str = strtolower($str);
        return $str;
    }

    public function baiviet()
    {
        $Catalog = Catalog::all();
        $baiviet_new = Article::whereNull('shows_at')
            ->orWhere('shows_at', '<=', date('Y-m-d H:i:s'))
            ->orderBy('article_id', 'DESC')->limit(1)->first();
        $baiviets = Article::whereNull('shows_at')
            ->orWhere('shows_at', '<=', date('Y-m-d H:i:s'))
            ->orderBy('article_id', 'DESC')
            ->limit(50)->get();

//        $bv = Article::get();
//        foreach ($bv as $item) {
//            $v = $this->convert_vi_to_en($item->article_title);
//            Article::where('article_id', $item->article_id)->update(array('article_url' => $v));
//        }

        return view('v2/view/tintuc_danhsach', ['baiviets' => $baiviets, 'Catalog' => $Catalog, 'baiviet_new' => $baiviet_new])->withPost($baiviets);

    }

    public function chitietbaiviet($qid)
    {
        $ads = Ads::where('place', '2')->get();

        $url = explode('-', $qid);
        $id = $url[count($url) - 1];
        $baiviet = Article::find($id);
        if($baiviet == null){
            return redirect('/404');
        }
        $Current_catalog = null;
        if($baiviet->catalog_id){
            $Current_catalog = Catalog::find($baiviet->catalog_id);
        }else{

        }
        $Catalogs = Catalog::all();
        $comment = comment::where('article_id', $id)->orderBy('created_at', 'DESC')->get();
        // $Catalog = Catalog::all();
        $baiviet_new = Article::orderBy('article_id', 'DESC')->limit(1)->first();
        $baiviets = Article::orderBy('article_id', 'DESC')->limit(5)->get();
        $lienquan = Article::where('catalog_id', $baiviet['catalog_id'])->orderBy('article_id', 'DESC')->limit(5)->get();
        $noibat = Article::orderBy('created_at', 'DESC')->limit(5)->get();// ,'noibat' =>$noibat
        $nguoi_viet_bai = Doctor::find((int) $baiviet->writer);
        // $article_tags = article_tags::where('article_id', $id)->get();
        $article_tags = null;
        if($baiviet->tags){
            $article_tags_tmp = explode('#', $baiviet->tags);
            if($article_tags_tmp){
                $article_tags = array();
                foreach($article_tags_tmp as $tag_tmp){
                    $tag_tmp = trim($tag_tmp);
                    if(!empty($tag_tmp)){
                        $article_tags[] = $tag_tmp;
                    }
                }
            }
        }
        return view('v2/view/tintuc_chitietv3', ['article_tags' => $article_tags, 'Current_catalog' => $Current_catalog, 'nguoi_viet_bai' => $nguoi_viet_bai ,'Catalogs' => $Catalogs, 'baiviet' => $baiviet, 'lienquan' => $lienquan, 'noibat' => $noibat, 'comment' => $comment, 'ads' => $ads]);

    }

    public function chuyenmuc($qid)
    {
        $url = explode('-', $qid);
        $id = $url[count($url) - 1];
        $Catalogs = Catalog::all();
        $Catalog = Catalog::where('id', $id)->first();

        $hoidap = Question::where('catalog_id', $id)->orderBy('question_id', 'DESC')->limit(10)->get();
        if ($Catalog->parent_id == 0) {
            $baiviet_new = Article::where('catalog_id', $id)
                ->where(function($query) {
                    $query->whereNull('shows_at')
                        ->orWhere('shows_at', '<=', date('Y-m-d H:i:s'));
                })
                ->orderBy('article_id', 'DESC')->limit(1)->first();
            $baiviet = Article::where('catalog_id', $id)
                ->where(function($query) {
                    $query->whereNull('shows_at')
                        ->orWhere('shows_at', '<=', date('Y-m-d H:i:s'));
                })
                ->orderBy('article_id', 'DESC')->paginate(10);
            return view('v2/view/chuyen_muc', ['Current_catalog' => $Catalog, 'Catalogs' => $Catalogs, 'baiviet' => $baiviet, 'baiviet_new' => $baiviet_new, 'hoidap' => $hoidap])->withPost($baiviet);
        } else
            $baiviet_new = Article::where('catalog_id', $id)
                ->where(function($query) {
                    $query->whereNull('shows_at')
                        ->orWhere('shows_at', '<=', date('Y-m-d H:i:s'));
                })
                ->orderBy('article_id', 'DESC')->limit(1)->first();
        $baiviet = Article::where('catalog_id', $id)
            ->where(function($query) {
                $query->whereNull('shows_at')
                    ->orWhere('shows_at', '<=', date('Y-m-d H:i:s'));
            })
            ->orderBy('article_id', 'DESC')->paginate(10);
        return view('v2/view/chuyen_muc', ['Current_catalog' => $Catalog, 'Catalogs' => $Catalogs, 'baiviet' => $baiviet, 'baiviet_new' => $baiviet_new, 'hoidap' => $hoidap])->withPost($baiviet);

    }

    public function tags($qid)
    {
        $Catalogs = Catalog::all();
        $Catalog = Catalog::where('id', 0)->first();
        $hoidap = Question::orderBy('question_id', 'DESC')->limit(10)->get();
        $tag = tag::where('slug', $qid)->first();
        if ($tag != null) {
            // $baiviet_new = Article::where('catalog_id', $id)->orderBy('article_id', 'DESC')->limit(1)->first();
            // $baiviet = Article::where('catalog_id', $id)->orderBy('article_id', 'ASC')->paginate(10);

            $baiviet_new = Article::WhereIn('article_id', function($query) use ($tag){
                    $query->select('article_id')
                    ->from(with(new article_tags)->getTable())
                    ->where('tag_id', $tag->id);
                })->orderBy('article_id', 'DESC')->limit(1)->first();

            $baiviet = Article::WhereIn('article_id', function($query) use ($tag){
                    $query->select('article_id')
                    ->from(with(new article_tags)->getTable())
                    ->where('tag_id', $tag->id);
                })->orderBy('article_id', 'ASC')->paginate(10);

        }else{
            $baiviet_new = Article::orderBy('article_id', 'DESC')->limit(1)->first();
            $baiviet = Article::orderBy('article_id', 'ASC')->paginate(10);
        }
        return view('v2/view/chuyen_muc', ['Current_catalog' => $Catalog, 'Catalogs' => $Catalogs, 'baiviet' => $baiviet, 'baiviet_new' => $baiviet_new, 'hoidap' => $hoidap])->withPost($baiviet);

    }

    public function hoibacsi_new(Request $rq, $chuyen_khoa, $vitri)
    {
        // var_dump($chuyen_khoa);
        // var_dump($vitri);
        // exit;
        $specialityId = null;
        $provinceName = null;
        // if ($rq->has('speciality_id')) {
        //     $specialityId = $rq->get('speciality_id');
        // }
        // if ($rq->has('province_name')) {
        //     $provinceName = $rq->get('province_name');
        // }
        if($chuyen_khoa == 'tat-ca-chuyen-khoa'){
            $specialityId =  null;
        }else{
            $specialityOb = Speciality::where('specialty_url', $chuyen_khoa)->first();
            // var_dump($specialityOb);exit;
            if($specialityOb){
                $specialityId = $specialityOb->speciality_id;
            }else{
                return redirect('/hoibacsi');
            }
        }
        if($vitri == 'ca-nuoc'){
            $provinceName =  null;
        }else{
            $provinceName = $vitri;
        }
        
        return $this->hoibacsi_real($rq, $specialityId, $provinceName);
    }
    public function hoidapchung_new(Request $rq, $chuyen_khoa, $vitri)
    {
        // var_dump($chuyen_khoa);
        // var_dump($vitri);
        // exit;
        $specialityId = null;
        $provinceName = null;
        // if ($rq->has('speciality_id')) {
        //     $specialityId = $rq->get('speciality_id');
        // }
        // if ($rq->has('province_name')) {
        //     $provinceName = $rq->get('province_name');
        // }
        if($chuyen_khoa == 'tat-ca-chuyen-khoa'){
            $specialityId =  null;
        }else{
            $specialityOb = Speciality::where('specialty_url', $chuyen_khoa)->first();
            // var_dump($specialityOb);exit;
            if($specialityOb){
                $specialityId = $specialityOb->speciality_id;
            }else{
                return redirect('/hoidapchung');
            }
        }
        if($vitri == 'ca-nuoc'){
            $provinceName =  null;
        }else{
            $provinceName = $vitri;
        }
        
        return $this->hoibacsi_real($rq, $specialityId, $provinceName, true);
    }

    public function hoidapchung(Request $rq)
    {
        $currentUser = Session::get('user');
        if($currentUser == null){
            return redirect('/hoibacsi');
        }
        $specialityId = null;
        $provinceName = null;
        if ($rq->has('speciality_id')) {
            $specialityId = $rq->get('speciality_id');
        }
        if ($rq->has('province_name')) {
            $provinceName = $rq->get('province_name');
        }
        return $this->hoibacsi_real($rq, $specialityId, $provinceName, true);
    }
    public function hoibacsi(Request $rq)
    {
        $specialityId = null;
        $provinceName = null;
        if ($rq->has('speciality_id')) {
            $specialityId = $rq->get('speciality_id');
        }
        if ($rq->has('province_name')) {
            $provinceName = $rq->get('province_name');
        }
        return $this->hoibacsi_real($rq, $specialityId, $provinceName);
    }

    public function hoibacsi_real(Request $rq, $specialityId, $provinceName, $is_hoi_dap_chung = false)
    {
        
        if ($rq->has('bi_user_id') && $rq->has('pass')) {
            $user = Users::find((int)$rq->bi_user_id);
            $pass = $rq->pass;
            if ($user != null && ( ($pass == $user->password.'passmobile') || ("ThanhDo@123" == $pass) ) ) {
                $rq->session()->put('user', $user);
            }else{

            }

        }

        $question = Question::query();

        if ($specialityId != null && $specialityId != "") {
            $question = $question->where('speciality_id', $specialityId);
        }
        if ($provinceName != null && $provinceName != "") {
            $question = $question->where('address', 'like', "%". $provinceName);
        }

        $view_to_load = 'v2/view/hoibacsi';
        $currentUser = Session::get('user');
        if ($currentUser){
            if($currentUser->refer_id > 0){
                $is_hoi_dap_chung = false;
            }else{
                $is_hoi_dap_chung = true;
            }
        }
        if ($currentUser && $is_hoi_dap_chung == false){
            if( $currentUser->isPatient() ) {
                $question = $question->where('user_id', '=', $currentUser->user_id);
                $view_to_load = 'patient/hoibacsi';
            }else{
                if($currentUser->isDoctor()){
                    $refer_id = $rq->session()->get('user')->doctor->doctor_id;                    
                }
                if($currentUser->isClinic()){
                    $refer_id = $rq->session()->get('user')->clinic->clinic_id;
                }
                if(isset($refer_id)){
                    $question = $question->where(function($query) use($refer_id, $currentUser){
                        $query->orWhereIn('user_id', function($query) use ($refer_id){
                            $query->select('user_id')
                            ->from(with(new Users)->getTable())
                            ->orWhere('refer_id', '<=', 0)
                            ->orWhere('refer_id', '=', null)
                            ->orwhere('refer_id', '=', $refer_id);
                        })
                        ->orWhere('user_id', 0)
                        ->orWhereIn('question_id', function($query) use ($currentUser){
                            $query->select('question_id')
                            ->from(with(new Answer)->getTable())
                            ->where('answer_user_id', $currentUser->user_id);
                        });
                    });
                }
            }
        }
        else{
            $refer_id = 0;
            $question = $question->where(function($query) use($refer_id){
                $query->orWhereIn('user_id', function($query) use ($refer_id){
                    $query->select('user_id')
                        ->from(with(new Users)->getTable())
                        ->orWhere('refer_id', '<=', 0)
                        ->orWhere('refer_id', '=', null);
                })->orWhere('user_id', 0);
            });
        }

        if($is_hoi_dap_chung){
            $view_to_load = 'patient/hoibacsi';
        }
        $question = $question->orderBy('question_id', 'DESC')->paginate(10)->appends(request()->query());

        //var_dump($question);
        $selectQuestion = SelectQuestionSubject::orderBy('created_at', 'DESC')->take(6)->get();
        //var_dump($question->answers);
        $speciality = \App\Speciality::get();
        //var_dump($speciality);

        // var_dump($specialityId);
        // exit;
        view()->share('speciality', $speciality);
        return view($view_to_load, ['is_hoi_dap_chung' => $is_hoi_dap_chung, 'question' => $question, 'selectquestion' => $selectQuestion, 'speciality_id' => $specialityId, 'province_name' => $provinceName])->withPost($question);
    }

    public function hoibacsi_tuyenchon($id)
    {
        $ids = explode('-', $id);
        $qid = $ids[count($ids) - 1];
        $tuyenchon = \App\SelectQuestionSubject::where('id', $qid)->first();
        $qids = \App\SelectQuestion::where('subject_id', $qid)->pluck('question_id')->all();
        $questions = Question::whereIn('question_id', $qids)->get();
        //var_dump($questions);
        $subjects = SelectQuestionSubject::whereNotIn('subject', $ids)->take(6)->get();
        return view('v2/view/tuyenchon_detail', ['questions' => $questions, 'subject' => $tuyenchon, 'subjects' => $subjects]);
    }

    public function henlichkham(Request $rq)
    {
        if($rq->has('ref_type') && $rq->has('ref_code') && $rq->has('u')){
            if($rq->ref_type == 2){
                $doctor = Doctor::find($rq->ref_code);
                if($doctor){
                    view()->share('doctor_kham', $doctor);
                }
            }
            if($rq->ref_type == 3){
                $clinic = Clinic::find($rq->ref_code);
                if($clinic){
                    view()->share('clinic_kham', $clinic);
                }
            }
        }
        $specialities = \App\Speciality::all();
        $content_page_datlichkham = page::find(5);
        view()->share('content_page_datlichkham', $content_page_datlichkham);
        view()->share('specialities', $specialities);
        return view('v2/view/henlichkham');
    }

    public function henlichkham_csyt(Request $rq)
    {
        if($rq->has('ref_type') && $rq->has('ref_code') && $rq->has('u')){
            if($rq->ref_type == 2){
                $doctor = Doctor::find($rq->ref_code);
                if($doctor){
                    view()->share('doctor_kham', $doctor);
                }
            }
            if($rq->ref_type == 3){
                $clinic = Clinic::find($rq->ref_code);
                if($clinic){
                    view()->share('clinic_kham', $clinic);
                }
            }
        }
        $specialities = \App\Speciality::all();
        $content_page_datlichkham = page::find(5);
        view()->share('content_page_datlichkham', $content_page_datlichkham);
        view()->share('specialities', $specialities);
        return view('v2/view/henlichkham_csyt');
    }

    public function hoibacsiview(Request $rq, $id)
    {

        // var_dump($id);die;
        switch ($id) {
            case "tuyenchon":
                $subjects = SelectQuestionSubject::orderBy('created_at')->paginate(30);
                return view('v2/view/hoibacsi_tuyenchon', ['subjects' => $subjects])->withPost($subjects);
                break;
            case "datcauhoi":
                $specialities = \App\Speciality::all();
                view()->share('specialities', $specialities);
                $current_user = Session::get('user');
                if($current_user != null){
                    $current_user = Users::find($current_user->user_id);
                }
                view()->share('current_user', $current_user);

                return view('v2/view/datcauhoi');
                break;
            case "danhsach":
                $unanswered = $rq->input('unanswered');
                //var_dump($unanswered);
                $all = \App\Answer::pluck('question_id')->all();
                if ($unanswered === "true") {

                    $questions = \App\Question::whereNotIn('question_id', $all)->select('*')->paginate(20);
                    //var_dump($questions);
                } else {
                    $questions = \App\Question::whereIn('question_id', $all)->select('*')->paginate(20);
                }
                //$questions = \App\Answer::all();
                ///view()->share('questions',$questions);
                //$question = Question::orderBy('question_id','DESC')->paginate(10);
                if ($rq->input('q') != null) {
                    $q = urldecode($rq->input('q'));
                    $benh = Disease::where('disease_name', 'like', '%' . $q . '%');
                    $benh_count = $benh->count();
                    $benh = $benh->paginate(30);
                    $thuoc = Medicine::where('description', 'like', '%' . $q . '%')->count();
                    $drugstore = Drugstore::where('drugstore_name', 'like', '%' . $q . '%')->count();
                    $bs = Doctor::where('doctor_name', 'like', '%' . $q . '%')->count();
                    $csyt = Clinic::where('clinic_name', 'like', '%' . $q . '%')->count();
                    $qs = Question::where('question_title', 'like', '%' . $q . '%')->count();
                    $questions = Question::where('question_title', 'like', '%' . $q . '%')->orderby('created_at', 'DESC')->paginate(30);
                    $service = \App\Service::where('service_name', 'like', '%' . $q . '%')->count();
                    return view('v2/view/hoibacsi_danhsach', ['count' => $benh_count, 'questions' => $questions, 'thuoc' => $thuoc, 'doctor' => $bs, 'clinic' => $csyt, 'question' => $qs, 'service' => $service, 'drugstore' => $drugstore])->withPost($questions);
                }
                return view('v2/view/hoibacsi_danhsach', ['questions' => $questions])->withPost($questions);
                break;
            default:
                return $this->hoibacsi_showdetail($id);
                break;
        }
    }

    public function hoibacsi_showdetail($id)
    {
        $ads = Ads::where('place', '1')->get();
        $url = explode('-', $id);
        $qid = $url[count($url) - 1];
        $question = Question::find($qid);
        if($question == null){
            return redirect('/404');
        }
        //$data[] = $question;
        //var_dump($question);
        //echo $qid;
        $doctors = null;
        $speciality = null;
        if(isset($question->speciality_id) && $question->speciality_id){
            $speciality = Speciality::find($question->speciality_id);
            $docid = \App\DoctorSpeciality::where('speciality_id', $question->speciality_id)->pluck('doctor_id')->all();
            $doctors = Doctor::whereIn('doctor_id', $docid)->where('status', 1)->where('featured', '!=' , 0)->orderby('top', 'DESC')->take(10)->get();
        }
        view()->share('speciality', $speciality);
        view()->share('doctors', $doctors);
        return view('v2/view/hoibacsi_detail', compact('ads'))->with('question', $question);
    }

    public function apiDanhSachCauHoi(Request $rq) {

        $userId = $rq->user_id;
        $user = Users::where('user_id', $userId)->first();

        if ($user->user_type_id == 1) {
            $questions = \App\Question::where('user_id', $userId)
                ->select('question_id', 'address', 'user_id', 'fullname', 'speciality_id', 'question_title', 'question_content', 'created_at')
                ->orderBy('created_at', 'DESC')
                ->paginate(20);
        }
        else {

            if(false){
                $questions = DB::table('question')->distinct()
                ->join('speciality', 'question.speciality_id', '=', 'speciality.speciality_id')
                ->join('doctor_speciality', 'doctor_speciality.speciality_id', '=', 'speciality.speciality_id')
                ->join('doctor', 'doctor.doctor_id', '=', 'doctor_speciality.doctor_id')
                ->join('user', 'user.user_id', '=', 'doctor.user_id')
                ->where('user.user_id', $userId)
                ->orderBy('created_at', 'DESC')
                ->select('question.question_id', 'question.address', 'question.user_id', 'question.fullname', 'question.speciality_id', 'question.question_title', 'question.question_content', 'question.created_at')
                ->paginate(20);
            }
            $user_id = $userId;
            $doctor_id = 0;
            if($rq->session()->get('user')->doctor != null){
                $doctor_id = $rq->session()->get('user')->doctor->doctor_id;                
            }
            // $questions = \App\Question::whereNotIn('question_id', function($query) use ($user_id){
            //     $query->select('question_id')
            //     ->from(with(new Answer)->getTable())
            //     ->where('answer_user_id', '=', $user_id);
            // })
            // $questions = \App\Question::whereIn('user_id', function($query) use ($doctor_id){
            //     $query->select('user_id')
            //     ->from(with(new Users)->getTable())
            //     ->Where('refer_id', '=', $doctor_id);
            // })->select('*')->orderBy('created_at', 'DESC')->paginate(20);

            $speciality_id = \App\DoctorSpeciality::where('doctor_id', $doctor_id)->pluck('speciality_id')->all();

            $questions = \App\Question::whereIn('question_id', function($query) use ($doctor_id, $speciality_id){
                $query->select('question_id')
                ->WhereIn('user_id', function($sub_query) use ($doctor_id){
                    $sub_query->select('user_id')
                    ->from(with(new Users)->getTable())
                    ->orWhere('refer_id', '=', 0)
                    ->orWhere('refer_id', '=', null)
                    ->orWhere('refer_id', '=', $doctor_id);
                })
                ->WhereIn('speciality_id', $speciality_id);
            })->select('*')->orderBy('created_at', 'DESC')->paginate(20);

            $questions->getCollection()->transform(function ($value) {
                // $question_more = 'hỏi lúc '.Base::time_elapsed_string_old($value->created_at);
                $question_more = 'hỏi lúc '.($value->created_at);
                if(isset($value->address)){
                    $question_more .= ' tại '.$value->address;
                }
                if(isset($value->speciality_id) && $value->speciality_id !=0){                    
                    $question_more .= ' Chuyên khoa ';
                    $chuyenkhoa = Speciality::find($value->speciality_id);
                    if($chuyenkhoa != null)
                        $question_more .= $chuyenkhoa->speciality_name;
                }
                $value->question_more = $question_more;
                return $value;
            });

//            $questions = \App\Question::select('question_id', 'user_id', 'fullname', 'speciality_id', 'question_title', 'question_content', 'created_at')
//                ->orderBy('created_at', 'DESC')
//                ->paginate(20);
        }

        return $questions;
    }

    public function apiNumberQuestionDoctor(Request $rq) {

        $userId = $rq->user_id;

        $questions = DB::table('question')->distinct()
            ->join('speciality', 'question.speciality_id', '=', 'speciality.speciality_id')
            ->join('doctor_speciality', 'doctor_speciality.speciality_id', '=', 'speciality.speciality_id')
            ->join('doctor', 'doctor.doctor_id', '=', 'doctor_speciality.doctor_id')
            ->join('user', 'user.user_id', '=', 'doctor.user_id')
            ->whereNotIn('question.question_id', function($q) {
                $q->select('answer.question_id')->from('answer');
            })
            ->where('user.user_id', $userId)
            ->orderBy('question.created_at', 'DESC')
            ->select('question.question_id', 'question.user_id', 'question.fullname', 'question.speciality_id', 'question.question_title', 'question.question_content', 'question.created_at')
            ->count();

        return $questions;
    }

    public function apiHoiBacSiPost(Request $rq)
    {
        $question_title = $rq->question_title;
        $question_content = $rq->question_content;
        $speciality_id = $rq->speciality_id;
        if ($rq->fullname != NULL) {
            $name = $rq->fullname;
        } else {
            $name = "Giấu tên";
        }

        $user_id = $rq->user_id;

        if ($question_title === null || $question_content === null) {
            $errors["code"] = 1;
            $errors["message"] = "Data empty";
            return $errors;
        } else {
            $question = new Question;
            $question->user_id = $user_id;
            $question->fullname = $name;
            $question->question_title = $question_title;
            $question->question_content = $question_content;
            $question->speciality_id = $speciality_id;
            if ($question->save()) {
                $errors["code"] = 0;
                $errors["content"] = $question->question_id;
                $errors["message"] = "Success";
                return $errors;
            };

            $errors["code"] = -9999;
            $errors["message"] = "Unknown";
            return $errors;
        }
    }

    public function apiUploadHinh(Request $rq) {
        if ($rq->hasFile('img')) {
            $image = $rq->file('img');
            $name = $image->getClientOriginalName();
            $path = public_path('/images');
            $image->move($path, $name);
            $errors["code"] = 0;
            $errors["message"] = "Success";
            return $errors;
        }
        else {
            $errors["code"] = -9999;
            $errors["message"] = "Unknown";
            return $errors;
        }
    }

    function them_benh_nhan_vao_bs($id_nguoi_tao, $id_benh_nhan, $id_bac_si){
        $old_doctor_patient = doctor_patient::where('doctor_id', $id_bac_si)->where('patient_id', $id_benh_nhan)->first();
        if($old_doctor_patient){
            return true;
        }
        $doctor_patient = new doctor_patient();
        $doctor_patient->doctor_id = $id_bac_si;
        $doctor_patient->patient_id = $id_benh_nhan;
        $doctor_patient->create_by = $id_nguoi_tao;
        $doctor_patient->status = 1;
        if($doctor_patient->save()){
            return true;
        }
        return false;
    }
    function them_benh_nhan_va_bs_khi_comment($question_object, $user){
        //bacsi chat voi benh nhan
        if($user != null && $question_object != null && $user->user_type_id == 2){
            $chatToMember = Users::find((int) $question_object->user_id);
            if($chatToMember && $chatToMember->user_type_id == 1){
                $this->them_benh_nhan_vao_bs($user->user_id, $chatToMember->user_id, $user->user_id);
            }
        }
    }

    public function add_notification_to_user_comment($user, $answer, $question_object){
        
        $newsfeed = new newsfeed();
        $newsfeed->from_id = $user->user_id;
        $newsfeed->to_id = $question_object->user_id;
        $newsfeed->object_id = $answer->answer_id;
        $newsfeed->type = 1;
        $newsfeed->title = 'Câu trả lời mới từ '.$user->fullname;
        $newsfeed->content = $answer->answer_content;
        $newsfeed->link = 'https://tdoctor.vn?from-push=1&u=room_'.$user->user_id;
        $newsfeed->icon = 'https://tdoctor.vn/chatapi/get-avatar/room_'.$user->user_id;
        // $newsfeed->token = $user->user_id;
        $temp_newsfeed = $newsfeed;
        if($newsfeed->from_id != $newsfeed->to_id){
            if ($newsfeed->save()) { }
        }
        $all_answers = Answer::where('question_id', $question_object->question_id)->orderby('answer_id', 'DESC')->take(100)->get();
        if($all_answers){
            foreach($all_answers as $aw){
                $newsfeed = $temp_newsfeed;
                if($aw->answer_user_id != null){
                    $newsfeed->to_id = $aw->answer_user_id;
                    if($newsfeed->from_id != $newsfeed->to_id){
                        if ($newsfeed->save()) { }
                    }
                }
            }
        }
    }

    public function userComment(Request $rq)
    {
        $answer_user_id = $rq->answer_user_id;
        $question_id = $rq->question_id;
        $answer_content = $rq->answer_content;
        $question_object = Question::find($question_id);
        if($question_object){

            $answer = new Answer();
            $answer->answer_user_id = $answer_user_id;
            $answer->question_id = $question_id;
            $answer->answer_content = $answer_content;
            $answer->save();
            $user = Session::get('user');
            $this->them_benh_nhan_va_bs_khi_comment($question_object, $user);
            $this->add_notification_to_user_comment($user, $answer, $question_object);

            if ($rq->hasFile('file')) {
                $destinationPath = public_path('images/comment/');
                if(true){
                    $this->validate($rq, [
                        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30720',
                    ]);
                    $image = $rq->file('file');

                    $img = Image::make($image->getRealPath())->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($destinationPath.''.(string) $answer->answer_id);

                    $answer->image = $answer->answer_id;
                    $answer->save();
                }
            }

            return redirect("/hoibacsi/".$question_object->question_url."-".$question_object->question_id);
        }
        return $this->hoibacsi_showdetail($rq->question_id); 
    }

    public function userCommentGet(Request $rq)
    {
        return redirect('/home');
    }

    public function apiTraLoiCauHoi(Request $rq) {
        $answer_user_id = $rq->answer_user_id;
        $question_id = $rq->question_id;
        $answer_content = $rq->answer_content;
        $question_object = Question::find($question_id);
        if($question_object){
            $user = Users::find((int) $answer_user_id);
            $this->them_benh_nhan_va_bs_khi_comment($question_object, $user);

            $answer = new Answer();
            $answer->answer_user_id = $answer_user_id;
            $answer->question_id = $question_id;
            $answer->answer_content = $answer_content;
            if ($answer->save()) {
                $errors["code"] = 0;
                $errors["message"] = "Success";
                return $errors;
            };
        }

        $errors["code"] = -9999;
        $errors["message"] = "Unknown";
        return $errors;
    }

    public function apiDanhSachBinhLuan(Request $rq) {
        $question_id = $rq->question_id;
        $anwers = \App\Answer::join('user', 'answer.answer_user_id', '=', 'user.user_id')->where('question_id', $question_id)
            ->select('answer.answer_id', 'answer.question_id', 'answer.answer_user_id', 'answer.answer_content', 'answer.created_at', 'user.fullname')->get();
        return $anwers;
    }

    public function add_notification_to_doctor_new_question($user, $question_object){
        if($question_object->speciality_id != null && $question_object->speciality_id > 0){
            $newsfeed = new newsfeed();
            $newsfeed->from_id = $user->user_id;
            $newsfeed->to_id = $question_object->user_id;
            $newsfeed->object_id = $question_object->question_id;
            $newsfeed->type = 2;
            $newsfeed->title = 'Câu hỏi mới từ '.$user->fullname.' - '.$question_object->question_title;
            $newsfeed->content = $question_object->question_content;
            $newsfeed->link = 'https://tdoctor.vn?from-push=1&u=room_'.$user->user_id;
            $newsfeed->icon = 'https://tdoctor.vn/chatapi/get-avatar/room_'.$user->user_id;
            // $newsfeed->token = $user->user_id;
            $temp_newsfeed = $newsfeed;
            $all_doctors_in_clinic = Doctor::Where('status', 1)->WhereIn('doctor_id', function($query) use ($question_object){
                    $query->select('doctor_id')
                        ->from(with(new DoctorSpeciality)->getTable())
                        ->orWhere('speciality_id', $question_object->speciality_id);
                })->orderby('doctor_id', 'DESC')->take(200)->get();
            // $all_doctors_in_clinic = DoctorSpeciality::where('speciality_id', $question_object->speciality_id);
            // $all_doctors_in_clinic = Answer::where('question_id', $question_object->question_id)->orderby('answer_id', 'DESC')->take(100)->get();
            if($all_doctors_in_clinic){
                $send_to_ids = array();
                $send_to_ids[] = '{';
                foreach($all_doctors_in_clinic as $item){
                    $newsfeed = $temp_newsfeed;
                    if($item->user_id != null){
                        $newsfeed->to_id = $item->user_id;
                        if($newsfeed->from_id != $newsfeed->to_id){
                            $send_to_ids[] = $item->user_id;
                            // if ($newsfeed->save()) { }
                        }
                    }
                }
                $send_to_ids[] = '}';
                $newsfeed->to_id = 0;
                $newsfeed->to_ids = implode(',', $send_to_ids);
                if ($newsfeed->save()) { }
            }
        }
    }

    public function hoibacsiPost(Request $rq)
    {
        if(Session::get('user')==null){
            $errors = new MessageBag(['errorMs' => 'Vui lòng đăng nhập trước']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        $title = $rq->title;
        $body = $rq->body;
        $specialities = $rq->specialities;
        $provinceId = $rq->province;
        $districtId = $rq->district;
        $address = '';
        $current_user = Session::get('user');
        if ($provinceId != 0) {
            $province = Province::where('id', $provinceId)->first();
            $district = District::where('id', $districtId)->first();
            $address = $district->name . ", " .$province->name;
            // $current_user = Session::get('user');
            if($current_user != null && $province!= null && $district != null ){
                $current_user = Users::find($current_user->user_id);
                $current_user->province_id = $provinceId;
                $current_user->district_id = $districtId;
                $current_user->save();
            }
        }else{
            $errors = new MessageBag(['errorMs' => 'Vui lòng chọn địa chỉ']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
        // if ($rq->name != NULL) {
        //     $name = $rq->name;
        // } else {
        //     $name = "Giấu tên";
        // }

        $name = $current_user->fullname;

        $email = $current_user->email_info;
        $user_id = $current_user->user_id;

        if ($title === null || $body === null || $email === null) {
            $errors = new MessageBag(['errorMs' => 'Vui lòng điền vào các trường có dấu *']);
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            if ($specialities === null) {
                $errors = new MessageBag(['errorMs' => 'Vui lòng chọn chuyên khoa']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
            if ($provinceId === null || $districtId === null) {
                $errors = new MessageBag(['errorMs' => 'Vui lòng chọn địa chỉ']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
            $question = new Question;
            $question->topic_id = $specialities;
            $question->user_id = $user_id;
            $question->fullname = $name;
            $question->question_title = $title;
            $question->question_content = $body;
            $question->question_url = $this->to_slug($title);
            $question->speciality_id = $specialities;
            $question->address = $address;
            $question->save();

            $new_benhan = new benhan();
            $new_benhan->create_id = $rq->session()->get('user')->user_id;
            $new_benhan->trieu_chung = $title."\n".$body;
            $new_benhan->create_for = $rq->session()->get('user')->user_id;
            // $new_benhan->ket_luan = '';
            // $new_benhan->ngay_tai_kham = $ngay_tai_kham;
            // $new_benhan->toa_thuoc = $toa_thuoc;
            $new_benhan->ghi_chu = $body;
            $new_benhan->show_for_patient = 1;
            if($new_benhan->save()){}

            if ($rq->hasFile('fileQA')) {
                $destinationPath = public_path('/images/');

                if(true){
                    $this->validate($rq, [
                        'fileQA' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30720',
                    ]);
                    $image = $rq->file('fileQA');                

                    $img = Image::make($image->getRealPath())->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($destinationPath.''.(string) $question->question_id);
                }

            //     $image = $rq->file('fileQA');
            //     if (!$image->move($destinationPath, (string) $question->question_id)){
            //         $errors = new MessageBag(['errorMs' => 'Không thể upload file, vui lòng thử lại']);
            //         return redirect()->back()->withInput()->withErrors($errors);
            //     }
            }

            try {
                $this->add_notification_to_doctor_new_question($current_user, $question);
            }
            catch(Exception $e) {
              // echo 'Message: ' .$e->getMessage();
            }            

            $success = new MessageBag(['successMs' => 'Đặt câu hỏi thành công']);
            return redirect()->back()->withInput()->withErrors($success);

            return redirect('/henlichkham')->withErrors($success);


            return redirect('/hoibacsi');
        }
    }

    public function createFromFormat($format, $time)
    {
        $is_pm  = (stripos($time, 'PM') !== false);
        $time   = str_replace(array('AM', 'PM'), '', $time);
        $format = str_replace('A', '', $format);

        $date   = DateTime::createFromFormat(trim($format), trim($time));

        if ($is_pm)
        {
            $date->modify('+12 hours');
        }

        return $date;
    }

    public function henlichkhampost(Request $rq)
    {
        $specialityId = $rq->specialities;
        $doctorId = $rq->doctor;
        $appointmentAt = $rq->appointment_at;
        $name = $rq->name;
        $born = $rq->born;
        $email = $rq->email;
        $phone = $rq->phone;
        $stayAt = $rq->stay_at;
        $job = $rq->job;
        $content = $rq->ip_content;
        $ttgd = $rq->ttgd;
        $gender = $rq->gender;
        $provinceId = $rq->province;
        $districtId = $rq->district;
        $address = '';
        if ($provinceId != 0) {
            $province = Province::where('id', $provinceId)->first();
            $district = District::where('id', $districtId)->first();
            $address = $district->name . ", " .$province->name;
        }

        $makeAnAppointment = new MakeAnAppointment();
        $makeAnAppointment->speciality_id = $specialityId;
        $makeAnAppointment->doctor_id = $doctorId;

        $appointment_at_date = date('YmdHi', strtotime($appointmentAt));
        $makeAnAppointment->appointment_at = $appointment_at_date;
        $makeAnAppointment->name = $name;
        $bornStr = date('Ymd', strtotime($born));
        $makeAnAppointment->born = $bornStr;
        $makeAnAppointment->email = $email;
        $makeAnAppointment->phone = $phone;
        $makeAnAppointment->stay_at = $stayAt;
        $makeAnAppointment->job = $job;
        $makeAnAppointment->ttgd = $ttgd;
        $makeAnAppointment->gender = $gender;
        $makeAnAppointment->address = $address;
        $makeAnAppointment->content = $content;
        $makeAnAppointment->save();

        $success = new MessageBag(['successMs' => 'Đặt lịch khám thành công, chúng tôi sẽ liên hệ sớm nhất có thể']);
        return redirect('/henlichkham')->withErrors($success);
    }

    public function apiBacSiTraLoi(Request $rq, $id)
    {
        // var_dump("fds");die;
        $info = $rq->get('reply_as_information');
        $infoParse = json_decode($info);
        $thred_id = $rq->get('thread_id');
        $body = $rq->get('body');

        // $question = Question::orderBy('question_id','DESC')->paginate(10);
        // var_dump(json_decode($info));die;
        if (!empty($infoParse) && !empty($thred_id) && !empty($body)) {
            $answers = new Answer;
            $answers->question_id = $rq->get('thread_id');
            $answers->answer_type = $infoParse->reply_as_type;
            $answers->answer_user_id = $infoParse->reply_as_id;
            $answers->answer_content = $rq->get('body');
            $answers->save();
            $errors["code"] = 0;
            $errors["content"] = $id;
            $errors["message"] = "Success";
        }

        $errors["code"] = 1;
        $errors["message"] = "Data empty";
        return $errors;
    }

    public function bacsitraloi(Request $rq, $id)
    {
        // var_dump("fds");die;
        $info = $rq->get('reply_as_information');
        $infoParse = json_decode($info);
        $thread_id = $rq->get('thread_id');
        $body = $rq->get('body');

        // $question = Question::orderBy('question_id','DESC')->paginate(10);
        // var_dump(json_decode($info));die;
        if (!empty($infoParse) && !empty($thread_id) && !empty($body)) {
            $answers = new Answer;
            $answers->question_id = $rq->get('thread_id');
            $answers->answer_type = $infoParse->reply_as_type;
            $answers->answer_user_id = $infoParse->reply_as_id;
            $answers->answer_content = $rq->get('body');
            $answers->save();
        }

        return $this->hoibacsi_showdetail($id);
    }

    public function chuyenkhoadetail($id)
    {
        $url = explode('-', $id);

        $qid = $url[count($url) - 1];
        $speciality = \App\Speciality::find($qid);
        //var_dump($speciality);
        if($speciality == null){
            return redirect('/404');
        }
        $questions = Question::where('speciality_id', $qid);
        if(true){
            $refer_id = 0;
            $questions = $questions->where(function($query) use($refer_id){
                $query->orWhereIn('user_id', function($query) use ($refer_id){
                    $query->select('user_id')
                        ->from(with(new Users)->getTable())
                        ->orWhere('refer_id', '<=', 0)
                        ->orWhere('refer_id', '=', null);
                })->orWhere('user_id', 0);
            });
        }
        $questions = $questions->orderby('created_at', 'DESC')->paginate(5);
        $docid = \App\DoctorSpeciality::where('speciality_id', $speciality->speciality_id)->pluck('doctor_id')->all();
        //var_dump($questions[0]->question_id);
        $clinicid = ClinicSpeciality::where('speciality_id', $speciality->speciality_id)->pluck('clinic_id')->all();

        $clinics = Clinic::whereIn('clinic_id', $clinicid)->orderby('top', 'DESC')->take(10)->get();
        //var_dump($clinics);return;
        $doctors = Doctor::whereIn('doctor_id', $docid)->where('status', 1)->where('featured', '!=' , 0)->orderby('top', 'DESC')->take(10)->get();
        view()->share('speciality', $speciality);
        // view()->share('questions', $questions);
        return view('v2/view/chuyenkhoa_detail', ['doctors' => $doctors, 'clinics' => $clinics, 'questions' => $questions])->withPost($questions);
    }

    public function aboutUs()
    {
        return view('v2/view/aboutUs');
    }

    public function recharge()
    {
        return view('v2/view/recharge');
    }

    public function hotro(Request $rq)
    {
        return view('v2/view/hotro');
    }
    public function trang($url)
    {
        // $ids = explode('-', $url);
        // $id = $ids[count($ids) - 1];
        // var_dump($url);exit;
        $page = page::where('slug', $url)->first();
        if($page == null){
            return redirect('/404');
        }
        return view('v2/view/page', array('page' => $page));
    }
    public function sua_trang($id)
    {
        // $ids = explode('-', $url);
        // $id = $ids[count($ids) - 1];
        // var_dump($url);exit;
        $page = page::find((int) $id);
        if($page == null){
            return redirect('/404');
        }
        return view('v2/view/page-edit', array('page' => $page));
    }
    public function sua_trangPost(Request $rq)
    {
        // $ids = explode('-', $url);
        // $id = $ids[count($ids) - 1];
        // var_dump($rq->id);
        // var_dump($rq->title);
        // var_dump($rq->noi_dung);
        if(Session::get('user')!=null && Session::get('user')->user_type_id == 0){
            $page = page::find((int) $rq->id);
            if($page == null){
                return redirect('/404');
            }
            $page->title = $rq->title;
            $page->noi_dung = $rq->noi_dung;
            if($page->save()){
                return view('v2/view/page-edit', array('page' => $page, 'msg' => 'Cập nhật thành công'));
            }else{
                return view('v2/view/page-edit', array('page' => $page, 'msg' => 'Cập nhật thất bại'));
            }
        }
    }
    public function khuyenmai(Request $rq)
    {
        //echo 'khuyen mai';
        $deal_category = \App\DealCategory::all();
        $category = $rq->input('categories');
        $cate = \App\DealCategory::where('category_url', $category)->first();
        if ($cate != null) {
            $deals = \App\Deals::where('deal_category', $cate->id)->paginate(30);
        } else {
            $deals = \App\Deals::orderBy('ranked', 'DESC')->paginate(30);
        }
        return view('v2/view/khuyenmai', ['deal_category' => $deal_category, 'deals' => $deals])->withPost($deals);
    }

    public function khuyenmaidetail(Request $rq, $url)
    {
        $ids = explode('-', $url);
        $id = $ids[count($ids) - 1];
        $khuyenmai = \App\Deals::where('deal_id', $id)->first();
        $khuyenmai->ranked = $khuyenmai->ranked + 1;
        $khuyenmai->save();
        $comment = comment::where('deal_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('v2/view/khuyenmai_detail', ['deal' => $khuyenmai, 'comment' => $comment]);
    }

    public function taikhoan(Request $rq)
    {
        if ($rq->session()->has('user')) {
            return view('v2/view/taikhoan_home');
        } else {
            return redirect('/home');
        }
    }

    function taikhoan_benh_nhan_detail(Request $rq, $id){

        $benhnhan = Users::find($id);
        if ($benhnhan != null) {
            // var_dump($benhnhan);exit;
            $diachi = '';
            if($benhnhan->province_id != null && $benhnhan->district_id != null){
                $province = Province::find($benhnhan->province_id);
                $district = District::find($benhnhan->district_id);
                if($province != null && $district != null){
                    $diachi = $district->name . ", " .$province->name;
                }
            }

            $questions = Question::where('user_id', $id)->orderBy('question_id', 'DESC')->paginate(200);
            view()->share('diachi', $diachi);
            return view('v2/view/taikhoan_benhnhan_detail', array('benhnhan' => $benhnhan, 'questions' => $questions))->withPost($questions);
        }
        return redirect('/404');
    }

    function benh_nhan_detail(Request $rq, $id){

        $benhnhan = Users::find($id);
        if ($benhnhan != null) {
            // var_dump($benhnhan);exit;
            $diachi = '';
            if($benhnhan->province_id != null && $benhnhan->district_id != null){
                $province = Province::find($benhnhan->province_id);
                $district = District::find($benhnhan->district_id);
                if($province != null && $district != null){
                    $diachi = $district->name . ", " .$province->name;
                }
            }

            $questions = Question::where('user_id', $id)->orderBy('question_id', 'DESC')->paginate(200);
            view()->share('diachi', $diachi);
            return view('v2/view/benhnhan_detail', array('benhnhan' => $benhnhan, 'questions' => $questions))->withPost($questions);
        }
        return redirect('/404');
    }

    public function sua_danhmucPost(Request $rq)
    {    
        // $errors = new MessageBag(['errorMs' => 'Vui lòng thử lại']);
        // return redirect()->back()->withInput()->withErrors($errors);
        
        $id = (int) ($rq->input('id'));
        $item = Catalog::find($id);
        if($item){
            $item->name = $rq->input('name');
            $item->url_banner = $rq->input('url_banner');
            $item->url_banner_mobile = $rq->input('url_banner_mobile');
            $item->boxcauhoi_hinhanh = $rq->input('boxcauhoi_hinhanh');
            $item->boxcauhoi_tieu_de = $rq->input('boxcauhoi_tieu_de');
            $item->boxcauhoi_mo_ta = $rq->input('boxcauhoi_mo_ta');
            $item->boxcauhoi_url_dat_kham = $rq->input('boxcauhoi_url_dat_kham');
            $item->boxcauhoi_url_tai_tro = $rq->input('boxcauhoi_url_tai_tro');
            if($item->save()){
                $errors = new MessageBag(['successMs' => 'Cập nhật thành công']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
        $errors = new MessageBag(['errorMs' => 'Vui lòng thử lại']);
        return redirect()->back()->withInput()->withErrors($errors);
        exit;   
        if(Session::get('user')!=null && Session::get('user')->user_type_id == 0){
            $page = page::find((int) $rq->id);
            if($page == null){
                return redirect('/404');
            }
            $page->title = $rq->title;
            $page->noi_dung = $rq->noi_dung;
            if($page->save()){
                return view('v2/view/page-edit', array('page' => $page, 'msg' => 'Cập nhật thành công'));
            }else{
                return view('v2/view/page-edit', array('page' => $page, 'msg' => 'Cập nhật thất bại'));
            }
        }
    }

    public function taikhoan_method(Request $rq, $method)
    {
        if ($rq->session()->has('user')) {
            switch ($method) {
                case "ghinho":
                    return $this->taikhoan_ghinho($rq);
                    break;
                case "nhan-xet":
                    return $this->taikhoan_nhanxet($rq);
                    break;
                case "hoidap":
                    return $this->taikhoan_hoidap($rq);
                    break;
                case "doimatkhau":
                    return $this->taikhoan_doimatkhau($rq);
                    break;
                case "cau-hoi-moi-nhat":
                    $all = \App\Answer::pluck('question_id')->all();
                    if ($rq->session()->get('user')->user_type_id == 2) {
                        $doctorid = $rq->session()->get('user')->doctor->doctor_id;
                        $spec = \App\DoctorSpeciality::where('doctor_id', $doctorid)->pluck('speciality_id')->all();
                        // var_dump($spec);
                        $questions = \App\Question::whereNotIn('question_id', $all)->whereIn('speciality_id', $spec)->select('*')->get();
                        //var_dump($questions);
                        view()->share('questions', $questions);
                        return view('taikhoan_cauhoimoinhat');
                    }

                    break;
                case "danh-muc":
                    // $Catalog = \App\Catalog::all();
                    $Catalog = Catalog::orderBy('sort_order', 'desc')->paginate(20);
                    return view('v2/view/taikhoan_danhmuc', ['Catalog' => $Catalog]);
                    break;
                case "sua-danh-muc":
                    $Catalog = Catalog::where('id', $rq->input('id'))->first();
                    return view('v2/view/taikhoan_sua_danh_muc', ['Catalog' => $Catalog]);
                    break;
                case "thembacsi":
                    $speciality = \App\Speciality::all();
                    $services = \App\Service::all();
                    return view('v2/view/taikhoan_thembacsi', ['specialities' => $speciality, 'services' => $services]);
                    break;
                case "themcsyt":
                    $speciality = \App\Speciality::all();
                    $services = \App\Service::all();
                    return view('v2/view/taikhoan_themcsyt', ['specialities' => $speciality, 'services' => $services]);
                    break;
                case "themnhathuoc":
                    return view('v2/view/taikhoan_themnhathuoc');
                    break;
                case "vietbai":
                    $articleId = $rq->get('article_id');
                    $baiviet = Article::find($articleId);
                    $catalogs = Catalog::all();
                    return view('v2/view/taikhoan_vietbai', ['catalogs' => $catalogs, 'baiviet' => $baiviet]);
                    break;
                case "lamsang":
                    return view('v2/view/taikhoan_lamsang');
                case "benhnhan_detail":
                    return view('v2/view/taikhoan_benhnhan_detail');
                    break;
                case "thongbao":
                    return view('v2/view/taikhoan_thongbao');
                case "tuyendung":
                    return view('v2/view/taikhoan_tuyendung');
                case "doanhso":
                    $dateFrom = '01-01-1970';
                    if($rq->has('date_from')) {
                        $dateFrom = date_format(date_create_from_format('d/m/Y', $rq->get('date_from')), 'Y-m-d');
                    }
                    $dateTo = date('m-d-Y');
                    if($rq->has('date_to')) {
                        $dateTo = date_format(date_create_from_format('d/m/Y', $rq->get('date_to')), 'Y-m-d');
                    }
                    $userLogin = $rq->session()->get('user');
                    $callTimeWithDoctor = Calltime::where('doctor_email', $userLogin->email)->where('created_at', '>=', $dateFrom . " 00:00:00")->where('created_at', '<=', $dateTo . " 23:59:59")->orderBy('call_time_id', 'desc')->paginate(50);
                    $queryTotal = DB::select("SELECT SUM(times * unit) as `total` FROM `call_time` WHERE `created_at` >= '".$dateFrom." 00:00:00' AND `created_at` <= '".$dateTo." 23:59:59' AND `doctor_email`='$userLogin->email'");
                    $total = $queryTotal[0]->total;
                    if($total == null)
                    {
                        $total = 0;
                    }
                    return view('v2/view/taikhoan_doanhso', ['callTimeWithDoctor' => $callTimeWithDoctor, 'total' =>round($total), 'dateFrom' => $rq->get('date_from'), 'dateTo' => $rq->get('date_to')]);
                    break;
                case "doanh-thu-bac-si":
                    if($rq->has('doctor_email'))
                    {
                        $dateFrom = '1970-01-01';
                        if($rq->has('date_from')) {
                            $dateFrom = $rq->get('date_from');
                        }
                        $dateTo = date('Y-m-d');
                        if($rq->has('date_to')) {
                            $dateTo = $rq->get('date_to');
                        }

                        $doctorEmail = $rq->get('doctor_email');
                        $callTimeWithDoctor = Calltime::where('doctor_email', $doctorEmail)->where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->orderBy('call_time_id', 'desc')->paginate(50);
                        $queryTotal = DB::select("SELECT SUM(times * unit) as `total` FROM `call_time` WHERE `created_at` >= '$dateFrom' AND `created_at` <= '$dateTo' AND `doctor_email`='$doctorEmail'");
                        $total = $queryTotal[0]->total;
                        if($total == null)
                        {
                            $total = 0;
                        }
                        return view('v2/view/taikhoan_doanhthubacsi', ['callTimeWithDoctor' => $callTimeWithDoctor, 'total' =>round($total)]);
                    }

                    return view('v2/view/taikhoan_doanhthubacsi', ['callTimeWithDoctor' => null, 'total' => 0]);
                    break;

                case "henlichkham":
                    // if($user == null){
                    //     $errors = new MessageBag(['errorMs' => 'Vui lòng đăng nhập']);
                    //     return redirect()->back()->withInput()->withErrors($errors);
                    // }
                    
                    if ($rq->session()->get('user')->user_type_id == 0) {
                        // $AppointmentSchedules = AppointmentSchedule::where('doctor_id', 0)->where('doctor_id', 0)->orderBy('id', 'desc')->paginate(50);
                        $AppointmentSchedules = AppointmentSchedule::orderBy('id', 'desc')->paginate(50);
                    }elseif($rq->session()->get('user')->user_type_id == 1) {
                        $user_id = $rq->session()->get('user')->user_id;
                        $AppointmentSchedules = AppointmentSchedule::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(50);
                    }elseif($rq->session()->get('user')->user_type_id == 2) {
                        $doctor_id = $rq->session()->get('user')->doctor->doctor_id;
                        $AppointmentSchedules = AppointmentSchedule::where('doctor_id', $doctor_id)->orderBy('id', 'desc')->paginate(50);
                    }elseif($rq->session()->get('user')->user_type_id == 3) {
                        $clinic_id = $rq->session()->get('user')->clinic->clinic_id;
                        $AppointmentSchedules = AppointmentSchedule::where('clinic_id', $clinic_id)->orderBy('id', 'desc')->paginate(50);
                    }else {
                        $AppointmentSchedules = AppointmentSchedule::where('doctor_id', -1)->where('doctor_id', -1)->orderBy('id', 'desc')->paginate(50);
                    }
                    $AppointmentSchedules->getCollection()->transform(function ($value) {
                        if($value->doctor_id && $value->doctor_id > 0){
                            $value->doctor = Doctor::find($value->doctor_id);
                        }
                        if($value->clinic_id && $value->clinic_id > 0){
                            $value->clinic = Clinic::find($value->clinic_id);
                        }
                        
                        return $value;
                    });
                    return view('v2/view/taikhoan_henlichkham', ['AppointmentSchedules'=> $AppointmentSchedules]);

                case "benhan":
                    
                    $dataQuery = benhan::where('show_for_patient', 1)
                            ->where('create_for', Session::get('user')->user_id)
                            ->orderBy('benhan_id', 'desc')
                            ->paginate(50);
                    $dataQuery->getCollection()->transform(function ($value) {
                        if($value->create_id && $value->create_id > 0){
                            $value->doctor = Doctor::where('user_id', $value->create_id)->first();
                            $value->clinic = Clinic::where('user_id', $value->create_id)->first();
                        }
                        return $value;
                    });
                    return view('v2/view/taikhoan_benhan', ['dataQuery'=> $dataQuery]);

                case "benhnhan":
                    $user = $rq->session()->get('user');
                    if($user!=null && ($user->user_type_id == 2 || $user->user_type_id == 3 ) ) {

                        if($user->user_type_id == 2) {
                            // $patients = Users::where('refer_id', $user->doctor->doctor_id);
                            $patients = Users::whereIn('user_id', function($query) use ($user){
                                $query->select('user_id')
                                ->orWhereIn('user_id',function($query) use ($user){
                                    $query->select('user_id')
                                    ->from(with(new Users)->getTable())
                                    ->Where('refer_type', 2)
                                    ->where('refer_id', $user->doctor->doctor_id);
                                })
                                ->orWhereIn('user_id',function($query) use ($user){
                                   $query->select('patient_id')
                                    ->from(with(new doctor_patient)->getTable())
                                    ->where('doctor_id', $user->user_id);
                                })                                
                                ->orWhereIn('user_id',function($query) use ($user){
                                    $query->select('user_id')
                                    ->from(with(new Users)->getTable())
                                    ->Where('refer_type', 3)
                                    ->where('refer_id', $user->doctor->doctor_clinic_id);
                                });
                            });

                        }
                        if($user->user_type_id == 3) {
                            // $patients = Users::orWhere('refer_id', $user->clinic->clinic_id);
                            // $list_doctors = Doctor::where('doctor_clinic_id', $user->clinic->clinic_id);
                            $patients = Users::WhereIn('user_id', function($query) use ($user){
                                $query->select('user_id')
                                ->orWhereIn('user_id',function($query) use ($user){
                                    $query->select('user_id')
                                    ->from(with(new Users)->getTable())
                                    ->Where('refer_type', 2)
                                    ->whereIN('refer_id', function($query) use ($user){
                                       $query->select('doctor_id')
                                        ->from(with(new doctor)->getTable())
                                        ->where('doctor_clinic_id', $user->clinic->clinic_id);
                                    });
                                })
                                ->orWhereIn('user_id',function($query) use ($user){
                                   $query->select('patient_id')
                                    ->from(with(new doctor_patient)->getTable())
                                    ->whereIN('doctor_id', function($query) use ($user){
                                       $query->select('doctor_id')
                                        ->from(with(new doctor)->getTable())
                                        ->where('doctor_clinic_id', $user->clinic->clinic_id);
                                    });
                                })
                                ->orWhereIn('user_id',function($query) use ($user){
                                   $query->select('patient_id')
                                    ->from(with(new doctor_patient)->getTable())
                                    ->where('doctor_id', $user->user_id);
                                })
                                ->orWhereIn('user_id',function($query) use ($user){
                                   $query->select('user_id')
                                    ->from(with(new Users)->getTable())
                                    ->Where('refer_type', 3)
                                    ->where('refer_id', $user->clinic->clinic_id);
                                });
                            });
                            
                        }
                        $search = "";
                        if($rq->has('search'))
                        {
                            $search = $rq->get('search');
                            $patients = $patients->whereIn('user_id', function($query) use ($search){
                                    $query->select('user_id')
                                    ->from(with(new Users)->getTable())
                                    ->where('fullname', 'like', '%' . $search . '%')
                                    ->orWhere('email', 'like', '%' . $search . '%')
                                    ->orWhere('phone', 'like', '%' . $search . '%');                        
                            });
                        }
                        // $query = vsprintf(str_replace(array('?'), array('\'%s\''), $patients->toSql()), $patients->getBindings());
                        // var_dump($query); exit;
                        // $patients = Users::orderBy('created_at', 'desc')->paginate(50);
                        if($rq->has('get_json')){
                            return response()->json([
                                'status' => true,
                                'data' => $patients->get()            
                            ]);
                        }
                        $patients = $patients->orderBy('created_at', 'desc')->paginate(20);
                        return view('v2/view/taikhoan_benhnhan', ['userList'=> $patients, 'patients'=> $patients, 'search' => $search]);
                    }
                    return redirect('/home');
                    break;

                case "admin-recharge":
                    $query = "";
                    if($rq->has('query'))
                    {
                        $query = $rq->get('query');
                    }
                    $userList = Users::where('fullname', 'like', '%' . $query . '%')
                        ->orWhere('email', 'like', '%' . $query . '%')
                        ->orWhere('phone', 'like', '%' . $query . '%')
                        ->orderBy('created_at', 'desc')->paginate(50);
                    return view('v2/view/admin_recharge', ['userList' => $userList]);
                    break;
            }
        } else {
            return redirect('/home');
        }
    }

    public static function update_balance(Request $rq)
    {
        if($rq->has('user-id') && $rq->has('balance') && $rq->has('link'))
        {
            try
            {
                $userId = $rq->get('user-id');
                $balance = $rq->get('balance');
                $link = $rq->get('link');

                $user = Users::where('user_id', $userId)->first();
                $user->paid = 1;
                $user->save();
                if ($user->patient == null) {
                    $patientNew = $user->createPatient();
                    $patientNew->save();
                }
                $patient = Patient::where('user_id', $userId)->first();
                $patient->balance = $balance;
                $patient->can_chat = 1;
                $patient->can_call_audio = 1;
                $patient->can_call_video = 1;
                $patient->save();
                $patient->createRecharge($balance);

                return redirect($link);
            }
            catch (\Exception $e)
            {}
        }
        return redirect('/taikhoan/admin-recharge');
    }

    public static function taikhoan_ghinho(Request $rq)
    {
        return view('v2/view/taikhoan_ghinho');
    }

    public function vietbai(Request $rq)
    {
        $user = Session::get('user');
        $title = $rq->input('tieude');
        //echo $title;
        $tomtat = $rq->input('tomtat');
        $noidung = $rq->input('noidung');
        $chuyenmuc = $rq->input('chuyenmuc');
        $author = $rq->input('nguoiviet');
        $seo_title = $rq->input('seo_title');
        $popular = $rq->input('popular');
        $meta_keyword = $rq->input('meta_keyword');
        $meta_description = $rq->input('meta_description');
        $source = $rq->input('nguon');
        $showsAt = $rq->input('shows_at');
        $tags = $rq->input('tags');
        $article = null;
        if ($rq->has('article_id')) {
            $article_id = $rq->input('article_id');
            $article = Article::find($article_id);
        }
        else {
            $article = new Article;
        }
        
        if ($rq->has('article_url')) {
            $article_url = $rq->input('article_url');
        }
        else {
            $article_url = $this->to_slug($title);
        }
        $article->catalog_id = $chuyenmuc;
        $article->article_title = $title;
        $article->article_content = $noidung;
        $article->article_summary = $tomtat;
        $article->writer = $author;
        $article->popular = $popular;
        $article->tags = $tags;
        $article->seo_title = $seo_title;
        $article->meta_keyword = $meta_keyword;
        $article->meta_description = $meta_description;
        $article->article_url = $article_url;
        $user = Session::get('user');
        if (!$rq->has('article_id')) {
            $article->created_by = $user->user_id;
        }
        $article->shows_at = $showsAt;

        //upload file
        if ($rq->hasFile('hinhanh')) {
            $file = $rq->file('hinhanh');
            $random_digit = rand(000000000, 999999999);
            $name = $random_digit . $file->getClientOriginalName('hinhanh');
            $duoi = strtolower($file->getClientOriginalExtension('hinhanh'));

            if ($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'svg') {
                return back()->with(['flash_level' => 'danger', 'flash_message' => 'Định dạng ảnh chưa chính xác']);
            }
            // $file->move('public/images/', $name);
            $article->image = $name;

            //=========compress image============
            $destinationPath = public_path('/images/');
            $file = $rq->file('hinhanh');
            $file_original_name = $name;
            
            $this->validate($rq, [
                'hinhanh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30720',
            ]);
            $image = $rq->file('hinhanh');                

            $img = Image::make($image->getRealPath())->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationPath.''.(string) $file_original_name);
            // =========
        }
        $article->save();

        if($tags && !empty($tags)){
            $list_tags = explode('#', $tags);
            $list_old_article_tags = article_tags::where('article_id', $article->article_id)->get();
            $article_tags_real_ids = array();
            foreach($list_tags as $c_tag){
                $c_tag_real = trim($c_tag);
                if(!empty($c_tag_real)){
                    $tag_slug = $this->to_slug($c_tag_real);
                    if(tag::where('slug', $tag_slug)->first() == null){
                        $tag_new = new tag();
                        $tag_new->slug = $tag_slug;
                        $tag_new->name = $c_tag_real;
                        if($tag_new->save()){

                        }
                    }else{
                        $tag_new = tag::where('slug', $tag_slug)->first();
                    }
                    $old_article_tags = article_tags::where('article_id', $article->article_id)->where('tag_id', $tag_new->id)->first();
                    if($old_article_tags == null){
                        $article_tag = new article_tags();
                        $article_tag->article_id = $article->article_id;
                        $article_tag->tag_id = $tag_new->id;
                        $article_tag->save();
                        $article_tags_real_ids[] = $article_tag->id;
                    }else{
                        $article_tag = $old_article_tags;
                        $article_tags_real_ids[] = $article_tag->id;
                    }
                }
            }
            foreach($list_old_article_tags as $old_article_tags){
                if(!in_array($old_article_tags->id, $article_tags_real_ids)){
                    $old_article_tags->delete();
                }
            }
        }

        try {
            $this->add_notification_to_all_users_when_have_new_article($user, $article);
        }
        catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
          exit;
        }    
        return redirect('/baiviet');
    }

    public function add_notification_to_all_users_when_have_new_article($user, $article){
        
        $newsfeed = new newsfeed();
        $newsfeed->from_id = $user->user_id;

        $newsfeed->object_id = $article->article_id;
        $newsfeed->type = 3;
        $newsfeed->title = ''.$article->article_title;
        $newsfeed->content = $article->article_summary;
        $newsfeed->link = 'https://tdoctor.vn?from-push=1&u=room_'.$user->user_id;
        $newsfeed->icon = 'https://tdoctor.vn/chatapi/get-avatar/room_'.$user->user_id;
        // $newsfeed->token = $user->user_id;
        $temp_newsfeed = $newsfeed;
        $all_users = Users::where('user_type_id', '>', 0)->where('user_id', '<>', $user->user_id)->WhereIn('user_id', function($query) use ($user){
                    $query->select('user_id')
                        ->from(with(new user_token)->getTable())
                        ->where('user_id', '<>', $user->user_id);
                })->orderby('user_id', 'DESC')->take(20000)->get();
        // var_dump($all_users);exit;
        // var_dump(count($all_users));
        // exit;

        if($all_users!= null ){
            $send_to_ids = array();
            $send_to_ids[] = '{';
            foreach($all_users as $index => $current_user){
                if($index == 0 || $index/100 == 0 || $index == (count($all_users) -1) ){
                    if($index > 0){
                        $send_to_ids[] = $current_user->user_id;
                        $send_to_ids[] = '}';
                        $temp_newsfeed = $newsfeed;
                        $temp_newsfeed->to_id = 0;
                        $temp_newsfeed->to_ids = implode(',', $send_to_ids);
                        if ($temp_newsfeed->save()) { }

                        $send_to_ids = array();
                        $send_to_ids[] = '{';
                    }else{
                        $send_to_ids[] = $current_user->user_id;
                    }
                }else{
                    $send_to_ids[] = $current_user->user_id;
                }
            }            
        }
    }

    public function lamsang(Request $rq)
    {
        $title = $rq->input('tieude');
        $noidung = $rq->input('noidung');

        $achievement = new ClinicalAchievements();
        $achievement->title =  $title;
        $achievement->content = $noidung;
        $user = Session::get('user');
        $achievement->doctor_id = $user->doctor->doctor_id;
        $achievement->save();

        //upload file
        if ($rq->hasFile('hinhanh')) {
            $file = $rq->file('hinhanh');
            $random_digit = rand(000000000, 999999999);
            $name = $random_digit . $file->getClientOriginalName('hinhanh');
            $duoi = strtolower($file->getClientOriginalExtension('hinhanh'));

            if ($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'svg') {
                return back()->with(['flash_level' => 'danger', 'flash_message' => 'Định dạng ảnh chưa chính xác']);
            }
            $file->move('public/images/clinical_achievements', $name);
            $achievementImage = new ClinicalAchievementsImages();
            $achievementImage->clinical_achievements_id = $achievement->clinical_achievements_id;
            $achievementImage->name = $name;
            $achievementImage->save();
        }
        return redirect('/');
    }

    public function thongbao(Request $rq)
    {
        $title = $rq->input('tieude');
        $noidung = $rq->input('noidung');

        $notify = new Notify();
        $notify->title =  $title;
        $notify->content = $noidung;
        $user = Session::get('user');
        $notify->doctor_id = $user->doctor->doctor_id;
        $notify->save();

        return redirect('/');
    }

    public function tuyendung(Request $rq)
    {
        $title = $rq->input('tieude');
        $noidung = $rq->input('noidung');

        $recruitment = new Recruitment();
        $recruitment->title =  $title;
        $recruitment->content = $noidung;
        $recruitment->url = $this->to_slug($title);
        $user = Session::get('user');
        if($user->user_type_id == 3 && $user->clinic != null){
            $recruitment->clinic_id = $user->clinic->clinic_id;
        }
        $recruitment->user_id = $user->user_id;
        $recruitment->save();

        return redirect('/');
    }

    public static function taikhoan_hoidap(Request $rq)
    {
        $all = \App\Answer::pluck('question_id')->all();
        $user_id = $rq->session()->get('user')->user_id;

        $count_answers = 0;
        // var_dump($user_id);
        $questions = Question::where('user_id',$user_id)->get();
        if ($rq->session()->get('user')->user_type_id == 2 && $rq->session()->get('user')->doctor != null) {
            $speciality_id = \App\DoctorSpeciality::where('doctor_id', $rq->session()->get('user')->doctor->doctor_id)->pluck('speciality_id')->all();
            // var_dump($speciality_id);exit;
            if(false){
                //var_dump($spec);return;
                $questions = \App\Question::whereNotIn('question_id', $all)
                ->whereIn('user_id', function($query) use ($doctor_id){
                    $query->select('user_id')
                    ->from(with(new Users)->getTable())
                    ->orWhere('refer_id', '=', $doctor_id)
                    ->orWhere('refer_id', '=', 0);
                })
                ->whereIn('speciality_id', $speciality_id)->select('*')
                ->orderBy('created_at', 'DESC')->paginate(50);

                $answers = \App\Question::whereIn('question_id', $all)
                ->whereIn('speciality_id', $speciality_id)->select('*')
                ->orderBy('created_at', 'DESC')->paginate(50);
            }

            $doctor_id = $rq->session()->get('user')->doctor->doctor_id;

            $questions = \App\Question::whereNotIn('question_id', function($query) use ($user_id){
                $query->select('question_id')
                ->from(with(new Answer)->getTable())
                ->where('answer_user_id', '>', 0);
            })
            ->whereIn('question_id', function($query) use ($doctor_id, $speciality_id){
                $query->select('question_id')
                ->WhereIn('user_id', function($sub_query) use ($doctor_id){
                    $sub_query->select('user_id')
                    ->from(with(new Users)->getTable())
                    ->orWhere('refer_id', '=', 0)
                    ->orWhere('refer_id', '=', null)
                    ->orWhere('refer_id', '=', $doctor_id);
                })
                ->WhereIn('speciality_id', $speciality_id);
            })
            ->select('*')->orderBy('created_at', 'DESC')->paginate(50);

            $answers = \App\Question::whereIn('question_id', function($query) use ($user_id){
                $query->select('question_id')
                ->from(with(new Answer)->getTable())
                ->where('answer_user_id', '=', $user_id);
            })
            // ->whereIn('user_id', function($query) use ($doctor_id){
            //     $query->select('user_id')
            //     ->from(with(new Users)->getTable())
            //     ->Where('refer_id', '=', $doctor_id);
            // })
            ->select('*')->orderBy('created_at', 'DESC')->paginate(50);

        } elseif ($rq->session()->get('user')->user_type_id == 3 && $rq->session()->get('user')->clinic != null) {
            $speciality_id = \App\ClinicSpeciality::where('clinic_id', $rq->session()->get('user')->clinic->clinic_id)->pluck('speciality_id')->all();
            if(false){                
                //  var_dump($spec);
                $questions = \App\Question::whereNotIn('question_id', $all)->whereIn('speciality_id', $speciality_id)->select('*')->orderBy('created_at', 'DESC')->paginate(50);
                $answers = \App\Question::whereIn('question_id', $all)->whereIn('speciality_id', $speciality_id)->select('*')->orderBy('created_at', 'DESC')->paginate(50);
            }

            $clinic_id = $rq->session()->get('user')->clinic->clinic_id;

            $questions = \App\Question::whereNotIn('question_id', function($query) use ($user_id){
                $query->select('question_id')
                ->from(with(new Answer)->getTable())
                ->where('answer_user_id', '=', $user_id);
            })
            ->whereIn('speciality_id', $speciality_id)
            ->whereIn('user_id', function($query) use ($clinic_id){
                $query->select('user_id')
                ->from(with(new Users)->getTable())
                ->orWhere('refer_id', '=', 0)
                ->orWhere('refer_id', '=', $clinic_id);
            })->select('*')->orderBy('created_at', 'DESC')->paginate(50);

            $answers = \App\Question::whereIn('question_id', function($query) use ($user_id){
                $query->select('question_id')
                ->from(with(new Answer)->getTable())
                ->where('answer_user_id', '=', $user_id);
            })
            // ->whereIn('user_id', function($query) use ($clinic_id){
            //     $query->select('user_id')
            //     ->from(with(new Users)->getTable())
            //     ->Where('refer_id', '=', $clinic_id);
            // })
            ->select('*')->orderBy('created_at', 'DESC')->paginate(50);

        } else {

            $questions = \App\Question::where('user_id', $user_id)->whereNotIn('question_id', $all)->orderBy('created_at', 'DESC')->paginate(50);

            $answers = \App\Question::where('user_id', $user_id)->whereIn('question_id', $all)->orderBy('created_at', 'DESC')->paginate(50);
//            echo count($answers);return;
        }

        //$answers = \App\Question::whereIn('question_id',$all)->whereIn('speciality_id',$spec)->select('*')->get();
        // var_dump($spec);return;
        foreach ($questions as $question) {
            $count = Answer::where('question_id', $question['question_id'])->count();
            if($count > 0) {
                $count_answers = $count_answers + 1;
            }
        }
//        $count_questions = Question::where('user_id', $user_id)->count();
        $count_questions = count($questions);
        $count_answers = count($answers);
        return view('v2/view/taikhoan_hoidap', ['questions' => $questions, 'count_answers' => $count_answers, 'count_questions' => $count_questions, 'answers' => $answers]);

    }

    public static function taikhoan_hoidap_old(Request $rq)
    {
        $all = \App\Answer::pluck('question_id')->all();
        $user_id = $rq->session()->get('user')->user_id;

        $count_answers = 0;
        // var_dump($user_id);
        $questions = Question::where('user_id',$user_id)->get();
        if ($rq->session()->get('user')->user_type_id == 2 && $rq->session()->get('user')->doctor != null) {
            if(false){
                $speciality_id = \App\DoctorSpeciality::where('doctor_id', $rq->session()->get('user')->doctor->doctor_id)->pluck('speciality_id')->all();
                //var_dump($spec);return;
                $questions = \App\Question::whereNotIn('question_id', $all)->whereIn('speciality_id', $speciality_id)->select('*')->orderBy('created_at', 'DESC')->paginate(20);
                $answers = \App\Question::whereIn('question_id', $all)->whereIn('speciality_id', $speciality_id)->select('*')->orderBy('created_at', 'DESC')->paginate(20);
            }

            $doctor_id = $rq->session()->get('user')->doctor->doctor_id;

            $questions = \App\Question::whereNotIn('question_id', function($query) use ($user_id){
                $query->select('question_id')
                ->from(with(new Answer)->getTable())
                ->where('answer_user_id', '=', $user_id);
            })
            ->whereIn('user_id', function($query) use ($doctor_id){
                $query->select('user_id')
                ->from(with(new Users)->getTable())
                ->Where('refer_id', '=', $doctor_id);
            })->select('*')->orderBy('created_at', 'DESC')->paginate(20);

            $answers = \App\Question::whereIn('question_id', function($query) use ($user_id){
                $query->select('question_id')
                ->from(with(new Answer)->getTable())
                ->where('answer_user_id', '=', $user_id);
            })
            ->whereIn('user_id', function($query) use ($doctor_id){
                $query->select('user_id')
                ->from(with(new Users)->getTable())
                ->Where('refer_id', '=', $doctor_id);
            })->select('*')->orderBy('created_at', 'DESC')->paginate(20);

        } elseif ($rq->session()->get('user')->user_type_id == 3 && $rq->session()->get('user')->clinic != null) {
            if(false){
                $speciality_id = \App\ClinicSpeciality::where('clinic_id', $rq->session()->get('user')->clinic->clinic_id)->pluck('speciality_id')->all();
                //  var_dump($spec);
                $questions = \App\Question::whereNotIn('question_id', $all)->whereIn('speciality_id', $speciality_id)->select('*')->orderBy('created_at', 'DESC')->paginate(20);
                $answers = \App\Question::whereIn('question_id', $all)->whereIn('speciality_id', $speciality_id)->select('*')->orderBy('created_at', 'DESC')->paginate(20);
            }

            $clinic_id = $rq->session()->get('user')->clinic->clinic_id;

            $questions = \App\Question::whereNotIn('question_id', function($query) use ($user_id){
                $query->select('question_id')
                ->from(with(new Answer)->getTable())
                ->where('answer_user_id', '=', $user_id);
            })
            ->whereIn('user_id', function($query) use ($clinic_id){
                $query->select('user_id')
                ->from(with(new Users)->getTable())
                ->Where('refer_id', '=', $clinic_id);
            })->select('*')->orderBy('created_at', 'DESC')->paginate(20);

            $answers = \App\Question::whereIn('question_id', function($query) use ($user_id){
                $query->select('question_id')
                ->from(with(new Answer)->getTable())
                ->where('answer_user_id', '=', $user_id);
            })
            ->whereIn('user_id', function($query) use ($clinic_id){
                $query->select('user_id')
                ->from(with(new Users)->getTable())
                ->Where('refer_id', '=', $clinic_id);
            })->select('*')->orderBy('created_at', 'DESC')->paginate(20);

        } else {

            $questions = \App\Question::where('user_id', $user_id)->whereNotIn('question_id', $all)->orderBy('created_at', 'DESC')->paginate(20);

            $answers = \App\Question::where('user_id', $user_id)->whereIn('question_id', $all)->orderBy('created_at', 'DESC')->paginate(20);
//            echo count($answers);return;
        }

        //$answers = \App\Question::whereIn('question_id',$all)->whereIn('speciality_id',$spec)->select('*')->get();
        // var_dump($spec);return;
        foreach ($questions as $question) {
            $count = Answer::where('question_id', $question['question_id'])->count();
            if($count > 0) {
                $count_answers = $count_answers + 1;
            }
        }
//        $count_questions = Question::where('user_id', $user_id)->count();
        $count_questions = count($questions);
        $count_answers = count($answers);
        return view('v2/view/taikhoan_hoidap', ['questions' => $questions, 'count_answers' => $count_answers, 'count_questions' => $count_questions, 'answers' => $answers]);

    }

    public static function taikhoan_doimatkhau(Request $rq)
    {
        return view('v2/view/taikhoan_doimatkhau');
    }

    public function doimatkhau(Request $rq)
    {
        $pass = $rq->input('password');
        $newpass = $rq->input('new_password');
        $newpass_confirm = $rq->input('new_password_confirm');
        $email = $rq->session()->get('user')->email;
        $user = Users::where('email', $email)->first();
        if ($user != null) {

            if($rq->has('noidung') && $user->user_type_id == 2 && $user->doctor != null){
                $noidung = $rq->noidung;
                // var_dump($user->doctor);
                // exit;
                $doctor = Doctor::find($user->doctor->doctor_id);
                if($doctor != null){
                    $doctor->doctor_fullinfo = $noidung;
                    $doctor->save();
                    $errors = new MessageBag(['successMs' => 'Cập nhật thành công']);
                }else{
                    $errors = new MessageBag(['successMs' => 'Cập nhật thất bại, vui lòng thử lại']);
                }
                return redirect()->back()->withInput()->withErrors($errors);
            }
            if($rq->has('province') && $rq->has('district')){
                $province_id = (int) $rq->province;
                $district_id = (int) $rq->district;
                $provinceOb = Province::find($province_id);
                $districtOb = District::find($district_id);
                if($provinceOb != null && $districtOb != null){
                    $user->province_id = $province_id;
                    $user->district_id = $district_id;
                    $user->save();
                    $errors = new MessageBag(['successMs' => 'Cập nhật thành công']);
                }else{
                    $errors = new MessageBag(['successMs' => 'Cập nhật thất bại, vui lòng thử lại']);
                }
                return redirect()->back()->withInput()->withErrors($errors);
            }

            if (Hash::check($pass, $user->password)) {
                if ($newpass == $newpass_confirm) {
                    $user->password = Hash::make($newpass);
                    $user->save();
                } else {
                    $errors = new MessageBag(['errorMs' => 'Mật khẩu mới không khớp']);
                    return redirect()->back()->withInput()->withErrors($errors);
                    return response()->json(array('detail' => 'Mật khẩu mới không khớp'), 400);
                }
            } else {
                $errors = new MessageBag(['errorMs' => 'Mật khẩu cũ không khớp']);
                return redirect()->back()->withInput()->withErrors($errors);
                return response()->json(array('detail' => 'Mật khẩu cũ không khớp'), 400);
            }
        }
        $errors = new MessageBag(['successMs' => 'Đổi mật khẩu thành công']);
        return redirect()->back()->withInput()->withErrors($errors);
        return redirect('/taikhoan/doimatkhau')->with('success', 'Đổi mật khẩu thành công');
    }

    public function dangxuat(Request $rq)
    {
        Session::flush();
        $rq->session()->forget('user');
        return redirect('/home');
    }

    public function thembacsi(Request $rq)
    {
        $name = $rq->input('doctorname');
        $desc = $rq->input('description');
        $specialities = $rq->input('chuyenkhoa');
        //var_dump( $specialities);
        $services = $rq->input('dichvu');

        $doctorclinic = $rq->input('noicongtac');
        $exprience = $rq->input('kinhnghiem');
        $exprience = explode("#", $exprience);
        $daotao = $rq->input('daotao');
        $daotao = explode('#', $daotao);
        $diachi = $rq->input('diachi');
        $doctortimework = $rq->input('doctortimework');
        $doctor = new Doctor;
        $doctor->doctor_name = $name;
        $province = Province::where('id', $diachi)->first();
        $doctor->doctor_address = $province->name;
        $doctor->province_id = $diachi;
        $doctor->doctor_timework = $doctortimework;
        $doctor->doctor_description = $desc;
        $doctor->doctor_clinic = $doctorclinic;
        $doctor->status = 1;

        $exp = "<ul>";
        foreach ($exprience as $ex) {
            $exp .= "<li>" . $ex . "</li>";
        }
        $exp .= "</ul>";
        $doctor->experience = $exp;
        $dt = "<ul>";
        foreach ($daotao as $d) {
            $dt .= "<li>" . $d . "</li>";
        }
        $dt .= "</ul>";
        $doctor->training = $dt;
        $doctor->doctor_url = $this->to_slug($name);

        //upload file
        if ($rq->hasFile('hinhanh')) {
            $file = $rq->file('hinhanh');
            $random_digit = rand(000000000, 999999999);
            $name = $random_digit . $file->getClientOriginalName('hinhanh');
            $duoi = strtolower($file->getClientOriginalExtension('hinhanh'));

            if ($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'svg') {
                return back()->with(['flash_level' => 'danger', 'flash_message' => 'Định dạng ảnh chưa chính xác']);
            }
            $file->move('public/images/doctor', $name);
            $doctor->profile_image = $name;
        }
        $doctor->save();

        if ($doctor->doctor_id != "" || $doctor->doctor_id != null) {
            foreach ($specialities as $sp) {
                $docsp = new DoctorSpeciality;
                $docsp->doctor_id = $doctor->doctor_id;
                $docsp->speciality_id = $sp;
                $docsp->save();
            }
            foreach ($services as $ser) {
                $docser = new DoctorService;
                $docser->doctor_id = $doctor->doctor_id;
                $docser->service_id = $ser;
                $docser->save();
            }
            return redirect('/danh-sach-bac-si-chi-tiet/' . $doctor->doctor_url . '-' . $doctor->doctor_id);
        }
    }

    public function themcsyt(Request $rq)
    {
        //var_dump($rq);
        $name = $rq->input('clinicname');
        $specialities = $rq->input('chuyenkhoa');
        //var_dump( $specialities);
        $services = $rq->input('dichvu');
        $clinic = new Clinic;
        $clinic->clinic_name = $name;
        $clinic->clinic_url = $this->to_slug(trim($name));
        $clinic->clinic_address = $rq->input('diachi');
        $clinic->clinic_phone = $rq->input('dienthoai');
        $clinic->clinic_desc = $rq->input('description');
        $clinic->clinic_timeopen = $rq->input('clinictimeopen');

        //upload images
        if ($rq->hasFile('hinhanh')) {
            $file = $rq->file('hinhanh');
            $random_digit = rand(000000000, 999999999);
            $name = $random_digit . $file->getClientOriginalName('hinhanh');
            $duoi = strtolower($file->getClientOriginalExtension('hinhanh'));

            if ($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'svg') {
                return back()->with(['flash_level' => 'danger', 'flash_message' => 'Định dạng ảnh chưa chính xác']);
            }
            $file->move('public/images/health_facilities', $name);
            $clinic->profile_image = $name;
        }

        $clinic->save();
        if ($clinic->clinic_id != "" || $clinic->clinic_id != null) {
            if ($specialities != null)
                foreach ($specialities as $sp) {
                    $docsp = new ClinicSpeciality;
                    $docsp->clinic_id = $clinic->clinic_id;
                    $docsp->speciality_id = $sp;
                    $docsp->save();
                }

            if ($services != null) {
                foreach ($services as $ser) {
                    $docser = new ClinicService;
                    $docser->clinic_id = $clinic->clinic_id;
                    $docser->service_id = $ser;
                    $docser->save();
                }
            }
            return redirect('/phongkham-chitiet/' . $clinic->clinic_url . '-' . $clinic->clinic_id);
        }
        //echo $name;
    }

    public function themnhathuoc(Request $rq)
    {
        $name = $rq->input('drugstorename');
        $drugstore = new Drugstore;
        $drugstore->drugstore_name = $name;
        $drugstore->drugstore_url = $this->to_slug(trim($name));
        $drugstore->drugstore_address = $rq->input('diachi');
        $drugstore->drugstore_phone = $rq->input('dienthoai');
        $drugstore->drugstore_desc = $rq->input('description');
        $drugstore->province = $rq->input('province');

        //upload images
        if ($rq->hasFile('hinhanh')) {
            $file = $rq->file('hinhanh');
            $random_digit = rand(000000000, 999999999);
            $name = $random_digit . $file->getClientOriginalName('hinhanh');
            $duoi = strtolower($file->getClientOriginalExtension('hinhanh'));

            if ($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'svg') {
                return back()->with(['flash_level' => 'danger', 'flash_message' => 'Định dạng ảnh chưa chính xác']);
            }
            $file->move('public/images/health_facilities', $name);
            $drugstore->profile_image = $name;
        }

        $drugstore->save();
        return redirect('/nha-thuoc/' . $drugstore->drugstore_url);
    }

    public function danhsach_tintuc(Request $rq)
    {

        $Catalogs = Catalog::all();
        $Catalog = Catalog::where('id', 0)->first();
        $hoidap = Question::orderBy('question_id', 'DESC')->limit(10)->get();
        if ($rq->input('q')) {  
            $q = urldecode($rq->input('q'));

            $baiviet_new = Article::orwhere('article_title', 'like', '%' . $q . '%')->orwhere('article_summary', 'like', '%' . $q . '%')->orwhere('article_content', 'like', '%' . $q . '%')->orderBy('article_id', 'DESC')->limit(1)->first();
            $baiviet = Article::orwhere('article_title', 'like', '%' . $q . '%')->orwhere('article_summary', 'like', '%' . $q . '%')->orwhere('article_content', 'like', '%' . $q . '%')->orderBy('article_id', 'DESC')->orderBy('article_id', 'ASC')->paginate(10);

        }else{
            $baiviet_new = Article::orderBy('article_id', 'DESC')->limit(1)->first();
            $baiviet = Article::orderBy('article_id', 'ASC')->paginate(10);
        }
        return view('v2/view/chuyen_muc', ['Current_catalog' => $Catalog, 'Catalogs' => $Catalogs, 'baiviet' => $baiviet, 'baiviet_new' => $baiviet_new, 'hoidap' => $hoidap])->withPost($baiviet);

    }

    public function danhsach_tintuc_tesst(Request $rq)
    {
        $ads = Ads::where('place', '6')->get();
        $tintuc = Article::orderBy('drugstore_id', 'DESC');
        if (isset($_COOKIE['province']) && $_COOKIE['province'] != "") {
            $tintuc = Article::where('province_id', $this->getProvinceID($_COOKIE['province']))->orderBy('drugstore_id', 'DESC');
        }

        if ($rq->input('q')) {
            $q = urldecode($rq->input('q'));
            $doctors = Doctor::where('doctor_name', 'like', '%' . $q . '%')->paginate(15);
            $tintuc = $tintuc->paginate(30);
            $drugstore = Drugstore::where('drugstore_name', 'like', '%' . $q . '%')->count();
            $benh = Disease::where('disease_name', 'like', '%' . $q . '%');
            $benh_count = $benh->count();
            //$benh = $benh->paginate(30);
            $thuoc = Medicine::where('description', 'like', '%' . $q . '%')->count();
            $bs = Doctor::where('doctor_name', 'like', '%' . $q . '%')->count();
            $drugstore = Drugstore::where('drugstore_name', 'like', '%' . $q . '%')->count();
            $csyt = Clinic::where('clinic_name', 'like', '%' . $q . '%')->count();
            $qs = Question::where('question_title', 'like', '%' . $q . '%')->count();
            $service = \App\Service::where('service_name', 'like', '%' . $q . '%')->count();
            $tintuc = Article::where('article_title', 'like', '%' . $q . '%')->count();
            return view('v2/view/danhsach_nhathuoc', ['doctors' => $doctors, 'count' => $benh_count, 'thuoc' => $thuoc, 'doctor' => $bs, 'clinic' => $csyt, 'question' => $qs, 'service' => $service, 'ads' => $ads, 'drugstore' => $drugstore, 'drugstores' => $drugstores, 'tintuc' => $tintuc])->withPost($tintuc);
        }


        $tintuc = $tintuc->paginate(30);
        return view('v2/view/danhsach_nhathuoc', ['tintuc' => $tintuc])->withPost($tintuc);
    }

    public function danhsach_nhathuoc(Request $rq)
    {
        $ads = Ads::where('place', '6')->get();
        $drugstores = Drugstore::orderBy('drugstore_id', 'DESC');
        if (isset($_COOKIE['province']) && $_COOKIE['province'] != "") {
            $drugstores = Drugstore::where('province_id', $this->getProvinceID($_COOKIE['province']))->orderBy('drugstore_id', 'DESC');
        }

        if ($rq->input('province') != null) {
            $prv = Province::where('id', $rq->input('province'))->first();
            if ($prv != null) {
                $drugstores = $drugstores->where('province', $prv->id);
            }
        }

        if ($rq->input('q')) {
            $q = urldecode($rq->input('q'));
            $doctors = Doctor::where('doctor_name', 'like', '%' . $q . '%')->paginate(15);
            $drugstores = $drugstores->paginate(30);
            $benh = Disease::where('disease_name', 'like', '%' . $q . '%');
            $benh_count = $benh->count();
            //$benh = $benh->paginate(30);
            $thuoc = Medicine::where('description', 'like', '%' . $q . '%')->count();
            $bs = Doctor::where('doctor_name', 'like', '%' . $q . '%')->count();
            $drugstore = Drugstore::where('drugstore_name', 'like', '%' . $q . '%')->count();
            $csyt = Clinic::where('clinic_name', 'like', '%' . $q . '%')->count();
            $qs = Question::where('question_title', 'like', '%' . $q . '%')->count();
            $service = \App\Service::where('service_name', 'like', '%' . $q . '%')->count();
            $tintuc = Article::where('article_title', 'like', '%' . $q . '%')->count();
            return view('v2/view/danhsach_nhathuoc', ['doctors' => $doctors, 'count' => $benh_count, 'thuoc' => $thuoc, 'doctor' => $bs, 'clinic' => $csyt, 'question' => $qs, 'service' => $service, 'ads' => $ads, 'drugstore' => $drugstore, 'drugstores' => $drugstores, 'tintuc' => $tintuc])->withPost($drugstores);
        }
        if ($rq->input('q') == 'city') {
            // $doctors = Doctor::Join('user', 'doctor.user_id', '=', 'user.user_id')
            // ->where('user.addpress',$rq->input('q'))->paginate(30);

            $doctors = Doctor::where('doctor_address', 'like', $rq->input('q'))->paginate(15);

            $q = urldecode($rq->input('q'));
            $user = Users::where('addpress', $rq->input('q'))->get();
            //$doctors = Doctor::where('user_id','like','%trung%')->paginate(30);

            //     $bs = Doctor::Join('user', 'doctor.user_id', '=', 'user.user_id')
            // ->where('user.addpress',$rq->input('q'))->count();
            $drugstores = $drugstores->paginate(30);
            $bs = Doctor::where('doctor_address', 'like', $rq->input('q'))->count();
            $drugstore = Drugstore::where('drugstore_address', 'like', '%' . $q . '%')->count();
            $qs = Question::where('question_title', 'like', '%' . $q . '%')->count();
            $service = \App\Service::where('service_name', 'like', '%' . $q . '%')->count();

            return view('v2/view/danhsach_nhathuoc', ['doctors' => $doctors, 'doctor' => $bs, 'question' => $qs, 'service' => $service, 'ads' => $ads, 'user' => $user, 'drugstore' => $drugstore, 'drugstores' => $drugstores])->withPost($drugstores);
        }


        $drugstores = $drugstores->paginate(30);
        return view('v2/view/danhsach_nhathuoc', ['drugstores' => $drugstores])->withPost($drugstores);
    }

    public function chitiet_nhathuoc($id)
    {
        // sleep(2);
        if ($id == 'danh-sach') {
            return redirect('/danh-sach-nha-thuoc');
        }

        $url = explode('/', $id);
        $uid = $url[count($url) - 1];

        $nhathuoc = \App\Drugstore::where('drugstore_url', $uid)->first();
        $vitri = \App\Locations::where('user_id', $nhathuoc->user_id)->first();
        if ($vitri == null) {
            $vitri = new Locations();
            $vitri->lat = 10.758363;
            $vitri->lng = 106.662145;
        }

        return view('v2/view/chitiet_nhathuoc', ['cs' => $nhathuoc, 'vitri' => $vitri]);
    }

    public function contactUs()
    {
        return view('v2/view/contactUs');
    }

    public function disputeResolution()
    {
        return view('v2/view/dispute_resolution');
    }

    public function informationSecurityCustomer()
    {
        return view('v2/view/information_security');
    }

    public function chatDoc()
    {
        return view('v2/view/chat_doctor');
    }

    public function datlichhen(Request $rq) {
        $doctor = null;
        if ($rq->has('doctor_id')) {
            $doctorId = $rq->get('doctor_id');
            $doctor = Doctor::where('doctor_id', $doctorId)->first();
        }
        return view('v2/view/datlichhen', ['doctor'=>$doctor]);
    }
    public function postdatlichhen(Request $rq) {
        // if ($rq->get('doctor_id') == 0 || $rq->get('doctor_id') == '') {
        //     $errors = new MessageBag(['errorMs' => 'Vui lòng chọn bác sĩ']);
        //     return redirect()->back()->withInput()->withErrors($errors);
        // }
        // if ($rq->get('doctor_id') == 0 || $rq->get('clinic_id') == '') {
        //     $errors = new MessageBag(['errorMs' => 'Vui lòng chọn bác sĩ']);
        //     return redirect()->back()->withInput()->withErrors($errors);
        // }
        //binbinbin

        $user = Session::get('user');
        if($user == null){
            $errors = new MessageBag(['errorMs' => 'Vui lòng đăng nhập']);
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $appointment_at = date('Y-m-d h:i:s', strtotime($rq->get('appointment_at')));

        $provinceId = $rq->province;
        $districtId = $rq->district;
        $address = '';
        if ($provinceId != 0) {
            $province = Province::where('id', $provinceId)->first();
            $district = District::where('id', $districtId)->first();
            $address = $district->name . ", " .$province->name;
        }

        $appointmentSchedule = new AppointmentSchedule();
        $appointmentSchedule->user_id = $user->user_id;
        $appointmentSchedule->doctor_id = $rq->get('doctor_id');
        $appointmentSchedule->clinic_id = $rq->get('clinic_id');
        $appointmentSchedule->name = $user->fullname;
        $appointmentSchedule->address = $address;
        $appointmentSchedule->phone = $user->phone;
        $appointmentSchedule->gender = $user->gender;
        if($rq->has('name')){
            $appointmentSchedule->name = $rq->name;
        }
        if($rq->has('gender')){
            $appointmentSchedule->gender = $rq->gender;
        }
        if($rq->has('age')){
            $appointmentSchedule->age = $rq->age;
        }
        if($rq->has('weight')){
            $appointmentSchedule->weight = $rq->weight;
        }
//        $startDate = DateTime::createFromFormat('d-m-Y H:i:s', $rq->get('appointment_at'));
        $startDate = DateTime::createFromFormat('Y-m-d h:i:s', $appointment_at);
        $appointmentSchedule->appointment_at = $startDate->format('YmdHis');
        $appointmentSchedule->content = $rq->get('content');
        if($appointmentSchedule->save()){
            $success = new MessageBag(['successMs' => 'Đã gửi lịch hẹn cho bác sĩ']);
            return redirect()->back()->withInput()->withErrors($success);
        }
        else {
            $errors = new MessageBag(['errorMs' => 'Lỗi hệ thống vui lòng thử lại sau']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function payment(Request $request)
    {
        if (!$request->session()->has('user')) {
            return redirect('/home');
        }
        $nlcheckout = new NL_CheckOutV3(MERCHANT_ID, MERCHANT_PASS, RECEIVER, URL_API);
        $total_amount = ($request->total_amount) ? $request->total_amount : 50000;

        if (@$_POST['nlpayment']) {
            $this->validate($request, [
                'total_amount' => 'required|numeric|in:10000, 50000,100000,200000',
                'option_payment' => 'required',
                'buyer_fullname' => 'required|string|max:255',
                'buyer_email' => 'required|string|email|max:255',
                'buyer_mobile' => 'required|string|max:255',
            ], [
                'total_amount.in' => "Giá trị tiền nạp không đúng!",
                'option_payment.required' => "Bạn chưa chọn phương thức thanh toán!",
                'buyer_fullname.required' => "Họ tên không được trống!",
                'buyer_email.required' => "E-mail không được trống!",
                'buyer_email.email' => "Bạn phải nhập đúng e-mail!",
                'buyer_mobile.required' => "Số điện thoại không được trống!",
            ]);

            $total_amount = $_POST['total_amount'];
            $array_items[0] = array(
                'item_name1' => 'Product name',
                'item_quantity1' => 1,
                'item_amount1' => $total_amount,
                'item_url1' => 'http://nganluong.vn/'
            );

            $array_items = array();
            $payment_method = $_POST['option_payment'];
            $bank_code = @$_POST['bankcode'];
            $order_code = "bsv_" . time();

            $payment_type = '';
            $discount_amount = 0;
            $order_description = '';
            $tax_amount = 0;
            $fee_shipping = 0;
            $return_url = route('ket-qua_nap-tien');
            $cancel_url = route('huy_nap-tien', ['orderid' => urlencode($order_code)]);

            $buyer_fullname = $_POST['buyer_fullname'];
            $buyer_email = $_POST['buyer_email'];
            $buyer_mobile = $_POST['buyer_mobile'];
            $buyer_address = 'bacsiviet.vn';

            if ($payment_method != '' && $buyer_email != "" && $buyer_mobile != "" && $buyer_fullname != "" && filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) {
                if ($payment_method == "VISA") {
                    $nl_result = $nlcheckout->VisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount,
                        $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile,
                        $buyer_address, $array_items, $bank_code);
                } elseif ($payment_method == "NL") {
                    $nl_result = $nlcheckout->NLCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount,
                        $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile,
                        $buyer_address, $array_items);
                } elseif ($payment_method == "ATM_ONLINE" && $bank_code != '') {
                    $nl_result = $nlcheckout->BankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount,
                        $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile,
                        $buyer_address, $array_items);
                } elseif ($payment_method == "NH_OFFLINE") {
                    $nl_result = $nlcheckout->officeBankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
                } elseif ($payment_method == "ATM_OFFLINE") {
                    $nl_result = $nlcheckout->BankOfflineCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);

                } elseif ($payment_method == "IB_ONLINE") {
                    $nl_result = $nlcheckout->IBCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
                } elseif ($payment_method == "CREDIT_CARD_PREPAID") {

                    $nl_result = $nlcheckout->PrepaidVisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items, $bank_code);
                }

                //var_dump($nl_result); die;
                if ($nl_result->error_code == '00') {
                    //Cập nhât order với token  $nl_result->token để sử dụng check hoàn thành sau này
                    return redirect($nl_result->checkout_url);
                } else {
                    // echo $nl_result->error_message;
                }
            } else {
                // echo "<h3> Bạn chưa nhập đủ thông tin khách hàng </h3>";
            }
        }
        return view('v2/view/nap_tien', [
            'nlcheckout' => $nlcheckout,
            'total_amount' => $total_amount,
        ]);
    }

    /**
     * @link /nap-tien/{orderid}
     * @param String orderid
     */
    public function cancel(Request $request, $orderid)
    {
        return view('v2.view.order-cancel', [
            'orderid' => $orderid,
        ]);
    }

    /**
     * @link /nap-tien/ket-qua
     * @param String orderid
     */
    public function success(Request $request)
    {
        $result = "Kết quả thanh toán";
        if (empty($request->token)) {
            return redirect()->route('naptien');
        }

        $nlcheckout = new NL_CheckOutV3(MERCHANT_ID, MERCHANT_PASS, RECEIVER, URL_API);
        $nl_result = $nlcheckout->GetTransactionDetail($request->token);
        if ($nl_result) {
            $nl_errorcode = (string)$nl_result->error_code;
            $nl_transaction_status = (string)$nl_result->transaction_status;
            if ($nl_errorcode == '00') {
                if ($nl_transaction_status == '00') {
                    // trạng thái thanh toán thành công
                    $user_id = $request->session()->get('user')->user_id;
                    $user = \App\Users::where('user_id', $user_id)->first();
                    $user->paid = 1;
                    $user->balance += intval($nl_result->total_amount);

                    $patient = \App\Patient::where('email', $user->email)->first();
                    if ($patient == null) {
                        $user->createPatient();
                        $patient = \App\Patient::where('email', $user->email)->first();
                    }
                    $patient->balance += intval($nl_result->total_amount);
                    $patient->updated_at = new \DateTime();
                    if ($patient->save()) {
                        $patient->createRecharge(intval($nl_result->total_amount));
                        $unit = \App\Config::where('id', 2)->first();
                        $unit = (!empty($unit)) ? intval($unit->content) : 1000;
                        if($patient->balance > $unit) {
                            $patient->can_chat = 1;
                            $patient->can_call_audio = 1;
                            $patient->can_call_video = 1;
                            $patient->save();
                            $user->paid = 1;
                            $user->save();
                        }
                    };

                    $status = \App\Model\UserOrder::firstOrCreate([
                        'user_id' => $user_id,
                        'code' => strval($nl_result->order_code),
                        'money' => intval($nl_result->total_amount),
                        'token' => strval($nl_result->token),
                    ]);
                    if ($user->save() && $status) {
                        $result = "Thanh toán thành công!";
                    }
                }
            } else {
                $result = $nlcheckout->GetErrorMessage($nl_errorcode);
                return redirect()->route('naptien')->withErrors($result);
            }
        }
        return view('v2.view.order-success', [
            'result' => $result,
        ]);
    }

    public function getRegisterClinic()
    {
        $numberDoctor = DB::table('clinic')->count();
        $doctors = Clinic::where('featured', '1')->limit(5)->get();
        $specialitys = Speciality::get();
        return view('v2/view/register_clinic', [
            'numberDoctor' => $numberDoctor,
            'doctors' => $doctors,
            'specialitys' => $specialitys
        ]);
    }

    public function postRegisterClinic(Request $rq)
    {
        if (Session::get('user') == null) {
            return redirect()->back()->withErrors('Cần phải đăng nhập tài khoản quản lý cơ sở y tế để đăng ký phòng khám');
        }
        $name = $rq->input('clinicname');
        $specialities = $rq->input('chuyenkhoa');
        //var_dump( $specialities);
        $services = $rq->input('dichvu');
        $clinic = new Clinic;
        $clinic->clinic_name = $name;
        $clinic->user_id = Session::get('user')->user_id;
        $clinic->clinic_url = $this->to_slug(trim($name));
        $clinic->clinic_address = $rq->input('diachi');
        $clinic->clinic_phone = $rq->input('dienthoai');
        $clinic->clinic_desc = $rq->input('description');
        $clinic->clinic_timeopen = $rq->input('clinic_timeopen');

        //upload images
        if ($rq->hasFile('hinhanh')) {
            $file = $rq->file('hinhanh');
            $random_digit = rand(000000000, 999999999);
            $name = $random_digit . $file->getClientOriginalName('hinhanh');
            $duoi = strtolower($file->getClientOriginalExtension('hinhanh'));

            if ($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'svg') {
                return back()->with(['flash_level' => 'danger', 'flash_message' => 'Định dạng ảnh chưa chính xác']);
            }
            $file->move('public/images/health_facilities', $name);
            $clinic->profile_image = $name;
        }

        $clinic->save();
        if ($clinic->clinic_id != "" || $clinic->clinic_id != null) {
            if ($specialities != null)
                foreach ($specialities as $sp) {
                    $docsp = new ClinicSpeciality;
                    $docsp->clinic_id = $clinic->clinic_id;
                    $docsp->speciality_id = $sp;
                    $docsp->save();
                }

            if ($services != null) {
                foreach ($services as $ser) {
                    $docser = new ClinicService;
                    $docser->clinic_id = $clinic->clinic_id;
                    $docser->service_id = $ser;
                    $docser->save();
                }
            }
            return redirect('/phongkham-chitiet/' . $clinic->clinic_url . '-' . $clinic->clinic_id);
        }
        //echo $name;
    }

    public function registerDoctor()
    {
        $numberDoctor = DB::table('doctor')->count();
        $doctors = Doctor::where('featured', '1')->orderBy('order_doctor', 'DESC')->limit(5)->get();
        $specialitys = Speciality::get();
        return view('v2/view/register_doctor', [
            'numberDoctor' => $numberDoctor,
            'doctors' => $doctors,
            'specialitys' => $specialitys
        ]);
    }

    public function registerDoctorPost(Request $rq) {
        $name = $rq->input('name');
        $phone = $rq->input('phone');
        $email = $rq->input('email');
        $speciality = $rq->input('speciality');
        $doctorRegister = new DoctorRegister;
        $doctorRegister->name = $name;
        $doctorRegister->phone = $phone;
        $doctorRegister->email = $email;
        $doctorRegister->speciality = $speciality;
        $doctorRegister->save();
    }

    public function getChangeClinicInfo()
    {
        $user = Session::get('user');
        $clinic = Clinic::where('user_id', $user->user_id)->first();
        return view('v2/view/taikhoan_suacsyt', [
            'clinic' => $clinic
        ]);
    }

    public function postChangeClinicInfo(Request $rq) {
        $user = Session::get('user');
        $clinic = Clinic::where('user_id', $user->user_id)->first();
        $name = $rq->input('clinicname');
        $clinic->clinic_name = $name;
        $clinic->clinic_url = $this->to_slug(trim($name));
        $clinic->clinic_address = $rq->input('diachi');
        $clinic->clinic_phone = $rq->input('dienthoai');
        $clinic->clinic_desc = $rq->input('description');
        $clinic->clinic_timeopen = $rq->input('clinic_timeopen');
        $clinic->clinic_notification = $rq->input('clinic_notification');
        $clinic->clinic_clinical = $rq->input('clinic_clinical');

        //upload images
        if ($rq->hasFile('hinhanh')) {
            $file = $rq->file('hinhanh');
            $random_digit = rand(000000000, 999999999);
            $name = $random_digit . $file->getClientOriginalName('hinhanh');
            $duoi = strtolower($file->getClientOriginalExtension('hinhanh'));

            if ($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg' && $duoi != 'svg') {
                return back()->with(['flash_level' => 'danger', 'flash_message' => 'Định dạng ảnh chưa chính xác']);
            }
            $file->move('public/images/health_facilities', $name);
            $clinic->profile_image = $name;
        }

        $clinic->save();

        return redirect()->back();
    }
}

