<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\myAppointment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor=doctor::all();
                return view('user.home',compact('doctor'));
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }



    }

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::id())
    {
        return redirect('home');
    }
        else
        {
            $doctor=doctor::all();

            return view('user.home',compact('doctor'));
        }

    }

    public function appointment(Request $request)
    {
        $data= new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->doctor=$request->doctor;

        $data->status='in progress';

        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Request Successful. We will inform and have contact with you soon');
    }

    public function myAppointment()
    {

        if (Auth::id())
        {
            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get();
            return view('user.my_Appointment',compact('appoint'));
            return redirect()->back();
        }

    }

    public function cancel_appoint($id)
    {
        $data=appointment::find($id);

        $data->delete();

        return redirect()->back();
    }

}
