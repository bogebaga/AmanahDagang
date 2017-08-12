<?php
class User_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_user_profil($val = '')
  {
    if ($val)
    {
      $this->db->where('user_kode', $val);
    }

    $result = $this->db->get('ad_user');
    return $result->row_array();
  }

  public function validate_user_exist($param)
  {
    $this->db->where('user_email', $param);
    $result = $this->db->get('ad_user');

    return $result->row_array();
  }

  public function get_user($data)
  {
    $this->db->where('user_email', $data['email']);
    $this->db->where('user_pass', $data['password']);
    $result = $this->db->get('ad_user');

    return $result->row();
  }

  public function get_user_admin($data)
  {
    $this->db->where('user_email', $data['email']);
    $this->db->where('user_pass', $data['password']);
    $this->db->where('user_type', $data['type']);
    $result = $this->db->get('ad_user');

    return $result->row();
  }

  public function insert_user()
  {
    $this->load->helper(['form']);
    $user_kode = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,7);

    $data = [
      'user_kode' => $user_kode,
      'user_add' => date('Y-m-d H:i:s'),
      'user_login' => $this->input->post('user_nama'),
      'user_pass' => md5($this->input->post('sandi')),
      'user_email' => $this->input->post('email'),
      'user_type' => 'general'
    ];

    return $this->db->insert('ad_user', $data);
  }


  public function edit_user_save($data)
  {
      $this->load->helper('array');

      $this->db->where('user_kode', element('user_kode', $data));
      unset($data['user_kode']);

      return $this->db->update('ad_user', $data);
  }

  public function update_user($data)
  {
    $this->load->library('session');
    $this->db->where('user_kode', $this->session->userdata('user_kd'));
    return $this->db->update('ad_user', $data);
  }

  public function user_hapus($kode)
  {
    $this->db->where('user_kode', $kode);
    return $this->db->delete('ad_user');
  }

  public function iklan_hapus($slug)
  {
    $this->db->where('slug_nama_barang', $slug);
    return $this->db->delete('ad_barang');
  }

  // IDEA: Parse user & parse iklan untuk table admin frontend
  public function parse_user()
  {
      $this->db->select('user_id, user_add, user_kode, user_nama, user_email, user_type, action');
      return $this->db->get('ad_user')->result_array();
  }

  public function iklan_parse(){
    $this->db->select('b.user_nama, b.user_kode,a.barang_kode, a.id_barang, a.jenis_iklan, a.barang_upload_tgl, a.slug_nama_barang, a.nama_barang, a.tayang_barang, a.action');
    $this->db->from('ad_barang a');
    $this->db->join('ad_user b', 'a.user_kode = b.user_kode');
    $this->db->order_by('a.barang_upload_tgl', 'DESC');
    $result = $this->db->get();

    return $result->result_array();
  }
}
