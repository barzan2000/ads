<?php

namespace App\Http\Controllers;

use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Models\appointment;
use Illuminate\Support\Facades\Auth;
use Notification;




class AdminController extends Controller
{
    public function addview()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');
            }
            else
            {
            return redirect()->back();
            }

        }
        else
        {
            return redirect('login');
        }


    }

    public function upload(Request $request)
    {
        $doctor=new doctor;
        //
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalName();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        //
        $doctor->name=$request->name;
        $doctor->number=$request->number;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfully');

    }

    public function showAppointments()
    {

        if (Auth::id())
        {
           if (Auth::user()->usertype==1)
           {
               $data=appointment::all();
               return view('admin.showAppointments',compact('data'));

           }
           else
           {
           return redirect()->back();
           }
        }
        else
        {
        return redirect('login');
        }

       }

    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }
    public function cancelled($id)
    {
        $data=appointment::find($id);
        $data->status='cancelled';
        $data->save();
        return redirect()->back();
    }

    public function showDoctor()
    {
        $data=doctor::all();

        return view('admin.showDoctor',compact('data'));
    }

    public function deleteDoctor($id)
    {
        $data=doctor::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function updateDoctor($id)
    {
        $data=doctor::find($id);
        return view('admin.updateDoctor',compact('data'));
    }

    public function editDoctor(Request $request,$id)
    {
        $doctor=doctor::find($id);
        $doctor->name=$request->name;
        $doctor->number=$request->number;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $image=$request->file;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalName();

            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;

        }

        $doctor->save();
        return redirect()->back()->with('message','Doctors Information has been Updated Successfully');
    }

    public function emailview($id)
    {
        $data=appointment::find($id);

        return view('admin.email_view',compact('data'));
    }

    public function sendemail(Request $request,$id)
    {
       $data=appointment::find($id);

       $details=[
           'greeting'=>$request->greeting,
           'body'=>$request->body,
        'actiontext'=>$request->actiontext,
        'actionurl'=>$request->actionurl,
           'endpart'=>$request->endpart

       ];

       Notification::send($data,new SendEmailNotification($details));

       return redirect()->back()->with('message','Email has been sent');

    }
}
