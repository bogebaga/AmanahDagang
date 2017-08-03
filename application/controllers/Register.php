<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'form']);
		$this->load->library(['session','form_validation']);
    $this->load->model(['user_model','iklan_model']);
	}

	public function index(){
		$data = $this->input->post('email');
		if (! empty($this->user_model->validate_user_exist($data)))
		{
			$this->session->set_flashdata('pesan_akun',	'<div class="alert alert-danger alert-dismissable show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:0;padding:0 15px;"> <span aria-hidden="true">&times;</span> </button> <strong>Alamat Email sudah ada yang pakai!</strong> Masukkan alamat email yang lain. </div>');

			redirect(base_url("beranda/daftar"));
		}

		$this->user_model->insert_user();
		redirect('./');
  }
}
