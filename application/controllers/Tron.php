<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tron extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(['url', 'form']);
    $this->load->library('session');
    $this->load->model('iklan_model');
  }

  function index()
  {
    $link = array(
      'home' => base_url(),
      'bantuan' => base_url('bantuan'),
      'network' => base_url('tentang')
    );

    $this->load->view('template/header-tron', $link);
    $this->load->view('pages/tron-page-all');
    $this->load->view('template/footer-tron');
  }

  public function tron_iklan_baris()
  {
    $link = array(
      'home' => base_url(),
      'bantuan' => base_url('bantuan'),
      'network' => base_url('tentang')
    );

    $tampil_iklan['iklan'] = $this->iklan_model->get_all_iklan('','','iklan');

    $this->load->view('template/header-tron', $link);
    $this->load->view('pages/tron-iklan-baris', $tampil_iklan);
    $this->load->view('template/footer-tron');
  }

  public function tron_iklan_video()
  {
    $link = array(
      'home' => base_url(),
      'bantuan' => base_url('bantuan'),
      'network' => base_url('tentang')
    );

    // $tampil_iklan['iklan'] = $this->iklan_model->get_all_iklan();
    $this->load->view('template/header-tron', $link);
    $this->load->view('pages/tron-page-video');
    $this->load->view('template/footer-tron');
  }

  public function iklanbaris()
  {
    $link = array(
      'home' => base_url(),
      'bantuan' => base_url('bantuan'),
      'network' => base_url('tentang')
    );

    $tampil_iklan['iklan'] = $this->iklan_model->get_all_iklan_baris();
		$tampil_iklan['kategori'] = $this->iklan_model->get_kategori();

    $this->load->view('template/header', $link);
    $this->load->view('modal/modal_login');
    $this->load->view('pages/iklan-baris', $tampil_iklan);
    $this->load->view('template/footer');
  }

  public function home($param ='')
  {
    $this->load->view('mobile/head/m_head');
    if ($param == 'mobile-pasang-iklan'):
      (! empty($this->session->userdata('user_email'))) ? $this->load->view('mobile/pages/'.$param) : redirect(base_url('tron/home/mobile-login'));
    elseif ($param == 'mobile-akun-saya'):
      (! empty($this->session->userdata('user_email'))) ? $this->load->view('mobile/pages/'.$param) : redirect(base_url('tron/home/mobile-login'));
    else:
      $this->load->view('mobile/pages/'.$param);
    endif;
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
}
