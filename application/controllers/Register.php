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
    $this->form_validation->set_rules('nlengkap', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('nama', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Alamat Email', 'required');
    $this->form_validation->set_rules('sandi', 'Password','required');
    if($this->form_validation->run() === FALSE)
    {
			$link = array(
				'home' => base_url(),
				'bantuan' => base_url().'bantuan',
				'network' => base_url().'tentang'
			);

			$data['all_iklan'] = $this->iklan_model->get_all_iklan();
			$data['kategori'] = $this->iklan_model->get_kategori();

			$this->load->view('template/header', $link);
			$this->load->view('pages/beranda', $data);
			$this->load->view('template/footer');
    }
    else
    {
			$this->user_model->insert_user();
			redirect('./');
    }
	}
}
