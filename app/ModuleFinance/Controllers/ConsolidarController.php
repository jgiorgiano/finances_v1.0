<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;
use App\ModuleFinance\Repositories\ComposicaoRepository;
use App\ModuleFinance\Entities\Composicao;
use App\ModuleFinance\Services\ComposicaoService;
use App\ModuleFinance\Entities\Lancamento;
use Illuminate\Support\Facades\DB;

class ConsolidarController
{
   
    public function __construct(Lancamento $model)
    {
        $this->lancamento = $model;
    }
    
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *@param int $id
     * @return \Illuminate\Http\Response
     */
    public function create($user_id, $group_id, $lancamento_id)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $group, $lancamento_id, $parcela)
    {
        
        $lan = $this->lancamento->get($lancamento_id);
        //$lancamento = Lancamento::where('id', $lancamento_id)->get();
         /* $lan = DB::table('lancamento')
            ->where('id', $lancamento_id)
            ->get(); */
        $p = $lan->parcelas();
        dd($p);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
