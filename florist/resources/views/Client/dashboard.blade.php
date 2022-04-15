@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center py-2">
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}
            <a style="width: 125px;" class="btn btn-secondary" href="{{route('request.items')}}">Upload Items</a>
            </div>
            
                <div class="card">
                <div class="card-header">{{ __('Flower Shop - Dashboard') }}</div>
  
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @foreach($user as $info)
                    <h3>Welcome {{$info->name}}</h3>
                    @endforeach
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection