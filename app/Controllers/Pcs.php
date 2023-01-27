<?php

namespace App\Controllers;

class Pcs extends BaseController
{
    public function index()
    {
        $request = $this->request->getVar('query');
        $data = [
            'page' => 'loadData',
            'title' => 'Liste de PCs',
            'user_data' => session()->get('user_data')
        ];
        return view('pcs/index', $data);
    }

    public function add()
    {
        $data = [
            'validation' => null,
            'page' => 'write',
            'title' => "Nouveau PC",
            'roles' => $this->roleModel->asObject()->orderBy('role_type', 'desc')->findAll(),
            'communes' => $this->communeModel->asObject()->orderBy('commune_name', 'ASC')->findAll(),
        ];

        if ($this->request->getMethod() == 'post') {
            $this->validation->setRules([
                'numero' => [
                    'label' => 'Numéro d\'enregistrement', 'rules' => 'required|is_unique[pcs.numero]',
                    'errors' => [
                        'required' => 'Complétez ce champ',
                        'is_unique' => 'Le numéro d\'enregistrement saisi existe déjà.',
                    ]
                ],
                'pv' => [
                    'label' => 'Numéro PV', 'rules' => 'required|is_unique[pcs.pv]',
                    'errors' => [
                        'required' => 'Complétez ce champ',
                        'is_unique' => 'Le numéro PV saisi existe déjà.',
                    ]
                ],
                'pl_or_pc' => [
                    'label' => 'Numéro PC ou PL', 'rules' => 'required|check_pc',
                    'errors' => [
                        'required' => 'Complétez ce champ',
                        'check_pc' => "Le numéro PC ou PL saisi existe déjà dans le même lotissement",
                    ]
                ],
                'superficie' => [
                    'label' => 'Superficie',
                    'rules' => 'required',
                    'errors' => ['required' => 'Complétez ce champ']
                ],
                'demandeur' => [
                    'label' => 'Nom du demandeur',
                    'rules' => 'required',
                    'errors' => ['required' => 'Complétez ce champ']
                ],
                'commune' => [
                    'label' => "Commune/Territoire/Village/Groupement",
                    'rules' => 'required',
                    'errors' => ['required' => 'Complétez ce champ']
                ],
                'lotissement' => [
                    'label' => "Lotissement",
                    'rules' => 'required',
                    'errors' => ['required' => 'Complétez ce champ']
                ],
                'initiateur' => [
                    'label' => "Nom de l'initiateur",
                    'rules' => 'required',
                    'errors' => ['required' => 'Complétez ce champ']
                ],
                'date_enregistrement' => [
                    'label' => "Date d'enregistrement",
                    'rules' => 'required',
                    'errors' => ['required' => 'Complétez ce champ']
                ],
                'scanned_file' => [
                    'label' => "Fichier Scanné",
                    'rules' => 'max_size[scanned_file, 50096]|ext_in[scanned_file,pdf,docx,png,jpg,jpeg]',
                    'errors' => [
                        'ext_in' => 'Le format du fichier choisi n\'est pas pris en charge',
                        'max_size' => "La taille maximale du fichier doit être 50MB",
                        'uploaded' => "Fichier non pris en charge",
                    ]
                ],
            ]);
            if ($this->validation->withRequest($this->request)->run()) {

                $path = '.public/assets/uploads/pcs';

                $file = $this->request->getFile('scanned_file');

                if ($file->isValid() && !$file->hasMoved()) {
                    $fileName = $file->getRandomName();
                    $file->move($path, $fileName);
                } else {
                    $fileName = "no_file";
                }

                $data = array(
                    'numero' => htmlentities($this->request->getVar('numero')),
                    'pv' => htmlentities($this->request->getVar('pv')),
                    'pl_or_pc' => htmlentities($this->request->getVar('pl_or_pc')),
                    'superficie' => htmlentities($this->request->getVar('superficie')),
                    'demandeur' => htmlentities($this->request->getVar('demandeur')),
                    'commune' => htmlentities($this->request->getVar('commune')),
                    'lotissement' => htmlentities($this->request->getVar('lotissement')),
                    'initiateur' => htmlentities($this->request->getVar('initiateur')),
                    'date_enregistrement' => htmlentities($this->request->getVar('date_enregistrement')),
                    'observation' => htmlentities($this->request->getVar('observation')),
                    'scanned_file' => $fileName,
                );
                $this->pcModel->insert($data);
                $session = session();
                $session->setFlashData("success", "Enregistrement effectué avec succès !");
                return redirect()->to('pcs-list');

            } else {
                $data['validation'] = $this->validation->getErrors();
            }
        }

        return view('pcs/add', $data);
    }

