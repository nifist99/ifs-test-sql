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

class BranchCategoryController extends Controller
{
    public function index(){
        $data['list']=BranchCategory::listData();
        $data['name']='Branch Category';
        $data['link']='Branch Category';
        return view('menu.branch-category.index',$data);
    }

    public function create(){
        $data['name']='Branch Category';
        $data['link']='Branch Category';
        return view('menu.branch-category.create',$data);
    }

    public function edit($id){
        $data['name']='Branch Category';
        $data['link']='Branch Category';
        $data['row']=BranchCategory::find(Crypt::decryptString($id));
        return view('menu.branch-category.edit',$data);
    }

    public function detail($id){
        $data['name']='Branch Category';
        $data['link']='Branch Category';
        $data['row']=BranchCategory::find(Crypt::decryptString($id));
        return view('menu.branch-category.detail',$data);
    }

    public function store(Request $request){
        $request->validate([
            'name'        =>'required|unique:branch_category,name',
        ]);

        $check = BranchCategory::insertData($request);

        if($check){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','danger');
        }
    }

    public function update(Request $request){
        $request->validate([
            'id'            =>'required',
            'name'          =>'required',
        ]);

        $get = BranchCategory::find($request->id);

        if($get->name == $request->name){
            $check = BranchCategory::updateData($request);
        }else{
            $request->validate([
                'id'            =>'required',
                'name'          =>'required',
            ]);

            $check = BranchCategory::updateData($request);
        }

       

        if($check){
            return redirect()->back()->with('message','success update data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','danger');
        }
    }

    public function destroy($id){

        $delete = BranchCategory::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','succes delete data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','danger');
        }
    }
}
