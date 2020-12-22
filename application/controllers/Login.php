<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
      public function __construct()
      {
            parent::__construct();
            $this->load->model('user');
            $this->load->library('form_validation');
            $this->load->helper(['form', 'url']);
      }

      public function index()
      {
            $this->load->view('member/login');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|');
            if ($this->form_validation->run() == false) {
                  $this->load->view('login');
            } else {
                  $this->login();
            }
      }

      public function login()
      {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->user->getuser($email);
      }
}
