<?php
defined('BASEPATH') or exit('No direct script access allowed');


class MY_Dashboard extends CI_Controller
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $functions = [];

    /**
     * @var object
     */
    protected $user = NULL;

    /**
     * @var array
     */
    protected $allowed_permissions = [];

    /**
     * @var string
     */
    protected $login_uri = "admin/login";

    public function __construct()
    {
        parent::__construct();
        $this->access_check();
        $this->load->library('twig_view');
        $this->load->helper('url');
        $this->add_data([
            'user'      => $this->user,
            'base_url'  => base_url('/'),
            'site_url'  => site_url('/')
        ]);
    }

    /**
     * @param string Template path
     * @return void
     */
    protected function render($path)
    {
        echo $this->twig_view->render($path, $this->data, $this->functions);
    }

    /**
     * @param array Data
     * @return void
     */
    protected function add_data(array $data)
    {
        foreach ($data as $key => $val)
        {
            $this->data[$key] = $val;
        }
    }

    /**
     * @return void
     */
    protected function access_check()
    {
        $this->user = $this->auth_check();
        if ( ! $this->user)
        {
            redirect($this->login_uri);
        }
        $has_permission = $this->permission_check($this->user, $this->allowed_permissions);
        if ( ! $has_permission)
        {
            redirect($this->login_uri);
        }
    }

    /**
     * @return mixed(object|NULL)
     */
    protected function auth_check()
    {
        $user = (object) [
            'id'    => 0,
            'name'  => 'Guest'
        ];
        return $user;
    }

    /**
     * @param object User object
     * @param array Permissions
     * @return bool
     */
    protected function permission_check($user, array $permissions)
    {
        return TRUE;
    }
}
