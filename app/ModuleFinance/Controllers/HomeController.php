<?php

namespace App\ModuleFinance\Controllers;

use Illuminate\Http\Request;

class HomeController
{

    public function index($id, $group_id){

        $groupName = \App\Group::find($group_id)->nome;

        return view('finance.home',['groupName' => $groupName]);

    }
}
