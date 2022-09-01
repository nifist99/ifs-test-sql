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

class BranchAssigntmentController extends Controller
{
    public function index(){
        $data['list']=BranchAssigntment::listData();
        $data['name']='Branch Assigntment';
        $data['link']='Branch Assigntment';
        return view('menu.branch-assigntment.index',$data);
    }

    public function create(){
        $data['name']='Branch Assigntment';
        $data['link']='Branch Assigntment';
        $data['branch'] = Branch::all();
        $data['sales']  = Sales::all();
        return view('menu.branch-assigntment.create',$data);
    }

    public function edit($id){
        $data['name']='Branch Assigntment';
        $data['link']='Branch Assigntment';
        $data['row']=BranchAssigntment::detailData(Crypt::decryptString($id));
        $data['branch'] = Branch::where('id','!=',$data['row']->branch_id)->get();
        $data['sales']  = Sales::where('id','!=',$data['row']->sales_id)->get();
        return view('menu.branch-assigntment.edit',$data);
    }

    public function detail($id){
        $data['name']='Branch Assigntment';
        $data['link']='Branch Assigntment';
        $data['row']=BranchAssigntment::find(Crypt::decryptString($id));
        return view('menu.branch-assigntment.detail',$data);
    }

    public function store(Request $request){
        $request->validate([
            'sales_id'      =>'required',
            'branch_id'     =>'required',
            'valid_from'    =>'required',
            'valid_to'      =>'required',
        ]);

        $check = BranchAssigntment::insertData($request);

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
            'branch_id'     =>'required',
            'valid_to'      =>'required',
        ]);

        $check = BranchAssigntment::updateData($request);

        if($check){
            return redirect()->back()->with('message','success update data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','danger');
        }
    }

    public function destroy($id){

        $delete = BranchAssigntment::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','succes delete data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','danger');
        }
    }
}
