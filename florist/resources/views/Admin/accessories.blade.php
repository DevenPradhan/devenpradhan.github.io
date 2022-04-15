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
    </div>
  </div>
  <div class="col-md-12">
    <div class="row py-2">
      <div class="col-md-12 text-center">
        <a class="btn btn-info" data-toggle='modal' data-target="#addModel">Add</a>
      </div>
    </div>
    <table class="table table-bordered text-center table-responsive" id="dataTable">
      <thead class="thead-dark">
        <tr>
          <th class="fit">#</th>
          <th style="width: 300px">Name</th>
          <th >Description</th>
          <th width="200px">Picture</th>
          <th width="140px">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $id=1?>
        @foreach($items as $item)

        <tr>
          <td scope="row">{{$id++}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->description}}</td>
          <td>@if(!empty($item->picture))

            <div class="col py-2">
              <a class="btn btn-info btn-sm" data-target="#addPictureModal" data-toggle="modal" onclick="uploadPic('{{$item->id}}')">Change Pic</a>
            </div>
            <div class="col">
              <a href="{{asset('storage/images/'.$item->picture)}}" target="_blank"><img src="{{asset('storage/images/'.$item->picture)}}" class="thumbnail" alt="{{$item->picture}}"></a>
            </div>


            @else
            <a class="btn btn-info btn-sm" data-target="#addPictureModal" data-toggle="modal" onclick="uploadPic('{{$item->id}}')">Upload Pic</a>

            @endif
          </td>
          <td>
           <form id='remove' class="form-group" action="{{route('indoor.destroy',$item->id)}}" method='post'>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">                
            <a class="btn btn-warning btn-sm" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$item->id}})'>Edit</a>
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this data??');" name='name'>Delete</button>
          </form>
        </td>

      </tr>
      @endforeach

    </tbody>
  </table>
  <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('indoor/view')}}">
</div>
</div>


<!-- add Picture -->
<div class="modal" id="addPictureModal">
  <div class="modal-dialog">
    <div class="modal-content">


      <div class="modal-header">
        <h4 class="modal-title">Upload Picture</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="{{route('upload.photo.indoor')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="modal-body">
          <div class="form-group clearfix">
            <label for="photo" class="col-xs-3">Choose Photo</label>
            <div class="cols-xs-9 input-group">
              <input type="hidden" id="id-product" name="id">
              <input type="file" name="photo" class="form-control" required="">
            </div>
            <div class="form-group clearfix">
              <label for="name" class="col-xs-3">Name of Picture</label>
              <div class="col-xs-9 input-group">
                <input type="text" name="name" class="form-control">
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-warning btn-sm">Upload</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
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
      <form action="{{ route('add_accessory') }}" method="post">
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

<!-- edit modal -->

<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Indoor Plant</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="{{ route('update_indoor') }}" method="POST">
        {{csrf_field()}}
        <!-- Modal body -->
        <div class="modal-body">
         <div class='form-group clearfix'>
          <label for='name' class='col-xs-3'>Name:</label>
          <div class='col-xs-9 input-group'>
            <input id="ename" type="text" class="form-control" name="ename">
          </div>
        </div> 
        
        <div class='form-group clearfix'>
          <label for='name' class='col-xs-3'>Description:</label>
          <div class='col-xs-9 input-group'>
            <input id="edesc" type="text" class="form-control" name="edesc">
          </div>
        </div> 
        
      </div>
      <input type="hidden" id="edit_id" name="edit_id">
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning btn-sm">Save</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>
</div>


<script type="text/javascript">

  function fun_edit(id)
  {
    var view_url = $("#hidden_view").val();
    $.ajax({
      url: view_url,
      type:"GET", 
      data: {"id":id}, 
      success: function(result){
        $("#edit_id").val(result.id);
        $("#ename").val(result.name);
        $("#edesc").val(result.description);
      }
    });
  }

</script>

<script type="text/javascript">
 function uploadPic(id) {
  $('#id-product').val(id);
}
</script>

<style type="text/css">
.table td.fit, 
.table th.fit {
  white-space: nowrap;
  width: 2%;
}

</style>

@endsection