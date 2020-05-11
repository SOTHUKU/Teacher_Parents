<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
        $teachers = Teacher::all();
        return view('teachers.index',compact('teachers'))->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
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
            'name' => 'required',
           
            'dob' => 'required',
           'phoneNumber'=>'required',
            'address' => 'required',
            'postCode' => 'required',
            'area' => 'required' ,
            'position' => 'required' ]);
        

        Teacher::create($request->all());


        return redirect()->route('teachers.index')
                        ->with('success','Teacher created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $Teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        request()->validate([
            'name' => 'required',
           
            'dob' => 'required',
           'phoneNumber'=>'required',
            'address' => 'required',
            'postCode' => 'required',
            'area' => 'required' ]);


        $teacher->update($request->all());


        return redirect()->route('teachers.index')
                        ->with('success','Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();


        return redirect()->route('teachers.index')
                        ->with('success','Teacher deleted successfully');
    }
}