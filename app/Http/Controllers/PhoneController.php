<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phone;
use App\Repositories\Repository;

class PhoneController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $phone = $this->phone->all();

        return json_encode($phone);
    }

    public function update(Request $request, $user_id, $phone_id)
    {
        $phone = \App\phone::find($phone_id);       
       $t = $phone->update(['number' => $request['number'], 'label' => $request['phone']]);
    
        return redirect()->back();

    }

    public function destroy($user, $phone_id){
       
        $phone = \App\phone::find($phone_id);
        $phone->delete();
        
        return redirect()->back();
    }
}
