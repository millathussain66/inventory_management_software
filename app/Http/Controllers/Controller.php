<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


   // Common Function 
   public function FileUpload(){

    }

    public static function file_upload($file_input_name, $folder_name)
    {
        $pdfFile = '';
        $status = 'false';
        $url = '';
        $item = $file_input_name;
        $orginal_name = $item->getClientOriginalName();
        $orginal_extension = $item->getClientOriginalExtension();
        $orginal_size = $item->getSize();
        $will_file_upload = 1;

        $filename = $folder_name . '_' . date('Ym') . time() . '.' . $orginal_extension;
        $path = $folder_name . '/';

    
        if ($will_file_upload == 1) {
            try {
                Storage::disk('sftp')->put(env('FILE_UPLOAD_PATH') . $path . '/' . $filename, file_get_contents($file_input_name));
                $pdfFile = $filename;
                $status = "true";
                $url = env('SFTP_PREFIX') . env('SFTP_HOST') . '/' . env('FILE_UPLOAD_PATH') . $path . $filename;
            } catch (\Exception $e) {
                $pdfFile = '';
                $status = $e->getMessage();
                $url = '';
            }
        }
        return [$status,$pdfFile,url($url),$orginal_name,$orginal_extension,$orginal_size];
    }

}
