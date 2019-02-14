@extends('layouts.homeDashboard')

@section('content')

<h5 class="h5 text-center">Editar {{$lancamento->nome}} </h5>
<hr>
<div class="col-lg-8 col-md-10 offset-lg-2 offset-md-2">
    <div>
        <form action={{ route(Request::segment(5) . '.update', ['account' => Request::segment(2), 'group_id'=> Request::segment(4), 'lancamento' => $lancamento->id])}} method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nome Conta</label>
                <input type="text" class="form-control" name="nome" value="{{$lancamento->nome}}">
                @if($errors->any())
                    <span class="invalid-feedback" role="alert">
                        @foreach($errors->all() as $message)
                        <strong>{{ $message }}</strong>
                        @endforeach
                    </span>
                @endif
            </div>
            <div class="form-group">
                    <label>N Documento</label>
                    <input type="text" class="form-control" id="nDoc" name="numeroDocumento" value="{{$lancamento->numero_documento}}">
            </div>
            <div class="form-group">
                    <label>Data emissao</label>
                    <input type="date" class="form-control" name="dataEmissao" value={{$lancamento->data_emissao}}>
            </div>        
            <div class="form-group"> 
                <label>Grupo Financeiro</label>           
                <select class="custom-select"
                    name="grupoFinanceiro" required>
                    <option 'selected'>Choose...</option>                
                    @foreach($details['grupoFinanceiro'] as $grupoFin)
                    <option value="{{$grupoFin->id}}" {{$grupoFin->id == $lancamento->grupo_financeiro ? 'selected' : ''}}>{{$grupoFin->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group"> 
                <label>Categoria</label>           
                <select class="custom-select"
                    name="categoria" required>
                    <option 'selected'>Choose...</option>
                    @foreach($details['categorias'] as $cats)
                    <option value="{{$cats->id}}" {{$cats->id == $lancamento->categoria ? 'selected' : ''}} >{{$cats->nome}}</option>
                    @endforeach
                </select>
            </div>
                
            <div>
                <label>Parcelas</label>                
                @foreach($parcelas as $parcela)
                <div class="form-row">
                    <div class="col-md-2 pb-1">
                        @if($loop->first)
                            <label>Valor</label>
                        @endif
                        <input type="text" class="form-control" name="parcela[{{$parcela->id}}][valor]" value={{$parcela->valor}} {{$parcela->data_pagamento != null ? 'disabled' : ''}}>
                    </div>
                    <div class="col-md-2 pb-1">
                        @if($loop->first)
                            <label>Efetuados</label>
                        @endif
                        <input type="text" class="form-control" disabled value={{$parcela->total_pago ?? '-'}} >
                    </div>
                    <div class="col-md-2 pb-1">
                        @if($loop->first)
                            <label>Vencimento</label>
                        @endif
                        <input type="date" class="form-control" name="parcela[{{$parcela->id}}][vencimento]" value={{$parcela->vencimento}} {{$parcela->data_pagamento != null ? 'disabled' : ''}} >
                    </div>
                    <div class="col-md pb-1">
                        @if($loop->first)
                            <label>Numero</label>
                        @endif
                        <input type="text" class="form-control" name="parcela[{{$parcela->id}}][numero]" value={{$parcela->numero_parcial}} {{$parcela->data_pagamento != null ? 'disabled' : ''}} >
                    </div>
                    <div class="col-md pb-1">
                        @if($loop->first)
                            <label>Obs</label>
                        @endif
                        <input type="text" class="form-control" name="parcela[{{$parcela->id}}][observacao]"value={{$parcela->observacao}} >
                    </div>
                    <div class="col-md-2 pb-1">
                        @if($loop->first)
                            <label>Opcões</label>
                        @endif
                        @if($parcela->data_pagamento != null)
                            <button class="btn btn-success" disabled>Consolidado</button>
                            <span class="badge badge-pill badge-info">Ver Pagamentos</span>

                        @else
                            <button class="btn btn-danger btn-sm deleteParcela" data-token ={{ csrf_token() }} data-id={{$parcela->id}} data-account = {{Request::segment(2)}} data-group = {{Request::segment(4)}}>excluir</button>
                        @endif
                    </div>
                </div>
                
                @endforeach
            </div>               
            <div class="form-group pt-2">
                    <label>Observacão</label>
                    <input type="text" name="observacao" value="{{$lancamento->observacao}}" class="form-control" placeholder="Digite aqui uma observacao para a conta">
            </div>
            <div class="row">
                <div class="col">                    
                    <button type="submit" class="btn btn-info float-right">Salvar Alteracões</button>
                </div>
            </div>
        </form>
    </div>
    <div class="p-2">
        <form action="{{ route('parcelamento.store', ['account' => Request::segment(2), 'group_id'=> Request::segment(4), 'lancamento' => $lancamento->id])}}" method="POST">
        @csrf
        <label>Adicionar Novas Parcelas</label>
        <div class="form-row border p-2">
            <div class="col-md-4 py-1">
                <input type="text" class="form-control" id="total" placeholder="Valor Total">
            </div>
            <div class="col-md-4 py-1">
                <input type="date" class="form-control" id="vencimento" placeholder="Primeiro Vencimento">
            </div>
            <div class="col-md-2 py-1">
                 <input type="text" class="form-control" id="parcelas" placeholder="parcelas">
            </div>
            <div class="col-md-2 py-1">
                 <button class="btn btn-light" id="btnValue">Add</button>
            </div>
        </div>
        <div>
            <table class="border my-1">               
                <tr id="parcelamento" >
                </tr>   
            </table>    
        </div> 
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info float-right">Salvar novas Parcelas</button>
            </div>
        </div>
    </div>
        



@endsection
