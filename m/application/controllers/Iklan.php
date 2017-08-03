<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(['url','form']);
    $this->load->library(['upload','session']);
    $this->load->model(['iklan_model','user_model']);
  }

  public function index()
  {
    if (isset($_POST['submit']))
		{
  		$slug_nama_iklan = url_title($this->input->post('nama_iklan'));
  		$barang_kode = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,6);
      $After_explode = explode(".", $_FILES['foto_fitur_name']['name']);

      // echo  $this->tanggal_indonesia(date('Y-m-d-N'));
      if(! file_exists('../images/post_foto_feature/'.$this->tanggal_indonesia(date('Y-m-d-N')))):
        mkdir('../images/post_foto_feature/'.$this->tanggal_indonesia(date('Y-m-d-N')), 0777, true);
      endif;

      // NOTE: Ini untuk upload tunggal
  		$this->upload->initialize(
  			[
  				'upload_path' => '../images/post_foto_feature/'.$this->tanggal_indonesia(date('Y-m-d-N')),
  				'allowed_types' => 'jpg|png|gif|jpeg',
  				'file_name' => $After_explode[0]."_".$slug_nama_iklan."-".$barang_kode."_Fitur",
  				'overwrite' => TRUE
  			]);
  		if(! $this->upload->do_upload('foto_fitur_name'))
  		{
  			$data = ['upload_data' => ''];
  		}
  		else
  		{
  			$data = ['upload_data' => $this->upload->data('file_name')];
  		}

      // NOTE: Ini untuk upload file jamak
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

          if(! file_exists('../images/post_foto_ikl/'.$this->tanggal_indonesia(date('Y-m-d-N')).$slug_nama_iklan.'-'.$barang_kode)):
            mkdir('../images/post_foto_ikl/'.$this->tanggal_indonesia(date('Y-m-d-N')).$slug_nama_iklan.'-'.$barang_kode, 0777, true);
          endif;

  				$this->upload->initialize([
  					'upload_path' => '../images/post_foto_ikl/'.$this->tanggal_indonesia(date('Y-m-d-N')).$slug_nama_iklan.'-'.$barang_kode,
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
    // 
		// $data = [
		// 	'nama_iklan' => $this->input->post('nama_iklan'),
		// 	'slug_nama_iklan' => $slug_nama_iklan."-".$barang_kode,
		// 	'barang_kode' => $barang_kode,
		// 	'barang_upload_tgl' => date('Y-m-d H:i:s'),
		// 	'user_kode' => $this->session->userdata('user_kd'),
		// 	'nama_kategori' => $this->input->post('nama_kategori'),
		// 	'jenis_iklan' => '',
		// 	'jenis_barang' => $this->input->post('ji'),
		// 	'harga_iklan' => $this->input->post('harga_iklan'),
		// 	'telpon' => $this->input->post('telpon'),
		// 	'deskripsi_iklan' => $this->input->post('deskripsi_iklan'),
		// 	'gambar_barang' => $hasil_implode,
		// 	'gambar_fitur' => $data['upload_data'],
		// 	'alamat' => $this->input->post('alamat')
		// ];
    //
		// $this->iklan_model->pasang_iklan($data);
		// redirect(base_url());
  }

  private function tanggal_indonesia($tanggal)
  {
    $nama_bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei','Juni' ,'Juli', 'Agustus','September','Oktober', 'November', 'Desember'];
    $nama_hari = [1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    $tanggal_split = explode('-', $tanggal);
    $tanggal_output = $tanggal_split[0]."/".$nama_bulan[(int)$tanggal_split[1]]."/".$nama_hari[(int)$tanggal_split[3]]."-".$tanggal_split[2]."/";

    return $tanggal_output;
  }
}
