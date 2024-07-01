@extends('layouts.user')

@section('content_user')

<div class="row">
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
                  <th>Date</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($appoint as $appoints )

                <tr>
                  <td>{{ $appoints->doctor }}</td>
                  <td>{{ $appoints->date }}</td>
                  <td>{{$appoints->status}}</td>
                  <td>{{ $appoints->message }}</td>
                  <td><a href="{{ url('cancel_appoint', $appoints->id)}}" class="btn-danger rounded-md p-2" onclick="return confirm('are you sure cancel appointment?')">Cancel</a></td>
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
