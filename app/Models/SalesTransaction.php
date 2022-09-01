<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BranchAssigntment;
use App\Models\BranchCategory;
use App\Models\Branch;
use App\Models\Sales;

use DB;


class SalesTransaction extends Model
{
    use HasFactory;
    protected $table = 'sales_transaction';
    protected $fillable = [
        'sales_id',
        'sales_amount',
        'sales_date',
    ];

    public static function listData(){
        $check = SalesTransaction::join('sales','sales_transaction.sales_id','=','sales.id')
                ->orderBy('sales_transaction.id','desc')
                ->select('sales_transaction.*','sales.sales_id as sales')
                ->paginate(50);

        return $check;
    }

    public static function sumSales(){
        $sales = Sales::all();

        $data=[];
        foreach($sales as $key){
            $list['sales_name'] = $key->sales_name;
            $list['sales_id']   = $key->sales_id;
            $list['amount'] = SalesTransaction::where('sales_id',$key->id)->sum('sales_amount');
            array_push($data,$list);
        }

        return $data;

    }

    public static function sumMax(){
        return SalesTransaction::join('sales','sales_transaction.sales_id','=','sales.id')
        ->orderBy('sales_transaction.sales_amount','desc')
        ->select('sales_transaction.*','sales.sales_id as sales','sales.sales_name as sales_name')
        ->limit(1)->get()->toArray();
    }

    public static function sumMaxMonth(){
        $date = SalesTransaction::pluck('sales_date');


        $uniqe = array_unique($date->toArray());

        $data=[];
        foreach($uniqe as $key => $val){
            $date=date_create($val);
            $result = date_format($date,"m");
            $list['amount'] = SalesTransaction::join('sales','sales_transaction.sales_id','=','sales.id')
                    ->whereMonth('sales_transaction.sales_date',$result)
                    ->select('sales_transaction.*','sales.sales_id as sales','sales.sales_name as sales_name')
                    ->max('sales_transaction.sales_amount');
                   $check= SalesTransaction::join('sales','sales_transaction.sales_id','=','sales.id')
                        ->whereMonth('sales_transaction.sales_date',$result)
                        ->where('sales_transaction.sales_amount',$list['amount'])
                        ->select('sales_transaction.*','sales.sales_id as sales','sales.sales_name as sales_name')
                        ->first();
            $list['name']=$check->sales_name;
            $list['sales_id']=$check->sales;
            $list['date']    = $val;

            array_push($data,$list);

            
        }

        return $data;
    }

    public static function insertData($request){

        $save = SalesTransaction::create([
           'sales_id'=>$request->sales_id,
           'sales_amount'=>$request->sales_amount,
           'sales_date'=>$request->sales_date,
        ]);

        return $save;
    } 

    public static function updateData($request){

        $update=SalesTransaction::where('id',$request->id)
                ->update([
                    'sales_id'=>$request->sales_id,
                    'sales_amount'=>$request->sales_amount,
                    'sales_date'=>$request->sales_date,
                ]);

        return $update;
    }

    public static function detailData($id){
        $check = SalesTransaction::join('sales','sales_transaction.sales_id','=','sales.id')
                ->where('sales_transaction.id',$id)
                ->orderBy('sales_transaction.id','desc')
                ->select('sales_transaction.*','sales.sales_id as sales')
                ->first();

        return $check;
    }
}
