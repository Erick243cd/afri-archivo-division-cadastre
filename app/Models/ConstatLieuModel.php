<?php

namespace App\Models;

use CodeIgniter\Model;

class ConstatLieuModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'constats_lieu';
    protected $primaryKey       = 'pv_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['enregistrement', 'pl', 'pc', 'technicien', 'propriétaire', 'gps', 'commune', 'lotissement', 'avenue', 'superficie', 'date_signature', 'scanned_file'];

}
