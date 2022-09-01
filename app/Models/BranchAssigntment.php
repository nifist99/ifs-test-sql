<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchAssigntment extends Model
{
    use HasFactory;
    protected $table = 'branch_assignment';
    protected $fillable = [
        'sales_id',
        'branch_id',
        'valid_from',
        'valid_to',
    ];

    public static function listData(){
        $check = BranchAssigntment::join('branch','branch_assignment.branch_id','=','branch.id')
                ->join('sales','branch_assignment.sales_id','=','sales.id')
                ->orderBy('branch_assignment.id','desc')
                ->select('branch_assignment.*','branch.branch_id as branch'
                        ,'sales.sales_id as sales','branch.branch_name','sales.sales_name')
                ->paginate(10);
        
        return $check;
    }

    public static function insertData($request){

        $save = BranchAssigntment::create([
           'sales_id'=>$request->sales_id,
           'branch_id'=>$request->branch_id,
           'valid_from'=>$request->valid_from,
           'valid_to'=>$request->valid_to,
        ]);

        return $save;
    } 

    public static function updateData($request){

        $update=BranchAssigntment::where('id',$request->id)
                ->update([
                    'sales_id'=>$request->sales_id,
                    'branch_id'=>$request->branch_id,
                    'valid_from'=>$request->valid_from,
                    'valid_to'=>$request->valid_to,
                ]);

        return $update;
    }

    public static function detailData(){
        $check = BranchAssigntment::join('branch','branch_assignment.branch_id','=','branch.id')
                ->join('sales','branch_assignment.sales_id','=','sales.id')
                ->select('branch_assignment.*','branch.branch_id as branch','sales.sales_id as sales')
                ->first();
        
        return $check;
    }
}
