<?php

namespace App\Models;

use CodeIgniter\Model;

class DelimitationModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'delimitations';
    protected $primaryKey = 'pv_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['enregistrement', 'pc', 'commune', 'lotissement', 'perimetres', 'superficie', 'distance_cotes', 'gps', 'technicien', 'instrument_utilise', 'date_signature', 'scanned_file'];

}
