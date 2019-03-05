<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetalhesController extends Controller
{
   
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $group_id)
    {        
        
        $collection = $this->repository->allFromGroup($group_id);        

        return view('finance.detalhes.index',
            [
                'title' => $this->title,
                'route' => $this->route,
                'data' => $collection
            ]);
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $group_id)
    {
        
        $validated = $request->validate([
            'nome' => 'required|max:20'
        ]);

        try{

            $validated['group_id'] = $group_id;

            $data = $this->repository->create($validated);

            session()->flash('message', [
                'success'   => 'true',
                'message'   => 'incluido com sucesso'
            ]);

            return response()->json($data);

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
    public function update(Request $request, $id, $group_id, $cat_id)
    {
       
        $validated = $request->validate([
            'nome' => 'required|max:20'
        ]);
        
        try{

            $this->repository->update($validated, $cat_id);

            session()->flash('message', [
                'success'   => 'true',
                'message'   => 'Item Atualizado com sucesso'
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
    public function destroy( $id, $group_id, $cat_id)
    {
        
        try{

            $this->repository->Delete($cat_id);

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
