<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(['url','form']);
    $this->load->library('session');
    $this->load->model('user_model');
  }

  public function index()
  {
    $data = [
      'email' => $this->input->post('email'),
      'password' => md5($this->input->post('password'))
    ];
		$result = $this->user_model->get_user($data);
		if(! empty($result))
		{
			$session_data = [
				'user_email' => $result->user_email,
				'user_kd' => $result->user_kode,
				'user_telpon' => $result->user_telpon,
				'user_pass' => $result->user_pass,
				'user_name' => $result->user_nama,
				'user_login' => $result->user_login
			];
			$this->session->set_userdata($session_data);
		}
		redirect(base_url());
  }

  public function signup()
  {
    
  }

  public function signout()
  {
  $session_data = ['user_email','user_pass','user_name','user_login', 'user_kd', 'user_telpon'];

  if($this->session->has_userdata('user_login')):
    $this->session->unset_userdata($session_data);
    redirect(base_url());
  else:
    redirect(base_url());
  endif;
  }
}
