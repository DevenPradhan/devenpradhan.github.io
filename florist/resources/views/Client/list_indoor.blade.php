@extends('layouts.app')
@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">

		<div class="col-md-10">
			<div class="card">
				<div class="form-group row pb-2 pt-4 mx-4">
					<h4>Indoor Plants</h4>
				</div>
				<div class="card-body">
		<table class="table table-bordered text-center table-fluid" id="dataTable">
			<thead class="thead-dark">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Description</th>
					<th>Image</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
				<?php $id= 1 ?>
				@foreach($items as $item)
				<tr>
					<th>{{$id++}}</th>
					<th class="fit">{{$item->name}}</th>
					<th>{{$item->description}}</th>
					<th class="fit">@if(!empty($item->picture))
						<div class="col">
						<a href="{{asset('storage/images/'.$item->picture)}}" target="_blank"><img src="{{asset('storage/images/'.$item->picture)}}" class="thumbnail"></a>
					</div>
						@endif
					</th>
					<th class="fit">
						<?php $find = DB::table('items_list')->where('item_category', 'indoor')->where('item_id', $item->id )->value('quantity'); ?>
						@isset($find)
						
						<a href="" class="btn btn-success btn-sm">Edit Quantity</a>
						@else
						
						<a href="" class="btn btn-primary btn-sm">Add Item</a>
						@endisset
					</th>
					
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>
</div>
</div>
</div>

<!-- add Modal -->
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
        <div class='form-group clearfix'>
          <label for='name' class='col-xs-3'>Description:</label>
          <div class='col-xs-9 input-group'>
            <input id="desc" type="text" class="form-control" name="desc">
          </div>
        </div>  

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning btn-sm">Save</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>
</div>

@endsection