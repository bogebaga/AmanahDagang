<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper(['url','form','file']);
    $this->load->library(['session', 'upload']);
    $this->load->model(['iklan_model','user_model']);

    if (empty($this->session->userdata('user_login_admin')))
    {
      redirect(base_url().'admin/login');
    }

  }

  public function index()
  {
    $this->load->view('template/header-admin');
    $this->load->view('template/navbar-admin');
    $this->load->view('admin/home');
    $this->load->view('template/footer-admin');
  }


  public function iklan()
  {
    $this->load->view('template/header-admin');
    $this->load->view('template/navbar-admin');
    $this->load->view('admin/list_iklan');
    $this->load->view('template/footer-admin');
  }

  public function iklan_edit($param = '')
  {
    $data = [
      'kategori' => $this->iklan_model->get_kategori()
    ];

    if ($param != '')
    {
      $kode = substr($param, -6);
      $data['barang'] = $this->iklan_model->get_iklan_by_kode($kode);
    }

    $this->load->view('template/header-admin');
    $this->load->view('template/navbar-admin');
    $this->load->view('admin/admin_edit_iklan', $data);
    $this->load->view('template/footer-admin');

    // redirect(base_url().'admin/iklan');
  }

  public function user_edit($val_1)
  {
    $data = [
      'provinsi' => $this->iklan_model->get_data_provinsi(),
      'data_user' =>$this->user_model->get_user_profil($val_1)
    ];

    $this->load->view('template/header-admin');
    $this->load->view('template/navbar-admin');
    $this->load->view('admin/admin_edit_user', $data);
    $this->load->view('template/footer-admin');

    // redirect(base_url().'admin/iklan');
  }

  public function user()
  {
    $this->load->view('template/header-admin');
    $this->load->view('template/navbar-admin');
    $this->load->view('admin/list_user');
    $this->load->view('template/footer-admin');

  }

  public function add_iklan()
  {
    $data = [
      'kategori' => $this->iklan_model->get_kategori(),
      'kabkota' => $this->iklan_model->get_data_kabkota()
    ];
    $this->load->view('template/header-admin');
    $this->load->view('template/navbar-admin');
    $this->load->view('admin/form_iklan', $data);
    $this->load->view('template/footer-admin');
  }

  public function save()
  {
    if (isset($_POST['submit']))
    {
      $slug_nama_iklan = url_title($this->input->post('nama_barang'),'-');
      $barang_kode = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,6);
      $nama_explode = explode(".", $_FILES['foto_upload']['name']);

      $this->upload->initialize(
        [
          'upload_path' => './images/post_foto_feature/',
          'allowed_types' => 'jpg|png|gif|jpeg',
          'file_name' => $nama_explode[0]."_".$slug_nama_iklan."-".$barang_kode."_Fitur",
          'overwrite' => TRUE
        ]);

      if(! $this->upload->do_upload('foto_upload'))
      {
        $data = ['upload_data' => ''];
      }
      else
      {
        $data = ['upload_data' => $this->upload->data('file_name')];
      }

      $gambar_count = count($_FILES['foto_fitur']['name']);
        for ($i=0; $i < $gambar_count ; $i++)
        {
          if ($_FILES['foto_fitur']['error'][$i] == 4)
          {
            $uploaded[$i] = '';
          }
          else
          {
            $_FILES['images']['name'] = $_FILES['foto_fitur']['name'][$i];
            $_FILES['images']['type'] = $_FILES['foto_fitur']['type'][$i];
            $_FILES['images']['tmp_name'] = $_FILES['foto_fitur']['tmp_name'][$i];
            $_FILES['images']['error'] = $_FILES['foto_fitur']['error'][$i];
            $_FILES['images']['size'] = $_FILES['foto_fitur']['size'][$i];

            $After_explode = explode(".", $_FILES['images']['name']);

            $this->upload->initialize([
              'upload_path' => './images/post_foto_ikl/',
              'allowed_types' => 'jpeg|jpg|png|gif',
              'file_name' => $After_explode[0]."_".$slug_nama_iklan."_".$barang_kode."_".$i,
              'overwrite' => TRUE
            ]);

            if($this->upload->do_upload('images'))
            {
              $uploaded[$i] = $this->upload->data('file_name');
            }
          }
        }
        $hasil_implode = implode(",", $uploaded);
      }

    $data = [
      'barang_kode' => $barang_kode,
      'user_kode' => $this->session->userdata('user_kd_admin'),
      'id_kategori' => $this->input->post('kategori'),
      'barang_upload_tgl' => date('Y-m-d H:i:s'),
      'nama_barang' => $this->input->post('nama_barang'),
      'slug_nama_barang' => $slug_nama_iklan."-".$barang_kode,
      'alamat_barang' => $this->input->post('alamat'),
      'deskripsi_barang' => $this->input->post('deskripsi'),
      'gambar_fitur' => $data['upload_data'],
      'gambar_barang' => $hasil_implode,
      'harga_barang' => $this->input->post('harga'),
      'jenis_barang' => $this->input->post('jenis_barang'),
      'jenis_iklan' => $this->input->post('jenis_iklan'),
      'tayang_barang' => 'publish',
      'fitur_barang' => 'none'
    ];

    $this->iklan_model->pasang_iklan_admin($data);

    redirect(base_url()."admin/add_iklan");
  }

  public function edit_save()
  {
		$iklan_data_obj = $this->iklan_model->get_iklan_by_slug($this->input->post('slug_nama_barang'));
    $get_gambar_banyak = explode(",", $iklan_data_obj->gambar_barang);
    $slug_nama_iklan = url_title($this->input->post('nama_barang'),'-');
    $After_explode = explode(".", $_FILES['foto_upload']['name']);

		$this->upload->initialize(
			[
				'upload_path' => './images/post_foto_feature/',
				'allowed_types' => 'jpg|png|gif|jpeg',
        'overwrite' => TRUE,
				'file_name' => $After_explode[0]."_".$this->input->post('slug_nama_barang')."_Fitur"
			]);

		if(! $this->upload->do_upload('foto_upload'))
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
			$gambar_count = count($_FILES['foto_fitur']['name']);
			for ($i=0; $i < $gambar_count ; $i++)
			{
				if ($_FILES['foto_fitur']['error'][$i] == '4')
				{
					($get_gambar_banyak[$i]) ? $uploaded[$i] = $get_gambar_banyak[$i] : $uploaded[$i] = '';
				}
				else
				{
					$_FILES['images']['name'] = $_FILES['foto_fitur']['name'][$i];
					$_FILES['images']['type'] = $_FILES['foto_fitur']['type'][$i];
					$_FILES['images']['tmp_name'] = $_FILES['foto_fitur']['tmp_name'][$i];
					$_FILES['images']['error'] = $_FILES['foto_fitur']['error'][$i];
					$_FILES['images']['size'] = $_FILES['foto_fitur']['size'][$i];

					$After_explode = explode(".", $_FILES['images']['name']);
					$this->upload->initialize([
						'upload_path' => './images/post_foto_ikl/',
						'allowed_types' => 'jpeg|jpg|png|gif',
						'file_name' => $After_explode[0].'_'.$this->input->post('slug_nama_barang').'_'.$i
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

    $data = [
      'id_kategori' => $this->input->post('kategori'),
      'slug_nama_barang' => $this->input->post('slug_nama_barang'),
      'nama_barang' => $this->input->post('nama_barang'),
      'alamat_barang' => $this->input->post('alamat'),
      'deskripsi_barang' => $this->input->post('deskripsi'),
      'harga_barang' => $this->input->post('harga'),
      'jenis_barang' => $this->input->post('jenis_barang'),
      'jenis_iklan' => $this->input->post('jenis_iklan'),
      'gambar_fitur' => $data['upload_data'],
      'gambar_barang' => $hasil_implode,
      'tayang_barang' => $this->input->post('tayang_iklan')
    ];

    $this->iklan_model->edit_iklan_admin($data);

    redirect(base_url()."admin/iklan");
  }

  public function edit_user_save()
  {
    $this->upload->initialize([
      'upload_path' => './images/user_iklan/',
      'allowed_types' => 'jpg|jpeg|png|gif',
      'file_name' => strtolower($this->input->post('nama').'-'.$this->session->userdata('user_login_admin')),
      'overwrite' => TRUE
    ]);

    if ($this->upload->do_upload('foto_upload'))
    {
      $foto = $this->upload->data('file_name');
    }
    else
    {
      $foto = '';
    }

    $data = [
      'user_kode' => $this->input->post('kd_user'),
      'user_provinsi' => $this->input->post('provinsi'),
      'user_kota' => $this->input->post('kabupaten'),
      'user_nama' => $this->input->post('nama'),
      'user_telpon' => $this->input->post('telpon'),
      // 'user_picture' => $foto,
      'user_deskripsi' => $this->input->post('deskripsi'),
      'user_type' => $this->input->post('hak_akses')
    ];

    $this->user_model->edit_user_save($data);

    redirect(base_url().'admin/user/edit/'.$this->input->post('kd_user'));
  }

  public function user_hapus($kode_user)
  {
    $valid_user_image = $this->user_model->get_user_profil($kode_user);
    if ($valid_user_image[0]['user_picture'])
    {
      unlink(FCPATH.'images/user_iklan/'.$valid_user_image[0]['user_picture']);
    }

    $this->user_model->user_hapus($kode_user);
    redirect(base_url().'admin/user');
  }

  public function iklan_hapus($slug)
  {
    $file_hapus = $this->iklan_model->get_iklan_by_slug($slug);
    unlink(FCPATH.'images/post_foto_feature/'.$file_hapus->gambar_fitur);

    if($file_hapus->gambar_barang)
    {
      $file_hapus_explode = explode(",",$file_hapus->gambar_barang);
      foreach ($file_hapus_explode as $hapus) {
        unlink(FCPATH.'images/post_foto_ikl/'.$hapus);
      }
    }
    $this->user_model->iklan_hapus($slug);
     redirect(base_url().'admin/iklan');
  }

  public function user_parse()
  {
    $data = $this->user_model->parse_user();

    $panjang = count($data);

    for ($i=0; $i < $panjang ; $i++) {
      $user_hapus = "onclick=window.location='".base_url()."admin/user/hapus/".$data[$i]['user_kode']."'";
      $user_edit = "onclick=window.location='".base_url()."admin/user/edit/".$data[$i]['user_kode']."'";

      $data[$i]['user_id'] = $i+1;
      $data[$i]['user_add'] = date('j M', strtotime($data[$i]['user_add']));
      if ($data[$i]['user_type'] == 'admin')
      {
        $data[$i]['action'] = "<button class='btn btn-default btn-circle margin' type='button' $user_edit><span class='glyphicon glyphicon-edit'></span></button>";
      }
      else
      {
        $data[$i]['action'] = "<button class='btn btn-default btn-circle margin' type='button' $user_hapus><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-default btn-circle margin' type='button' $user_edit><span class='glyphicon glyphicon-edit'></span></button>";
      }
    }
    echo json_encode($data);
  }

  public function iklan_parse()
  {
    $data = $this->user_model->iklan_parse();
    $panjang = count($data);

    for ($i=0; $i < $panjang ; $i++) {
      $iklan_hapus = "onclick=window.location='".base_url()."admin/iklan/hapus/".str_replace(' ','-',$data[$i]['nama_barang'])."-".$data[$i]['barang_kode']."'";
      $iklan_edit = "onclick=window.location='".base_url()."admin/iklan/edit/".str_replace(' ','-',$data[$i]['nama_barang'])."-".$data[$i]['barang_kode']."'";

      $data[$i]['id_barang'] = $i+1;
      $data[$i]['barang_upload_tgl'] = date('j M', strtotime($data[$i]['barang_upload_tgl']));
      $data[$i]['jenis_iklan'] = ucwords(str_replace('_',' ', $data[$i]['jenis_iklan']));
      $data[$i]['action'] = "<button class='btn btn-default btn-circle margin' type='button' $iklan_hapus><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-default btn-circle margin' type='button' $iklan_edit><span class='glyphicon glyphicon-edit'></span></button>";
    }
    echo json_encode($data);
  }
}
