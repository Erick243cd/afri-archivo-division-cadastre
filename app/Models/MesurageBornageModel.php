<?php

namespace App\Models;

use CodeIgniter\Model;

class MesurageBornageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mesuragebornages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['enregistrement', 'pl', 'pc', 'technicien', 'proprietaire', 'gps', 'commune', 'lotissement', 'avenue', 'superficie', 'date_signature', 'observation', 'scanned_file'];


}
