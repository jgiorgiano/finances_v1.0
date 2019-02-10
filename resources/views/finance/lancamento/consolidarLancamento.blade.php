@extends('layouts.homeDashboard')

@section('content')

<h5 class="h5 text-center">Consolidar {{$parcela->nome}}, Parcela: {{$parcela->numero_parcial}} </h5>
<hr>
<div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
    <div>
        <ul class="list-group">
            <li class="list-group-item">Nome Conta: {{$parcela->nome}}</li>
            <li class="list-group-item">Data Emissão: {{$parcela->data_emissao}}</li>
            <li class="list-group-item">Vencimento: {{$parcela->vencimento}}</li>
            <li class="list-group-item">Numero Documento: {{$parcela->numero_documento}}</li>
            <li class="list-group-item">Categoria: {{$parcela->categoria}}</li>
            <li class="list-group-item">Grupo Financeiro: {{$parcela->grupo_financeiro}}</li>
            @empty(!$parcela->observacao)
                <li class="list-group-item">Obs: {{$parcela->observacao}}</li>
            @endempty
            @empty(!$parcela->observacao_lancamento)
                <li class="list-group-item">Obs da Parcela: {{$parcela->observacao_lancamento}}</li>
            @endempty
            <li class="list-group-item">Valor Parcela: {{$parcela->valor}} [**fazer funcao para calculo do valor em aberto da parcela]</li>

        </ul>
           
            <div class="form-group">                
                @if($errors->any())
                    <span class="invalid-feedback" role="alert">
                        @foreach($errors->all() as $message)
                        <strong>{{ $message }}</strong>
                        @endforeach
                    </span>
                @endif
            </div>
        
    <div class="border p-2 valores">
        <form action="{{ route('consolidar.store', ['account' => Request::segment(2), 'group_id'=> Request::segment(4), 'parcela' => $parcela->id])}}" method="POST">
        @csrf
        <label id="total"></label>
        <div class="form-row" id="pgto0">
            <div class="col-md-4 py-1">
                <label for="Valor">Valor</label>
                <input type="text" class="form-control valor" name="pgto[0][valor]" placeholder="Valor" required>
            </div>
            <div class="col-md-4 py-1">
                <label for="contaCorrente">Conta Corrente</label>                    
                <select class="custom-select contaCorrente"
                    name="pgto[0][contaCorrente]" required>
                    <option 'selected'>Escolha...</option>
                    @foreach($options['contaCorrente'] as $contaC)
                    <option value="{{$contaC->id}}">{{$contaC->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 py-1">
                    <label for="formaPagamento">Forma Pagamento</label>                    
                    <select class="custom-select formaPagamento"
                        name="pgto[0][formaPagamento]" required>
                        <option 'selected'>Escolha...</option>
                        @foreach($options['formaPagamento'] as $formaPgto)
                        <option value="{{$formaPgto->id}}">{{$formaPgto->nome}}</option>
                        @endforeach
                    </select>
            </div>
        </div>        
        <div class="row">
            <div class="col-md">
                <button class="btn btn-info btn-sm float-right" id="btnNewPgto">Add</button>             
            </div>            
        </div>            
        <button type="submit" class="btn btn-info my-3 float-right">Consolidar</button>
        </form>
    </div>
        



@endsection
