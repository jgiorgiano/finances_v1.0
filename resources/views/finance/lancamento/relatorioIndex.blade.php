@extends('layouts.homeDashboard')

@section('content')

<h5 class="h5 text-center">{{$title}}</h5>
<hr>
<div class="col-md-12">
    <table class="table table-hover">
        <thead>
          <tr>               
            <th scope="col">Conta</th>
            <th scope="col">Valor</th>
            <th scope="col">Vencimento</th>
            <th scope="col">Numero Doc</th>
            <th scope="col">Categoria</th>
            <th scope="col">Financeiro</th>
            <th scope="col">Data Registro</th>
            <th scope="col">Data Emissão</th>
            <th scope="col">Situacão</th>
            <th scope="col">Opcões</th>
          </tr>
        </thead>
        <tbody>
        @foreach($movimentos as $mt)
          <tr>               
            <td>{{ $mt->id}}</td>
            <td>R$ {{ $mt->valor}}</td>
            <td>{{ $mt->vencimento}}</td>
            <td>{{ $mt->numero_parcial}}</td>
            <td>{{ $mt->categoria}}</td>
            <td>{{ $mt->grupo_financeiro}}</td>
            <td>{{ $mt->created_at}}</td>
            <td>{{ $mt->data_emissao}}</td>
            <td></td>
            <td>
                <button class="btn btn-sm btn-light">Gerenciar</button>
                @if($mt->observacao != null || $mt->obsParcela != null) 
                  <span class="badge badge-pill badge-info">obs</span>
                @endif            
            </td>                
          </tr>
        @endforeach              
        </tbody>
    </table>   
</div>

@endsection
