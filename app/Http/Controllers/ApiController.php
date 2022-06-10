<?php

namespace App\Http\Controllers;

use App\AppointmentSchedule;
use App\apiUploadImgsClinicalAchievements;
use App\ClinicalAchievements;
use App\ClinicalAchievementsImages;
use App\Notify;
use DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
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
use App\DoctorExperience;

use App\ClinicService;
use App\Catalog;
use App\DoctorService;
use App\Service;
use App\Province;
use App\Speciality;
use App\District;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function article(){
        $article = Article::with('catalog')->orderBy('article_id','DESC')->paginate(10);        
        
        return response()->json([
            'article' => $article            
        ]);
    }

    public function articleWhereId($id){
        $article = Article::with('catalog')->where('article_id',$id)->first();    
        
        return response()->json([
            'article' => $article            
        ]);
    }

    public function deals(){
        $deals= Deals::with('catalog')->with('clinic')->orderBy('deal_id','DESC')->paginate(10);
        return response()->json([            
            'deals' => $deals
        ]);
    }

    public function dealsWhereId($id){
        $deals= Deals::with('catalog')->with('clinic')->where('deal_id',$id)->first();
        return response()->json([            
            'deals' => $deals
        ]);
    }

    //doctor
    public function doctor(){
        $doctor = Doctor::with('user')->with('clinics')->with('services')->with('specialities')->orderBy('doctor_id','DESC')->paginate(10);

        return response()->json([
            'doctor' => $doctor
        ]);
    }

    //doctor
    public function doctorWhereSpeciality($speciality_id){
        $doctors = DB::table('doctor')->distinct()
            ->join('doctor_speciality', 'doctor_speciality.doctor_id', '=', 'doctor.doctor_id')
            ->where('doctor_speciality.speciality_id', $speciality_id)
            ->where('status', 1)
            ->orderBy('top', 'DESC')
            ->select('doctor.doctor_id', 'doctor.doctor_name')->get();

        return response()->json($doctors);
    }

    public function doctorWhereId($id){
        $doctor = Doctor::with('user')->with('clinics')->with('services')->with('specialities')->where('doctor_id',$id)->first();

        return response()->json([
            'doctor' => $doctor
        ]);
    }
    public function doctorTimeWorkWithId(Request $rq){
        $doctorId = $rq->get('doctor_id');
        $doctor = Doctor::where('doctor_id', $doctorId)->first();
        $timework = $doctor->doctor_timework;
        return response()->json([
            'timework' => $timework
        ]);
    }
    public function doctorUpdateTimeWork(Request $rq) {
        $doctor = Doctor::where('doctor_id', $rq->get('doctor_id'))->first();
        $doctor->doctor_timework = $rq->get('timework');
        if ($doctor->save()) {
            return json_encode(array('isSave' => true, 'msg' => 'Đã cập nhật thời gian làm việc bác sĩ'));
        }
        else {
            return json_encode(array('isSave' => false, 'msg' => 'Lỗi hệ thống vui lòng thử lại sau'));
        }
    }

    public function notifyWithDoctorId(Request $rq) {
        $doctorId = $rq->get('doctor_id');
        $notifys = Notify::where('doctor_id', $doctorId)->orderBy('notify_id','DESC')->paginate(20);
        return $notifys;
    }

    public function clinicalAchievementsWithDoctorId(Request $rq) {
        $doctorId = $rq->get('doctor_id');
        $clinicalAchievements = ClinicalAchievements::where('doctor_id', $doctorId)->orderBy('clinical_achievements_id','DESC')->paginate(20);
        foreach ($clinicalAchievements as $clinicalAchievement) {
            $clinicalAchievementImages = ClinicalAchievementsImages::where('clinical_achievements_id', $clinicalAchievement->clinical_achievements_id)->get();
            $clinicalAchievement->images = $clinicalAchievementImages;
        }
        return $clinicalAchievements;
    }

    public function notifyAdd(Request $rq) {
        $notify = new Notify();
        $notify->doctor_id = $rq->get('doctor_id');
        $notify->title = $rq->get('title');
        $notify->content = $rq->get('content');

        if ($notify->title === null || $notify->content === null) {
            $errors["code"] = 1;
            $errors["message"] = "Data empty";
            return $errors;
        } else {
            if ($notify->save()) {
                $errors["code"] = 0;
                $errors["content"] = $notify->notify_id;
                $errors["message"] = "Success";
                return $errors;
            };

            $errors["code"] = -9999;
            $errors["message"] = "Unknown";
            return $errors;
        }
    }

    public function clinicalAchievementsAdd(Request $rq) {
        $clinicalAchievements = new ClinicalAchievements();
        $clinicalAchievements->doctor_id = $rq->get('doctor_id');
        $clinicalAchievements->title = $rq->get('title');
        $clinicalAchievements->content = $rq->get('content');

        if ($clinicalAchievements->title === null || $clinicalAchievements->content === null) {
            $errors["code"] = 1;
            $errors["message"] = "Data empty";
            return $errors;
        } else {
            if ($clinicalAchievements->save()) {
                $errors["code"] = 0;
                $errors["content"] = $clinicalAchievements->clinical_achievements_id;
                $errors["message"] = "Success";
                return $errors;
            };

            $errors["code"] = -9999;
            $errors["message"] = "Unknown";
            return $errors;
        }
    }

    public function clinicalAchievementsRemove(Request $rq) {
        $id = $rq->get('id');
        $doctor_id = $rq->get('doctor_id');
        ClinicalAchievements::where('clinical_achievements_id', $id)->where('doctor_id', $doctor_id)->delete();
        $errors["code"] = 0;
        $errors["message"] = "Success";
        return $errors;
    }

    public function apiUploadImgNotify(Request $rq) {
        if ($rq->hasFile('img')) {
            $image = $rq->file('img');
            $name = 'notifys_' . $image->getClientOriginalName();
            $path = public_path('/images/notifys');
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

    public function apiUploadImgClinicalAchievements(Request $rq) {
        if ($rq->hasFile('img')) {
            $image = $rq->file('img');
            $name = 'clinical_achievements_' . $image->getClientOriginalName();
            $path = public_path('/images/clinical_achievements');
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

    public function apiUploadImgsClinicalAchievements(Request $rq) {
        if ($rq->hasFile('img') && $rq->has('id')) {
            $id = $rq->get('id');
            $image = $rq->file('img');
            $name = 'clinical_achievements_' . $image->getClientOriginalName();
            $path = public_path('/images/clinical_achievements');
            $image->move($path, $name);

            $clinicalAchievementsImages = new ClinicalAchievementsImages();
            $clinicalAchievementsImages->clinical_achievements_id = $id;
            $clinicalAchievementsImages->name = $name;
            $clinicalAchievementsImages->save();

            $errors["code"] = 0;
            $errors["message"] = "Success";
            return $errors;
        }
        else {
            $errors["code"] = -9999;
            $errors["message"] = "Unknown";
            if (!$rq->hasFile('img'))
                $errors["message"] = "not have img";
            if (!$rq->has('id'))
                $errors["message"] = "not have id";
            return $errors;
        }
    }

    //clinic
    public function clinic(){
        $clinic= Clinic::with('user')->with('services')->with('specialities')->orderBy('clinic_id','DESC')->paginate(10);
        return response()->json([            
            'clinic' => $clinic
        ]);
    }

    //clinic where id
    public function clinicWhereId($id){
        $clinic = Clinic::where('clinic_id', $id)->first(); 
        return response()->json([
            'clinic' => $clinic            
        ]);
    } 

    //doctor service where id
    public function serviceWhereId($id){
        $service = Service::where('service_id', $id)->first(); 
        return response()->json([
            'service' => $service            
        ]);
    }   

    // specialities Where Id
    public function specialitiesWhereId($id){
        $specialities = Speciality::where('speciality_id', $id)->first(); 
        return response()->json([
            'specialities' => $specialities            
        ]);
    }

    //question
    public function question(){
        $question = Question::with('answers')->with('cat')->with('speciality')->orderBy('question_id', 'DESC')->paginate(10);
        return response()->json([
            'question' => $question            
        ]);
    }

    public function questionWhereId($id){
        $question = Question::with('answers')->with('cat')->with('speciality')->where('question_id', $id)->orderBy('question_id', 'DESC')->first();
        return response()->json([
            'question' => $question            
        ]);
    }

    public function answersMainWhereId($id){
        $answers = Answer::with('user')->where('answer_id', $id)->orderBy('question_id', 'DESC')->first();
        return response()->json([
            'answers' => $answers            
        ]);
    }


    public function answersWhereId($id){
        $answer = Answer::where('question_id', $id)->orderBy('answer_id', 'DESC')->get(); 
        return response()->json([
            'answer' => $answer            
        ]);
    }

    public function userWhereId($id){
        $user = Users::where('user_id', $id)->first();
        $doctor = Doctor::where('user_id', $id)->first();
        $clinic = Clinic::where('user_id', $id)->first();
        return response()->json([
            'user' => $user,
            'doctor' => $doctor,
            'clinic' => $clinic
        ]);
    }

    //medicine
    public function medicine(){
        $medicine= Medicine::orderBy('medicine_id','ASC')->paginate(10);
        return response()->json([            
            'medicine' => $medicine
        ]);
    }
    public function medicineWhereId($id){
        $medicine= Medicine::where('medicine_id',$id)->first();
        return response()->json([            
            'medicine' => $medicine
        ]);
    }


    //disease
    public function disease(){
        $disease= Disease::with('speciality')->orderBy('disease_id','ASC')->paginate(10);
        return response()->json([            
            'disease' => $disease
        ]);
    }
    public function diseaseWhereId($id){
        $disease= Disease::where('disease_id', $id)->first();
        return response()->json([            
            'disease' => $disease
        ]);
    }

    // appointment_schedule
    public function appointmentSchedule(Request $rq) {
        $startDate = DateTime::createFromFormat('d-m-Y', $rq->get('start'));
        $endDate = DateTime::createFromFormat('d-m-Y', $rq->get('end'));
        $startStrDate = $startDate->format('Ymd');
        $endStrDate = $endDate->format('Ymd');
        $start = $startStrDate . "000000";
        $end = $endStrDate . "235959";
        $doctorId = $rq->get('doctor_id');
        $appointmentSchedules = AppointmentSchedule::where('doctor_id', $doctorId)
            ->where('appointment_at', '>=', $start)->where('appointment_at', '<=', $end)
            ->orderBy('id', 'DESC')->limit(20)->get();
//        for($idx = 0; $idx < count($appointmentSchedules); $idx++) {
//            $appointmentSchedules[$idx]->doctor = Doctor::where('doctor_id', $appointmentSchedules[$idx]->doctor_id)->first();
//        }
        return json_encode($appointmentSchedules);
    }

    public function appointmentScheduleAdd(Request $rq) {
        $appointmentSchedule = new AppointmentSchedule();
        $appointmentSchedule->user_id = $rq->get('user_id');
        $appointmentSchedule->doctor_id = $rq->get('doctor_id');
        $appointmentSchedule->name = $rq->get('name');
        $appointmentSchedule->address = $rq->get('address');
        $appointmentSchedule->phone = $rq->get('phone');
        $appointmentSchedule->gender = $rq->get('gender');
        $startDate = DateTime::createFromFormat('d-m-Y H:i:s', $rq->get('appointment_at'));
        $appointmentSchedule->appointment_at = $startDate->format('YmdHis');
        $appointmentSchedule->content = $rq->get('content');
        if ($appointmentSchedule->save()) {
            return json_encode(array('isSave' => true, 'msg' => 'Đã đặt lịch hẹn'));
        }
        else {
            return json_encode(array('isSave' => false, 'msg' => 'Lỗi hệ thống vui lòng thử lại sau'));
        }
    }

    public function district(Request $rq) {
        $provinceId = $rq->get('province');
        $dis= District::where('province_id', $provinceId)->get();
        return json_encode($dis);
    }
}

    