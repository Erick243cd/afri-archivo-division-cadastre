<?php

namespace App\Models;

use CodeIgniter\Model;

class PcModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'pcs';
    protected $primaryKey = 'pc_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['numero', 'pv', 'pl_or_pc', 'superficie', 'demandeur', 'commune', 'lotissement', 'initiateur', 'date_enregistrement', 'observation', 'scanned_file'];


    public function fetchPcs($request, $searchType)
    {
        $this->asObject()->orderBy('pc_id', 'DESC')->limit(200)
            ->join('communes', 'communes.commune_id=pcs.commune')
            ->join('lotissements', 'lotissements.lotis_id=pcs.lotissement');

        if (!empty($request)) {
            if ($searchType !== 'all') {
                return $this->like("{$searchType}", $request)->findAll();
            } else {
    
                return $this
                    ->like('numero', $request)
                    ->orLike('pv', $request)
                    ->orLike('pl_or_pc', $request)
                    ->orLike('demandeur', $request)
                    ->orLike('initiateur', $request)
                    ->orLike('date_enregistrement', $request)
                    ->orLike('commune_name', $request)
                    ->orLike('lotis_name', $request)
                    ->findAll();
            }

        } else {
            return $this->findAll();
        }
    }

}


