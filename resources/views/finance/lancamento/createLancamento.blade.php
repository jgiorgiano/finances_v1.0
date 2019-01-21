@extends('layouts.homeDashboard')

@section('content')

<h5 class="h5">Nova {{$title}}</h5>
<hr>
<div class="col-md-6">
    <form action="{{ route('pagamentos.store', ['account' => \Auth::id(), 'group_id'=> $data['group']->id])}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nome Conta</label>
            <input type="text" class="form-control" name="nome">
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
                <input type="text" class="form-control" id="nDoc" name="numeroDocumento">
        </div>
        <div class="form-group">
                <label>Data emissao</label>
                <input type="date" class="form-control" name="dataEmissao">
        </div>        
        <div class="form-group"> 
            <label>Grupo Financeiro</label>           
            <select class="custom-select"
                name="grupoFinanceiro" required>
                <option 'selected'>Choose...</option>
                @foreach($data['grupoFinanceiro'] as $grupo)
                <option value="{{$grupo->id}}">{{$grupo->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group"> 
            <label>Categoria</label>           
            <select class="custom-select"
                name="categoria" required>
                <option 'selected'>Choose...</option>
                @foreach($data['categorias'] as $cats)
                <option value="{{$cats->id}}">{{$cats->nome}}</option>
                @endforeach
            </select>
        </div>
               
        <div>
            <label>Pagamento</label>
            <div class="form-row border p-2">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="total" placeholder="Valor Total">
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" id="vencimento" placeholder="Primeiro Vencimento">
                </div>
                 <div class="col-md-2">
                     <input type="text" class="form-control" id="parcelas" placeholder="parcelas">
                 </div>
                 <div class="col-md-2">
                     <button class="btn btn-light" id="btnValue">Add</button>
                 </div>
            </div>
        </div>
        <div>
            <table>
                <tr>
                    <td>Valor Parcela</td>
                    <td>Vencimento</td>
                    <td>Parcela</td>
                </tr>
                <tr id="parcelamento">
                </tr>   
            </table>    
        </div>  

     <button type="submit" class="btn btn-info">Adicionar</button>
    </form>
</div>

@endsection
