<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'form']);
		$this->load->library(['session', 'form_validation','upload']);
		$this->load->model('iklan_model');
		$this->load->model('user_model');
	}

	public function tampil_beranda($halaman = 'beranda')
	{
		if (! file_exists(APPPATH."views/pages/".$halaman.'.php'))
		{
			show_404();
		}

		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);

		$this->load->view('template/header', $link);
		$this->load->view('modal/modal_login');
			if ($halaman == 'beranda')
			{
				$this->load->view('pages/beranda');
			}
			elseif($halaman == 'pasangiklan')
			{
				if (empty($this->session->userdata('user_login'))) {
					redirect(base_url());
				}

				$data['kategori'] = $this->iklan_model->get_kategori();
				$this->load->view('pages/'.$halaman, $data);
			}
			elseif ($halaman == 'profil')
			{
				if (empty($this->session->userdata('user_login'))) {
					redirect(base_url());
				}
				$data = [
					'data_provinsi' => $this->iklan_model->get_data_provinsi(),
					'data_user' => $this->user_model->get_user_profil()
				];
				$this->load->view('pages/'.$halaman, $data);
			}
			elseif($halaman == 'bantuan')
			{
				$this->load->view('pages/bantuan');
			}
			else
			{
				$this->load->view('pages/tentang');
			}
		$this->load->view('template/footer', $link);
	}

	public function edit()
	{
		if (empty($this->session->userdata('user_login'))) {
			redirect(base_url());
		}

		$config = [
			'file_name' => strtolower($this->input->post('nama')."-".$this->session->userdata('user_login')),
			'upload_path' => './images/user_iklan/',
			'allowed_types' => 'jpg|png|gif|jpeg',
			'overwrite' => TRUE
		];
		$this->upload->initialize($config);
		if($this->upload->do_upload('foto_user'))
		{
			$data['upload_data'] = $this->upload->data();
		}

		$data = [
			'user_provinsi' => $this->input->post('provinsi'),
			'user_kota' => $this->input->post('kota'),
			'user_nama' => $this->input->post('nama'),
			'user_telpon' => $this->input->post('telpon'),
			'user_picture' => $data['upload_data']['file_name'],
			'user_deskripsi' => $this->input->post('deskripsi')
		];

		$this->user_model->update_user($data);
		redirect('profil');
	}
}
