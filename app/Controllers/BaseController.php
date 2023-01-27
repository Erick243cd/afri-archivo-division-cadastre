<?php

namespace App\Controllers;

use App\Models\CommuneModel;
use App\Models\ConstatLieuModel;
use App\Models\DelimitationModel;
use App\Models\LotissementModel;
use App\Models\MesurageBornageModel;
use App\Models\MiseEnValeurModel;
use App\Models\PcModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;
use Config\Services;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        helper(['form', 'url', 'custom', 'text', 'html', 'download']);
        $this->validation = Services::validation();
        $this->session = Services::session();

        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();

        $this->pcModel = new PcModel();

        $this->constatLieuModel = new ConstatLieuModel();
        $this->delimitationModel = new DelimitationModel();
        $this->mesurageBornageModel = new MesurageBornageModel();
        $this->miseEnValeurModel = new MiseEnValeurModel();


        $this->lotissementModel = new LotissementModel();
        $this->communeModel = new CommuneModel();


    }
}
