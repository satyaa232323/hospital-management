<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;


class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype == '0'){


                $doctors = Doctor::all();
         return view('user.home', compact('doctors'));
            }
            else{
                return view('admin.home');
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function index(){
        $doctors = Doctor::all();

        if(Auth::id ()){
            return redirect('home');
        }
        else{
        return view('user.home', compact('doctors'));

        }
    }

    public function appointment(Request $request){


        $appointment = new Appointments();

        $appointment->name= $request->name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->phone = $request->number;
        $appointment->message = $request->message;
        $appointment->doctor = $request->doctor;
        $appointment->status = "In Progress";
        if(Auth::id ()){

        $appointment->user_id = Auth::user()->id;

        }

        $appointment->save();

        return redirect()->back()->with('message', 'Your appointment has been booked. We will contact you soon');
    }

    public function myAppointment(){

        if(Auth::id ()){

            $userid = Auth::user()->id;
            $appoint = Appointments::where('user_id', $userid)->get();
            return view('user.my_appointment', compact('appoint'));
        }

        else{
            return redirect()->back();
        }
    }

    public function cancel_appoint($id){

        $data=Appointments::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Your appointment has been cancelled');
    }


}
