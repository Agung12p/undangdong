<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->output->set_status_header('404');
        $data['content'] = 'error_404';
        $this->load->view('web/404.php', $data);
    }
}
