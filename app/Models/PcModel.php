<?php

namespace App\Models;

use CodeIgniter\Model;

class PcModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pcs';
    protected $primaryKey       = 'pc_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['numero', 'pv', 'pl_or_pc', 'superficie', 'demandeur', 'commune', 'lotissement', 'initiateur', 'date_enregistrement', 'observation', 'scanned_file'];

    // Dates
}
