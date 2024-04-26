<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class MasterController extends BaseController
{
    protected $response;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->response = $response;
        date_default_timezone_set('Asia/Jakarta');
    }

    protected function hasLoggedIn()
    {
        if (getSegment(1) === FALSE) {
            if ($this->session->get('isLoginUser')) {
                $this->response->redirect(base_url('dashboard'));
            } else if ($this->session->get('isLoginAdmin')) {
                $this->response->redirect(base_url('administrator/dashboard'));
            } else {
                $this->response->setStatusCode(200);
            }
        }
    }
}
