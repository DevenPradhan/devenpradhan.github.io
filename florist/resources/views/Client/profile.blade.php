@extends('layouts.app')
  
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
                      <a class="btn btn-link" href="{{Route('edit_info')}}">Edit Information</a>
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">Name:</label>
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">{{$user->name}}</label>
              </div>
              <div class="row">
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">Email ID:</label>
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">{{$user->email}}</label>
                </div>
                @endforeach
               @foreach($client as $view)
                
                <div class="row">
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">CID No.:</label>
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">{{$view->cid_no}}</label>
                </div>
                <div class="row">
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">Contact No.:</label>
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">+975 {{$view->contact_no}}</label>
                </div>
                <div class="row">
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">Address.:</label>
                <label for="role" class="col-md-4 mr-2 col-form-label text-md-left">{{$view->address}}</label>
                </div>


                      @endforeach
                  
              </div>
          </div>
      </div>
  </div>
</div>
@endsection