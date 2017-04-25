<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['form', 'url']);
		$this->load->library(['session', 'upload']);
		$this->load->model('iklan_model');
	}

	public function iklan_proses()
	{
		$this->upload->initialize(
			[
				'upload_path' => './images/post_foto_feature/',
				'allowed_types' => 'jpg|png|gif|jpeg'
			]);

		if(! $this->upload->do_upload('fitur_foto_name'))
		{
			$data = ['upload_data' => ''];
		}
		else
		{
			$data = ['upload_data' => $this->upload->data('file_name')];
		}

		if (isset($_POST['submit']))
		{
			$gambar_count = count($_FILES['image']['name']);
			for ($i=0; $i < $gambar_count ; $i++)
			{
				if ($_FILES['image']['error'][$i] == 4)
				{
					$hasil_implode = '';
				}
				else
				{
					$_FILES['images']['name'] = $_FILES['image']['name'][$i];
					$_FILES['images']['type'] = $_FILES['image']['type'][$i];
					$_FILES['images']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
					$_FILES['images']['error'] = $_FILES['image']['error'][$i];
					$_FILES['images']['size'] = $_FILES['image']['size'][$i];

					$this->upload->initialize([
						'upload_path' => './images/post_foto_ikl/',
						'allowed_types' => 'jpeg|jpg|png|gif'
					]);

					if($this->upload->do_upload('images'))
					{
						$uploaded[$i] = $this->upload->data('file_name');
					}
				}
			}
			$hasil_implode = implode(",", $uploaded);
		}

		$slug_nama_iklan = url_title($this->input->post('nama_iklan'),'-');
		$barang_kode = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,6);

		$data = [
			'nama_iklan' => $this->input->post('nama_iklan'),
			'slug_nama_iklan' => $slug_nama_iklan."-".$barang_kode,
			'barang_kode' => $barang_kode,
			'barang_upload_tgl' => date('Y-m-d H:i:s'),
			'user_kode' => $this->session->userdata('user_kd'),
			'nama_kategori' => $this->input->post('nama_kategori'),
			'jenis_iklan' => $this->input->post('jenis_iklan'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'harga_iklan' => $this->input->post('harga_iklan'),
			'deskripsi_iklan' => $this->input->post('deskripsi_iklan'),
			'gambar_barang' => $hasil_implode,
			'gambar_fitur' => $data['upload_data'],
			'alamat' => $this->input->post('alamat')
		];

		$this->iklan_model->pasang_iklan($data);

		redirect('profil');
	}

	public function load_iklan($slug_iklan)
	{
		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);

		$isi_iklan['iklan'] = $this->iklan_model->load_isi_iklan($slug_iklan);

		$this->load->view('template/header', $link);
		$this->load->view('modal/modal_login');
		$this->load->view('pages/isi-iklan', $isi_iklan);
		$this->load->view('template/footer');
	}

	public function load_kabkota()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		$kab = $this->iklan_model->get_data_kabkota($id_provinsi);
		// echo "<pre>";
		// 	var_export($kab);
		// echo "</pre>";
		echo json_encode($kab);
	}

	public function edit_iklan($slug)
	{
		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);

		$data = [
			'kategori' => $this->iklan_model->get_kategori(),
			'slug_data' => $this->iklan_model->get_iklan_by_slug($slug)
		];
		// echo "<pre>";
		// 	var_export($data['slug_data']);
		// echo "</pre>";
		$this->load->view('template/header', $link);
		$this->load->view('modal/modal_login');
		$this->load->view('pages/editiklan', $data);
		$this->load->view('template/footer');
	}

	public function hapus_iklan($slug)
	{
		$this->iklan_model->delete_iklan($slug);
		redirect('profil');
	}

	public function tes_ilmu()
	{
		$data = ['satu','dua'];
		foreach ($data as $json)
		{
			echo "<pre>";
				var_export($this->iklan_model->tes_ilmu($json));
			echo "</pre>";
		}
	}
}
