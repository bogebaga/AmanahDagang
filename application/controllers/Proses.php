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
		$slug_nama_iklan = url_title($this->input->post('nama_iklan'),'-');
		$barang_kode = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,6);
		$After_explode = explode(".", $_FILES['fitur_foto_name']['name']);

		$this->upload->initialize(
			[
				'upload_path' => './images/post_foto_feature/',
				'allowed_types' => 'jpg|png|gif|jpeg',
				'file_name' => $After_explode[0]."_".$slug_nama_iklan."-".$barang_kode."_Fitur",
				'overwrite' => TRUE
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
				if ($_FILES['image']['error'][$i] == '4')
				{
					$uploaded[$i] = '';
				}
				else
				{
					$_FILES['images']['name'] = $_FILES['image']['name'][$i];
					$_FILES['images']['type'] = $_FILES['image']['type'][$i];
					$_FILES['images']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
					$_FILES['images']['error'] = $_FILES['image']['error'][$i];
					$_FILES['images']['size'] = $_FILES['image']['size'][$i];

					$After_explode = explode(".", $_FILES['images']['name']);
					$this->upload->initialize([
						'upload_path' => './images/post_foto_ikl/',
						'allowed_types' => 'jpeg|jpg|png|gif',
						'file_name' => $After_explode[0].'_'.$slug_nama_iklan.'-'.$barang_kode.'_'.$i
					]);

					if($this->upload->do_upload('images'))
					{
					$uploaded[$i] = $this->upload->data('file_name');
					// echo "<pre>";
					// echo var_export($this->upload->data('file_name'));
					// echo "</pre>";
					}
				}
			}
			$hasil_implode = implode(",", $uploaded);
		}


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

		redirect(base_url()."pasangiklan");
	}

	public function load_iklan($slug_iklan)
	{
		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);

		$isi_iklan['iklan'] = $this->iklan_model->load_isi_iklan($slug_iklan);
		$isi_iklan['viewer'] = $this->iklan_model->add_viewer($slug_iklan, $isi_iklan['iklan'][0]['view_barang']);

		$this->load->view('template/header', $link);
		$this->load->view('modal/modal_login');
		$this->load->view('pages/isi-iklan', $isi_iklan);
		$this->load->view('template/footer');
	}

	public function load_kabkota()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		$kab = $this->iklan_model->get_data_kabkota($id_provinsi);
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

	public function save_edit_iklan()
	{
		$slug_nama = url_title($this->input->post('nama_iklan'),'-').'-'.$this->input->post('kd_barang');

		$iklan_data_obj = $this->iklan_model->get_iklan_by_slug($slug_nama);
		$get_gambar_banyak = explode(",", $iklan_data_obj->gambar_barang);
		$After_explode = explode(".", $_FILES['fitur_foto_name']['name']);

		$this->upload->initialize(
			[
				'upload_path' => './images/post_foto_feature/',
				'allowed_types' => 'jpg|png|gif|jpeg',
				'file_name' => $After_explode[0]."_".$slug_nama."_Fitur"
			]);

		if(! $this->upload->do_upload('fitur_foto_name'))
		{
			$hasil_data = ($iklan_data_obj->gambar_fitur) ?: '' ;
			// var_dump($data = ['upload_data' => $hasil_data]);
			$data = ['upload_data' => $hasil_data];
		}
		else
		{
			// var_dump($data = ['upload_data' => $this->upload->data('file_name')]);
			if ($iklan_data_obj->gambar_fitur)
			{
				unlink(FCPATH.'images/post_foto_feature/'.$iklan_data_obj->gambar_fitur);
			}
			$data = ['upload_data' => $this->upload->data('file_name')];
		}

		if (isset($_POST['submit']))
		{
			$gambar_count = count($_FILES['image']['name']);
			for ($i=0; $i < $gambar_count ; $i++)
			{
				if ($_FILES['image']['error'][$i] == '4')
				{
					($get_gambar_banyak[$i]) ? $uploaded[$i] = $get_gambar_banyak[$i] : $uploaded[$i] = '';
				}
				else
				{
					$_FILES['images']['name'] = $_FILES['image']['name'][$i];
					$_FILES['images']['type'] = $_FILES['image']['type'][$i];
					$_FILES['images']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
					$_FILES['images']['error'] = $_FILES['image']['error'][$i];
					$_FILES['images']['size'] = $_FILES['image']['size'][$i];

					$After_explode = explode(".", $_FILES['images']['name']);
					$this->upload->initialize([
						'upload_path' => './images/post_foto_ikl/',
						'allowed_types' => 'jpeg|jpg|png|gif',
						'file_name' => $After_explode[0].'_'.$slug_nama.'_'.$i
					]);

					if($this->upload->do_upload('images'))
					{
						if ($get_gambar_banyak[$i])
						{
							unlink(FCPATH.'images/post_foto_feature/'.$get_gambar_banyak[$i]);
						}
						$uploaded[$i] = $this->upload->data('file_name');
					}
				}
			}
			$hasil_implode = implode(",", $uploaded);
		}

		$data=[
			'barang_kode' => $this->input->post('kd_barang'),
			'id_kategori' => $this->input->post('nama_kategori'),
			'slug_nama_barang' => $slug_nama,
			'nama_barang' => $this->input->post('nama_iklan'),
			'alamat_barang' => $this->input->post('alamat'),
			'deskripsi_barang' => $this->input->post('deskripsi_iklan'),
			'harga_barang' => $this->input->post('harga_iklan'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'jenis_iklan' => $this->input->post('jenis_iklan'),
			'gambar_fitur' => $data['upload_data'],
			'gambar_barang' => $hasil_implode
		];

		$this->iklan_model->simpan_iklan_by_kdbarang($data);
		redirect(base_url().'barang/edit/'.$slug_nama);
	}

	public function hapus_iklan($slug)
	{
		$data = $this->iklan_model->get_iklan_by_slug($slug);
		unlink(FCPATH.'images/post_foto_feature/'.$data->gambar_fitur);

		$explode = explode(",", $data->gambar_barang);
		foreach ($explode as $hapus_iklan)
		{
			unlink(FCPATH.'images/post_foto_ikl/'.$hapus_iklan);
		}

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
