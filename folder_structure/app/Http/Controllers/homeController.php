<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index(){
        $data['title'] = "Create Folders and Files";
        return view('welcome',$data);
    }

    public function create(){

    
        //File::makeDirectory(public_path('uploads'), 0777, true);
    }
}
