<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_Mapel extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function get($id = null, $limit = 5, $offset = 0)
  {
    if ($id === null) {
      return $this->db->get('tb_mapel', $limit, $offset);
    } else {
      return $this->db->get_where('tb_mapel', ['kode_mapel' => $id])->result_array();
    }
  }
  
  public function count()
  {
    return $this->db->get('tb_mapel')->num_rows();
  }

  public function add($data)
  {
    try{
      $this->db->insert('tb_mapel', $data);
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
      $this->db->update('tb_mapel', $data, ['kode_mapel' => $id]);
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
      $this->db->delete('tb_mapel',['kode_mapel' => $id]);
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