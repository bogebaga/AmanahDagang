<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'form']);
		$this->load->library(['session', 'form_validation','upload']);
		$this->load->model(['iklan_model','user_model']);
		$this->beranda =& get_instance();
	}

	public function tampil_beranda($halaman = 'beranda')
	{
		if (! file_exists(APPPATH."views/pages/".$halaman.'.php'))
		{
			show_404();
		}
		$meta_information = [
			'title_tag' => 'Ketemu banyak pedagang terpercaya dengan mudah di amanahstores.com - Semua ada disini',
			'desc' => 'Wadah bagi pemasang iklan untuk memasarkan produknya, memungkinkan seseorang ataupun pemilik usaha di Indonesia untuk mengelola usahanya sendiri secara mudah dan gratis. amanahstores akan memberikan keamanan dan kenyamanan dalam berbelanja online',
			'url' => base_url(),
			'image' => base_url('images/banner 640x510 amanahdagang.png'),
			'publish-time' => date('Y-m-d')
		];

		$this->session->set_flashdata($meta_information);
		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);
		$this->load->view('template/header', $link);
			if ($halaman == 'beranda')
			{
				$data['kategori'] = $this->iklan_model->get_kategori();
				$this->load->view('pages/beranda', $data);
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
					'data_user' => $this->user_model->get_user_profil($this->session->userdata('user_kd'))
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
		if (empty($this->session->userdata('user_login')) OR ! isset($_POST['submit'])) {
			redirect(base_url());
		}
		$get_user = $this->user_model->get_user_profil($this->session->userdata('user_kd'));

		if(! file_exists('./images/user_iklan/'.$this->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($this->input->post('uplusr'))))))
		{
			mkdir('./images/user_iklan/'.$this->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($this->input->post('uplusr')))), 0777, TRUE);
		}
		$config = [
			'file_name' => strtolower($this->input->post('nama')."-".$this->session->userdata('user_login')),
			// 'upload_path' => './images/user_iklan/'.$this->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($this->input->post('uplusr')))).'/'.$this->input->post('nama').'-'.$this->session->userdata('user_kd'),
			'upload_path' => './images/user_iklan/'.$this->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($this->input->post('uplusr')))),
			'allowed_types' => 'jpg|png|gif|jpeg',
			'overwrite' => TRUE
		];
		$this->upload->initialize($config);
		if(! $this->upload->do_upload('foto_user'))
		{
			$data['upload_data'] = $get_user['user_picture'];
		} else {
			$data['upload_data'] = $this->upload->data('file_name');
		}
		$data = [
			'user_provinsi' => $this->input->post('provinsi'),
			'user_kota' => $this->input->post('kota'),
			'user_kecamatan' => $this->input->post('kecamatan'),
			'user_alamat' => $this->input->post('alamat'),
			'user_telpon' => $this->input->post('telpon'),
			'user_nama' => $this->input->post('nama'),
			'user_picture' => $data['upload_data'],
			'user_deskripsi' => $this->input->post('deskripsi')
		];

		$this->session->set_flashdata('success_user', '<div class="alert alert-success alert-dismissable show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			User anda telah berhasil di ubah.
		</div>');
		$this->user_model->update_user($data);
		redirect('profil');
	}

	public function allresult()
	{
		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);

		$this->load->view('template/header', $link);
		$this->load->view('pages/beranda-allresult');
		$this->load->view('template/footer');
	}

	public function login()
	{
		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);

		# code...
		if (! empty($this->session->userdata('user_email'))) {
			redirect(base_url());
		}

		$this->load->view('template/header', $link);
		$this->load->view('pages/login_halaman');
		$this->load->view('template/footer');
	}

	public function daftar()
	{
		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);
		if (! empty($this->session->userdata('user_email'))) {
			redirect(base_url());
		}

		$this->load->view('template/header', $link);
		$this->load->view('pages/daftar');
		$this->load->view('template/footer');
	}

	public function helpdesk($data = '')
	{
		$link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);
		$helpdesk['isi_helpdesk'] = $this->user_model->helpdesk_parse($data);

		$this->load->view('template/header', $link);
		$this->load->view('pages/helpdesk', $helpdesk);
		$this->load->view('template/footer');
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
