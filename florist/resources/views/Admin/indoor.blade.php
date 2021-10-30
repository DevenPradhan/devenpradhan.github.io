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
<table class="table table-bordered text-center" id="dataTable">
  <thead class="thead-dark">
    <tr>
      <th style="width: 10px">#</th>
      <th style="width: 300px">Name</th>
      <th >Description</th>
      <th></th>
      <th style="width: 200px"></th>
    </tr>
  </thead>
  <tbody>
    <?php $id=1?>
  	@foreach($items as $item)
  	
  	<tr>
  		<td scope="row">{{$id++}}</td>
  		<td>{{$item->name}}</td>
      <td>{{$item->description}}</td>
      <td></td>
  		<td>
  			<form id='remove' class="form-group" action="{{route('indoor.destroy',$item->id)}}" method='post'>
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">                
                  <a class="btn btn-secondary" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$item->id}})'>Edit</a>
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data??');" name='name'>Delete</button>
                  </form>
  		</td>
  	</tr>
  	@endforeach
</tbody>
</table>
<input type="hidden" name="hidden_view" id="hidden_view" value="{{url('indoor/view')}}">
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


@endsection