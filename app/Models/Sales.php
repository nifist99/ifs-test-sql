<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';

    protected $fillable = [
        'sales_id',
        'sales_name',
        'join_date',
        'manager',
    ];

    public static function listData(){
        $check = Sales::orderBy('sales.id','desc')
                ->paginate(10);
        
        return $check;
    }

    public static function insertData($request){

        $save = Sales::create([
           'sales_id'=>$request->sales_id,
           'sales_name'=>$request->sales_name,
           'join_date'=>$request->join_date,
           'manager'=>$request->manager,
        ]);

        return $save;
    } 

    public static function updateData($request){

        $update=Sales::where('id',$request->id)
                ->update([
                    'sales_id'=>$request->sales_id,
                    'sales_name'=>$request->sales_name,
                    'join_date'=>$request->join_date,
                    'manager'=>$request->manager,
                ]);

        return $update;
    }
}
