<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phone;
use App\Repositories\Repository;
use App\Http\Requests\phoneRequest;

class PhoneController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Phone $phone)
    {
        $this->middleware('auth');
        $this->phone = $phone;
    }

    public function index()
    {
        
    }

    public function store(phoneRequest $request, $user_id)
    {       

        $validated = $request->validated();
        $validated['user_id'] = $user_id;
     
        $this->phone->create($validated);

        return redirect()->back();

        

    }


    public function update(phoneRequest $request, $user_id, $phone_id)
    {
       
        $this->phone->find($phone_id)->update($request->validated());
    
        return redirect()->back();

    }

    public function destroy($user, $phone_id){
       
      $this->phone->find($phone_id)->delete();
        
        return redirect()->back();
    }
}
