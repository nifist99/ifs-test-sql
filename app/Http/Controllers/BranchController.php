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

class BranchController extends Controller
{
    public function index(){
        $data['list']=Branch::listData();
        $data['name']='Branch';
        $data['link']='Branch';
        return view('menu.branch.index',$data);
    }

    public function create(){
        $data['name']='Branch';
        $data['link']='Branch';
        $data['category']=BranchCategory::all();
        return view('menu.branch.create',$data);
    }

    public function edit($id){
        $data['name']='Branch';
        $data['link']='Branch';
        $data['row']=Branch::detailData(Crypt::decryptString($id));
        $data['category']=BranchCategory::where('id','!=',$data['row']->branch_category)->get();
        return view('menu.branch.edit',$data);
    }

    public function detail($id){
        $data['name']='Branch';
        $data['link']='Branch';
        $data['row']=Branch::find(Crypt::decryptString($id));
        return view('menu.branch.detail',$data);
    }

    public function store(Request $request){
        $request->validate([
            'branch_id'        =>'required|unique:branch,branch_id',
            'branch_name'      =>'required',
            'branch_category'  =>'required',
        ]);

        $check = Branch::insertData($request);

        if($check){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','danger');
        }
    }

    public function update(Request $request){
        $request->validate([
            'id'            =>'required',
            'branch_id'        =>'required',
            'branch_name'      =>'required',
            'branch_category'  =>'required',
        ]);

        $get = Branch::find($request->id);

        if($request->branch_id==$get->branch_id){

            $check = Branch::updateData($request);
        }else{
            $request->validate([
                'id'              =>'required',
                'branch_id'        =>'required|unique:branch,branch_id',
                'branch_name'      =>'required',
                'branch_category'  =>'required',
            ]);

            $check = Branch::updateData($request);
        }

        if($check){
            return redirect()->back()->with('message','success update data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','danger');
        }
    }

    public function destroy($id){

        $delete = Branch::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','succes delete data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','danger');
        }
    }
}
