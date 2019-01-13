<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\groupService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(groupService $service)
    {
        $this->middleware('auth');
        $this->groupService = $service;       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {           
        $groups = $this->groupService->homeIndex(\Auth::id());    
                
        
        return view('home',[
            'title'     => 'Dashboard',
            'groups'    => $groups,
        ]);
    }
}
