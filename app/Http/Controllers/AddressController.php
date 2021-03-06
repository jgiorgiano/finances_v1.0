<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addressRequest;
use App\address;

class AddressController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(address $address)
    {
        $this->middleware('auth');
        $this->address = $address;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addressRequest $request, $user_id)
    {
        
        $validated = $request->validated();
        $validated['user_id'] = $user_id;

        $this->address->create($validated);

        return redirect()->back();
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(addressRequest $request, $user_id, $address_id)
    {    

       $this->address->find($address_id)->update($request->validated());
       
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $address_id)
    {      
        
        $this->address->find($address_id)->delete();

        return redirect()->back();
    }
}
