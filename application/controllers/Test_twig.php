<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_twig extends CI_Controller
{
    public function index()
    {
        $this->load->library('twig_view');
        $data = [
            'title' => 'Hello From Twig'
        ];
        echo $this->twig_view->render('test_twig', $data);
    }
}
