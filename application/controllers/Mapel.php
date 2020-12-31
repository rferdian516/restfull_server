<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Mapel extends RESTController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Mapel','mapel');
    } 

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $p = $this->get('id');
            $p = (empty($p)?1:$p);
            $jml_data = $this->mapel->count();
            $jml_page = ceil($jml_data/5);
            $start = ($p - 1)*5;
            $list = $this->mapel->get(null, 5, $start);
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
            $data = $this->mapel->get($id);
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
        'kode_mapel' => $this->post('kode_mapel', true),
        'nama' => $this->post('nama', true),
        'kelas' => $this->post('kelas', true),
      ];
      $simpan = $this->mapel->add($data);
      if ($simpan['status']) {
        $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data berhasil ditambahkan'], RestController::HTTP_CREATED);
      } else {
        $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
      }
    }
    public function index_put()
    {
      $data = [
        'kode_mapel' => $this->put('kode_mapel', true),
        'nama' => $this->put('nama', true),
        'kelas' => $this->put('kelas', true),
      ];
      $id = $this->put('kode_mapel', true);
      if ($id === null) {
        $this->response(['status' => false, 'msg' => 'Masukan Kode Mata Pelajaran'], RestController::HTTP_BAD_REQUEST);
      }
      $simpan = $this->mapel->update($id, $data);
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
      $id = $this->delete('kode_mapel', true);
      if ($id === null) {
        $this->response(['status' => false, 'msg' => 'Masukan Kode Mata Pelajaran Data Yang akan di hapus'], RestController::HTTP_BAD_REQUEST);
      }
      $delete = $this->mapel->delete($id);
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
