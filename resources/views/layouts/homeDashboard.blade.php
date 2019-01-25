@extends('layouts.app')

@section('dashboard')
<nav class="navbar navbar-expand-md sticky-top navbar-light bg-light border border-white p-0 m-0 mb-3">
    <div class="container">
        <h6 class="lead text-secondary border-right border-secondary pr-2 my-auto">
            {{ $group->nome ?? 'Nome do Grupo' }}
        </h6>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFinance" aria-controls="navbarFinance" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarFinance">       
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle mx-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Pagamentos <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href={{ route('pagamentos.create', ['account' => Request::segment(2), 'group' => Request::segment(4)]) }}>
                                Nova Conta a Pagar
                        </a>
                        <a class="dropdown-item" href={{ route('pagamentos.index', ['account' => Request::segment(2), 'group' => Request::segment(4)]) }}>
                                Relatorio
                        </a>
                        <a class="dropdown-item" href={{ route('pagamentos.index', ['account' => Request::segment(2), 'group' => Request::segment(4)]) }}>
                            Quitar conta
                        </a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle mx-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Recebimentos <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href={{ route('recebimentos.create', ['account' => Request::segment(2), 'group' => Request::segment(4)]) }}>
                                Nova Conta a Receber
                        </a>
                        <a class="dropdown-item" href={{ route('recebimentos.index', ['account' => Request::segment(2), 'group' => Request::segment(4)]) }}>
                                Relatorio
                        </a>
                        <a class="dropdown-item" href={{ route('recebimentos.index', ['account' => Request::segment(2), 'group' => Request::segment(4)]) }}>
                                Quitar conta
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle mx-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Relatorios <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href={{ route('home') }}>
                                Nova Conta
                        </a>
                        <a class="dropdown-item" href={{ route('account.show', Request::segment(2)) }}>
                                Relatorio
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            Quitar conta
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle mx-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Configuracões <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href={{ route('categorias.index',['account' => Request::segment(2), 'group' => Request::segment(4)]) }}>
                                Categorias
                        </a>
                        <a class="dropdown-item" href={{ route('grupofinanceiro.index', ['account' => Request::segment(2), 'group' => Request::segment(4)]) }}>
                                Grupos Financeiros
                        </a>
                      {{--    <a class="dropdown-item" href="{{ route('situacao.index',[Auth::id(), 1]) }}">
                                Situacão de Conta
                        </a>  --}}
                        <a class="dropdown-item" href="{{ route('contacorrente.index',['account' => Request::segment(2), 'group' => Request::segment(4)]) }}">
                                Contas Corrente
                        </a>
                        <a class="dropdown-item" href="{{ route('formapagamento.index',['account' => Request::segment(2), 'group' => Request::segment(4)]) }}">
                                Formas de Pagamentos
                        </a>

                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">               
                <div class="card-body">
                    

                    @yield('content')

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
