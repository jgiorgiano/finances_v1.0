<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModuleFinance\Controllers\DetalhesControllerInterface;

class DetalhesController extends Controller implements DetalhesControllerInterface
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = $this->repository->all();

        return view('finance.detalhes.index',
            [
                'data' => $collection
            ]);
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|max:20'
        ]);

        try{

            $this->repository->create($validated);

            session()->flash('message', [
                'success'   => 'true',
                'message'   => $validated->nome . 'incluido com sucesso'
            ]);

            return redirect()->back();

        }
        catch(Exception $e)
        {

            session()->flash('message', [
                'success'   => false,
                'message'   => $e . 'Não foi possivel efetuar a inclusao do registro'
            ]);

            return redirect()->back();

        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|max:20'
        ]);

        try{

            $this->repository->update($validated, $id);

            session()->flash('message', [
                'success'   => 'true',
                'message'   => $validated->nome . 'incluido com sucesso'
            ]);

            return redirect()->back();

        }
        catch(Exception $e)
        {

            session()->flash('message', [
                'success'   => false,
                'message'   => $e . 'Não foi possivel atualizar o registro'
            ]);

            return redirect()->back();

        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try{

            $this->repository->Delete($id);

            session()->flash('message', [
                'success'   => 'true',
                'message'   => 'Item removido com sucesso'
            ]);

            return redirect()->back();

        }
        catch(Exception $e)
        {

            session()->flash('message', [
                'success'   => false,
                'message'   => 'Não foi possivel remover o registro'
            ]);

            return redirect()->back();

        }
    }
    
}
