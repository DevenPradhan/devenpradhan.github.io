@extends('layouts.app')
  
@section('content')




<form method="post" action="{{ route('update') }}" class="form-horizontal">
  @csrf
  <div class="container">
  
 
  <div class="row">
  <h3>User Info:</h3>
</div>
  <!-- One "tab" for each step in the form: -->
  
 
    
  <div class="form-inline py-2">
    <label class="control-label col-sm-2" for="cid_no">CID No:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="cid_no" name="cid_no">
    </div>
  </div>
  <div class="form-inline py-2">
    <label class="control-label col-sm-2" for="address">Address:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="address" name="address">
    </div>
  </div>
  <div class="form-inline py-2">
    <label class="control-label col-sm-2" for="contact_no">Contact No:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="contact_no" name="contact_no">
    </div>
  </div>
  
  <div class="row py-2">
    <div class="col-sm-4 text-right">
    <button class="btn btn-success" type="submit">Submit
    </button>
    <a class="btn btn-danger" href="{{route('user.profile')}}">Cancel</a>
    
</div>
</div>

    
  
  
</div>

</form>
</div>
<script type="text/javascript">
  
</script>


@endsection