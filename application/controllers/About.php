<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function index()
    {
        $this->load->view('web/template/header.php');
        $this->load->view('web/about.php');
        $this->load->view('web/template/footer.php');
    }
}