    public function getLotisByCommune()
    {
        $request = $this->request->getVar('query');
        $result = $this->lotissementModel->asObject()->where('commune_id', $request)->findAll();

        if (empty($result)) {
//
            echo '<option value="" selected>Aucun lotissement trouvé</option>';
        } else {
            foreach ($result as $row) {
                echo '<option value="' . $row->lotis_id . '" ' . set_select("lotissement") . '>' . $row->lotis_name . '</option>';
            }
        }
    }

    public function fetchPcs()
    {
        $output = '';
        $request = '';

        if ($this->request->getVar('request') !== null) {
            $request = htmlentities($this->request->getVar('request'));
        }


        $searchType = $this->request->getVar('searchType');


        $data = $this->pcModel->fetchPcs($request, $searchType);
        $path = site_url("public/assets/uploads/pcs");
        if (!empty($data)) {
            foreach ($data as $row) {
                $output .= '<tr>';
                $output .= '<td>' . $row->date_enregistrement . '</td>';
                $output .= '<td>' . $row->numero . '</td>';
                $output .= '<td>' . $row->pv . '</td>';
                $output .= '<td>' . $row->pl_or_pc . '</td>';
                $output .= '<td>' . $row->superficie . '</td>';
                $output .= '<td>' . $row->commune_name . '</td>';
                $output .= '<td>' . $row->lotis_name . '</td>';
                $output .= '<td>' . $row->demandeur . '</td>';
                $output .= '<td>' . $row->initiateur . '</td>';
                $output .= '<td> <a class="btn btn-sm btn-primary" href="' . $path . '/' . $row->scanned_file . '"><i class="fa fa-file-download"></i></a></td>';

                $msg = "Etes-vous sûr de supprimer ce PC ?";
                $output .= '
                            <td>
                                <a title="Voir le détail" class="btn btn-sm btn-info" href="' . site_url("edit-pc/{$row->pc_id}") . '"><i class="fas fa-edit"></i></a>
                                <a title="Supprimer" id="deleteBtn" class="btn btn-sm btn-danger" href="' . site_url("delete-pc/{$row->pc_id}") . '"><i class="fas fa-trash"></i></a>
                            </td>
                          
                            ';

                $output .= '</tr>';
            }
        }
        echo $output;
    }

    public function deletePc($pcId = null)
    {
        $pc = $this->pcModel->where('pc_id', $pcId)->first();
        if (!empty($pc)) {
            $this->pcModel->delete($pcId);
            $session = session();
            $session->setFlashData("success", "Suppression effectuée avec succès !");
        } else {
            $session = session();
            $session->setFlashData("error", "Impossible de supprimer, PC non retrouvé !");
        }
        return redirect()->to('pcs-list');
    }


