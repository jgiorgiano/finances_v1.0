@extends('layouts.homeDashboard')

@section('content')

<div class="col-md-6 offset-md-3">
  <div class="card">
    <div class="card-body">
        <h5 class="card-title text-center">{{$title}}</h5>
        
{{--      @empty(!$data)          
      <hr>     
      @foreach($data as $data)
      <form method="POST" action="{{ route($route . '.update', ['account' => Request::segment(2), 'group_id' => Request::segment(4), 'categoria' => $data->id]) }}">
      @method('PUT')      
      @csrf      
        <div class="form-row">
            <div class="form-group col-md">            
                <input type="text" value='{{ $data->nome }}'class="form-control" 
                name="nome" required> 
                @if ($errors->has('nome'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                @endif
            </div>
            <div>
              <button class="btn btn-success" type="submit">Salvar</button>
            </div>
          </form>    
            <div>
              <form action="{{route($route . '.destroy', ['account' => Request::segment(2), 'group_id' => Request::segment(4), 'categoria' => $data->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Apagar</button>
              </form>
            </div>
        </div>
        @endforeach

    @endempty  --}}

    @empty(!$data)          
    <hr>     
    @foreach($data as $data)
    <form method="POST" action="#">
    @method('PUT')      
    @csrf      
      <div class="form-row">
          <div class="form-group col-md">            
              <input type="text" data-id={{$data->id}} class="cname" value='{{ $data->nome }}'class="form-control" 
              name="nome" required> 
              @if ($errors->has('nome'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('nome') }}</strong>
                  </span>
              @endif
          </div>
          <div>
            <button class="btn btn-success" id="cnameBtn" type="submit">Salvar</button>
          </div>
        </form>    
          <div>
            <form action="{{route($route . '.destroy', ['account' => Request::segment(2), 'group_id' => Request::segment(4), 'categoria' => $data->id])}}" method="post">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger" type="submit">Apagar</button>
            </form>
          </div>
      </div>
      @endforeach

  @endempty
      
      <div id="newItem" {{ empty($data->id) ? '' : "style=display:none;" }} >          
        <form action= {{ route($route.'.store', ['account' => Request::segment(2), 'group_id' => Request::segment(4)] )}} method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md">            
                    <input type="text" id="newCname" class="form-control" name="nome" required>    
                </div>              
                <div class="form-group col-xl-2">           
                    <button type="submit" id="newCnameBtn" class="btn btn-success float-right">Salvar</button>         
                </div>              
            </div>
        </form>
      </div>
      <div class="form-row">
          <div class="col-md">
              <a href="" id="btn-newItem" class="btn btn-primary btn-sm float-right my-2">Novo</a>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection