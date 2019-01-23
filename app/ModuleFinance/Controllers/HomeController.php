<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;

class HomeController
{

    public function index($id, $group_id){

        $group = \App\Group::find($group_id);        

        return view('finance.home',['group' => $group]);

    }
}
