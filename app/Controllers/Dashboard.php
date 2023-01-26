<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Dashboard | Afrinewsoft',
//            'cars'      =>  $this->carModel->countAll(),
//            'videos'    =>  $this->videoModel->countAll(),
            'users'     =>  $this->userModel->countAll(),
//            'teams'     =>  $this->teamModel->countAll(),
//            'services'  =>  $this->serviceModel->countAll(),
//            'tests'     =>  $this->testModel->countAll(),
//            'projs'     =>  $this->projectModel->countAll(),
            'user_data' => session()->get('user_data')
        ];
        return view('dashboard/index',$data);
    }
}
