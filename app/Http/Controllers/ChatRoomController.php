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
use App\Model\chat_rooms;
use App\Model\chat_room_connect;
use App\Model\chat_room_images;
use App\Model\chat_room_messages;
use App\Model\chat_room_messages_status;
use App\Model\user_token;
use App\Model\user_agent;
use App\Model\doctor_patient;
use App\Model\newsfeed;
use Auth;
use PhpParser\Comment\Doc;
use Socialite;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Helpers\Base;
use Carbon\Carbon;
use Image;
use \App\Helpers\UploadFileHelper;

class ChatRoomController extends Controller
{
    public $is_mobile;
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset(Session::get('user')->user_id)) {

            $_SESSION['userid_chat'] = Session::get('user')->user_id;
        } else {
            // if($rq->has('userId') && $rq->has('password')){
            //     $user = Users::find($rq->userId);
            //     if($user != null && $user->password == $rq->password){
            //         $rq->session()->put('user', $user);
            //     }
            // }
        }
        if (isset($_REQUEST['user_id']) && isset($_REQUEST['password'])) {
            $user = Users::find((int) $_REQUEST['user_id']);
            if ($user != null && $user->password == $_REQUEST['password']) {
                Session::put('user', $user);
                $this->is_mobile = true;
            }
        }
    }
    function sendNewsfeedNotification()
    {
        $first_newsfeed = newsfeed::where('status', 0)->first();
        if ($first_newsfeed) {
            $user_id = $first_newsfeed->to_id;
            $title = $first_newsfeed->title;
            $url = $first_newsfeed->link;
            $body = $first_newsfeed->content;
            $icon = $first_newsfeed->icon;
            $type = 'nf_' . $first_newsfeed->type;
            $is_show_result = false;
            $first_newsfeed->status = 1;
            if ($first_newsfeed->save()) {
                if ($user_id == 0 && $first_newsfeed->to_ids != null && $first_newsfeed->to_ids != '') {
                    $user_id = $first_newsfeed->to_ids;
                }
                $this->sendPushMessageFirebase($user_id, $title, $url, $body, $icon, $type, $is_show_result);
            }
        }
    }
    function sendPushMessageFirebase($user_id, $title, $url, $body, $icon, $type, $is_show_result = true, $agora_app_id = '', $agora_token = '', $channel_name = '', $agora_client_name = '')
    {
        if (strpos($user_id, ',') !== false) {
            $user_id = str_replace('{,', '', $user_id);
            $user_id = str_replace(',}', '', $user_id);
            $user_ids = explode(',', $user_id);
            $user_tokens = user_token::whereIn('user_id', $user_ids)->get();
        } else {
            $user_tokens = user_token::where('user_id', $user_id)->get();
        }

        if ($user_tokens != null) {
            $registration_ids = array();
            foreach ($user_tokens as $item) {
                $registration_ids[] = base64_decode($item->token);
            }

            $post_data = array(
                'registration_ids' => $registration_ids,
                'notification' => array(
                    'title' => $title,
                    'xclick_action' => $url,
                    'body' => $body,
                    'agora_app_id' => $agora_app_id,
                    'agora_token' => $agora_token,
                    'channel_name' => $channel_name,
                    'agora_client_name' => $agora_client_name
                ),
                'data' => array(
                    'click_action' => $url,
                    'icon' => $icon,
                    'type' => $type,
                    'agora_app_id' => $agora_app_id,
                    'agora_token' => $agora_token,
                    'channel_name' => $channel_name,
                    'agora_client_name' => $agora_client_name
                ),
            );

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($post_data),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: key=AAAA1ZEv8zo:APA91bHNlGpAbsDXqF2qW-jo08NNQ8Ln4zbXyIyHRWv9LMaB0-fHMR5_8-t6r86b9gb0ltHmYQCnQjF32rP-103jLGa8jLuVDgMefP1lpHDI7QSwZ9osrwHQo0_qP00MqSv41fmRKNjK',
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            if ($is_show_result) {
                return response()->json([
                    'status' => true,
                    'data' => $response,
                    'date' =>  time()
                ]);
            }
        }
    }
    function sendPushMessage(Request $rq)
    {
        if (isset(Session::get('user')->user_id)) {
            $user_id = str_replace('room_', '', $rq->chat_to);
            $title = $rq->title;
            $url = $rq->url;
            $body = $rq->body;
            $icon = $rq->icon;
            $type = $rq->type;
            $this->sendPushMessageFirebase($user_id, $title, $url, $body, $icon, $type);
        }
        return response()->json([
            'status' => false,
            'data' => [],
            'date' =>  time()
        ]);
    }

    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

    function updateUserAgent(Request $rq)
    {

        if (isset(Session::get('user')->user_id)) {
            $user_id = Session::get('user')->user_id;
            $useragent = $rq->useragent;

            if ($useragent && $useragent != '') {

                $find_current_useragent = user_agent::where('user_id', $user_id)->where('argent', $useragent)->first();
                setcookie('bi_user_agent', $useragent, time() + (86400 * 30), "/");
                if ($find_current_useragent == null) {
                    $user_agent = new user_agent();
                    $user_agent->user_id = $user_id;
                    $user_agent->argent = $useragent;
                    $user_agent->ip = $this->getIp();
                    if ($user_agent->save()) {
                        return response()->json([
                            'status' => true,
                            'data' => $useragent,
                            'date' =>  time()
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => true,
                        'data' => $useragent,
                        'date' =>  time()
                    ]);
                }
            }
        }
        return response()->json([
            'status' => false,
            'data' => [],
            'date' =>  time()
        ]);
    }

    function updateToken(Request $rq)
    {
        if (isset(Session::get('user')->user_id)) {
            $user_id = Session::get('user')->user_id;
            $token = $rq->token;
            $old_token = $rq->old_token;
            $need_to_base64 = $rq->need_to_base64;

            if ($old_token && $old_token != '') {
                user_token::where('token', $old_token)->where('user_id', $user_id)->delete();
            }
            if ($token && $token != '') {
                if ($need_to_base64 != null && $need_to_base64 == 1) {
                    $token = base64_encode($token);
                }
                $token = str_replace('==', '', $token);
                $find_current_token = user_token::where('user_id', $user_id)->where('token', $token)->first();
                setcookie('push_access_token', $token, time() + (86400 * 30), "/");
                if ($find_current_token == null) {
                    $user_token = new user_token();
                    $user_token->user_id = $user_id;
                    $user_token->token = $token;
                    if ($user_token->save()) {
                        return response()->json([
                            'status' => true,
                            'data' => $token,
                            'date' =>  time()
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => true,
                        'data' => $token,
                        'date' =>  time()
                    ]);
                }
            }
        }
        return response()->json([
            'status' => false,
            'data' => [],
            'date' =>  time()
        ]);
    }

    function getUser(Request $rq)
    {
        // var_dump(Users::find((int) $rq->get_user_id));exit;
        if (isset(Session::get('user')->user_id)) {
            $user_id = Session::get('user')->user_id;
            $user = Users::find((int) $rq->get_user_id);
            if ($user) {
                $user->password = '';

                return response()->json([
                    'status' => true,
                    'data' => $user,
                    'date' =>  time()
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'data' => [],
            'date' =>  time()
        ]);
    }

    function getToken()
    {
        if (isset(Session::get('user')->user_id)) {
            $user_id = Session::get('user')->user_id;
            $token = Base::get_access_token($user_id);
            setcookie('current_access_token', $token['access_token'], time() + (86400 * 30), "/");
            return response()->json([
                'status' => true,
                'data' => $token,
                'date' =>  time()
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => [],
            'date' =>  time()
        ]);
    }
    function getAgoraToken(Request $rq)
    {

        if (isset(Session::get('user')->user_id)) {
            $user = Session::get('user');
            $user_id = Session::get('user')->user_id;

            $agora_app_id = '9c0d2d39bcf24b80aebd09bbcb957ec1';
            $agora_token = '0069c0d2d39bcf24b80aebd09bbcb957ec1IADFD8Vkw8jfJ/jJHv5K7wdBUPWd7iCCd9jsHUUdQrirUKQ6H5kAAAAAEAAabyR2ZVcSYQEAAQBlVxJh';
            $channel_name = 'YourChannelName';
            $channel_name = $this->get_real_chat_room_id('room_' . $user_id . '_' . $rq->chat_to);

            $agora_token = Base::get_agora_token($channel_name);

            //send push message
            $call_to = str_replace('room_', '', $rq->chat_to);
            $title = 'Cuộc gọi từ ' . $user->fullname;
            $url = 'https://tdoctor.vn?from-push=1&u=room_' . $user_id;
            $body = 'Cuộc gọi từ ' . $user->fullname;
            $icon = 'https://tdoctor.vn/chatapi/get-avatar/room_' . $user_id;
            $type = 'agora_call';

            $this->sendPushMessageFirebase($call_to, $title, $url, $body, $icon, $type, false, $agora_app_id, $agora_token, $channel_name, $user->fullname);
            return response()->json([
                'call_status' => "true",
                'data' => [],
                'agora_app_id' =>  $agora_app_id,
                'agora_token' =>  $agora_token,
                'channel_name' =>  $channel_name,
                'date' =>  time()
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => [],
            'date' =>  time()
        ]);
    }
    function sendMessageToNewPatient()
    {
        // Carbon::now()->subHours(3)->toDateTimeString();
        // $patient_user = Users::where('user_type_id', 1)->where('isSentMessage', 0)->where('created_at', '<=', Carbon::now()->addMinutes(-1)->toDateTimeString())->first();
        $patient_user = Users::where('user_type_id', 1)->where('isSentMessage', 0)->where('created_at', '<=', Carbon::now()->toDateTimeString())->first();
        // $query = vsprintf(str_replace(array('?'), array('\'%s\''), $patient_user->toSql()), $patient_user->getBindings());
        //                 var_dump($query); exit;
        // var_dump($patient_user);exit;
        if ($patient_user != null) {
            $patient_user->isSentMessage = 1;
            if ($patient_user->save()) {

                $noi_dung_gui_cho_tk_moi = 'Bạn cần kết nối trực tiếp bác sĩ ah?';
                $noi_dung_gui_cho_tk_moi = 'Xin chào! Bạn muốn tư vấn sức khoẻ miễn phí nhấn vào <a href="https://tdoctor.vn/hoibacsi">(ĐÂY)</a>' . "\n"
                    . 'Nếu muốn đặt lịch khám dịch vụ nhanh chóng và tiện lợi với bác sĩ thông qua cuộc gọi video chat với chi phí 200k nhấn vào <a href="https://tdoctor.vn?showpopup=1">(ĐÂY)</a>' . "\n"
                    . 'Cảm ơn bạn!';

                $rq = new Request();
                // $user = Session::get('user');
                $rq->chat_to = 'room_' . $patient_user->user_id;
                $rq->create_room = 'room_464103899_' . $patient_user->user_id;
                $rq->currentID = '464103899';
                $rq->clientName = $patient_user->fullname;
                $rq->myName = 'Hỗ trợ viên';
                $rq->message = $noi_dung_gui_cho_tk_moi;

                $rq->chat_to = str_replace('room_', '', $rq->chat_to);
                $rq->currentID = str_replace('room_', '', $rq->currentID);
                $create_room_temp = $rq->create_room;
                $rq->create_room = $this->get_real_chat_room_id($rq->create_room);
                $room = chat_rooms::where('name', $rq->create_room)->first();

                if ($room != null) {
                    $room->updated_at = time();
                    if ($room->save()) {
                        $rq->create_room = $room->id;
                        $this->create_chat_room_connect($rq, false);
                    }
                } else {
                    $room = new chat_rooms();
                    $room->name = $rq->create_room;
                    $room->created_by = $rq->currentID;
                    if ($room->save()) {
                        $rq->create_room = $room->id;
                        $this->create_chat_room_connect($rq, false);
                    }
                }
                //send push message
                $user_id = str_replace('room_', '', $rq->chat_to);
                $title = 'Tin nhắn mới từ Hỗ trợ viên';
                $url = 'https://tdoctor.vn?from-push=1&u=room_464103899';
                $body = $noi_dung_gui_cho_tk_moi;
                $icon = 'https://tdoctor.vn/chatapi/get-avatar/room_464103899';
                $type = 'new_message';
                $this->sendPushMessageFirebase($user_id, $title, $url, $body, $icon, $type, false);
            }
        }
    }
    function getAvatar($user_id)
    {
        $this->sendMessageToNewPatient();

        if ($user_id) {
            $user_id = (int) str_replace('room_', '', $user_id);
        }
        $user = Users::where('user_id', $user_id)->first();
        if ($user != null) {
            if ($user->user_type_id == 1) {
                $real_user = Patient::where('user_id', $user_id)->first();
            }
            $folder_path = 'doctor';
            if ($user->user_type_id == 2) {
                $real_user = Doctor::where('user_id', $user_id)->first();
            }
            if ($user->user_type_id == 3) {
                $real_user = Clinic::where('user_id', $user_id)->first();
                $folder_path = 'health_facilities';
            }
            if (isset($real_user) && $real_user != null) {

                if (strlen(strstr("$real_user->profile_image", "https://dwbxi9io9o7ce.cloudfront.net")) > 0) {
                    $profile_image = "$real_user->profile_image";
                } else {
                    $profile_image = "/public/images/" . $folder_path . "/$real_user->profile_image";
                }
                if ($user->user_type_id == 1) {
                    $profile_image = "/public/patient/images/benh-nhan.png";
                }
                return Redirect::to($profile_image);
                return response()->json([
                    'status' => true,
                    'data' => $profile_image,
                    'date' =>  time()
                ]);
            }
        }
        return Redirect::to('/public/patient/images/benh-nhan.png');
        return response()->json([
            'status' => false,
            'data' => $user_id,
            'date' =>  time()
        ]);
    }

    function create_chat_room_messages_status($rq, $chat_room_messages)
    {
        $list_connecters = chat_room_connect::where('room_id', $rq->create_room)->get();
        // var_dump($list_connecters);exit;
        // return response()->json([
        //         'status' => true,
        //         'data' => $list_connecters            
        //     ]);
        foreach ($list_connecters as $item) {
            $chat_room_messages_status = new chat_room_messages_status();
            $chat_room_messages_status->message_id = $chat_room_messages->id;
            $chat_room_messages_status->user_id = $item->user_id;
            $chat_room_messages_status->message_status = 0;
            $chat_room_messages_status->save();
        }
    }

    function uploadImage($rq, $chat_room_messages)
    {
        $this->create_chat_room_messages_status($rq, $chat_room_messages);

        $chat_room_images = new chat_room_images();
        if ($rq->hasFile('file')) {
            $destinationPath = public_path('/images/chat/');
            $file = $rq->file('file');
            $file_original_name = uniqid('chat-' . $rq->currentID . '-') . '-' . $file->getClientOriginalName();

            if (false) {
                if (!$file->move($destinationPath, $file_original_name)) {
                    $errors = new MessageBag(['errorMs' => 'Không thể upload file, vui lòng thử lại']);
                    return response()->json([
                        'status' => false,
                        'attach' => $chat_room_images,
                        'data' => $chat_room_messages,
                        'data_id' => $chat_room_messages->id,
                        'created_date' => time()
                    ]);
                }
            }
            $this->validate($rq, [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:30720',
            ]);
            $image = $rq->file('file');

            $img = Image::make($image->getRealPath())->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationPath . '' . (string) $file_original_name);

            $chat_room_images->message_id = $chat_room_messages->id;
            $chat_room_images->user_id = $rq->currentID;
            $chat_room_images->file_name = $file_original_name;
            $chat_room_images->url = '/public/images/chat/' . $file_original_name;
            $chat_room_images->details = $rq->create_room;
            $chat_room_images->status = 1;
            $chat_room_images_temp = $chat_room_images;
            if ($chat_room_images->save()) {
                // if($this->is_mobile){
                //     return 'https://tdoctor.vn'.$chat_room_images->url;
                // }
                return response()->json([
                    'status' => true,
                    'image_url' => $chat_room_images->url,
                    'attach' => $chat_room_images_temp,
                    'data' => $chat_room_messages,
                    'data_id' => $chat_room_messages->id,
                    'created_date' => time()
                ]);
            }
            return response()->json([
                'status' => false,
                'attach' => $chat_room_images_temp,
                'data' => $chat_room_messages,
                'data_id' => $chat_room_messages->id,
                'created_date' => time()
            ]);
        }
        return response()->json([
            'status' => true,
            'attach' => $chat_room_images,
            'data' => $chat_room_messages,
            'data_id' => $chat_room_messages->id,
            'created_date' => time()
        ]);
    }

    function create_messsage($rq, $is_show_result = true)
    {
        $chat_room_messages = new chat_room_messages();
        $chat_room_messages->user_id = $rq->currentID;
        $chat_room_messages->room_id = $rq->create_room;
        $chat_room_messages->message = $rq->message;
        if ($rq->hasFile('file')) {
            $chat_room_messages->message_type = 2;
        }
        // $chat_room_messages->message_status = 0;
        if ($chat_room_messages->save()) {
            if ($is_show_result) {
                return $this->uploadImage($rq, $chat_room_messages);
            } else {
                $this->create_chat_room_messages_status($rq, $chat_room_messages);
            }
        }
        if ($is_show_result) {
            return response()->json([
                'status' => false,
                'data' => $chat_room_messages,
                'created_date' => time()
            ]);
        }
    }

    function create_chat_room_connect($rq, $is_show_result = true)
    {
        $chat_room_connect = chat_room_connect::where('room_id', $rq->create_room)->where('user_id', $rq->chat_to)->first();
        if (!($chat_room_connect != null)) {
            $chat_room_connect = new chat_room_connect();
            $chat_room_connect->room_id = $rq->create_room;
            $chat_room_connect->user_id = $rq->chat_to;
            $chat_room_connect->save();
        }
        $chat_room_connect = chat_room_connect::where('room_id', $rq->create_room)->where('user_id', $rq->currentID)->first();
        if (!($chat_room_connect != null)) {
            $chat_room_connect = new chat_room_connect();
            $chat_room_connect->room_id = $rq->create_room;
            $chat_room_connect->user_id = $rq->currentID;
            $chat_room_connect->save();
        }
        return $this->create_messsage($rq, $is_show_result);
    }

    public function get_real_chat_room_id($create_room_temp)
    {

        $create_room_temp = str_replace('room_', '', $create_room_temp);
        $create_room_temp_array = explode('_', $create_room_temp);
        sort($create_room_temp_array);
        $create_room_temp = 'room';
        foreach ($create_room_temp_array as $user_id_temp) {
            $create_room_temp .= '_' . $user_id_temp;
        }
        return $create_room_temp;
    }

    function them_benh_nhan_vao_bs_khi_chat($id_nguoi_tao, $id_benh_nhan, $id_bac_si)
    {
        $old_doctor_patient = doctor_patient::where('doctor_id', $id_bac_si)->where('patient_id', $id_benh_nhan)->first();
        if ($old_doctor_patient) {
            return true;
        }
        $doctor_patient = new doctor_patient();
        $doctor_patient->doctor_id = $id_bac_si;
        $doctor_patient->patient_id = $id_benh_nhan;
        $doctor_patient->create_by = $id_nguoi_tao;
        $doctor_patient->status = 1;
        if ($doctor_patient->save()) {
            return true;
        }
        return false;
    }
    function them_benh_nhan_va_bs_khi_chat($rq, $user)
    {
        //benh nhan chat voi bacsi
        if ($user != null && $user->user_type_id == 1) {
            $chatToMember = Users::find((int) $rq->chat_to);
            if ($chatToMember && $chatToMember->user_type_id == 2) {
                $this->them_benh_nhan_vao_bs_khi_chat($user->user_id, $user->user_id, $chatToMember->user_id);
            }
        }
        //bacsi chat voi benh nhan
        if ($user != null && $user->user_type_id == 2) {
            $chatToMember = Users::find((int) $rq->chat_to);
            if ($chatToMember && $chatToMember->user_type_id == 1) {
                $this->them_benh_nhan_vao_bs_khi_chat($user->user_id, $chatToMember->user_id, $user->user_id);
            }
        }
    }
    public function sendMessage(Request $rq)
    {
        $user = Session::get('user');
        $rq->chat_to;
        $rq->create_room;
        $rq->currentID;
        $rq->clientName;
        $rq->myName;
        $rq->message;

        $rq->chat_to = str_replace('room_', '', $rq->chat_to);
        $rq->currentID = str_replace('room_', '', $rq->currentID);
        $create_room_temp = $rq->create_room;
        $rq->create_room = $this->get_real_chat_room_id($rq->create_room);
        $room = chat_rooms::where('name', $rq->create_room)->first();

        $this->them_benh_nhan_va_bs_khi_chat($rq, $user);
        if ($room != null) {
            $room->updated_at = time();
            if ($room->save()) {
                $rq->create_room = $room->id;
                return $this->create_chat_room_connect($rq);
                return response()->json([
                    'status' => true,
                    'data' => $room,
                    'created_date' => time()
                ]);
            }
        } else {
            $room = new chat_rooms();
            $room->name = $rq->create_room;
            $room->created_by = $rq->currentID;
            if ($room->save()) {
                $rq->create_room = $room->id;
                return $this->create_chat_room_connect($rq);
                return response()->json([
                    'status' => true,
                    'data' => $room
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'data' => $rq->create_room
        ]);
    }

    public function getMessages(Request $rq)
    {
        $rq->create_room = $this->get_real_chat_room_id($rq->create_room);
        $this->update_room_name_is_readed($rq->create_room);
        $dataQuery = chat_room_messages::whereIn('room_id', function ($query) use ($rq) {
            $query->select('id')
                ->from(with(new chat_rooms)->getTable())
                ->where('name', $rq->create_room);
        })
            ->orderBy('id', 'desc')
            // ->select('article.*')
            ->paginate(50);
        if ($rq->has('from') && $rq->from == 'iphone') {
            $dataQuery->getCollection()->transform(function ($value) {
                // $value->image = 'https://tdoctor.vn/public/images/'.$value->image;
                $value->attach = $value->attach();
                if ($value->message) {
                    // $value->message = str_replace('. ', "\n", $value->message);
                    // $value->message = str_replace('.', "\n", $value->message);
                    $count_words = explode(' ', $value->message);
                    $number_line = 1;
                    if ($count_words && count($count_words) > 10) {
                        $number_line = (int) (count($count_words) / 7);
                    }
                    if ($number_line >= 2) {
                        $number_line = $number_line + 0;

                        for ($i = 1; $i <= $number_line; $i++) {
                            if ($i % 2 == 0) {
                                $value->message = $value->message . "\n";
                            } else {
                                $value->message = "\n" . $value->message;
                            }
                        }
                    }

                    $value->message = str_replace('<a href="', '', $value->message);
                    $value->message = str_replace('">(ĐÂY)</a>', '', $value->message);
                }
                return $value;
            });
        } else {
            $dataQuery->getCollection()->transform(function ($value) {
                // $value->image = 'https://tdoctor.vn/public/images/'.$value->image;
                $value->attach = $value->attach();
                if ($value->message) {
                    // $value->message = str_replace('. ', "\n", $value->message);
                    // $value->message = str_replace('.', "\n", $value->message);
                    $count_words = explode(' ', $value->message);
                    $number_line = 1;
                    if ($count_words && count($count_words) > 10) {
                        $number_line = (int) (count($count_words) / 7);
                    }
                    if ($number_line >= 2) {
                        $number_line = $number_line + 0;

                        for ($i = 1; $i <= $number_line; $i++) {
                            if ($i % 2 == 0) {
                                $value->message = $value->message . "\n";
                            } else {
                                $value->message = "\n" . $value->message;
                            }
                        }
                    }
                }
                return $value;
            });
        }

        if ($this->is_mobile) {
            // $dataQuery->orderBy('id', 'asc');
            return $dataQuery;
        }
        return response()->json([
            'status' => true,
            'data' => $dataQuery
        ]);
    }

    public function addDoctorRooms(Request $rq)
    {
        $user = Session::get('user');
        if ($user != null && isset(Session::get('user')->user_id)) {
            $user_id = Session::get('user')->user_id;
            if ($this->is_mobile) {
                $user_id = (int) $_REQUEST['user_id'];
            }
            $doctor_id = $rq->doctor_id;
            $doctor_ob = Doctor::find($doctor_id);
            if ($doctor_ob != null) {
                $id_bac_si = $doctor_ob->user_id;
                $old_doctor_patient = doctor_patient::where('doctor_id', $id_bac_si)->where('patient_id', $user_id)->first();
                if ($old_doctor_patient == null) {
                    $doctor_patient = new doctor_patient();
                    $doctor_patient->doctor_id = $id_bac_si;
                    $doctor_patient->patient_id = $user_id;
                    $doctor_patient->create_by = $user_id;
                    $doctor_patient->status = 1;

                    if ($doctor_patient->save()) {
                        return response()->json([
                            'status' => true,
                            'image_url' => '',
                            'attach' => '',
                            'data' => array(),
                            'data_id' => 1,
                            'data_success_str' => 'data_success_str',
                            'created_date' => time()
                        ]);
                    }
                }
            }
        }
        return response()->json([
            'status' => false,
            'image_url' => '',
            'attach' => '',
            'data' => array(),
            'data_id' => 1,
            'created_date' => time()
        ]);
    }
    public function get_detail_format($business_description)
    {
        return $business_description;
        if ($business_description != null && $business_description && $business_description != '') {
            $business_description = mb_convert_encoding($business_description, "UTF-8");

            // $business_description = UploadFileHelper::correctPath($business_description);
            $businessDesc = strip_tags($business_description);
            $businessDesc = substr(ltrim($businessDesc), 0, 110);
        }
        return $businessDesc;
    }
    public function getListDoctorRooms(Request $rq)
    {
        $user = Session::get('user');
        if ($user != null && isset(Session::get('user')->user_id)) {
            $user_id = Session::get('user')->user_id;
            if ($this->is_mobile) {
                $user_id = (int) $_REQUEST['user_id'];
            }

            $currentUser = Users::find($user_id);
            if ($currentUser != null) {

                $doctors = Doctor::orWhereIn('doctor_id', function ($query) use ($currentUser) {
                    $query->select('refer_id')
                        ->from(with(new Users)->getTable())
                        ->where('refer_type', 2)
                        ->where('user_id', $currentUser->user_id);
                })
                    ->orWhereIn('user_id', function ($query) use ($currentUser) {
                        $query->select('doctor_id')
                            ->from(with(new doctor_patient)->getTable())
                            ->where('patient_id', $currentUser->user_id);
                    })
                    ->orWhereIn('doctor_id', function ($query) use ($currentUser) {
                        // $query->where('refer_type', 3)
                        $query->select('doctor_id')
                            ->from(with(new doctor)->getTable())
                            ->whereIn('doctor_id', function ($query) use ($currentUser) {
                                $query->select('refer_id')
                                    ->from(with(new Users)->getTable())
                                    ->where('refer_type', 3)
                                    ->where('refer_id', $currentUser->refer_id);
                            });
                    })
                    ->orWhereIn('user_id', function ($query) use ($currentUser) {
                        // $query->where('refer_type', 3)
                        $query->select('doctor_id')
                            ->from(with(new doctor)->getTable())
                            ->whereIn('doctor_clinic_id', function ($query) use ($currentUser) {
                                $query->select('refer_id')
                                    ->from(with(new Users)->getTable())
                                    ->where('refer_type', 3)
                                    ->where('refer_id', $currentUser->refer_id);
                            });
                    })
                    ->orWhereIn('user_id', function ($query) use ($currentUser) {
                        $query->select('user_id')
                            ->from(with(new doctor)->getTable())
                            ->whereIn('doctor_clinic_id', function ($query) use ($currentUser) {
                                $query->select('clinic_id')
                                    ->from(with(new clinic)->getTable())
                                    ->whereIn('user_id', function ($query) use ($currentUser) {
                                        $query->select('doctor_id')
                                            ->from(with(new doctor_patient)->getTable())
                                            ->where('patient_id', $currentUser->user_id);
                                    });
                            });
                    })
                    ->orWhereIn('user_id', function ($query) use ($currentUser) {
                        $query->select('user_id')
                            ->from(with(new doctor)->getTable())
                            ->whereIn('doctor_clinic_id', function ($query) use ($currentUser) {
                                $query->select('clinic_id')
                                    ->from(with(new clinic)->getTable())
                                    ->whereIn('clinic_id', function ($query) use ($currentUser) {
                                        $query->select('refer_id')
                                            ->from(with(new Users)->getTable())
                                            ->where('refer_type', 3)
                                            ->where('refer_id', $currentUser->refer_id);
                                    });
                            });
                    })
                    ->orderBy('user_id', 'desc')
                    // ->select('article.*')
                    ->paginate(10);

                // var_dump($currentUser);exit;
                // $this->current_user = $currentUser;
                $doctors->getCollection()->transform(function ($value) {
                    // $value->image = 'https://tdoctor.vn/public/images/'.$value->image;
                    $currentUser = Session::get('user');
                    // var_dump($currentUser);exit;
                    $value->connects = array();
                    $value->members = array(
                        array(
                            'fullname' => $currentUser->fullname,
                            'user_id' => $currentUser->user_id,
                            'user_type_id' => "1"
                        ),
                        array(
                            'fullname' => $value->doctor_name,
                            'user_id' => $value->user_id,
                            'user_type_id' => "2"
                        )
                    );

                    $value->latest_messages = array(
                        array(
                            "create_date" => "2021-07-23 12:50:18",
                            "id" => 3246,
                            "message" => $this->get_detail_format($value->doctor_description),
                            "message_status" => "1",
                            "message_type" => "1",
                            "room_id" => "5",
                            "user_id" => $value->user_id,
                        )
                    );
                    $value->name = 'room_' . $currentUser->user_id . '_' . $value->user_id;
                    $value->created_by = $currentUser->user_id;
                    $value->updated_at = date("Y-m-d H:i:s");
                    return $value;
                });

                if ($this->is_mobile) {
                    return $doctors;
                }
            }
        }
    }

    public function updateMessageStatus(Request $rq)
    {
        $rq->create_room = $this->get_real_chat_room_id($rq->create_room);
        return $this->update_room_name_is_readed($rq->create_room);
    }

    public function update_room_name_is_readed($room_name)
    {
        $user = Session::get('user');
        $user_id = Session::get('user')->user_id;
        if ($this->is_mobile) {
            $user_id = (int) $_REQUEST['user_id'];
        }
        $list_item = chat_room_messages_status::where('user_id', $user_id)
            ->whereIn('message_id', function ($query) use ($room_name) {
                $query->select('id')
                    ->from(with(new chat_room_messages)->getTable())
                    ->whereIn('room_id', function ($query) use ($room_name) {
                        $query->select('id')
                            ->from(with(new chat_rooms)->getTable())
                            ->where('name', $room_name);
                    });
            });

        return $list_item->update(array('message_status' => 1));
    }

    public function update_room_is_readed($room_id)
    {
        $user = Session::get('user');
        $user_id = Session::get('user')->user_id;
        if ($this->is_mobile) {
            $user_id = (int) $_REQUEST['user_id'];
        }
        $list_item = chat_room_messages_status::where('user_id', $user_id)
            ->whereIn('message_id', function ($query) use ($room_id) {
                $query->select('id')
                    ->from(with(new chat_room_messages)->getTable())
                    ->where('room_id', $room_id);
            });

        $list_item->update(array('message_status' => 1));
    }

    public function getListRoomsUpdate(Request $rq)
    {

        $user = Session::get('user');
        if ($user != null && isset(Session::get('user')->user_id)) {
            $user_id = Session::get('user')->user_id;
            if ($this->is_mobile) {
                $user_id = (int) $_REQUEST['user_id'];
            }

            $dataQuery = chat_rooms::whereIn('id', function ($query) use ($user_id) {
                $query->select('room_id')
                    ->from(with(new chat_room_messages)->getTable())
                    ->whereIn('id', function ($query) use ($user_id) {
                        $query->select('message_id')
                            ->from(with(new chat_room_messages_status)->getTable())
                            ->where('user_id', $user_id)
                            ->where('message_status', 0);
                    });
            })
                ->orderBy('updated_at', 'desc')
                // ->select('article.*')
                ->paginate(50);
            $dataQuery->getCollection()->transform(function ($value) {
                // $this->update_room_is_readed($value->id);
                // $value->image = 'https://tdoctor.vn/public/images/'.$value->image;
                $value->connects = $value->connects();
                $value->members = $value->members();
                $value->latest_messages = $value->latest_messages();
                return $value;
            });
            //check to send notification message for NewsFeed
            $this->sendNewsfeedNotification();
            if ($this->is_mobile) {
                return $dataQuery;
            }
            return response()->json([
                'status' => true,
                'data' => $dataQuery
            ]);
        }
    }

    public function getListRooms(Request $rq)
    {
        $user = Session::get('user');
        if ($user != null && isset(Session::get('user')->user_id)) {
            $user_id = Session::get('user')->user_id;
            // return $user_id;
            if ($this->is_mobile) {
                $user_id = (int) $_REQUEST['user_id'];
            }
            $dataQuery = chat_rooms::whereIn('id', function ($query) use ($user_id) {
                $query->select('room_id')
                    ->from(with(new chat_room_connect)->getTable())
                    ->where('user_id', $user_id);
            })
                ->orderBy('updated_at', 'desc')
                // ->select('article.*')
                ->paginate(50);
            $dataQuery->getCollection()->transform(function ($value) {
                // $value->image = 'https://tdoctor.vn/public/images/'.$value->image;
                $value->connects = $value->connects();
                $value->members = $value->members();
                $value->latest_messages = $value->latest_messages();
                return $value;
            });
            if ($this->is_mobile) {
                return $dataQuery;
            }
            return response()->json([
                'status' => true,
                'data' => $dataQuery
            ]);
        }
    }

    public function getListRooms_new(Request $rq)
    {
        if (isset(Session::get('user')->user_id)) {
            $user_id = Session::get('user')->user_id;
            $dataQuery = chat_room_messages::select('room_id')
                ->whereIn('room_id', function ($query) use ($user_id) {
                    $query->select('room_id')
                        ->from(with(new chat_room_connect)->getTable())
                        ->where('user_id', $user_id);
                })
                // ->groupBy('chat_room_messages.room_id')
                ->orderBy('id', 'desc')
                ->distinct()
                ->paginate(50);
            if (true) {
                $dataQuery->getCollection()->transform(function ($value) {
                    // $value->image = 'https://tdoctor.vn/public/images/'.$value->image;
                    // $value->connects = $value->connects();
                    $temp = new chat_rooms();
                    $value->room_info = $temp->get_info($value->room_id);
                    $value->members = $temp->members($value->room_id);
                    $value->latest_messages = $temp->latest_messages($value->room_id);
                    return $value;
                });
            }
            return response()->json([
                'status' => true,
                'data' => $dataQuery
            ]);
        }
    }
}
