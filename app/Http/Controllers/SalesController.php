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

class SalesController extends Controller
{
    public function index(){
        $data['list']=Sales::listData();
        $data['name']='Sales';
        $data['link']='Sales';
        return view('menu.sales.index',$data);
    }

    public function create(){
        $data['name']='Sales';
        $data['link']='Sales';
        return view('menu.sales.create',$data);
    }

    public function edit($id){
        $data['name']='Sales';
        $data['link']='Sales';
        $data['row']=Sales::find(Crypt::decryptString($id));
        
        return view('menu.sales.edit',$data);
    }

    public function detail($id){
        $data['name']='Sales';
        $data['link']='Sales';
        $data['row']=Sales::find(Crypt::decryptString($id));
        return view('menu.sales.detail',$data);
    }

    public function store(Request $request){
        $request->validate([
            'sales_id'        =>'required|unique:sales,sales_id',
            'sales_name'      =>'required',
            'join_date'       =>'required',
            'manager'         =>'required',
        ]);

        $check = Sales::insertData($request);

        if($check){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','danger');
        }
    }

    public function update(Request $request){
        $request->validate([
            'id'              =>'required',
            'sales_id'        =>'required',
            'sales_name'      =>'required',
            'join_date'       =>'required',
            'manager'         =>'required',
        ]);

        $get = Sales::find($request->id);

        if($request->sales_id==$get->sales_id){

            $check = Sales::updateData($request);
        }else{
            $request->validate([
                'id'              =>'required',
                'sales_id'        =>'required|unique:sales,sales_id',
                'sales_name'      =>'required',
                'join_date'       =>'required',
                'manager'         =>'required',
            ]);

            $check = Sales::updateData($request);
        }

        if($check){
            return redirect()->back()->with('message','success update data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','danger');
        }
    }

    public function destroy($id){

        $delete = Sales::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','succes delete data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','danger');
        }
    }
}
