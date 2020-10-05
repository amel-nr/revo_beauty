<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgoraController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('agora.index');
    }


    public function show()
    {
        return view('agora.show');
    }

}
