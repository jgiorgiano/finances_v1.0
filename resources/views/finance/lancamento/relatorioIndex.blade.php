@extends('layouts.homeDashboard')

@section('content')

<h5 class="h5 text-center">{{$title}}</h5>
<hr>
<h6>Aplicar Filtro:</h6>
  <form method="POST">
    @csrf
    <div class="row">
    <div class="col-md-2">
      <label>Por Categoria</label>
      <select class="custom-select" id='cat'>
        <option selected>Open this select menu</option>
        @foreach($categorias as $cat)
        <option value="{{$cat->id}}">{{$cat->nome}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-2">
      <label for="">Por Categoria Financeira</label>
      <select class="custom-select" id='fin'>
        <option selected>Open this select menu</option>
        @foreach($financeiro as $fin)
        <option value="{{$fin->id}}">{{$fin->nome}}</option>
        @endforeach
      </select>
    </div>
    <button class="btn btn-info" type="submit" id='btnFilter'>enviar</button>
  </div>
  
  </form>

  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach

<hr>
<div class="col-md-12" id="table">
    @include('finance.lancamento.datatable')  
</div>

@endsection
