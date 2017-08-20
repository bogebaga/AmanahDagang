<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_kategori()
  {
      $query = $this->db->get('ad_kategori');
      return $query->result_array();
  }

  public function get_data_provinsi()
  {
    $query = $this->db->get('ad_provinsi');
    return $query->result_array();
  }

  public function get_data_kabkota($data = '')
  {
    if($data):
      $this->db->where('id_provinsi', $data);
    endif;

    $query = $this->db->get('ad_kabkota');
    return $query->result_array();
  }

  public function get_data_kecamatan($data = '')
  {
    if($data):
      $this->db->where('id_kabkota', $data);
    endif;

    $result = $this->db->get('ad_kecamatan');
    return $result->result_array();
  }

  public function get_all_iklan($kategori = '', $tayang_barang = '', $jenis_iklan = '', $user_kode = '' , $urutan = 'DESC' )
  {
    $this->db->from('ad_barang ab');
    $this->db->join('ad_kategori ak', 'ab.id_kategori = ak.id_kategori');
    if ($kategori)
    {
      $this->db->where('ak.nama_kategori', $kategori);
    }
    if ($tayang_barang)
    {
      $this->db->where('ab.tayang_barang', $tayang_barang);
    }
    if ($jenis_iklan)
    {
      $this->db->where('ab.jenis_iklan !=', $jenis_iklan);
    }
    if ($user_kode)
    {
      $this->db->where('ab.user_kode', $user_kode);
    }
    if ($urutan)
    {
      $this->db->order_by('barang_upload_tgl', $urutan);
    }
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_all_iklan_by_kategori($kategori = '',$tayang = '', $jenis_iklan = 'iklan_baris', $urutan = 'DESC')
  {
    $this->db->from('ad_barang ab');
    $this->db->join('ad_kategori ak', 'ab.id_kategori = ak.id_kategori');
    if ($tayang)
    {
      $this->db->where('ab.tayang_barang', $tayang);
    }
    if ($kategori)
    {
      $this->db->where('ak.nama_kategori', $kategori);
    }
    if ($jenis_iklan)
    {
      $this->db->where('ab.jenis_iklan !=', $jenis_iklan);
    }
    if ($urutan)
    {
      $this->db->order_by('ab.barang_upload_tgl', $urutan);
    }

    $result = $this->db->get();
    return $result->result_array();
  }

  public function get_all_iklan_baris($kategori='', $jenis_iklan = 'iklan_baris')
  {
    $this->db->from('ad_barang ab');
    $this->db->join('ad_kategori ak', 'ab.id_kategori = ak.id_kategori');

    if($jenis_iklan)
      $this->db->where('ab.jenis_iklan', $jenis_iklan);
    if($kategori)
      $this->db->where('ak.nama_kategori', $kategori);

    $result = $this->db->get();
    return $result->result_array();
  }

  public function get_all_iklan_limit($tayang='', $user='',$limit='', $jenis_iklan = 'iklan_baris')
  {
    if ($user) {
      $this->db->where('user_kode', $user);
    }
    $this->db->where('tayang_barang', $tayang);
    $this->db->where('jenis_iklan != ', $jenis_iklan);
    $this->db->order_by('barang_upload_tgl', 'DESC');
    $this->db->limit($limit);
    $result = $this->db->get('ad_barang');

    return $result->result_array();
  }

  public function get_iklan_by_slug($data)
  {
    $this->db->where('slug_nama_barang', $data);
    $result = $this->db->get('ad_barang');

    return $result->row();
  }

  public function get_iklan_by_kode($data)
  {
    $this->db->where('barang_kode', $data);
    $result = $this->db->get('ad_barang');

    return $result->row();
  }

  public function delete_iklan($data)
  {
      $this->db->where('slug_nama_barang', $data);
      $this->db->delete('ad_barang');
  }

  public function load_jenis_iklan($data0, $data1)
  {
    $this->db->select('barang_upload_tgl, nama_barang, tayang_barang, harga_barang, slug_nama_barang');
    $this->db->where('jenis_iklan', $data0);
    $this->db->where('user_kode', $data1);
    $result = $this->db->get('ad_barang');

    return $result->result_array();
  }

  public function load_isi_iklan($data)
  {
    $this->db->select('*');
    $this->db->from('ad_barang adb');
    $this->db->join('ad_kategori adk','adb.id_kategori = adk.id_kategori');
    $this->db->join('ad_user adu', 'adb.user_kode = adu.user_kode');
    $this->db->where('slug_nama_barang', $data);
    $query = $this->db->get();

    return $query->row_array();
  }
  public function pasang_iklan($data = '', $identitas = '', $bool = TRUE)
  {
      if ($bool) {
        $this->db->update('ad_user', $identitas, "user_kode ='".$this->session->userdata('user_kd')."'");
      }
      return $this->db->insert('ad_barang', $data);
  }

  public function simpan_iklan_by_kdbarang($data)
  {
    $this->load->helper('array');
    $this->db->where('slug_nama_barang', element('slug_nama_barang', $data));
    unset($data['slug_nama_barang']);

    return $this->db->update('ad_barang', $data);
  }

  public function pasang_iklan_admin($data)
  {
    return $this->db->insert('ad_barang', $data);
  }

  public function edit_iklan_admin($data)
  {
    $this->load->helper('array');
    $this->db->where('slug_nama_barang', element('slug_nama_barang', $data));
    unset($data['slug_nama_barang']);

    return $this->db->update('ad_barang', $data);
  }

  public function add_viewer($slug, $data)
  {
    $this->db->set('view_barang', $data+1);
    $this->db->where('slug_nama_barang', $slug);
    $this->db->update('ad_barang');

    $this->db->select('view_barang');
    $this->db->where('slug_nama_barang', $slug);
    return $this->db->get('ad_barang')->row_array();

  }
}
