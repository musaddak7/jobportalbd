<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funtionalcategorie;

class FuntionalcategorieController extends Controller
{
    function index(){
        $data=Funtionalcategorie::all();
        return view("index",['funcategories'=>$data]);
       

    }
}
