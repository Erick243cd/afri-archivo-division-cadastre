<?php

namespace App\Controllers;

class Pcs extends BaseController
{
    public function index()
    {
        //
    }

    public function add()
    {
        $data = [
          'title'=>'Nouveau PC'
        ];
        return view('pcs/add', $data);
    }
}
