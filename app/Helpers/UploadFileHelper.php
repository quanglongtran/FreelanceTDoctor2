<?php

namespace App\Helpers;

/**
 * Class UploadFileHelper
 * @package App\Helpers
 */
class UploadFileHelper
{
    /**
     * @param $path
     * @return string|string[]|null
     */
    public static function correctPath($path) {
        return preg_replace('/\.\.\/public\/responsive_filemanager/', '/public/responsive_filemanager', $path);
    }
}