    public function editPc($pcId = null)
    {
        $pc = $this->pcModel->asObject()->where('pc_id', $pcId)->first();
        if (!empty($pc)) {

            $data = [
                'validation' => null,
                'page' => 'write',
                'title' => "Editer Pc",
                'communes' => $this->communeModel->asObject()
                    ->orderBy('commune_name', 'ASC')
                    ->where('commune_id !=', $pc->commune_id)->findAll(),
            ];
            if ($this->request->getMethod() == 'post') {
                $this->validation->setRules([
                    'numero' => [
                        'label' => 'Numéro d\'enregistrement',
                        'rules' => ($this->request->getVar('numero') == $pc->numero) ? 'required' : 'required|is_unique[pcs.numero]',
                        'errors' => [
                            'required' => 'Complétez ce champ',
                            'is_unique' => 'Le numéro d\'enregistrement saisi existe déjà.',
                        ]
                    ],
                    'pv' => [
                        'label' => 'Numéro PV',
                        'rules' => ($this->request->getVar('pv') == $pc->pv) ? 'required' : 'required|is_unique[pcs.pv]',
                        'errors' => [
                            'required' => 'Complétez ce champ',
                            'is_unique' => 'Le numéro PV saisi existe déjà.',
                        ]
                    ],
                    'pl_or_pc' => [
                        'label' => 'Numéro PC ou PL',
                        'rules' => ($this->request->getVar('pl_or_pc') == $pc->pl_or_pc) ? 'required' : 'required|check_pc',
                        'errors' => [
                            'required' => 'Complétez ce champ',
                            'check_pc' => "Le numéro PC ou PL saisi existe déjà dans le même lotissement",
                        ]
                    ],
                    'superficie' => [
                        'label' => 'Superficie',
                        'rules' => 'required',
                        'errors' => ['required' => 'Complétez ce champ']
                    ],
                    'demandeur' => [
                        'label' => 'Nom du demandeur',
                        'rules' => 'required',
                        'errors' => ['required' => 'Complétez ce champ']
                    ],
                    'commune' => [
                        'label' => "Commune/Territoire/Village/Groupement",
                        'rules' => 'required',
                        'errors' => ['required' => 'Complétez ce champ']
                    ],
                    'lotissement' => [
                        'label' => "Lotissement",
                        'rules' => 'required',
                        'errors' => ['required' => 'Complétez ce champ']
                    ],
                    'initiateur' => [
                        'label' => "Nom de l'initiateur",
                        'rules' => 'required',
                        'errors' => ['required' => 'Complétez ce champ']
                    ],
                    'date_enregistrement' => [
                        'label' => "Date d'enregistrement",
                        'rules' => 'required',
                        'errors' => ['required' => 'Complétez ce champ']
                    ]
                ]);
                if ($this->validation->withRequest($this->request)->run()) {

                    $data = array(
                        'numero' => htmlentities($this->request->getVar('numero')),
                        'pv' => htmlentities($this->request->getVar('pv')),
                        'pl_or_pc' => htmlentities($this->request->getVar('pl_or_pc')),
                        'superficie' => htmlentities($this->request->getVar('superficie')),
                        'demandeur' => htmlentities($this->request->getVar('demandeur')),
                        'commune' => htmlentities($this->request->getVar('commune')),
                        'lotissement' => htmlentities($this->request->getVar('lotissement')),
                        'initiateur' => htmlentities($this->request->getVar('initiateur')),
                        'date_enregistrement' => htmlentities($this->request->getVar('date_enregistrement')),
                        'observation' => htmlentities($this->request->getVar('observation')),
                    );
                    $this->pcModel->update($pcId, $data);
                    $session = session();
                    $session->setFlashData("success", "Modification effectuée avec succès !");
                    return redirect()->to('pcs-list');

                } else {
                    $data['validation'] = $this->validation->getErrors();
                }
            }
            return view('pcs/add', $data);

        } else {
            $session = session();
            $session->setFlashData("error", "Impossible de modifier, PC non retrouvé !");
            return redirect()->to('pcs-list');
        }
    }


    function download($filename = NULL)
    {
        // load download helder
        helper('download');
        // read file contents
        $data = file_get_contents(site_url('public/assets/uploads/pcs/' . $filename));
    }
}
