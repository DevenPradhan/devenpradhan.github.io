@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">

		 @if($errors->any())
      <div class="row justify-content-center">
        <div class="alert alert-danger col-md-6">
          <p><strong>Opps Something went wrong.</strong></p>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
		
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-center"><strong>Select One Item to Upload</strong></div>
				<div class="card-body">
					<form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group row py-2">
							<label for="upload_type" class="col-md-4 text-right">Select Upload Category</label>
							<div class="col-md-5">
								<select class="form-control" id="Category" name="category" required="">
									<option selected value="">Select One</option>
									<option value="indoor">Indoor</option>
									<option value="outdoor">Outdoor</option>
									<option value="accessories">Accessories</option>
								</select>
							</div>
						</div>

						<div class="form-group row py-2">
							<label for="name" class="col-sm-4 text-right">Name of Item/Flower</label>
							<div class="col-md-5">
								<input type="text" name="name" class="form-control" required="">
							</div>
						</div>

						<div class="form-group row py-2">
							<label for="description" class="col-sm-4 text-right">Description</label>
							<div class="col-md-5">
								<textarea class="form-control" name="description" tabindex="3"></textarea>
							</div>
						</div>

						<div class="form-group row py-2">
							<label class="col-sm-4 text-right" for="picture">Upload Picture</label>
							<div class="col-md-5">
								<input type="file" name="picture" class="form-control">
							</div>
						</div>

						<div class="form-group row py-2 justify-content-end">
							<div class="col-md-6">
								<button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to proceed?')">Submit</button>
								<a href="{{route('user')}}" class="btn btn-primary btn-sm">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>

	</div>
</div>
@endsection