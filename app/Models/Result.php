<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BranchAssigntment;
use App\Models\BranchCategory;
use App\Models\Branch;
use App\Models\Sales;
use App\Models\SalesTransaction;
use App\Models\Result;
use DB;
class Result extends Model
{
    use HasFactory;

    public static function listData(){
        $check = BranchAssigntment::join('branch','branch_assignment.branch_id','=','branch.id')
                ->leftJoin('branch_category','branch.branch_category','=','branch_category.id')
                ->join('sales','branch_assignment.sales_id','=','sales.id')
                ->orderBy('branch_assignment.id','desc')
                ->select('branch_assignment.*','branch.branch_id as branch'
                        ,'sales.sales_id as sales','branch.branch_name','sales.sales_name','branch_category.name as branch_category')
                ->paginate(10);
        
        return $check;
    }

    public static function listDataSales(){
        $check = Sales::orderBy('sales.id','desc')
                ->paginate(10);
        
        return $check;
    }

    public static function soal4(){
        $check = Sales::where('id',1)->first();

        return $check;
    }

    public static function soal5(){
        $check = Sales::where('id',2)->get();

        return $check;
    }

    public static function soal6(){
        $check = Branch::where('branch_id','P00%')->get();

        return $check;
    }

    public static function soal7(){
        $check = Branch::where('branch_id','like','P00%')->get();

        return $check;
    }
}
