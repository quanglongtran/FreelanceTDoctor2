<?php

namespace App\Helpers;

use Session;

/**
 * Class StringHelper
 * @package App\Helpers
 */
class StringHelper
{
    /**
     * @param string $str
     * @param int $len
     * @return string
     */
    public static function cut(string $str, int $len): string
    {
        if (strlen($str) <= $len) {
            return $str;
        }

        $str = substr($str, 0, $len);
        $str = substr($str, 0, strrpos($str, ' ')) . " ...";

        return $str;
    }

    public static function to_slug($str)
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

    public static function bi_get_title_article($string = ''){
        $string = mb_strtolower(trim($string), 'UTF-8');
        $encoding = 'UTF-8';
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, null, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;

        // return mb_convert_case($title, MB_CASE_TITLE, 'UTF-8');
    }

    public static function bi_get_category_by_catalog_id($catalog_id, $class_name = 'category-name'){
        $catelog = \App\Catalog::find($catalog_id);
        if($catelog != null){
            echo '<a href="'.'/chuyenmuc/'.$catelog->name_url.'-'.$catelog->id.'" class="'.$class_name.'">'.$catelog->name.'</a>';
        }
        echo '';
    }

    public static function bi_get_content_readmore_get_text($string, $readmore, $length = 220){
        $string = strip_tags($string);
        if (strlen($string) > $length) {
            // truncate string
            $stringCut = substr($string, 0, $length);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string = '<p class="content-to-show-more-content">'.$string.'...</p>'.$readmore;
            return $string;
        }
        return '<p class="content-to-show-more-content">'.$string.'</p>';
    }
    public static function bi_get_content_readmore($content, $length = 220, $readmore='<button class="xemthem-button button__loadmore">Xem thêm<img src="../../public/v3/assets/image/loadmore-red.png" alt="Xem thêm"></button>', $is_echo = true){
        $result = '<div class="question__full">';
        $result .= '<p class="content-to-show-more-content-orignize">';
        $result .= $content;
        $result .= '</p>';
        // $result .= '<div class="content-to-show-more-content">';
        // if($content && strlen($content) > $length){
            $result .= StringHelper::bi_get_content_readmore_get_text($content, $readmore, $length);
        // }
        // $result .= '</p>';
        $result .= '</div>';
        if($is_echo){
            echo $result;
        }else{
            return $result;
        }
    }

    public static function bi_nut_goi_cho_bs($doctor_id, $is_echo = true){
        if(!Session::get('user')==null){
            //room_464103899
            //room_454103455
            $chat_html = '<a data-auto-click-to="call-89237" data-doctor="89237" href="javascript:void(0);" class="ml-1 goi-cho-bac-si btnx btn-okx btn-roundedx click-to-start-chat" data-my-name="'.Session::get('user')->fullname.'" data-client-name="Hỗ trợ viên" data-chat-to="room_464103899" data-chat-room="room_464103899_'.Session::get('user')->user_id.'"><img src="../../public/v3/assets/image/phone-call.png" alt="Gọi cho bác sĩ">
                <span>Gọi cho bác sĩ</span>
            </a>';
        }else{
            $chat_html = '<a data-auto-click="call-89237" data-doctor="89237" href="javascript:void(0);" class="ml-1 goi-cho-bac-si btnx btn-okx btn-roundedx btn-login-to-chat auto-click" data-url="/frameLogin"><img src="../../public/v3/assets/image/phone-call.png" alt="Gọi cho bác sĩ">
                <span>Gọi cho bác sĩ</span>
            </a>';
        }

        $result = str_replace('89237', $doctor_id, $chat_html);
        if($is_echo){
            echo $result;
        }else{
            return $result;
        }
    }
}
