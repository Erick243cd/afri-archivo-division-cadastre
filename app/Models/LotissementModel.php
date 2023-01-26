<?php

namespace App\Models;

use CodeIgniter\Model;

class LotissementModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'lotissements';
    protected $primaryKey = 'lotis_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['lotis_name', 'commune_id'];
}
