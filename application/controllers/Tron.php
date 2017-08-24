<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tron extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(['url', 'form']);
    $this->load->library('session');
    $this->load->model(['iklan_model', 'user_model']);
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

  public function iklanbaris($kategori = '')
  {
    $link = array(
      'home' => base_url(),
      'bantuan' => base_url('bantuan'),
      'network' => base_url('tentang')
    );

    $tampil_iklan['iklan'] = $this->iklan_model->get_all_iklan_baris($kategori);
		$tampil_iklan['kategori'] = $this->iklan_model->get_kategori();
    $tampil_iklan['args'] = $kategori;

    $this->load->view('template/header', $link);
    $this->load->view('pages/iklan-baris', $tampil_iklan);
    $this->load->view('template/footer');
  }
}
