@extends('layouts.admin')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 text-center">
      @if (Session::get('success'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif
    </div>
  </div>
  <div class="col-md-12">
    <div class="row py-2">
      <div class="col-md-12 text-center">
        <a class="btn btn-info" data-toggle='modal' data-target="#addModel">Add</a>
    </div>
  </div>

<table class="table table-bordered text-center">
  <thead class="thead-dark">
    <tr>
      <th style="width: 10px">#</th>
      <th>Name</th>
      <th>Description</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    
  
</tbody>
</table>


</div>
</div>
@endsection