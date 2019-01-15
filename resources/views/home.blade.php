@extends('layouts.dashboard')

@section('content')


You Are logged in!!

@foreach($groups as $group)

@empty($group->accepted_at)    
    <div class="card text-white bg-light my-3">
        <div class="card-body">
            <h5 class="card-title"> Group Name: {{ $group->nome }}</h5>
            <h6 class="card-subtitle">Group Manager: {{ $group->first_name}} {{$group->last_name}}</h6>
            <a href={{ route('group.joinGroup', ['account' => \Auth::id(), 'group' => $group->id ]) }} class="btn btn-success btn-sm float-right"> 
                Join Group
            </a>
        <form action={{ route('group.deleteMember', ['account' => \Auth::id(), 'group' => $group->id ]) }} method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm float-right"> 
                Delete Invitation
            </button>            
        </form>
        
        </div>
    </div>   
@endempty

@isset($group->accepted_at)
    <a href={{'account/' . \Auth::id() . '/group/' . $group->id . '/home'}}>
    <div class="card text-white bg-light my-3">
        <div class="card-body">
          <h5 class="card-title"> Group Name: {{ $group->nome }}</h5>
          <h6 class="card-subtitle">Group Manager: {{ $group->first_name}} {{$group->last_name}}</h6>
          <a href={{ route('group.show', ['account' => \Auth::id(), 'group' => $group->id ]) }} class="btn btn-primary float-right"> 
            Gerenciar group 
        </a>
            <small>Created at: {{$group->created_at}}</small>
        </div>
    </div>
    </a>
@endisset

@endforeach

<div class="row">
    <div class="col-md mb-3">        
        <a href="" id="btn-newGroup" class="btn btn-success btn-sm float-right"> Criar Novo Grupo</a>
    </div>
</div>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif
        

<div id="newGroup" class="mb-3" style='display:none';>
    <form action={{route('group.store', ['account' => Auth::id()])}} method="POST">
        @csrf
        <div class="form-row align-items-end justify-content-center">
            <div class="col-md-9">
                <label for="nome"> Nome do Grupo</label>
                <input type="text" class="form-control" name="nome" id="nome" required>                
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary"> Criar </button>
            </div>
        </div>
    </form>
</div>

@endsection
