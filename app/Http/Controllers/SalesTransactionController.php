<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\BranchAssigntment;
use App\Models\BranchCategory;
use App\Models\Branch;
use App\Models\Sales;
use App\Models\SalesTransaction;
use Illuminate\Support\Facades\Crypt;

class SalesTransactionController extends Controller
{
    public function index(){
        $data['list']=SalesTransaction::listData();
        $data['sum']=SalesTransaction::sumSales();
        $data['max']=SalesTransaction::sumMax();
        $data['month']=SalesTransaction::sumMaxMonth();

        $data['name']='Sales Transaction';
        $data['link']='Sales Transaction';
        return view('menu.sales-transaction.index',$data);
    }

    public function create(){
        $data['name']='Sales Transaction';
        $data['link']='Sales Transaction';
        $data['sales']  = Sales::all();
        return view('menu.sales-transaction.create',$data);
    }

    public function edit($id){
        $data['name']='Sales Transaction';
        $data['link']='Sales Transaction';
        $data['row']=SalesTransaction::detailData(Crypt::decryptString($id));
        $data['sales']  = Sales::where('id','!=',$data['row']->sales_id)->get();
        return view('menu.sales-transaction.edit',$data);
    }

    public function detail($id){
        $data['name']='Sales Transaction';
        $data['link']='Sales Transaction';
        $data['row']=SalesTransaction::find(Crypt::decryptString($id));
        return view('menu.sales-transaction.detail',$data);
    }

    public function store(Request $request){
        $request->validate([
            'sales_id'      =>'required',
            'sales_amount'  =>'required',
            'sales_date'    =>'required',
        ]);

        $check = SalesTransaction::insertData($request);

        if($check){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','danger');
        }
    }

    public function update(Request $request){
        $request->validate([
            'id'            =>'required',
            'sales_id'      =>'required',
            'sales_amount'  =>'required',
            'sales_date'    =>'required',
        ]);

        $check = SalesTransaction::updateData($request);

        if($check){
            return redirect()->back()->with('message','success update data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','danger');
        }
    }

    public function destroy($id){

        $delete = SalesTransaction::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','succes delete data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','danger');
        }
    }
}
