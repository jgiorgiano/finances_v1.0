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
    public function __construct(Phone $phone)
    {
        $this->middleware('auth');
        $this->phone = new Repository($phone);
    }

    public function index()
    {

        $phone = $this->phone->all();

        return json_encode($phone);


    }
}
