@extends('layouts.dashboard')

@section('content')

<h3 class="h3 text-center strong" >Personal Info</h3>

<hr>

<div class="card-body">
    <form method="POST" action="{{ route('account.update', ['account' => $user->id]) }}">
        @method('PUT')      
        @csrf

        <div class="form-row">
            <div class="form-group col-md">            
                <input type="text" value='Username:  {{ $user->username }}' disabled class="form-control" name="username" placeholder="UserName">    
            </div>
            <div class="form-group col-md">            
                <input type="email" value='{{ $user->email }}' class="form-control" name="email" placeholder="Email">    
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md">            
                <input type="text" value='{{ $user->first_name }}' class="form-control" name="first_name" placeholder="First Name">    
            </div>
            <div class="form-group col-md">            
                <input type="text" value='{{ $user->last_name }}' class="form-control" name="last_name" placeholder="Last Name">    
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md">            
                <input type="date" value='{{ $user->birthday }}' class="form-control" name="birthday">    
            </div>
            <div class="form-group col-md">            
                <select class="custom-select" name="gender" name="gender">
                    <option {{ $user->gender === '' ? 'selected' : ''}}>Choose...</option>
                    <option {{ $user->gender === 'M' ? 'selected' : ''}} value="M">Male</option>
                    <option {{ $user->gender === 'F' ? 'selected' : ''}} value="F">Female</option>
                    <option {{ $user->gender === 'O' ? 'selected' : ''}} value="O">Prefer not say</option>
                </select>    
            </div>   
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">
                    {{ __('Save') }}
                </button>
{{--  <a href="#" class="btn btn-danger" disabled >Disable Account</a>  --}}            
            </div>
        </div>
    </form>

{{--  ADDRESS FORM   --}}
@foreach($address as $address)
    @if($loop->first)
        <h6 class="h6 text-center mt-1">Address</h6>
        <hr>
    @endif
    <form action={{ route('address.update',['account' => $address->user_id, 'address' => $address->id])}} method="POST">
        @method('PUT')
        @csrf
        
        <div class="form-row">
            <div class="form-group col-md-1">            
                <input type="text" value='{{ $address->number}}' class="form-control" name="number" placeholder="House Number">    
            </div>
            <div class="form-group col-md-2">            
                <input type="text" value='{{ $address->name }}' class="form-control" name="name" placeholder="House Name">    
            </div>
            <div class="form-group col-md">            
                <input type="text" value='{{ $address->address }}' class="form-control" name="address" placeholder="Address">    
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md">            
                <input type="text" value='{{ $address->postcode }}' class="form-control" name="postcode" placeholder="Postcode">    
            </div>
            <div class="form-group col-md">            
                <input type="text" value='{{ $address->city }}' class="form-control" name="city" placeholder="City">    
            </div>
            <div class="form-group col-md-1">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
    </form>
        <form action="{{ route('address.destroy',['account' => $address->user_id, 'address' => $address->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group col-md-1">
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
        </div> 
    
@endforeach

<div id="newAddress" {{ empty($address) ? '' : "style=display:none;" }} >
    <h6 class="h6 text-center mt-1">New Address</h6>
    <hr>
    <form action= {{ route('address.store', ['account' => Auth::id()])}} method="POST"> 
        @csrf        
        <div class="form-row">
            <div class="form-group col-md-1">            
                <input type="text" class="form-control" name="number" placeholder="House Number">    
            </div>
            <div class="form-group col-md-2">            
                <input type="text" class="form-control" name="name" placeholder="House Name">    
            </div>
            <div class="form-group col-md">            
                <input type="text" class="form-control" name="address" placeholder="Address">    
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md">            
                <input type="text" class="form-control" name="postcode" placeholder="Postcode">    
            </div>
            <div class="form-group col-md">            
                <input type="text" class="form-control" name="city" placeholder="City">    
            </div>        
        </div>
        <button type="submit" class="btn btn-success">Save new</button>
    </form>
</div>



<div class="form-group">
    <a href="#" id="btn-newAddress" class="col-md-2 offset-md-10 btn btn-primary btn-sm">Add Address</a>
</div>

{{--  PHONE  --}}

@foreach ($phone as $phone)
    @if($loop->first)
        <h6 class="h6 text-center">Phone Number</h6>
        <hr>
        @endif
    <form action={{route('phone.update', ['account' => $phone->user_id , 'phone' => $phone->id])}} method="post">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-md">            
                <input type="text" value={{ $phone->label }} class="form-control" name="label" placeholder="Phone Name">    
            </div>
            <div class="form-group col-md">            
                <input type="text" value={{ $phone->number }} class="form-control" name="number" placeholder="Phone Number">    
            </div>
            <div class="form-group col-md-1">
            <button type="submit" class="btn btn-success">
            Save</button>
            </div>              
    </form>
    <form action={{route('phone.destroy',['account' => $phone->user_id , 'phone' => $phone->id] )}} method="post">
        @csrf
        @method('DELETE')
            <div class="form-group col-md-1">
                <button type="submit" class="btn btn-danger">delete</button>
            </div>
    </form>
        </div>
    

@endforeach

<div id="newPhone" {{ empty($phone) ? '' : "style=display:none;" }} >
    <h6 class="h6 text-center">New Phone Number</h6>
    <hr>
<form action= {{ route('phone.store', ['account' => Auth::id()])}} method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md">            
            <input type="text" class="form-control" name="label" placeholder="Phone Name">    
        </div>
        <div class="form-group col-md">            
            <input type="text" class="form-control" name="number" placeholder="Phone Number">    
        </div>              
    </div>
    <button type="submit" class="btn btn-success">Save new</button>
</form>
</div>



<div class="form-group">
    <a href="#" id="btn-newPhone" class="col-md-2 offset-md-10 btn btn-primary btn-sm">Add Phone</a>
</div>

<a href="{{ route('home') }}" class="btn btn-secondary">Voltar</a>

        
</div>


@endsection
