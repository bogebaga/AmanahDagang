<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'form']);
		$this->load->library(['session', 'form_validation']);
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

	public function login()
	{
		$this->load->view('template/header-admin');
		$this->load->view('admin/login');
		$this->load->view('template/footer-admin');
	}

	public function masuk()
	{
		$data = [
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'type' => 'admin'
		];

		$result = $this->user_model->get_user_admin($data);

		if(! empty($result))
		{
			$session_data = [
				'user_email_admin' => $result->user_email,
				'user_kd_admin' => $result->user_kode,
				'user_telpon_admin' => $result->user_telpon,
				'user_pass_admin' => $result->user_pass,
				'user_name_admin' => $result->user_nama,
				'user_login_admin' => $result->user_login
			];
			$this->session->set_userdata($session_data);
		}
		redirect(base_url().'admin');
	}

	public function signout_admin()
	{
		$session_data = ['user_email_admin','user_pass_admin','user_name_admin','user_login_admin', 'user_kd_admin', 'user_telpon_admin'];

		if($this->session->has_userdata('user_login_admin')):
			$this->session->unset_userdata($session_data);
			redirect(base_url().'admin/login');
		else:
			redirect(base_url().'admin/login');
		endif;
	}
}
