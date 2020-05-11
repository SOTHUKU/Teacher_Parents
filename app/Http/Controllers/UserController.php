<?php

namespace App\Http\Controllers;

use App\User;
use App\UserType;


use Illuminate\Http\Request;
use Session; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        return view('users.login');
    }
    public function home(){
        return view('users.home');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $UserTypes = UserType::all();
        // return $UserTypes;

        return view('users.create')->with(['UserTypes' => $UserTypes]);
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
            'email' => 'required',
            'accountId' => 'required',
            'password' => 'required',
            
            ]);

            $users=User::all();
            foreach ( $users as $u ) {
                if ( $u->email == $request->email ) {
                    $msg = "Email already Exists.";
              
                            return redirect()->route('users.create')
                            ->withErrors($msg);
                }
                
            }          
        User::create($request->all());


        return redirect()->route('users.index')
                        ->with('success','User Registered successfully.');
    }
    public function logout(Request $request)
    {
        // Auth::logout();
        Session::flush();
        return redirect()->route('users.index')
                        ->with('success','User Loged out successfully.'); 
    }


    public function login(Request $request)
    {
        // return $request->email;
        request()->validate([
            // 'profilePicture'=>'required',
            'email' => 'required',           
            'password' => 'required',
            
            ]);

            $users=User::all();
            $found=true;
           
            foreach ( $users as $u ) {
                if ( ($u->email == $request->email) && ($u->password==$request->password) ) {
                    $loggedUser=$u;
                    $UserType=UserType::find( $loggedUser->UserTypeId);  
                    $role= $UserType->name;   
                    $found=true;              
                    
                    Session::put('role', $role);
                    Session::put('user', $u);
                    Session::put('loggedIn', true);
                    return view('users.home');

                }
                else{
                    $found=false;
                

                }
                
                
                
            }  
            if(!$found)    {
                  $msg = "Incorrect email or password!.";
              
                    return redirect()->route('users.index')
                    ->withErrors($msg);
            }    
        
    }



}