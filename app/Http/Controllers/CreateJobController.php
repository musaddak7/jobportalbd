<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Jobtype;
use App\Models\Job;

class CreateJobController extends Controller
{
    public function createjob(){
        $data=Category::orderBy('name','ASC')->where('status',1)->get();
        $jobtypes=Jobtype::orderBy('name','ASC')->where('status',1)->get();
        
        return view('createjob',[
            "categories"=>$data,
            "jobtypes"=>$jobtypes

        ]);
    }
    public function insertjob(Request $request){
         //insert data
         $job = new Job;
         $job->title = $request->input("title");
         $job->categories_id = $request->input("category");
         $job->jobtypes_id= $request->input("jobtype");
         $job->vacancy = $request->input("vacancy");
         $job->salary = $request->input("salary");
         $job->location = $request->input("location");
         $job->description = $request->input("escription");
         $job->benefits = $request->input("benefits");
         $job->responsibility = $request->input("responsibility");
         $job->qualifications = $request->input("qualifications");
         $job->keywords = $request->input("keywords");
         $job->experience = $request->input("experience");
         $job->company_name = $request->input("company_name");
         $job->company_location = $request->input("company_location");
         $job->company_website = $request->input("company_website");
         $job->company_website = $request->input("updated_at");
         $job->company_website = $request->input("created_at");
         $job->save();
 
         if($request){
             return back()->with('success', 'insert success');
         }else{
             return back()->with('fail', 'insert failed');
         }
    }
    
}
