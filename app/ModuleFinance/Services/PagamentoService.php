<?php

namespace App\ModuleFinance\Services;

use App\ModuleFinance\Repositories\LancamentoRepository;
use App\ModuleFinance\Entities\Lancamento;
use Illuminate\Http\Request;

class PagamentoService {

    protected $repository;

    public function __construct(Lancamento $model)
    {
        $this->repository   = new LancamentoRepository($model);

    }

    /**
     * Get all the resources to build the create Lancamento.     * 
     * @param Group_Id     * 
     * @return Array
     */
    public function create($group_id)
    {
        return $this->repository->getAllDetails($group_id);
    }

    public function store($request, $user_id, $group_id)
    {
        try{

            $request['tipo']        = 1; // 1-Pagamentos e 2-Recebimento
            $request['situacao_id'] = 1; // 1 - em Aberto
            $request['group_id']    = $group_id;

            $conta = array(
                'categoria'          => $request['categoria'],
                'grupo_financeiro'   => $request['grupoFinanceiro'],
                'group'              => $request['group_id'],               
                'nome'               => $request['nome'],
                'tipo'               => $request['tipo'],
                'data_emissao'       => $request['dataEmissao'],
                'numero_documento'   => $request['numeroDocumento'],
                'created_at'         => date("Y-m-d H:i:s"),
            );

            $result = $this->repository->novoLancamento($conta, $request);

            return [
                'success'   => true,
                'message'   => 'Conta criada com sucesso',                
            ];

        }
        catch(Exception $e)
        {
            return [
                'success'   => false,
                'message'   => 'Houve um erro' . $e,                
            ];

        }
    }
    /**
     * Return an specific resource
     * @param $id
     * @return resource
     */
    public function show($id)
    {
        try{

            $result = $this->repository->show($id);

            return [
                'success'   => true,
                'message'   => '',                
                'data'      => $result
            ];

        }
        catch(Exception $e)
        {
           return [
                'success'   => false,
                'message'   => 'Nao foi possivel localizar a conta' . $e,
                'data'      => null
            ];

        }
    }

    /**
     * Open Edit page to an specific Resource
     * @param $id
     * @return Array 
     */
    public function edit($id)
    {
       $conta = $this->repository->show($id);
       $data    = $this->create($request->group);
       
       return [$conta, $data];
    }


    /**
     * Save the new data to the resource
     * @param $request, $id
     * @return resource
     */
    public function update($request, $id)
    {
        try{

            $result = $this->repository->update($request, $id);

            return [
                'success'   => true,
                'message'   => 'Conta Atualizada com sucesso',
                'data'      => $result
            ];

        }
        catch(Exception $e)
        {
           return [
                'success'   => false,
                'message'   => 'Houve um erro' . $e,
                'data'      => null
            ];

        }
    }

    /**
     * Delete an resource
     * @param $id
     * 
     */
    public function destroy($id)
    {
        try{
        
            $this->repository->delete($id);

            return [
                'success'   => true,
                'message'   => 'Conta Apagada com sucesso',                
            ];
        }
        catch(Exception $e)
        {
            return [
                'success'   => false,
                'message'   => 'Nao foi possivel Apagar a conta',                
            ];

        }

    }

}