<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;
use App\ModuleFinance\Repositories\LancamentoRepository;
use App\ModuleFinance\Entities\Lancamento;
use App\ModuleFinance\Requests\LancamentoRequest;

class AbstractLancamentoController
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user, $group_id)
    {
        $lancamentos = $this->service->index($group_id);     
        
        

        return view('finance.lancamento.relatorioIndex', [
            'title' => 'Relatorio Geral de ' . $this->sectionName,
            'movimentos' => $lancamentos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group_id)
    {
       $data = $this->service->create($group_id);      
        
       return view('finance.lancamento.createLancamento', [
           'group' => $data['group']->nome,
           'title'  => $this->sectionName,
           'data' => $data,
           'route' => $this->route,
       ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LancamentoRequest $request, $id, $group_id)
    {     
       
        $data = $this->service->store($request->validated(), $id, $group_id);

        session()->flash('success', [
            'success' => $data['success'],
            'message' => $data['message']  
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->service->show($id);

        session()->flash('success', [
            'success' => $data['success'],
            'message' => $data['message']  
        ]);

        return view('financeiro.conta', [
            'data' => $data['data'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {               
       $data = $this->service->edit($id);

       return view('finance.editContaPagar', [
          $data
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LancamentoRequest $request, $id)
    {
         $this->service->update($request->validated(), $id);
        
        session()->flash('success', [
             'success' => $data['success'],
             'message' => $data['message']  
             ]);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->destroy($id);

        session()->flash('success', [
            'success' => $data['success'],
            'message' => $data['message']  
            ]);
        
        return redirect()->back();

    }

}
