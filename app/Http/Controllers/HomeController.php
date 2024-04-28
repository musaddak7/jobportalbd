<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Job;
use App\Models\GovJob;

class HomeController extends Controller
{
    public function index(){
         //this is experiment for gov job

        //  $GovernmentJob=GovernmentJob::all();
         
         //this is experiment end

        $newCategories=Category::where('status',1)->orderby('name','ASC')->get();


        $featuredJobs = Job::where('status',1)
                ->orderby('created_at','DESC')
                ->where('isFeatured',1)->take(8)->get();
                  //gov jobs show
                  $gov_jobs=GovJob::all();

                $data=Category::all();
                return view("front.home",[
                    'categories'=>$data,
                    'newCategories'=>$newCategories,
                    'featuredJobs'=>$featuredJobs,
                    'gov_jobs'=>$gov_jobs,
                
                ]);
              }

              public function gov_jobs($id){

                $gov_jobs = GovJob::where('id', $id)->first();
                return view("front.gov_jobs", ['gov_jobs' => $gov_jobs]);

                

              }
       
}