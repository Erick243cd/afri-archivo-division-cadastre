<?php

namespace App\Validations;

use App\Models\PcModel;

class CustomRules
{
    private $pcModel;

    public function __construct()
    {
        $this->pcModel = new PcModel();
    }

    //check month and your before saving taux
    function check_pc(string $str, string &$error = null): bool
    {
        $data = $this->pcModel->where([
            'pl_or_pc' => $_POST['pl_or_pc'],
            'commune' => $_POST['commune'],
            'lotissement' => $_POST['lotissement']
        ])->findAll();

        if (empty($data)) {
            return true;
        } else {
            return false;
        }
    }
}

  