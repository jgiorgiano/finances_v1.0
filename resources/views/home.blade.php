@extends('layouts.dashboard')

@section('content')


You Are logged in!!

@foreach($groups as $group)

    <a href="#">
    <div class="card text-white bg-light my-3">
        <div class="card-body">
          <h5 class="card-title"> Group Name: {{ $group->nome }}</h5>
          <h6 class="card-subtitle">Group Manager: {{ $group->username}}</h6>
          <a href={{ route('group.show', ['account' => \Auth::id(), 'group' => $group->id ]) }} class="btn btn-primary float-right"> 
            Gerenciar group 
        </a>
        </div>
    </div>
    </a>

@endforeach

<div class="row">
    <div class="col-md mb-3">        
        <a href="" id="btn-newGroup" class="btn btn-success btn-sm float-right"> Criar Novo Grupo</a>
    </div>
</div>

<div id="newGroup" class="mb-3" style='display:none';>
    <form action={{route('group.store', ['account' => Auth::id()])}} method="POST">
        @csrf
        <div class="form-row align-items-end justify-content-center">
            <div class="col-md-9">
                <label for="nome"> Nome do Grupo</label>
                <input type="text" class="form-control" name="nome" id="nome">                
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary"> Criar </button>
            </div>
        </div>
    </form>
</div>

@endsection
