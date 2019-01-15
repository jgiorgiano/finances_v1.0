@extends('layouts.dashboard')

@section('content')

<h3 class="h3 text-center strong" >Personal Info</h3>

<hr>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
            @foreach($errors->all() as $message)
                <li><strong>{{ $message }}</strong></br></li>
            @endforeach
            </ul>
        </div>
    @endif

<div class="card-body">
    <form method="POST" action="{{ route('account.update', ['account' => $user->id]) }}">
        @method('PUT')      
        @csrf

        <div class="form-row">
            <div class="form-group col-md">            
                <input type="text" value='{{ $user->username }}' class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" 
                name="username" placeholder="Username" required>    
                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md">            
                <input type="email" value='{{ $user->email }}' class="form-control" disabled placeholder="Email">    
            
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md">            
                <input type="text" value='{{ $user->first_name }}' class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" 
                name="first_name" placeholder="First Name" required>    
            @if ($errors->has('first_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
            </div>
            <div class="form-group col-md">            
                <input type="text" value='{{ $user->last_name }}' class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }} "
                 name="last_name" placeholder="Last Name" required>    
            @if ($errors->has('last_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md">            
                <input type="date" value='{{ $user->birthday }}' class="form-control {{ $errors->has('birthday') ? ' is-invalid' : '' }}" 
                name="birthday" required>    
            @if ($errors->has('birthday'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('birthday') }}</strong>
                </span>
            @endif
            </div>
            <div class="form-group col-md">            
                <select class="custom-select {{ $errors->has('gender') ? ' is-invalid' : '' }}"
                    name="gender" name="gender" required>
                    <option {{ $user->gender === '' ? 'selected' : ''}}>Choose...</option>
                    <option {{ $user->gender === 'M' ? 'selected' : ''}} value="M">Male</option>
                    <option {{ $user->gender === 'F' ? 'selected' : ''}} value="F">Female</option>
                    <option {{ $user->gender === 'O' ? 'selected' : ''}} value="O">Prefer not say</option>
                </select>    
            @if ($errors->has('gender'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
            </div>   
            <div class="col-md-1 ml-2">
                <button type="submit" class="btn btn-success float-right">
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
        @if ($errors->any())
        <span class="invalid-feedback" role="alert">
            @foreach($errors->all() as $message)
                    <strong>{{ $message }}</strong>
                    @endforeach
                </span>
        @endif
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
            <div class="form-group col-md-2 ml-4">
                <div class="btn-group float-right">
                    <button type="submit" class="btn btn-success">Save</button>            
    </form>
    <form action="{{ route('address.destroy',['account' => $address->user_id, 'address' => $address->id])}}" method="POST">
        @csrf
        @method('DELETE')            
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
    </form>
        </div>     
@endforeach

{{--  NEW ADDRESS FORM  --}}
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
                <input type="text" class="form-control" name="address" placeholder="Address" required>    
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md">            
                <input type="text" class="form-control" name="postcode" placeholder="Postcode" required>    
            </div>
            <div class="form-group col-md">            
                <input type="text" class="form-control" name="city" placeholder="City" required>    
            </div> 
            <div class="form-group col-xl-2">           
                    <button type="submit" class="btn btn-success float-right">Save new</button>         
            </div>        
        </div>        
    </form>
</div>

<div class="form-row">
    <div class="col-md">
        <a href="" id="btn-newAddress" class="btn btn-primary btn-sm float-right my-2">Add Address</a>
    </div>
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
            <div class="form-group col-lg">            
                <input type="text" value={{ $phone->label }} class="form-control" name="label" placeholder="Phone Name">    
            </div>
            <div class="form-group col-sm">            
                <input type="text" value={{ $phone->number }} class="form-control" name="number" placeholder="Phone Number">    
            </div>
            <div class="form-group col-sm-2 ml-4">
                <div class="btn-group float-right">
                    <button type="submit" class="btn btn-success">Save</button>
                          
    </form>
    <form action={{route('phone.destroy',['account' => $phone->user_id , 'phone' => $phone->id] )}} method="post">
        @csrf
        @method('DELETE')
            
                    <button type="submit" class="btn btn-danger">delete</button>
                </div>
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
            <input type="text" class="form-control" name="label" placeholder="Phone Name" required>    
        </div>
        <div class="form-group col-md">            
            <input type="text" class="form-control" name="number" placeholder="Phone Number" required>    
        </div>
        <div class="form-group col-xl-2">           
            <button type="submit" class="btn btn-success float-right">Save new</button>         
        </div>              
    </div>
</form>
</div>

<div class="form-row">
    <div class="col-md">
        <a href="" id="btn-newPhone" class="btn btn-primary btn-sm float-right my-2">Add Phone</a>
    </div>
</div>

<a href="{{ route('home') }}" class="btn btn-secondary">Voltar</a>

        
</div>


@endsection
