<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index(){
        $directories = array_map('basename', File::directories(public_path('custome')));
        
        $storage = File::allFiles(public_path('custome'));
        $data = array(
            'title' => 'All files',
            'files' => $directories
        );
   
        return view('welcome',$data);
    }

     public function getFiles(Request $request){
        $name = $request->name;
        $storage = File::allFiles(public_path('custome/'.$name));
        $files = array();
        foreach ($storage as $file) {
            $files[] = $file->getFilename();
        }
        $data = array(
            'title' => 'All files',
            'files' => $files
        );
    
        return json_encode($data);
    }

    public function create(Request $request){
        $name = $request->name;
        File::makeDirectory(public_path('custome/'.$name), 0777, true);
        return $request->name;
    }

    public function createFile(Request $request){
        $file_name = $request->file_name;
        $folder_name = $request->folder_name;
        $path = public_path('custome/'.$folder_name);
        $contents = "Hello this is new file";

        File::put($path.'/'.$file_name,$contents);
        
        return $request->file_name."   FOlder:- ".$request->folder_name;
    }
}
