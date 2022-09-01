<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branch';

    protected $fillable = [
        'branch_id',
        'branch_name',
        'branch_category',
    ];

    public static function listData(){
        $check = Branch::join('branch_category','branch.branch_category','=','branch_category.id')
                ->orderBy('branch.id','desc')
                ->select('branch.*','branch_category.name as category')
                ->paginate(10);
        
        return $check;
    }

    public static function insertData($request){

        $save = Branch::create([
           'branch_id'=>$request->branch_id,
           'branch_name'=>$request->branch_name,
           'branch_category'=>$request->branch_category,
        ]);

        return $save;
    } 

    public static function updateData($request){

        $update=Branch::where('id',$request->id)
                ->update([
                    'branch_id'=>$request->branch_id,
                    'branch_name'=>$request->branch_name,
                    'branch_category'=>$request->branch_category,
                ]);

        return $update;
    }

    public static function detailData($id){
        $check = Branch::join('branch_category','branch.branch_category','=','branch_category.id')
                ->where('branch.id',$id)
                ->select('branch.*','branch_category.name as category')
                ->first();

        return $check;
    }
        
        
}
