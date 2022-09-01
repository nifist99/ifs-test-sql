<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchCategory extends Model
{
    use HasFactory;
    protected $table = 'branch_category';
    protected $fillable = [
        'name',
    ];

    public static function listData(){
        $check = BranchCategory::orderBy('branch_category.id','desc')
                ->paginate(10);
        
        return $check;
    }


    public static function insertData($request){

        $save = BranchCategory::create([
           'name'=>$request->name,
        ]);

        return $save;
    } 

    public static function updateData($request){

        $update=BranchCategory::where('id',$request->id)
                ->update([
                    'name'=>$request->name,
                ]);

        return $update;
    }
}
