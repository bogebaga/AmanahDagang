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
      $query = $this->db->get('ad_kabkota');
    else:
      $query = $this->db->get('ad_kabkota');
    endif;

    return $query->result_array();
  }

  public function get_all_iklan($param)
  {
    $this->db->from('ad_barang ab');
    $this->db->join('ad_kategori ak', 'ab.id_kategori = ak.id_kategori');
    $this->db->where('ak.nama_kategori', $param);
    $query = $this->db->get();

    return $query->result_array();
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

  public function load_jenis_iklan($data)
  {
    $this->db->select('barang_upload_tgl, nama_barang, tayang_barang, harga_barang, slug_nama_barang');
    $this->db->where('jenis_iklan', $data);
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

    return $query->result_array();
  }
  public function pasang_iklan($data)
  {
      $store_db = [
        'nama_barang' => $data['nama_iklan'],
        'slug_nama_barang' => $data['slug_nama_iklan'],
        'barang_kode' => $data['barang_kode'],
        'barang_upload_tgl' => $data['barang_upload_tgl'],
        'user_kode' => $data['user_kode'],
        'id_kategori' => $data['nama_kategori'],
        'jenis_iklan' => $data['jenis_iklan'],
        'jenis_barang' => $data['jenis_barang'],
        'harga_barang' => $data['harga_iklan'],
        'deskripsi_barang' => $data['deskripsi_iklan'],
        'gambar_barang' => $data['gambar_barang'],
        'gambar_fitur' => $data['gambar_fitur'],
        'alamat_barang' => $data['alamat'],
        'tayang_barang' => 'unpublish',
        'fitur_barang' => 'none'
      ];
      return $this->db->insert('ad_barang', $store_db);
  }

  public function simpan_iklan_by_kdbarang($data)
  {
    $this->load->helper('array');

    $this->db->where('barang_kode', element('barang_kode', $data));
    unset($data['barang_kode']);

    return $this->db->update('ad_barang', $data);
  }

  public function pasang_iklan_admin($data)
  {
    return $this->db->insert('ad_barang', $data);
  }

  public function edit_iklan_admin($data)
  {
    $this->load->helper('array');

    $this->db->where('slug_nama_barang', element('slug_nama_barang',$data));
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

    return $this->db->get('ad_barang')->result_array();
  }

  public function tes_ilmu($data)
  {
    $this->db->where('id', $data);
    $result = $this->db->get('tes');
    $array[$data] = $result->result_array();

    return $array;
  }
}
