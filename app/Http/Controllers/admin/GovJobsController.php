<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GovJob;

class GovJobsController extends Controller
{
    //
    public function gov_jobs_list(){
        $gov_jobs_lists= GovJob::all();
        return view('admin.gov.gov_jobs_lists',[
            'gov_jobs_lists' => $gov_jobs_lists
        ]);
    }
    public function gov_job_edit($id){
        $gov_jobs_lists = GovJob::findOrFail($id);
        return view('admin.gov.gov_jobs_edit',[
            'gov_jobs_list'=>$gov_jobs_lists
        ]);
    }
    //upload image
    public function gov_job_upload(Request $request){
       // Handle file upload
        $gov= new GovJob();
        $gov->title=$request->input('title');
        $gov->position=$request->input('position');
        $gov->image=$request->file('file')->getClientOriginalName();
        $request->file('file')->move('uploads/',$gov->image);
        $gov->source=$request->input('source');
        $gov->save();
        return redirect()->back();
    }
}