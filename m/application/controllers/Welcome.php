<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// XXX: MOBILE AKSES (TRON CONTROLLER)
class Welcome extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(['url','form']);
    $this->load->library('session');
    $this->load->model('iklan_model');
  }

  public function index ()
  {
    $this->load->view('mobile/head/m_head');
    $this->load->view('mobile/pages/mobile-home');
    $this->load->view('mobile/foot/footer');
  }

  public function home($param)
  {
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
    $mobile_iklan['iklan'] = $this->iklan_model->get_all_iklan_by_kategori($param);

    $this->load->view('mobile/head/m_head');
    $this->load->view('mobile/pages/mobile-list-iklan', $mobile_iklan);
    $this->load->view('mobile/foot/footer');
  }

  public function isiiklan($slug)
  {
    $isi_iklan['iklan'] = $this->iklan_model->load_isi_iklan($slug);
		$isi_iklan['viewer'] = $this->iklan_model->add_viewer($slug, $isi_iklan['iklan'][0]['view_barang']);

    $this->load->view("mobile/head/m_head");
    $this->load->view("mobile/pages/mobile-isi-iklan", $isi_iklan);
    $this->load->view("mobile/foot/footer");
  }

  public function allresult_mobile($param = '')
  {
    $mobile_iklan['iklan'] = $this->iklan_model->get_all_iklan_by_kategori($param);

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
}
