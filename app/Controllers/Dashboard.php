<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard | Afrinewsoft',
            'communes' => $this->communeModel->countAll(),
            'lotissements' => $this->lotissementModel->countAll(),
            'pcs' => $this->pcModel->countAll(),

            'miseEnValeurs' => $this->miseEnValeurModel->countAll(),
            'delimitations' => $this->delimitationModel->countAll(),
            'mesurage' => $this->mesurageBornageModel->countAll(),
            'constat_lieu' => $this->constatLieuModel->countAll(),

            'users' => $this->userModel->countAll(),
            'user_data' => session()->get('user_data')
        ];
        return view('dashboard/index', $data);
    }
}
