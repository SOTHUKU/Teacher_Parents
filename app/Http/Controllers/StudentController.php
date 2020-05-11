<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;

use App\Homework;



use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function home(){
        return view('students.home');
    }
    public function index()
    {
$id=session('user')->id;
        $data =  Student::where('parentId',$id)->get();
        
       
       
      
       
        $students = [];
        foreach($data as $st){
            $st['homework'] = Homework::where('studentId',$st->id)->get();


            array_push($students,$st);
        }
        // return $data;
      

     
        return view('students.index',compact('students'))->with('i', (request()->input('page', 1) - 1) * 25);
    }

 
  

}