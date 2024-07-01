@extends('layouts.admin')


@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Appointments</h4>
        <p class="card-description"></code>
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Customer name Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Doctor name</th>
                <th>Date</th>
                <th>message</th>
                <th>status</th>
                <th>Aproved</th>
                <th>Cancel</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($data as $appoint )
                <tr>
                  <td>{{$appoint->name}}</td>
                  <td>{{$appoint->email}}</td>
                  <td>{{$appoint->phone}}</td>
                  <td>{{$appoint->doctor}}</td>
                  <td>{{ $appoint->date }}</td>
                  <td>{{ $appoint->message }}</td>
                  <td>{{$appoint->status}}</td>
                  <td>
                    <a href="{{ url('approved', $appoint->id) }}" class="btn-success rounded-md p-2">Approved</a>
                  </td>
                  <td>
                    <a href="{{ url('canceled', $appoint->id) }}" class="btn-danger rounded-md p-2">Canceled</a>
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
