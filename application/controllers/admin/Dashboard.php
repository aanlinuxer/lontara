<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH.'core/MY_Dashboard.php');


class Dashboard extends MY_Dashboard
{
    public function index()
    {
        $this->render('admin/dashboard');
    }

    public function blank()
    {
        $this->render('admin/blank');
    }
}
