<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['form', 'url']);
		$this->load->library(['session', 'upload']);
		$this->load->model(['iklan_model', 'user_model']);
		$this->proses =& get_instance();
	}

	public function load_iklan($slug_iklan = '')
	{
		$isi_iklan['iklan'] = $this->iklan_model->load_isi_iklan($slug_iklan);
		$isi_iklan['user'] = $this->user_model->get_user_profil($this->session->userdata('user_kd'));
		if(count($isi_iklan['iklan']['slug_nama_barang']) <= 0):
			show_404();
		endif;

		$meta_info =[
			'title_tag' => $isi_iklan['iklan']['nama_barang']." - amanahstores.com",
			'publish-time' => date('Y-m-d', strtotime($isi_iklan['iklan']['barang_upload_tgl'])),
			'url' => base_url('barang/'.$slug_iklan),
			'image' => base_url('images/post_foto_feature/'.$this->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($isi_iklan['iklan']['barang_upload_tgl']))).$isi_iklan['iklan']['gambar_fitur']),
			'desc' => strip_tags($isi_iklan['iklan']['deskripsi_barang'])
		];

		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang',
		);
		$this->session->set_flashdata($meta_info);

		$isi_iklan['viewer'] = $this->iklan_model->add_viewer($slug_iklan, $isi_iklan['iklan']['view_barang']);
		$this->load->view('template/header', $link);
		$this->load->view('pages/isi-iklan', $isi_iklan);
		$this->load->view('template/footer');
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
		if(empty($data['slug_data'])):
			show_404();
		endif;
		// echo "<pre>";
		// 	print_r($data['slug_data']);
		// echo "</pre>";

		$this->load->view('template/header', $link);
		$this->load->view('pages/editiklan', $data);
		$this->load->view('template/footer');
	}

	public function kategori($param)
	{
		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);

		$tampil_iklan['iklan'] = $this->iklan_model->get_all_iklan_by_kategori($param, 'publish');
		$tampil_iklan['kategori'] = $this->iklan_model->get_kategori();
		$tampil_iklan['active_kategori'] = $param;

		$this->load->view('template/header', $link);
		$this->load->view('pages/beranda-car', $tampil_iklan);
		$this->load->view('template/footer');
	}

	public function iklan_proses()
	{
		if (isset($_POST['submit']))
		{
			$slug_nama_iklan = url_title($this->input->post('nama_iklan'));
			$barang_kode = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,6);
			$After_explode = explode(".", $_FILES['fitur_foto_name']['name']);

			if(! file_exists('./images/post_foto_feature/'.$this->tanggal_indonesia_convert(date('Y-m-d-N'))))
			{
				mkdir('./images/post_foto_feature/'.$this->tanggal_indonesia_convert(date('Y-m-d-N')), 0777, TRUE);
			}

			$this->upload->initialize(
				[
					'upload_path' => './images/post_foto_feature/'.$this->tanggal_indonesia_convert(date('Y-m-d-N')),
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

			if (! file_exists('./images/post_foto_ikl/'.$this->tanggal_indonesia_convert(date('Y-m-d-N')).$slug_nama_iklan.'-'.$barang_kode)):
				mkdir('./images/post_foto_ikl/'.$this->tanggal_indonesia_convert(date('Y-m-d-N')).$slug_nama_iklan.'-'.$barang_kode, 0777, TRUE);
			endif;

			$gambar_count = count($_FILES['image']['name']);
			for ($i=0; $i < $gambar_count ; $i++)
			{
				if ($_FILES['image']['error'][$i] == 4)
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
						'upload_path' => './images/post_foto_ikl/'.$this->tanggal_indonesia_convert(date('Y-m-d-N')).$slug_nama_iklan.'-'.$barang_kode,
						'allowed_types' => 'jpeg|jpg|png|gif',
						'file_name' => $After_explode[0].'_'.$slug_nama_iklan.'-'.$barang_kode.'_'.$i,
						'overwrite' => TRUE
					]);

					if($this->upload->do_upload('images'))
					{
						$uploaded[$i] = $this->upload->data('file_name');
						// echo "<pre>";
						// echo var_export($uploaded[$i] = $this->upload->data('file_name'));
						// echo "</pre>";
					}
				}
			}
			$hasil_implode = implode(",", $uploaded);
		}
		else
		{
			show_404();
		}

		$data = [
			'nama_barang' => $this->input->post('nama_iklan'),
			'slug_nama_barang' => $slug_nama_iklan.'-'.$barang_kode,
			'barang_kode' => $barang_kode,
			'barang_upload_tgl' => date('Y-m-d H:i:s'),
			'user_kode' => $this->session->userdata('user_kd'),
			'id_kategori' => $this->input->post('nama_kategori'),
			'jenis_iklan' => $this->input->post('jenis_iklan'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'harga_barang' => $this->input->post('harga_iklan'),
			'deskripsi_barang' => $this->input->post('deskripsi_iklan'),
			'telpon' => $this->input->post('telpon'),
			'alamat_barang' => $this->input->post('alamat'),
			'gambar_barang' => $hasil_implode,
			'gambar_fitur' => $data['upload_data'],
			'tayang_barang' => 'unpublish',
			'fitur_barang' => 'none'
		];

		$identitas = [
			'user_nama' => $this->input->post('identitas_nama'),
			'user_telpon' => $this->input->post('identitas_telpon'),
			'user_alamat' => $this->input->post('identitas_alamat'),
			'user_provinsi' => $this->input->post('provinsi'),
			'user_kota' => $this->input->post('kota'),
			'user_kecamatan' => $this->input->post('kecamatan')
		];

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			Iklan anda telah berhasil diunggah
		</div>');
		$this->iklan_model->pasang_iklan($data, $identitas, TRUE);
		redirect(base_url()."pasangiklan");
	}

	public function save_edit_iklan()
	{
		$iklan_data_obj = $this->iklan_model->get_iklan_by_slug($this->input->post('slug_iklan'));
		if (empty($iklan_data_obj))
		{
			show_404();
		}

		$get_gambar_banyak = explode(",", $iklan_data_obj->gambar_barang);
		$After_explode = explode(".", $_FILES['fitur_foto_name']['name']);
		$tanggal = date('Y-m-d-N', strtotime($iklan_data_obj->barang_upload_tgl));

		if (! file_exists('./images/post_foto_feature/'.$this->tanggal_indonesia_convert($tanggal))) :
			mkdir('./images/post_foto_feature/'.$this->tanggal_indonesia_convert($tanggal), 0777, TRUE);
		endif;

		$this->upload->initialize(
		[
			'upload_path' => './images/post_foto_feature/'.$this->tanggal_indonesia_convert($tanggal),
			'allowed_types' => 'jpg|png|gif|jpeg',
			'file_name' => $After_explode[0]."_".$this->input->post('slug_iklan')."_Fitur",
			'overwrite' => TRUE
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
				unlink(FCPATH.'images/post_foto_feature/'.$this->tanggal_indonesia_convert($tanggal).$iklan_data_obj->gambar_fitur);
			}
			$data = ['upload_data' => $this->upload->data('file_name')];
		}

		if (isset($_POST['submit']))
		{
			$gambar_count = count($_FILES['image']['name']);
			if (! file_exists('./images/post_foto_ikl/'.$this->tanggal_indonesia_convert($tanggal).$this->input->post('slug_iklan'))) :
				# code...
				mkdir('./images/post_foto_ikl/'.$this->tanggal_indonesia_convert($tanggal).$this->input->post('slug_iklan'), 0777, TRUE);
			endif;

			for ($i=0; $i < $gambar_count ; $i++)
			{
				if ($_FILES['image']['error'][$i] == '4')
				{
					if ($get_gambar_banyak[$i])
					{
						if (file_exists('./images/post_foto_ikl/'.$get_gambar_banyak[$i]))
						{
							rename('./images/post_foto_ikl/'.$get_gambar_banyak[$i], './images/post_foto_ikl/'.$this->tanggal_indonesia_convert($tanggal).$this->input->post('slug_iklan').'/'.$get_gambar_banyak[$i] );
						}
						$uploaded[$i] = $get_gambar_banyak[$i];
					}
					else
					{
						$uploaded[$i] = '';
					}
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
						'upload_path' => './images/post_foto_ikl/'.$this->tanggal_indonesia_convert($tanggal).$this->input->post('slug_iklan'),
						'allowed_types' => 'jpeg|jpg|png|gif',
						'file_name' => $After_explode[0].'_'.$this->input->post('slug_iklan').'_'.$i,
						'overwrite' => TRUE
					]);

					if($this->upload->do_upload('images'))
					{
						if ($get_gambar_banyak[$i])
						{
							unlink(FCPATH.'images/post_foto_ikl/'.$this->tanggal_indonesia_convert($tanggal).$this->input->post('slug_iklan').'/'.$get_gambar_banyak[$i]);
						}
						$uploaded[$i] = $this->upload->data('file_name');
					}
				}
			}
			$hasil_implode = implode(",", $uploaded);
		}

		$data=[
			'id_kategori' => $this->input->post('nama_kategori'),
			'slug_nama_barang' => $this->input->post('slug_iklan'),
			'nama_barang' => $this->input->post('nama_iklan'),
			'deskripsi_barang' => $this->input->post('deskripsi_iklan'),
			'harga_barang' => $this->input->post('harga_iklan'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'gambar_fitur' => $data['upload_data'],
			'alamat_barang' => $this->input->post('alamat'),
			'telpon' => $this->input->post('telpon'),
			// 'barang_provinsi' => $this->input->post('provinsi'),
			// 'barang_kota' => $this->input->post('kabkota'),
			// 'barang_kecamatan' => $this->input->post('kecamatan'),
			'gambar_barang' => $hasil_implode
		];

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			Iklan anda telah berhasil diunggah
		</div>');
		$this->iklan_model->simpan_iklan_by_kdbarang($data);
		redirect(base_url('barang/edit/'.$this->input->post('slug_iklan')));
	}

	public function hapus_iklan($slug)
	{
		$data = $this->iklan_model->get_iklan_by_slug($slug);
		if (empty($data))
		{
			show_404();
		}

		unlink(FCPATH.'images/post_foto_feature/'.$this->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($data->barang_upload_tgl))).$data->gambar_fitur);

		$explode = explode(",", $data->gambar_barang);
		foreach ($explode as $hapus_iklan)
		{
			if ($hapus_iklan)
			{
				unlink(FCPATH.'images/post_foto_ikl/'.$this->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($data->barang_upload_tgl))).$slug.'/'.$hapus_iklan);
			}
		}
		rmdir(FCPATH.'images/post_foto_ikl/'.$this->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($data->barang_upload_tgl))).$slug);
		$this->iklan_model->delete_iklan($slug);
		redirect('profil');
	}

	public function load_provinsi()
	{
		$provinsi = $this->iklan_model->get_data_provinsi();
		echo json_encode($provinsi);
	}

	public function load_kabkota()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		$kab = $this->iklan_model->get_data_kabkota($id_provinsi);
		echo json_encode($kab);
	}

	public function load_kecamatan()
	{
		$id_kota = $this->input->post('id_kecamatan');
		$kecamatan = $this->iklan_model->get_data_kecamatan($id_kota);
		echo json_encode($kecamatan);
	}

	public function tanggal_indonesia_convert($tanggal)
	{
		$nama_bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei','Juni' ,'Juli', 'Agustus','September','Oktober', 'November', 'Desember'];
		$nama_hari = [1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
		$tanggal_split = explode('-', $tanggal);
		$tanggal_output = $tanggal_split[0]."/".$nama_bulan[(int)$tanggal_split[1]]."/".$nama_hari[(int)$tanggal_split[3]]."-".$tanggal_split[2]."/";

		return $tanggal_output;
	}
}
