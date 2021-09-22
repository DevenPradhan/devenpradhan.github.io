@extends('layouts.guest')

@section('content')
<div class="container-fluid py-2">
<div class="row cnav">
	<div class="col">
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner caro">
    <div class="carousel-item active">
      <img src="img/DSC_0038.JPG" class="d-block w-100" alt="...">

    </div>
    <div class="carousel-item">
      <img src="img/DSC_0037.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/20180530_115115.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</div>
</div>


<div class="row pl-3">
<div class="col-sm-3 py-2">

<div class="card cnav" style="width:280px">
  
  <div class="card-body">
    <div class="row">
    <div class="col">
    <img src="img/DSC_0037.JPG" class="thumbnail"/>
    </div>
    
  </div>
  </div>
</div>

</div>

<div class="col-sm-3">

<div class="card cnav" style="width:300px">
  
  <div class="card-body">
    <div class="row">
    
    <div class="col">
      <a class="text-dark justify-content-center"> <img src="img/1.jpg" style="width: 280px;"></a>
    </div>
  </div>
  
  </div>
</div>

</div>


<div class="col-sm-3">

<div class="card px-2 cnav" style="width:250px">
  
  <div class="card-body">
    <div class="row">
    <div class="col">
    <a href="#" class="text-dark"><img src="img/DSC_0039.JPG" class="thumbnail"><br>flower 1</a>
    </div>
    <div class="col">
      <a class="text-dark justify-content-center" href="#"> <img src="img/DSC_0391.jpg" class="thumbnail"><br>Daisy</a>
    </div>
  </div>
  
  </div>
</div>

</div>

<div class="col-sm-3">

<div class="card px-2 cnav" style="width:250px">
  
  <div class="card-body">
    <div class="row">
    <div class="col">
    <a href="#" class="text-dark"><img src="img/DSC_0039.JPG" class="rcorners1"><br>flower 1</a>
    </div>
    <div class="col">
      <a class="text-dark justify-content-center" href="#"> <img src="img/DSC_0037.JPG" class="rcorners1"><br>Daisy</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <a href="#" class="text-dark justify-content-center"><img src="img/DSC_0038.JPG" class="rcorners1"></a>
    </div>
    <div class="col">
      <a href="#" class="text-dark justify-content-center"><img src="img/DSC_0038.JPG" class="rcorners1"></a>
    </div>
  </div>
  </div>
</div>

</div>
</div>


@endsection
