<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('web/template/header.php');
        $this->load->view('web/web.php');
        $this->load->view('web/template/footer.php');
    }
}
