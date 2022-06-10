<?php

namespace App\Http\Controllers;

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
use Auth;
use PhpParser\Comment\Doc;
use Socialite;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class Apiv2Controller extends Controller
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
    }

    public function postDangky3(Request $rq)
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
                            if($isFromMobile){
                                return response()->json(array('success' => false, 'msg' => 'Mã giới thiệu không đúng, vui lòng thử lại'), 200);
                            }
                            $errors = new MessageBag(['errorReg' => 'Mã giới thiệu không đúng, vui lòng thử lại']);
                            return redirect()->back()->withInput()->withErrors($errors);
                        }
                    }

                    if ($referType === Users::TYPE_CLINIC) {
                        $clinic = Clinic::find($referId);
                        if (empty($clinic)) {
                            if($isFromMobile){
                                return response()->json(array('success' => false, 'msg' => 'Mã giới thiệu không đúng, vui lòng thử lại'), 200);
                            }
                            $errors = new MessageBag(['errorReg' => 'Mã giới thiệu không đúng, vui lòng thử lại']);
                            return redirect()->back()->withInput()->withErrors($errors);
                        }
                    }

                    $user->refer_type = $referType;
                    $user->refer_id = $referId;
                }

                if($email != null && (preg_match('/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email) == 0  || strlen($email) < 6) ) {
                    if($isFromMobile){
                        return response()->json(array('success' => false, 'msg' => 'Vui lòng nhập đúng email'), 200);
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
                if($isFromMobile){
                    return response()->json(array('success' => false, 'msg' => 'Email/Phone này đã có người sử dụng, vui lòng kiểm tra lại'), 200);
                }
                $errors = new MessageBag(['errorReg' => 'Email/Phone này đã có người sử dụng, vui lòng kiểm tra lại.']);
                return redirect()->back()->withInput()->withErrors($errors);
            }

        } else {
            if($isFromMobile){
                return response()->json(array('success' => false, 'msg' => 'Họ Tên, Phone và mật khẩu không được để trống'), 200);
            }
            $errors = new MessageBag(['errorReg' => 'Họ Tên, Phone và mật khẩu không được để trống.']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
    
    public function postDangKyMobilev2(Request $rq)
    {
        $email_info = $rq->email;
        $username = $rq->phone;
        $password = $rq->password;
        $fullname = $rq->name;
        $gender = 1;
        $present = $rq->magt;
        $phone = $rq->phone;
        $type = 1;
        $image = "";

        if ($rq->has('pwd')) {
            $password = $rq->get('pwd');
        }
        if ($email_info == "") {
            $email_info = $username;
        }

        if ($username != null && $fullname != null && $password != null) {
            $user = Users::where('phone', $phone)->first();
            if ( $user != null ) {
                header('Content-Type: application/json; charset=utf-8');
                return json_encode(array('isLogin' => false, 'msg' => 'Số điện thoại đã đăng kí trước đó. Vui lòng thử lại!'), JSON_UNESCAPED_UNICODE);
            }

            $user = Users::where('email', $username)->first();            

            if ( $user != null ) {
                header('Content-Type: application/json; charset=utf-8');
                return json_encode(array('isLogin' => false, 'msg' => 'Tên Tài Khoản Đã Tồn Tại!'), JSON_UNESCAPED_UNICODE);
            } else {

                $user = new Users;
                $user->email = $username;
                $user->email_info = $email_info;
                $user->fullname = $fullname;
                $user->gender = $gender;
                $user->phone = $phone;
                $user->addpress = 'Việt Nam';
                $user->password = Hash::make($password);
                
                $user->user_type_id = $type;
                $user->paid = 1;

                if ($user->save()) {
                    $user = Users::where('email', $username)->first();
                    $user_id = $user->user_id + ($user->user_type_id * 10000000);

                    DB::table('user')->where('user_id', $user->user_id)->update(array(
                        'user_id'=>$user_id
                    ));

                    $user = Users::where('email', $username)->first();
                    if ($user->user_type_id == 1) {
                        $user_type = "user";
                        $patientNew = $user->createPatient();
                        $patientNew->save();

                        if($present != null && $present != "") {
                            $user->present = $present;
                            $user->save();
                            $collaboratorsUser = CollaboratorsUser::where('code', $present)->first();
                            if($collaboratorsUser != null) {
                                $patientNew->balance += $collaboratorsUser->promotion;
                                $patientNew->save();
                            }
                        }
                    }

                    if ($image == null) {
                        $image = '';
                    }

                    header('Content-Type: application/json; charset=utf-8');
                    return json_encode(array('isLogin' => true, 'msg' => 'Đăng Kí Thành Công', 'user_type' => $user_type, 'image' => $image, 'paid' => $user->paid, 'fullname' => $user->fullname), JSON_UNESCAPED_UNICODE);
                }else{

                    header('Content-Type: application/json; charset=utf-8');
                    return json_encode(array('isLogin' => false, 'msg' => 'Chưa Nhập Đầy Đủ Thông Tin!'), JSON_UNESCAPED_UNICODE);
                }
            }
        } else {
            header('Content-Type: application/json; charset=utf-8');
            return json_encode(array('isLogin' => false, 'msg' => 'Chưa Nhập Đầy Đủ Thông Tin!'), JSON_UNESCAPED_UNICODE);
        }
    }

    public function getTintucMobile(Request $rq){

    	$dataQuery = DB::table('article')
            ->orderBy('article.article_id', 'desc')
            // ->select('article.*')
            ->paginate(3);
        $dataQuery->getCollection()->transform(function ($value) {
        	$value->image = 'https://tdoctor.vn/public/images/'.$value->image;
            return $value;
        });
        return $dataQuery;
    }

    public function getHoidapMobile(Request $rq){

    	$dataQuery = DB::table('question')
            ->orderBy('question.question_id', 'desc')
            // ->select('article.*')
            ->paginate(3);
        $dataQuery->getCollection()->transform(function ($value) {
        	// $value->image = 'https://tdoctor.vn/public/images/'.$value->image;
            return $value;
        });
        return $dataQuery;
    }
    
    public function getBacSi(Request $rq) {

    	$search = '';
        if ($rq->has('search')) {
        	$search = $rq->get('search');
        }
        if ($rq->has('speciality_id')) {
            $speciality_id = $rq->get('speciality_id');

            if($speciality_id == -2000){
            	$dataQuery = DB::table('doctor')
	                ->join('doctor_speciality', 'doctor.doctor_id', '=', 'doctor_speciality.doctor_id')
	                ->join('speciality', 'speciality.speciality_id', '=', 'doctor_speciality.speciality_id')
	                // ->where('doctor_speciality.speciality_id', $speciality_id)
	                ->where('doctor.featured', '!=',0)
	            	->where('doctor.doctor_name', 'like', '%' . $search . '%')
	                ->orderBy('doctor.top', 'desc')
	                ->orderBy('doctor.featured', 'desc')
	                ->orderBy('doctor.vote', 'desc')
	                ->groupBy('doctor.doctor_id')
	                ->select('doctor.*', DB::raw('GROUP_CONCAT(speciality.speciality_name SEPARATOR \', \') as \'specialitys\''))
	                ->paginate(20);
	            $dataQuery->getCollection()->transform(function ($value) {
	                $value->profile_image = 'https://tdoctor.vn/public/images/doctor/'.$value->profile_image;
	                return $value;
	            });
	            return $dataQuery;
            }
            if($speciality_id == -3000){
            	$dataQuery = DB::table('doctor')
	                ->join('doctor_speciality', 'doctor.doctor_id', '=', 'doctor_speciality.doctor_id')
	                ->join('speciality', 'speciality.speciality_id', '=', 'doctor_speciality.speciality_id')
	                ->where('doctor_speciality.speciality_id', $speciality_id)
	                ->where('doctor.featured', '!=',0)
	            	->where('doctor.doctor_name', 'like', '%' . $search . '%')
	                ->orderBy('doctor.top', 'desc')
	                ->orderBy('doctor.featured', 'desc')
	                ->orderBy('doctor.vote', 'desc')
	                ->groupBy('doctor.doctor_id')
	                ->select('doctor.*', DB::raw('GROUP_CONCAT(speciality.speciality_name SEPARATOR \', \') as \'specialitys\''))
	                ->paginate(20);
	            $dataQuery->getCollection()->transform(function ($value) {
	                $value->profile_image = 'https://tdoctor.vn/public/images/doctor/'.$value->profile_image;
	                return $value;
	            });
	            return $dataQuery;
            }

            $dataQuery = DB::table('doctor')
                ->join('doctor_speciality', 'doctor.doctor_id', '=', 'doctor_speciality.doctor_id')
                ->join('speciality', 'speciality.speciality_id', '=', 'doctor_speciality.speciality_id')
                ->where('doctor_speciality.speciality_id', $speciality_id)
                ->where('doctor.featured', '!=',0)
            	->where('doctor.doctor_name', 'like', '%' . $search . '%')
                ->orderBy('doctor.top', 'desc')
                ->orderBy('doctor.featured', 'desc')
                ->orderBy('doctor.vote', 'desc')
                ->groupBy('doctor.doctor_id')
                ->select('doctor.*', DB::raw('GROUP_CONCAT(speciality.speciality_name SEPARATOR \', \') as \'specialitys\''))
                ->paginate(20);
            $dataQuery->getCollection()->transform(function ($value) {
                $value->profile_image = 'https://tdoctor.vn/public/images/doctor/'.$value->profile_image;
                return $value;
            });
            return $dataQuery;
        }

        $data = DB::table('doctor')
            ->join('doctor_speciality', 'doctor.doctor_id', '=', 'doctor_speciality.doctor_id')
            ->join('speciality', 'speciality.speciality_id', '=', 'doctor_speciality.speciality_id')
            ->where('doctor.featured', '!=',0)
            ->where('doctor.doctor_name', 'like', '%' . $search . '%')
            ->orderBy('doctor.top', 'desc')
            ->orderBy('doctor.featured', 'desc')
            ->orderBy('doctor.vote', 'desc')
            ->groupBy('doctor.doctor_id')
            ->select('doctor.*', DB::raw('GROUP_CONCAT(speciality.speciality_name SEPARATOR \', \') as \'specialitys\''))
            ->paginate(20);

        $data->getCollection()->transform(function ($value) {
            $value->profile_image = 'https://tdoctor.vn/public/images/doctor/'.$value->profile_image;
            return $value;
        });
        return $data;
    }
    
}
