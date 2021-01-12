<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = [
            'content'  => 'home/home/tentang'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }
}
