<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iklanbaris extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(['url', 'form']);
    $this->load->library('session');
  }

  function index()
  {
    $link = array(
			'home' => base_url(),
			'bantuan' => base_url().'bantuan',
			'network' => base_url().'tentang'
		);

    $this->load->view('template/header', $link);
    $this->load->view('pages/iklanbaris');
    $this->load->view('template/footer', $link);
  }
}
