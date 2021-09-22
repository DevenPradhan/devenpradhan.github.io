@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

		<form action="" method="POST">
			<div class="col-md-8">
			<div class="card">
				<div class="card-header bg-secondary"></div>
				<div class="card-body">
			<div class="form-inline py-2">
    <label for="upload_type" class="col-sm-4 text-right">Select Upload Category</label>
    <select class="form-control" id="upload_type" name="">
      <option selected>Choose Category</option>
      <option value="indoor">Indoor</option>
      <option value="outdoor">Outdoor</option>
      <option value="accessories">Accessories</option>
    </select>
  </div>

  <div class="form-inline py-2">
  	<label for="name" class="col-sm-4 text-right">Name of flower</label>
  	<select class="form-control w-25">
  	<option selected>Choose Flower</option>
  	<option value="Rose">Rose</option>
  	<option value="Begunia">Begunia</option>
  </select>
</div>
</div>
</div>
</div>

		</form>


</div>
</div>
@endsection