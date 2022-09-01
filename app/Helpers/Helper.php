<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class Helper {
    public static function appName() {
        return "IFS TEST";
    }

    public static function manager($manager){
        if($manager == '*'){
            return '';
        }else{
            $check = DB::table('sales')->where('sales_id',$manager)->first();

            return $check->sales_name;
        }
    }
}