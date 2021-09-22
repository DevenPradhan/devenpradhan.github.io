@extends('layouts.admin')
  
@section('content')
<div class="register-form">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header"></div>
                  <div class="card-body">
                    @foreach($users as $user)
                    <div class="row">
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">Name:</label>
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">{{$user->name}}</label>
              </div>
              <div class="row">
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">Email ID:</label>
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">{{$user->email}}</label>
                </div>
                @endforeach

                        
                  </div>
                      
                  
              </div>
          </div>
      </div>
  </div>
</div>
@endsection