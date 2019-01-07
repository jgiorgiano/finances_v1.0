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
                <a href="#" class="btn btn-danger">Disable Account</a>            
            </div>
        </div>
    </form>

{{--  ADDRESS FORM   --}}
@foreach($address as $address)
    @if($loop->first)
        <h6 class="h6 text-center mt-1">Address</h6>
        <hr>
    @endif
    <div class="form-row">
        <div class="form-group col-md-1">            
            <input type="text" value='{{ $address->number}}' class="form-control" id="number" placeholder="House Number">    
        </div>
        <div class="form-group col-md-2">            
            <input type="text" value='{{ $address->name }}' class="form-control" id="name" placeholder="House Name">    
        </div>
        <div class="form-group col-md">            
            <input type="text" value='{{ $address->adress }}' class="form-control" id="address" placeholder="Address">    
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md">            
            <input type="text" value='{{ $address->postcode }}' class="form-control" id="postcode" placeholder="Postcode">    
        </div>
        <div class="form-group col-md">            
            <input type="text" value='{{ $address->city }}' class="form-control" id="city" placeholder="City">    
        </div>
        <div class="form-group com-md-1">
            <a href="#" class="btn btn-success">Edit</a>
        </div> 
    </div>
@endforeach

@empty($address->adress)
<h6 class="h6 text-center mt-1">Address</h6>
<hr>
    <div class="form-row">
        <div class="form-group col-md-1">            
            <input type="text" class="form-control" id="number" placeholder="House Number">    
        </div>
        <div class="form-group col-md-2">            
            <input type="text" class="form-control" id="name" placeholder="House Name">    
        </div>
        <div class="form-group col-md">            
            <input type="text" class="form-control" id="address" placeholder="Address">    
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md">            
            <input type="text" class="form-control" id="postcode" placeholder="Postcode">    
        </div>
        <div class="form-group col-md">            
            <input type="text" class="form-control" id="city" placeholder="City">    
        </div>        
    </div>
@endempty


<div class="form-group">
    <a href="#" class="col-md-2 offset-md-10 btn btn-primary btn-sm">Add Address</a>
</div>

{{--  PHONE  --}}

@foreach ($phone as $phone)
    @if($loop->first)
        <h6 class="h6 text-center">Phone Number</h6>
        <hr>
        @endif
    <form action={{route('phone.update', ['account' => $phone->users_user_id , 'phone' => $phone->id])}} method="post">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-md">            
                <input type="text" value={{ $phone->label }} class="form-control" name="phone" placeholder="Phone Name">    
            </div>
            <div class="form-group col-md">            
                <input type="text" value={{ $phone->number }} class="form-control" name="number" placeholder="Phone Number">    
            </div>
            <div class="form-group col-md-1">
            <button type="submit" class="btn btn-success">
            Save</button>
            </div>              
    </form>
    <form action={{route('phone.destroy',['account' => $phone->users_user_id , 'phone' => $phone->id] )}} method="post">
        @csrf
        @method('DELETE')
            <div class="form-group col-md-1">
                <button type="submit" class="btn btn-danger">delete</button>
            </div>
    </form>
        </div>
    

@endforeach

@empty($phone->number)
    <h6 class="h6 text-center">Phone Number</h6>
    <hr>
    <div class="form-row">
        <div class="form-group col-md">            
            <input type="text" class="form-control" id="phone" placeholder="Phone Name">    
        </div>
        <div class="form-group col-md">            
            <input type="text" class="form-control" id="number" placeholder="Phone Number">    
        </div>              
    </div>
@endempty


<div class="form-group">
    <a href="#" class="col-md-2 offset-md-10 btn btn-primary btn-sm">Add Phone</a>
</div>

<a href="{{ route('home') }}" class="btn btn-secondary">Voltar</a>

        
</div>


@endsection
