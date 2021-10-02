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
    <?php $id=1?>
  	@foreach($items as $item)
  	
  	<tr>
  		<td scope="row">{{$id++}}</td>
  		<td>{{$item->name}}</td>
      <td>{{$item->description}}</td>
  		<td>
  			
  		</td>
  	</tr>
  	@endforeach
</tbody>
</table>
</div>
</div>


<!-- Add modal -->
<div class="modal" id="addModel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Indoor Plant</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{ route('add_indoor') }}" method="post">
        {{csrf_field()}}
        <!-- Modal body -->
        <div class="modal-body">
         <div class='form-group clearfix'>
                    <label for='name' class='col-xs-3'>Name:</label>
                      <div class='col-xs-9 input-group'>
                        <input id="name" type="text" class="form-control" name="name">
                      </div>
                </div> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
                  <button type="submit" class="btn btn-warning btn-sm">Save</button>
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                </div>
        
      </div>
    </div>
  </div>
  
</div>
@endsection