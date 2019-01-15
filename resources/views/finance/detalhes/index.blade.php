@extends('layouts.homeDashboard')

@section('content')

<div class="col-md-5">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">TESTE</h5>
      <hr>
      <ul class="list-group">
      @foreach($data as $data)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="row">
              <div class="col-md">

                {{$data->nome}}
                <a href="#" class="badge badge-primary badge-pill">editar</a>
                <a href="#" id="{{'edit'. $data->id}}" class="badge badge-primary badge-pill">Atualizar</a>
              </div>
            </div>
      
            <div class="row">    
              <div class="col-md">
                <form action="#">
                  <input type="text" class="form-control form-control-sm" name="nome" value="{{$data->nome}}">
                  </input>
                  <button type="submit" class="badge badge-success badge-pill">salvar</button>
                </form>
              </div>
           </div>
          </li>            
      @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection