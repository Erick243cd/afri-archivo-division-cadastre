<?php

namespace App\Models;

use CodeIgniter\Model;

class CommuneModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'communes';
    protected $primaryKey       = 'commune_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['commune_name'];

}
