<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\JobType;
use App\Models\User;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\SavedJob;

class AccountController extends Controller
{
    //This method will show user registration  page
    public function registration(){
            return view('front.account.registration');
    }
     // This method will save a user
     function processRegistration(Request $req){
        // return $req->input();
        $req->validate([
         'name'=>'required',
         'password'=>'required'
        ]);
         $user = new User;
         $user->name = $req->name;
         $user->email  = $req->email;
         $user->password  = Hash :: make($req->password);
         $user->save();
         return redirect('/');
     }
   

    //This method will show user registration  page
    public function login(){
        return view('front.account.login');
        
    }
    public function authenticate(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validator->passes()){

            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                    return redirect()->route('account.profile');
             }else{
                    return redirect()->route('account.login')->with('error','Either Email/Password is Invalid');
               }

            
        }else{
            return redirect()->route('account.login')
            ->withInput($request->only('email'));
   
    }
    }
    public function profile(){
        $id=Auth::user()->id;
        $user=User::where('id',$id)->first();
       return view('front.account.profile',[
        'user'=>$user,

       ]);
    }
    //update profile
    public function updateProfile(Request $request) {

        $id = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,'.$id.',id'
        ]);


        if ($validator->passes()) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;
            $user->save();

            session()->flash('success','Profile updated successfully.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }


    //Create job post here Start
    public function createjob(){
        $data=Category::orderBy('name','ASC')->where('status',1)->get();
        $jobtypes=Jobtype::orderBy('name','ASC')->where('status',1)->get();
        
        return view('.front.account.job.createjob',[
            "categories"=>$data,
            "jobtypes"=>$jobtypes

        ]);
    }
    public function savejob(Request $request){
        //insert data
        $job = new Job;
        $job->title = $request->input("title");
        $job->categories_id = $request->input("category");
        $job->jobtypes_id= $request->input("jobtype");
        $job->vacancy = $request->input("vacancy");
        $job->salary = $request->input("salary");
        $job->location = $request->input("location");
        $job->description = $request->input("description");
        $job->benefits = $request->input("benefits");
        $job->responsibility = $request->input("responsibility");
        $job->qualifications = $request->input("qualifications");
        $job->keywords  = $request->input("keywords");
        $job->experience = $request->input("experience");
        $job->company_name = $request->input("company_name");
        $job->company_location = $request->input("company_location");
        $job->company_website = $request->input("company_website");
        $job->created_at = $request->input("updated_at");
        $job->updated_at = $request->input("created_at");
        $job->save();

        if($request){
            return back()->with('success', 'insert success');
        }else{
            return back()->with('fail', 'insert failed');
        }
    }

    
    //show all applied jobs
    public function myJobApplication(){
        $jobApplications=JobApplication::where('user_id',Auth::user()->id)
        ->with(['job','job.jobType'])
        ->orderBy('created_at','DESC')
        ->get();
       return view('front.account.job.my_jobs_applications',[
        'jobApplications'=>$jobApplications
       ]); 
    }
    public function removeJobs(Request $request){
        $removeJob = JobApplication::where([
                                    'id' => $request->id, 
                                    'user_id' => Auth::user()->id]
                                )->first();
        
        if ($removeJob == null) {
            session()->flash('error','Job not found');
            return response()->json([
                'status' => false,                
            ]);
        }

        JobApplication::find($request->id)->delete();
        session()->flash('success','Job removed successfully.');

        return response()->json([
            'status' => true,                
        ]);

    }

    //for show saved job
    public function savedJobs(){
        // $jobApplications=JobApplication::where('user_id',Auth::user()->id)
        // ->with(['job','job.jobType'])
        // ->orderBy('created_at','DESC')
        // ->get();
        $savedJobs=SavedJob::where([
            'user_id'=>Auth::user()->id
        ])
        ->with(['job','job.jobType'])
        ->paginate(10);
       return view('front.account.job.saved-jobs',[
        'savedJobs'=>$savedJobs
       ]); 

    }
    public function removeSavedJob(Request $request){
        $savedJob = SavedJob::where([
                                    'id' => $request->id, 
                                    'user_id' => Auth::user()->id]
                                )->first();
        
        if ($savedJob == null) {
            session()->flash('error','Job not found');
            return response()->json([
                'status' => false,                
            ]);
        }

        SavedJob::find($request->id)->delete();
        session()->flash('success','Job removed successfully.');

        return response()->json([
            'status' => true,                
        ]);

    }
}
