<?php

namespace App\ModuleFinance\Services;

use App\ModuleFinance\Repositories\LancamentoRepository;
use App\ModuleFinance\Entities\Lancamento;
use Illuminate\Http\Request;

class AbstractLancamentoService {

    protected $repository;    
    
    public function __construct()
    {
        $this->repository   = new LancamentoRepository(new Lancamento);             

    }


    public function index($group_id)
    {        
            
        return $this->repository->getAllMovimentsByType($group_id, $this->type);

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

    /**
     * Persist data into the DB
     * 
     */
    public function store($request, $user_id, $group_id)
    {
        try{

            $request['tipo']        = $this->type;            
            $request['group_id']    = $group_id;
            $request['situacao']    = 1; // Pendente
            $request['parcela']['situacao'] = 1; // Pendente
 
            $result = $this->repository->newMoviment($request);

            return [
                'success'   => true,
                'message'   => 'Lancamento salvo com sucesso',                
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
                'message'   => 'Nao foi possivel localizar o lancamento' . $e,
                'data'      => null
            ];

        }
    }

    /**
     * Open Edit page to an specific Resource
     * @param $id
     * @return Array 
     */
    public function edit($group_id, $lancamento_id)
    {

        $details     = $this->repository->getAllDetails($group_id);
        $lancamento  = $this->repository->getMovimentById($lancamento_id);
        $parcelas    = $this->repository->getParcelasByLancamentoId($lancamento_id);
        $anexos      = $this->repository->getAnexosByLancamentoId($lancamento_id);

       return ['lancamento' => $lancamento, 
                'details' => $details, 
                'parcelas' => $parcelas, 
                'anexos' => $anexos];
     
    }


    /**
     * Save the new data to the resource
     * @param $request, $id
     * @return resource
     */
    public function update($request, $lancamento_id)
    {
        try{

            $result = $this->repository->updateLancamentoAndParcelas($request, $lancamento_id);

            return [
                'success'   => true,
                'message'   => 'Lancamento Atualizado com sucesso',
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
                'message'   => 'Lancamento excluido com sucesso',                
            ];
        }
        catch(Exception $e)
        {
            return [
                'success'   => false,
                'message'   => 'Nao foi possivel excluir o lancamento',                
            ];

        }

    }

}