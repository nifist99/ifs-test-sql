<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\BranchAssigntment;
use App\Models\BranchCategory;
use App\Models\Branch;
use App\Models\Sales;
use App\Models\SalesTransaction;
use App\Models\Result;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    public function index(){
        $data['name']='Dashboard';
        $data['link']='Dashboard';
        return view('welcome',$data);
    }

    public function result(){
        $data['list']=Result::listData();
        $data['sales']=Result::listDataSales();
        $data['name']='Result';
        $data['link']='Result';
        return view('result',$data);
    }
}
