<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_Siswa extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function get($id = null, $limit = 5, $offset = 0)
  {
    if ($id === null) {
      return $this->db->get('tb_siswa', $limit, $offset);
    } else {
      return $this->db->get_where('tb_siswa', ['id_nis' => $id])->result_array();
    }
  }
  
  public function count()
  {
    return $this->db->get('tb_siswa')->num_rows();
  }

  public function add($data)
  {
    try{
      $this->db->insert('tb_siswa', $data);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        throw new Exception('Terjadi Kesalahan :' . $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    } catch (Exception $ex) {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }
  
  public function update($id, $data)
  {
    try{
      $this->db->update('tb_siswa', $data, ['id_nis' => $id]);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        throw new Exception('Terjadi Kesalahan :' . $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    } catch (Exception $ex) {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }

  public function delete($id)
  {
    try{
      $this->db->delete('tb_siswa',['id_nis' => $id]);
      $error = $this->db->error();
      if (!empty($error['code'])) {
        throw new Exception('Terjadi Kesalahan :' . $error['message']);
        return false;
      }
      return ['status' => true, 'data' => $this->db->affected_rows()];
    } catch (Exception $ex) {
      return ['status' => false, 'msg' => $ex->getMessage()];
    }
  }
}