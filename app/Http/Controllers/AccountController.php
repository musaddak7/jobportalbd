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
       return view('front.account.profile');
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
}
