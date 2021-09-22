@extends('layouts.admin')

@section('content')


 
<div class="container">
  <div class="row">
    @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
  </div>
	<div class="col-md-12">
    <div class="row py-2">
      <div class="col-md-12 text-center">
        <a class="btn btn-info" href="{{ url('/create_account') }}">Create Account</a>
    </div>
  </div>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Role</th>
      <th scope="col">Name</th>
      <th scope="col">Email ID</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  	<?php $id=1?>
  	@foreach($users as $user)
    <tr>
      <th scope="row">{{$id++}}</th>
      <td>{{$user->role}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td width="200px">
      	<form id='remove' class="form-group" action="{{route('user.destroy',$user->id)}}" method='post'>
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value={{csrf_token()}}>
                <a class="btn btn-warning btn-sm" data-toggle='modal' data-target='#editbranchModal' onclick='fun_edit1({{$user->id}})'>Edit</a> 
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data??');" name='name' style="display: inline-block;">Delete</button>
                </form>
      </td>
    </tr>
@endforeach
</tbody>
</table>
</div>
</div>
@endsection
