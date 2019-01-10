@extends('layouts.dashboard')

@section('content')

{{--  {{ dd($data)}}  --}}

<h5 class="lead">Gerenciar</h5>
<hr>

<form action={{route('group.update', ['account' => Auth::id(), 'group' => $group->id]) }} method="POST">
    @csrf
    @method('PUT')
    <div class="form-row align-items-end justify-content-center">
        <div class="col-md-10">
            <label for="groupName">Nome do Grupo</label>
            <input type="text" class="form-control" value="{{$group->nome}}" name="nome" >
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-info"> Save </button>
        </div>
    </div>
</form>

<hr>
<h6 class="lead"> Usuarios Registrados no grupo </h6>
<hr>

@foreach($members as $member)

    <div class="form-row align-items-end">
        <div class="col-md-3">
            @if($loop->first)    
                <label for="first_name">Nome</label>
            @endif
            <input type="text" class="form-control" value = {{$member->first_name}} name="first_name" id="first_name" disabled>
        </div>
        <div class="col-md-3">
                @if($loop->first)
                    <label for="last_name">Sobrenome</label>
                @endif
                <input type="text" class="form-control" value = {{$member->last_name}} name="last_name" id="last_name" disabled>
        </div>
        <div class="col-md-3">
            @if($loop->first)
                <label for="email">Email</label>
            @endif    
            <input type="text" class="form-control" value = {{$member->email}} email="email" id="email" disabled>
        </div>
        <div class="col-md-3">
            <form action="#">
                <button class="btn btn-info btn-sm">Ativar/Desativar</button>                
            </form>
            <form action="#">
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>
        </div>
    </div>
@endforeach

<hr>

@if(Auth::id() == $group->owner_id)
    <div class="row">
        <div class="col-md">
            <button id="btn-newMember" class="btn btn-sm btn-primary float-right">Add Membro</button>
        </div>
    </div>

    <div id="newMember" class="form-row mb-3 align-items-end justify-content-center">
        <div class="col-md-6">
            <form action={{route('group.invite', ['account' => Auth::id(), 'group' => $group->id]) }} method="POST">
                @csrf
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Digite um Email para envio do convite">   
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-success">Enviar convite</button>
        </div>            
            </form>        
    </div>

    <hr>
    
    <div class="row">
        <div class="col-md">
            <form action={{route('group.destroy', ['account' => Auth::id(), 'group' => $group->id]) }} method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"> DELETAR GRUPO </button>
            </form>
        </div>
    </div>
@endif
@endsection
