@extends('layouts.app')
@section('content')

<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-10">
		<div class="card">
			<div class="card-body">
			<div class="form-group row mx-4 pt-4 pb-2">
				<h4>Your Product List</h4>
			</div>

			<table class="table table-bordered table-responsive table-hover text-center" id="dataTable">
				<thead class="thead-dark">
					<tr>
						<th class="fit">#</th>
						<th>Category</th>
						<th>Name</th>
						<th>Quantity</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					<?php $id = 1; ?>
					@foreach($items as $item)
					<tr>
						<th>{{$id++}}</th>
						<th></th>
						<th></th>
						<th></th>
						<th>
							<form action="" method="" enctype="multipart/form-data">
								<a href="" class="btn btn-warning btn-sm">Edit</a>
								<button type="submit" class="btn btn-danger btn-sm">Remove</button>
							</form>
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



@endsection