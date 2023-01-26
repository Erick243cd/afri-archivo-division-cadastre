<?php

namespace App\Models;

use CodeIgniter\Model;

class MiseEnValeurModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mise_en_valeurs';
    protected $primaryKey       = 'pv_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['enregistrement', 'pl', 'pc', 'technicien', 'proprietaire', 'gps', 'commune', 'lotissement', 'avenue', 'superficie', 'date_signature', 'scanned_file'];

}
