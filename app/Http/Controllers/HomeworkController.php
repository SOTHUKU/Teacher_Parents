<?php

namespace App\Http\Controllers;

use App\Homework;
use App\Course;
use App\Teacher;
use App\Student;




use Illuminate\Http\Request;

class HomeworkController extends Controller
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
    public function index()
    {
        $id=session('user')->id;
        $data = Homework::all();
        $homeworks = [];
        foreach($data as $hw){
            $hw['course'] = Course::find($hw->courseId);
            $hw['teacher'] = Teacher::find($hw->teacherId);
            $hw['student'] = Student::find($hw->studentId);


            array_push($homeworks,$hw);
        }
        return view('homeworks.index',compact('homeworks'))->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $teachers = Teacher::all();

        $students = Student::all();

        return view('homeworks.create')->with(['courses' => $courses,  'teachers' => $teachers,'students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            // 'profilePicture'=>'required',
            'courseId' => 'required',
            'teacherId' => 'required',
            'studentId' => 'required',
            'title' => 'required',
            'description' => 'required',
            ]);


        Homework::create($request->all());


        return redirect()->route('homeworks.index')
                        ->with('success','Home Work created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Homework  $Homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $Homework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Homework  $Homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        $courses = Course::all();
        $teachers = Teacher::all();

        $students = Student::all();

        return view('homeworks.edit',compact('homework'))->with(['courses' => $courses,  'teachers' => $teachers,'students' => $students]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Homework  $Homework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homework $homework)
    {
        request()->validate([
            // 'profilePicture'=>'required',
            'courseId' => 'required',
            'teacherId' => 'required',
            'studentId' => 'required',
            'title' => 'required',
            'description' => 'required',
            ]);


        $homework->update($request->all());


        return redirect()->route('homeworks.index')
                        ->with('success','Home Work updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Homework  $Homework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homework $homework)
    {
        $homework->delete();


        return redirect()->route('homeworks.index')
                        ->with('success','Home Work deleted successfully');
    }
}