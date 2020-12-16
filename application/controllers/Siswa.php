<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Siswa extends RESTController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Siswa','siswa');
    } 

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $p = $this->get('id');
            $p = (empty($p)?1:$p);
            $jml_data = $this->siswa->count();
            $jml_page = ceil($jml_data/5);
            $start = ($p - 1)*5;
            $list = $this->siswa->get(null, 5, $start);
            if ($list) {
                $data = [
                    'status' => true,
                    'page' => $p,
                    'jml_data' => $jml_data,
                    'jml_page' => $jml_page,
                    'data' => $list
                ];
            }else {
                $data = [
                    'status' => false,
                    'msg' => 'Data tidak ada'
                ];
            }
            $this->response($data, RestController::HTTP_OK);
        }else {
            $data = $this->siswa->get($id);
            if ($data) {
                $this->response(['status' => true, 'data' => $data], RestController::HTTP_OK);
            }else {
                $this->response(['status' => true, 'msg' => $id], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
      $data = [
        'id_nis' => $this->post('id_nis', true),
        'nama' => $this->post('nama', true),
        'jeniskel' => $this->post('jeniskel', true),
        'tgl' => $this->post('tgl', true),
        'kota' => $this->post('kota', true),
        'alamat' => $this->post('alamat', true),
      ];
      $simpan = $this->siswa->add($data);
      if ($simpan['status']) {
        $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data berhasil ditambahkan'], RestController::HTTP_CREATED);
      } else {
        $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
      }
    }
    public function index_put()
    {
      $data = [
        'id_nis' => $this->put('id_nis', true),
        'nama' => $this->put('nama', true),
        'jeniskel' => $this->put('jeniskel', true),
        'tgl' => $this->put('tgl', true),
        'kota' => $this->put('kota', true),
        'alamat' => $this->put('alamat', true),
      ];
      $id = $this->put('id_nis', true);
      if ($id === null) {
        $this->response(['status' => false, 'msg' => 'Masukan ID Pelanggan'], RestController::HTTP_BAD_REQUEST);
      }
      $simpan = $this->siswa->update($id, $data);
      if ($simpan['status']) {
        $status = (int)$simpan['data'];
        if ($status > 0)
          $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data Berubah'], RestController::HTTP_OK);
        else
          $this->response(['status' => false, 'msg' => 'Tidak ada data yang di update'], RestController::HTTP_BAD_REQUEST);
      } else {
        $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
      }
    }

    public function index_delete()
    {
      $id = $this->delete('id_nis', true);
      if ($id === null) {
        $this->response(['status' => false, 'msg' => 'Masukan ID Pelanggan Data Yang akan di hapus'], RestController::HTTP_BAD_REQUEST);
      }
      $delete = $this->siswa->delete($id);
      if ($delete['status']) {
        $status = (int)$delete['data'];
        if ($status > 0)
          $this->response(['status' => true, 'msg' => $id . ' Data Terhapus'], RestController::HTTP_OK);
        else
          $this->response(['status' => false, 'msg' => 'Tidak ada data yang di hapus'], RestController::HTTP_BAD_REQUEST);
      } else {
        $this->response(['status' => false, 'msg' => $delete['msg']], RestController::HTTP_INTERNAL_ERROR);
      }
    }
}
