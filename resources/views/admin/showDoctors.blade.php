@extends('layouts.admin')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bordered table</h4>
        <p class="card-description"> Add class <code>.table-bordered</code>
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Doctor Name</th>
                <th>Phone</th>
                <th>Speciality</th>
                <th>Room no</th>
                <th>image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $doctor )
                <tr>
                  <td>{{$doctor->name}}</td>
                  <td>{{$doctor->phone}}</td>
                  <td>{{$doctor->speciality}}</td>
                  <td>{{$doctor->room}}</td>
                  <td><img src="doctorimage/{{$doctor->image}}" alt="" width="90%"  srcset=""></td>
                  <td>
                    <a onclick="return confirm('Are you Sure Delete Doctor Data?') href="{{ url('delete_doctor', $doctor->id)}}" class="btn-danger rounded-xl p-2">Delete</a>
                    <a href="{{ url('update_doctor/', $doctor->id)}}" class="btn-warning rounded-xl p-2">Update Doctor</a>
                </td>
                </tr>
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
