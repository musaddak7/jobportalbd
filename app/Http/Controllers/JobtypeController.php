<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobtype;

class JobtypeController extends Controller
{
    public function jobtype(){
        $data=Jobtype::orderBy('name','ASC')->where('status',1)->get();
        return view('createjob',["jobtype"=>$data]);
    }
}
