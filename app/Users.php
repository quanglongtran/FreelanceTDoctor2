<?php

namespace App;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait; 
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use AuthenticableTrait;
    const TYPE_DOCTOR = 2;
    const TYPE_CLINIC = 3;

    protected $table = 'user';
    protected $primaryKey = "user_id";
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'user_id','fullname', 'email', 'password','user_status','user_type_id','id_facebook','paid','balance','show_phone'
    ];

    
    public function answers(){
    	return $this->hasOne('App\Answer','answer_user_id');
    }
    public function type(){
    	return $this->hasOne('App\UserType','user_type_id');
    }
    public function review(){
    	return $this->hasMany('App\Review','user_id');
    }
    public function doctor() {
    	return $this->hasOne('App\Doctor','user_id');
    }
    public function clinic(){
    	return $this->hasOne('App\Clinic','user_id');
    }
    public function orders(){
        return $this->hasMany('App\Model\UserOrder','user_id');
    }

    // Thắng add 20181107 start
    public function patient(){
        return $this->hasOne('App\Patient','user_id');
    }

    public function createPatient(){
        $patient = new Patient();
        $patient->user_id = $this->user_id;
        $patient->profile_image = $this->avatar;;
        $patient->email = $this->email;
        return $patient;
    }

    public function savePatient(){
        $this->patient->user_id = $this->user_id;
        if($this->avatar != null || $this->avatar != "")
        {
            $string = $this->avatar;
            $tmp = explode("/",$string);
            $this->patient->profile_image = end($tmp);
        }
        $this->patient->email = $this->email;
        $this->patient->save();
    }
    // Thắng add 20181107 end


    public function getBalance(){
        $unit           = \App\Config::where('id', 2)->first();
        $unit           = (!empty($unit))? intval($unit->content) : 1000;
        $balance        = 0;
        if ( isset($this->email) ) {
            $totalCall  = \App\Calltime::where('user_email', $this->email)->sum('times');
            $balance    =  $this->balance - $totalCall*$unit;
        }
        if ($balance <= 0)
            $this->unActivePaid();
        $result = number_format($balance, 0, ',', '.') . ' đ';
        return ($balance <= 0)? 0 : $result;
    }

    public function getBalanceTime(){
        $unit           = \App\Config::where('id', 2)->first();
        $unit           = (!empty($unit))? intval($unit->content) : 1000;
        $balance        = $this->balance/$unit;
        if ( isset($this->email) ) {
            $totalCall  = \App\Calltime::where('user_email', $this->email)->sum('times');
            $balance    = $balance - $totalCall;
        }
        return ($balance < 0)? 0 : $balance;
    }

    public function unActivePaid(){
        $this->paid = 0;
        if ( $this->save() )
            return true;
        return false;
    }

    public function public_questions(){
        $user_id = $this->user_id;
        $qss = \App\Question::whereIn('question_id', function($query) use ($user_id){
                $query->select('question_id')
                ->from(with(new Answer)->getTable())
                ->where('answer_user_id', '=', $user_id);
            })
            // ->whereIn('user_id', function($query) use ($user_id){
            //     $query->select('user_id')
            //     ->from(with(new Users)->getTable())
            //     ->orWhere('refer_id', '<=', 0)
            //     ->orWhere('refer_id', '=', null);
            // })
            ->orderBy('created_at','DESC')->limit(10)->get();
        return $qss;
    }

    public function private_questions(){
        $user_id = $this->user_id;
        $qss = \App\Question::whereIn('question_id', function($query) use ($user_id){
                $query->select('question_id')
                ->from(with(new Answer)->getTable())
                ->where('answer_user_id', '=', $user_id);
            })
            ->whereIn('user_id', function($query) use ($user_id){
                $query->select('user_id')
                ->from(with(new Users)->getTable())
                ->orWhere('refer_id', '<=', 0)
                ->orWhere('refer_id', '=', null);
            })
            ->orderBy('created_at','DESC')->limit(10)->get();
        return $qss;
    }

    public function questions(){
        $questionArr = array();
        $questionIds = \App\Answer::select('question_id')->where('answer_user_id', $this->user_id)->distinct()->orderBy('created_at','DESC')->limit(100)->get();

        foreach ($questionIds as $qs) {
            array_push($questionArr, $qs->question_id);
        }
        $refer_id = 0;
        $qss = \App\Question::whereIn('question_id', $questionArr)
            ->whereIn('user_id', function($query) use ($refer_id){
                $query->select('user_id')
                ->from(with(new Users)->getTable())
                ->where('refer_id', '<=', 0)
                ->orWhere('refer_id', '=', null);
            })
            ->orderBy('created_at','DESC')->limit(5)->get();

        // $qss = \App\Question::whereIn('question_id', $questionArr)->orderBy('created_at','DESC')->limit(5)->get();
        return $qss;
    }


    /**
     * @return bool
     */
    public function isDoctor(): bool
    {
        return (int)$this->user_type_id === self::TYPE_DOCTOR;
    }

    /**
     * @return bool
     */
    public function isPatient(): bool
    {
        return (int)$this->user_type_id === 1;
    }

    /**
     * @return bool
     */
    public function isClinic(): bool
    {
        return (int)$this->user_type_id === self::TYPE_CLINIC;
    }
}
