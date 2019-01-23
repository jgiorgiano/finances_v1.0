<?php

namespace App\ModuleFinance\Services;

use App\ModuleFinance\Repositories\LancamentoRepository;
use App\ModuleFinance\Entities\Lancamento;


class RecebimentoService extends AbstractLancamentoService{

   protected $type = 2; // 1 - pagamento // 2 - Recebimentos
   
}