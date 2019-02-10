<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\userService;
use App\Http\Requests\userRequest;


class UserController extends Controller
{

    public function __construct(userService $service)
    {        
        $this->service  = $service;        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userRequest $request, $id)
    {
        $validated = $request->validated();

        $this->service->update($validated, $id);

        return redirect()->back();
        
    }

    public function invitedForm($email, $token)    
    {
        $data = $this->service->invitedForm($email, $token);

       

        return view('auth.register', [
            'title'     => 'Complete your Register',
            'data'      => $data,                      
        ]);
    }

    public function invitedRegister(userRequest $request)
    {
        
        $this->service->invitedRegister($request->validated());

        return redirect()->route('login');

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
