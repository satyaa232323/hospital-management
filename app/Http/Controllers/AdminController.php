<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview(){

        return view('admin.add_doctor');
    }

    public function upload_doctor(Request $request){

        $doctor = new Doctor();

        $image= $request->file;

        $imagename = time(). '.' .$image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);

        $doctor->image=$imagename;
        $doctor->name = $request->doctor;
        $doctor->phone = $request->number;
        $doctor->Speciality = $request->speciality;
        $doctor->room = $request->room;

        $doctor->save();

        return redirect()->back()->with('message', 'doctor add success');


    }

public function showappointment(){

    $data = Appointments::all();
    return view('admin.showappointment', compact('data'));


}

public function approved($id){
    $data = Appointments::find($id);
    $data->status = 'approved';
    $data->save();
    return redirect()->back();
}

public function canceled($id){
    $data = Appointments::find($id);
    $data->status = 'canceled';
    $data->save();
    return redirect()->back();
}


public function showdoctors(){

    $data = Doctor::all();
    return view('admin.showDoctors', compact('data'));
}


public function delete_doctor($id){
    $data = Doctor::find($id);
    $data->delete();
    return redirect()->back();
}

public function update_doctor($id){

    $data = doctor::find($id);

    return view('admin.updateDoctor', compact('data'));
}

public function update(Request $request, $id){
    $doctors =Doctor::find($id);

    $doctors->name = $request->doctor;
    $doctors->phone = $request->number;
    $doctors->Speciality = $request->speciality;
    $doctors->room = $request->room;
    $image = $request->file();

    $imagename = time(). '.' .$image->getClientoriginalExtension();
    $request->file->move('doctorimage', $imagename);

    $doctors->image = $imagename;

    $doctors->save();


    return redirect()->back()->with('message', 'doctor update success');


}
}
