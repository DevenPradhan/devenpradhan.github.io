@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row justify-content-center">

		<div class="col-md-12">
		 @if (Session::get('success'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif
	
			<h5 class="text-center py-2"><strong>UPLOAD REQUESTS</strong></h5>
		
		
			<table class="table table-responsive table-hover text-center" id="dataTable">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Uploader</th>
						<th>Category</th>
						<th width="200px">Name</th>
						<th width="350px">Description</th>
						<th>Picture</th>
						<th width="200px">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $id = 1; ?>
					@foreach($requests as $request)
					<tr>
						<th>{{$id++}}</th>
						<th><?php echo $client = App\Models\User::where('id', $request->client)->value('name'); ?></th>
						<th>{{$request->category}}</th>
						<th>{{$request->name}}</th>
						<th>{{$request->description}}</th>
						<th>
							<a href="{{asset('storage/images/'.$request->picture)}}" target="_blank"><img src="{{asset('storage/images/'.$request->picture)}}" class="thumbnail"></a>
						</th>
						<th>
							<form method="POST" action="{{route('request.approve', $request->id)}}">
								@csrf
								<input type="hidden" name="category" value="{{$request->category}}">
								<input type="hidden" name="name" value="{{$request->name}}">
								<input type="hidden" name="description" value="{{$request->description}}">
								<input type="hidden" name="picture" value="{{$request->picture}}">
							<button class="btn btn-primary btn-sm" type="submit">Approve</button>
							<button class="btn btn-danger btn-sm" type="submit" formaction="{{route('request.reject', $request->id)}}">Reject</button>
							</form>
						</th>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		
		</div>
	
	</div>
		</div>

@endsection