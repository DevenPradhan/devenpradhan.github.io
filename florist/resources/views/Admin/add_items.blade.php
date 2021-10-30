@extends('layouts.admin')
@section('content')

<div class="container-fluid">
	<div class="card col-sm-2" style="border-width: 2px;">
		<div class="card-body">
			<ul class="nav flex-column">
				<li class="nav-item"><a class=" nav-link" href="{{Route('get_indoor')}}">Indoor</a></li>
				<li class="nav-item"><a class="nav-link" href="{{Route('get_outdoor')}}">Outdoor</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Accessories</a></li>

				
			</ul>

		</div>
	</div>

		
	</div>

@endsection