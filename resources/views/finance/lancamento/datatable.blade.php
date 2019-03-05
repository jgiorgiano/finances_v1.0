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
      <tr class={{ $mt->situacao == 'Em Atraso' ? 'text-danger' : ''}}>                           
        <td>{{ $mt->nome}}</td>
        <td>R$ {{ $mt->valor}}</td>
        <td>{{ $mt->vencimento}}</td>
        <td>{{ $mt->numero_parcial}}</td>
        <td>{{ $mt->categoria}}</td>
        <td>{{ $mt->grupo_financeiro}}</td>
        <td>{{ $mt->created_at}}</td>
        <td>{{ $mt->data_emissao}}</td>
        <td>{{ $mt->situacao }}</td>
        <td>
            <a href={{ route(Request::segment(5) . '.edit', ['account' => Request::segment(2), 'group' => Request::segment(4), 'lancamento' => $mt->id])}} class="btn btn-sm btn-light">Gerenciar</a>
            @if($mt->situacao != 'Concluido')
              <a href={{ route('consolidar.create', ['account' => Request::segment(2), 'group' => Request::segment(4), 'parcelamento' => $mt->parcela_id])}} class="btn btn-sm btn-success">Quitar</a>
            @endif
            @if($mt->observacao != null || $mt->obs_parcela != null) 
              <span class="badge badge-pill badge-info">obs</span>
            @endif
            @if($mt->path != null) 
              <span class="badge badge-pill badge-info">&#128206</span>
            @endif         
        </td>                
      </tr>
    @endforeach              
    </tbody>
</table> 