<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Job;

class HomeController extends Controller
{
    public function index(){

        $featuredJobs = Job::where('status',1)
                ->orderby('created_at','DESC')
                ->where('isFeatured',1)->take(8)->get();

                $data=Category::all();
                return view("front.home",[
                    'categories'=>$data,
                    'featuredJobs'=>$featuredJobs
                
                ]);
            
        }
    public function jobs(){
                return view('front.jobs');
        }
    public function jobdetails(){
                return view('front.jobdetails');
        }
}
