@extends('layouts.admin')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Flower Shop - Dashboard') }}</div>
  
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
  
                    <h3>Welcome</h3>
                    <div class="col-md-12 text-left"><a class="btn btn-info" href="{{ url('/create_account') }}">Add Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        
</div>
@endsection