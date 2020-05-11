<?php

namespace App\Http\Controllers;

use App\Parents;

use App\User;
use App\Student;
use App\Message;






use Illuminate\Http\Request;

class ParentsController extends Controller
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
        return view('parents.home');

    }
    public function index()
    {
        $data = Parents::all();
        $parents = [];
        foreach($data as $pa){
           
            $pa['user'] = User::find($pa->userId);
            $pa['student'] = Student::find($pa->studentId);


            array_push($parents,$pa);
        }
        // return $parents;
        return view('parents.index',compact('parents'))->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $users = User::all();

        $students = Student::all();

        return view('parents.create')->with(['users' => $users,  'students' => $students]);
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
            'userId' => 'required',
           
            'studentId' => 'required',
            'title' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required',
            'address'=> 'required',
            'postCode'=> 'required',
            'area'=> 'required'


            ]);


        Parents::create($request->all());


        return redirect()->route('parents.index')
                        ->with('success','Parent added created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function show(parents $parents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function edit(parents $parent)
    {
        $users = User::all();
       

        $students = Student::all();

        return view('parents.edit',compact('parent'))->with(['users' => $users,  'students' => $students]);
       
    }

    public function chat(parents $parent)
    {
        $parents = Parents::all();
        $messages=[];
        $user=null;
       

        return view('parents.chat',compact('parents'))->with('messages',$messages)->with('user',$user);
       
    }
    public function getMessages($id){

        $parents = Parents::all();
        $myId=session('user')->id;
        $user=Parents::find($id);

        // return 'user'.$user;
        $messages=Message::where('userId',$myId)->where('recepient',$id)->get();
       
// return $messages;
        return view('parents.chat',compact('parents'))->with('messages',$messages)->with('user',$user);
        
    }

    public function sendMessage(Request $request,$id){
        $request['recepient']=$id;
        $myId=session('user')->id;
        $request['userId']=$myId;
        

        Message::create($request->all());    

        $parents = Parents::all();
        $myId=session('user')->id;
        $user=Parents::find($id);
        $messages=Message::where('userId',$myId)->where('recepient',$id)->get();
       
// return $messages;
        return view('parents.chat',compact('parents'))->with('messages',$messages)->with('user',$user);;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, parents $parent)
    {
        request()->validate([
            // 'profilePicture'=>'required',
            'userId' => 'required',
           
            'studentId' => 'required',
            'title' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required',
            'address'=> 'required',
            'postCode'=> 'required',
            'area'=> 'required'
            ]);


        $parent->update($request->all());


        return redirect()->route('parents.index')
                        ->with('success','Parent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parents  $parents
     * @return \Illuminate\Http\Response
     */
    public function destroy(parents $parent)
    {
        $parent->delete();


        return redirect()->route('parents.index')
                        ->with('success','Parent deleted successfully');
    }
}