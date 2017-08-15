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
		$email = $this->input->post('email');
		if (! empty($this->user_model->validate_user_exist($email, '', FALSE)))
		{
			$this->session->set_flashdata('pesan_akun',	'<div class="alert alert-danger alert-dismissable show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:0;padding:0 15px;"> <span aria-hidden="true">&times;</span> </button> <strong>Alamat Email sudah ada yang pakai!</strong> Masukkan alamat email yang lain. </div>');

			redirect(base_url("beranda/daftar"));
		}

		$this->session->set_flashdata('pesan_akun_success',	'<div class="alert alert-success alert-dismissable show" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top:0;padding:0 15px;"> <span aria-hidden="true">&times;</span> </button> <strong>Selamat</strong> Anda berhasil membuat akun. Silahkan Login ke amanahstores.com</div>');

		$this->user_model->insert_user();
		redirect(base_url('beranda/login'));
  }
}
