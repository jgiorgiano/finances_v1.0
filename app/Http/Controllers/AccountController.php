<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\accountService;
use App\Http\Requests\accountRequest;


class AccountController extends Controller
{

    public function __construct(accountService $service)
    {        
        $this->service  = $service;        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(accountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            
        $data = $this->service->getFullRegister($id);       
           
        return view('account.index', [
            'title'     => 'My Account',
            'user'      => $data['user'],
            'address'   => $data['address'],
            'phone'     => $data['phone'],            
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(accountRequest $request, $id)
    {
        $validated = $request->validated();

        $this->service->update($validated, $id);

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
        //
    }

    
}
