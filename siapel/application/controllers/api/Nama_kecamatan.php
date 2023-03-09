<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

//require APPPATH . '/libraries/Format.php';
use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\Format;

class Nama_kecamatan extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nama_kecamatan_model','kecamatan');
    }

    function index_get()
    {
        $no_kecamatan = $this->get('no_kecamatan');
        if ($no_kecamatan === null){
            $no_kecamatan = $this->kecamatan->getNama_kecamatan();
        }else{
            $kecamatan = $this->kecamatan->getNama_kecamatan($kecamatan);
        }

        if($kecamatan){
            $this->response([
                'status' => true,
                'data' => $kecamatan
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'nama_kecamatan not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    // DELETE
    function index_delete() {
        $no_kecamatan = $this->delete('no_kecamatan');
        if ($no_kecamatan === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an no_kecamatan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->kecamatan->deleteNama_kecamatan($no_kecamatan) > 0) {
                $this->response([
                    'status' => true,
                    'no_kecamatan' => $no_kecamatan,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);   
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'no_kecamatan not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    
    // POST
    public function index_post(){
        $data = [
            'no_kecamatan' => $this->post('no_kecamatan'),
            'nama_kecamatan' => $this->post('nama_kecamatan')
        ];

        if ($this->kecamatan->createNama_kecamatan($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new nama_kecamatan has been created'
            ], REST_Controller::HTTP_CREATED);  
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    // PUT
    public function index_put(){
        $no_kecamatan = $this->put('no_kecamatan');
        $data = [
            'no_kecamatan' => $this->put('no_kecamatan'),
            'nama_kecamatan' => $this->put('nama_kecamatan')
            
        ];
        if ($this->kecamatan->updateNama_kecamatan($data, $no_kecamatan) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new nama_kecamatan has been updated'
            ], REST_Controller::HTTP_OK);   
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
?>
