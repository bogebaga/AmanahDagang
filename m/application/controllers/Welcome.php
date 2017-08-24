<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('ONLINE_IMAGE', 'http://www.amanahstores.com/');

// XXX: MOBILE AKSES (TRON CONTROLLER)
class Welcome extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper(['url','form']);
    $this->load->library('session');
    $this->load->model(['user_model', 'iklan_model']);
    $this->welcome_mob =& get_instance();
  }

  public function index ()
  {
    $meta_information = [
			'title_tag' => 'Ketemu banyak pedagang terpercaya dengan mudah di amanahstores.com - Semua ada disini',
			'desc' => 'Wadah bagi pemasang iklan untuk memasarkan produknya, memungkinkan seseorang ataupun pemilik usaha di Indonesia untuk mengelola usahanya sendiri secara mudah dan gratis. amanahstores akan memberikan keamanan dan kenyamanan dalam berbelanja online',
			'url' => base_url(),
			'publish-time' => date('Y-m-d')
		];

    $this->session->set_flashdata($meta_information);
    $this->load->view('mobile/head/m_head');
    $this->load->view('mobile/pages/mobile-home');
    $this->load->view('mobile/foot/footer');
  }

  public function home($param ='')
  {
    if(! file_exists(APPPATH."views/mobile/pages/".$param.".php")):
      show_404();
    endif;
    $meta_information = [
			'title_tag' => 'Ketemu banyak pedagang terpercaya dengan mudah di amanahstores.com - Semua ada disini',
			'desc' => 'Wadah bagi pemasang iklan untuk memasarkan produknya, memungkinkan seseorang ataupun pemilik usaha di Indonesia untuk mengelola usahanya sendiri secara mudah dan gratis. amanahstores akan memberikan keamanan dan kenyamanan dalam berbelanja online',
			'url' => base_url(),
			'publish-time' => date('Y-m-d')
		];

    $this->session->set_flashdata($meta_information);
    $this->load->view('mobile/head/m_head');
    if ($param == 'mobile-pasang-iklan'):
      $data['kategori'] = $this->iklan_model->get_kategori();
      (! empty($this->session->userdata('user_email'))) ? $this->load->view('mobile/pages/'.$param, $data) : redirect(base_url('home/mobile-login'));
      elseif ($param == 'mobile-akun-saya'):
        (! empty($this->session->userdata('user_email'))) ? $this->load->view('mobile/pages/'.$param) : redirect(base_url('home/mobile-login'));
      else:
        $this->load->view('mobile/pages/'.$param);
      endif;
      $this->load->view('mobile/foot/footer');
  }

  public function meditiklan($slug)
  {
    $data['kategori'] = $this->iklan_model->get_kategori();
    $data['isi-iklan'] = $this->iklan_model->get_iklan_by_slug($slug);

    $this->load->view('mobile/head/m_head');
    $this->load->view('mobile/pages/mobile-home', $data);
    $this->load->view('mobile/foot/footer');
  }

  public function mkategori($param = '')
  {
    $mobile_iklan['iklan'] = $this->iklan_model->get_all_iklan_by_kategori('publish', $param);

    $this->load->view('mobile/head/m_head');
    $this->load->view('mobile/pages/mobile-list-iklan', $mobile_iklan);
    $this->load->view('mobile/foot/footer');
  }

  public function isiiklan($slug = '')
  {
    $isi_iklan['iklan'] = $this->iklan_model->load_isi_iklan($slug);
    if(count($isi_iklan['iklan']['slug_nama_barang']) <= 0)
    {
        show_404();
    }
    $meta_info =[
			'title_tag' => $isi_iklan['iklan']['nama_barang']." | ",
			'publish-time' => date('Y-m-d', strtotime($isi_iklan['iklan']['barang_upload_tgl'])),
			'url' => base_url('isiiklan/'.$slug),
			'image' => '../images/post_foto_feature/'.$this->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($isi_iklan['iklan']['barang_upload_tgl']))).$isi_iklan['iklan']['gambar_fitur'],
			'desc' => strip_tags($isi_iklan['iklan']['deskripsi_barang'])
		];
    $this->session->set_flashdata($meta_info);

    $isi_iklan['viewer'] = $this->iklan_model->add_viewer($slug, $isi_iklan['iklan']['view_barang']);
    $this->load->view("mobile/head/m_head");
    $this->load->view("mobile/pages/mobile-isi-iklan", $isi_iklan);
    $this->load->view("mobile/foot/footer");
  }

  public function allresult_mobile($param = '')
  {
    $mobile_iklan['iklan'] = $this->iklan_model->get_all_iklan_by_kategori('publish', $param);

    $this->load->view('mobile/head/m_head');
    $this->load->view('mobile/pages/mobile-list-iklan-result', $mobile_iklan);
    $this->load->view('mobile/foot/footer');
  }

  public function provinsi()
  {
    $mobile_provinsi['provinsi'] = $this->iklan_model->get_data_provinsi();

    $this->load->view('mobile/head/m_head');
    $this->load->view('mobile/pages/mobile-provinsi', $mobile_provinsi);
    $this->load->view('mobile/foot/footer');
  }

  public function tanggal_indonesia_convert($tanggal)
  {
    $nama_hari = [1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    $nama_bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei','Juni' ,'Juli', 'Agustus','September','Oktober', 'November', 'Desember'];
    $tanggal_split = explode('-', $tanggal);
    $tanggal_output = $tanggal_split[0]."/".$nama_bulan[(int)$tanggal_split[1]]."/".$nama_hari[(int)$tanggal_split[3]]."-".$tanggal_split[2]."/";

    return $tanggal_output;
  }
}
