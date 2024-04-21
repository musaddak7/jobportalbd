<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Jobtype;
use App\Models\Category;
use App\Models\JobApplication;
use App\Models\SavedJob;
use Illuminate\Support\Facades\Auth;    

class JobsController extends Controller
{
    //this will show job page
    public function index(Request $request){
    $categories=Category::where('status',1)->get();
    $jobtypes=Jobtype::where('status',1)->get();
    $jobs=Job::Where('status',1);
    //search using keyword
    if (!empty($request->keyword)){
        $jobs=$jobs->where (function($query) use($request){
            $query->orwhere('title','like','%'.$request->keyword.'%');
            $query->orwhere('keywords','like','%'.$request->keyword.'%');
        });
    }

    //search by location
    if (!empty($request->location)){
        $jobs=$jobs->where('location',$request->location);
    }
    //search by categories
    if (!empty($request->category)){
        $jobs=$jobs->where('categories_id',$request->category);
    }
     // Search using Job Type
     if(!empty($request->jobtype)) {
        $jobTypeArray = explode(',',$request->jobtype);

        $jobs = $jobs->whereIn('jobtypes_id',$jobTypeArray);
    }
      // Search using experience
      if(!empty($request->experience)) {
        $jobs = $jobs->where('experience',$request->experience);
    }


    $jobs=$jobs->with('jobType')->orderby('created_at','DESC')->paginate(9);
       // Check if no jobs found
    if ($jobs->isEmpty()) {
        // Handle the case where no jobs are found, for example:
        return ('No Data Found');
     
    }  
    return view('front.jobs',[
            'categories'=>$categories,
            'jobtypes'=>$jobtypes,
            'jobs'=>$jobs,
        ]);
    }
    //this function will show job detail page
    public function detail($id){
        $job=Job::where (['id'=>$id,
        'status'=>1
        ])->with(['jobType'])->first();
        if($job==null){
            abort(404);

        }else{ return view("front.jobdetail",['job'=>$job]); }
        
    }
    //this is for apply job
    public function applyJob(Request $request){
        $id = $request->id;
        $job=Job::where('id',$id)->first();
        //if job not found in db
        if($job==null){
            session()->flash('error',"job does not exist");
            return response()->json([
                "status" => false,
                'message' => 'Job does not exist'
            ]);

        }
        //You can not apply on your own job
        $employer_id = $job->user_id;
        if($employer_id == Auth::user()->id){
            session()->flash('error',"You can not apply on your own job");
            return response()->json([
                "status" => false,
                'message' => 'You can not apply on your own job'
            ]);
        }
        //You can not apply a job twise
        $jobApplicationCount= JobApplication::where([
            'user_id'=>Auth::user()->id,
            'job_id'=> $id
        ])->count();
        if($jobApplicationCount > 0){
            session()->flash('error',"You can not apply a job twise");
            return response()->json([
                "status" => false,
                'message' => 'You can not apply a job twise'
            ]);

        }

        $application = new JobApplication();
        $application -> job_id = $id;
        $application -> user_id = Auth::user()->id;
        $application -> employer_id = $employer_id;
        $application -> appliyed_date = now();
        $application -> save();

        $message = "You have successfully applied";
        session()->flash('succes',"You have successfully applied");
        return response()->json([
            "status" => true,
            'message' => $message
        ]);


    }
    public function saveJob(Request $request){
        $id = $request->id;

        $job = Job::find($id);
        if($job == null){
            session()->flash('error','job not found');
            return response()->json([
                'status'=>false,
            ]);

        }
        //check if user alreaady saved the job
        $count = SavedJob::where([
            'user_id'=>Auth::user()->id,
            'job_id'=>$id
            ])->count();

            if($count>0) {
             session()->flash('error','job not saved');
            return response()->json([
                'status'=>false,
            ]);
        }
        $saveJob =new SavedJob;
        $saveJob->job_id=$id;
        $saveJob->user_id=Auth::user()->id;
        $saveJob->save();
        session()->flash('success','you have successfully applied the job');
        return response()->json([
            'status'=>false,
        ]);
        
    }

}
