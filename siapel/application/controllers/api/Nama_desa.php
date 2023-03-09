<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

//require APPPATH . '/libraries/Format.php';
use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\Format;

class Nama_desa extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nama_desa_model','desa');
    }

    function index_get()
    {
        $no_desa = $this->get('no_desa');
        if ($no_desa === null){
            $desa = $this->desa->getDesa();
        }else{
            $desa = $this->desa->getDesa($no_desa);
        }

        if($desa){
            $this->response([
                'status' => true,
                'data' => $desa
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'no_desa not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
    // DELETE
    function index_delete() {
        $no_desa = $this->delete('no_desa');
        if ($no_desa === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an no_desa'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->desa->deleteDesa($no_desa) > 0) {
                $this->response([
                    'status' => true,
                    'no_desa' => $no_desa,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);   
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'no_desa not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    
    // POST
    public function index_post(){
        $data = [
            'no_desa' => $this->post('no_desa'),
            'nama_desa' => $this->post('nama_desa')
        ];

        if ($this->desa->createDesa($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new nama_desa has been created'
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
        $no_desa = $this->put('no_desa');
        $data = [
            'no_desa' => $this->put('no_desa'),
            'nama_desa' => $this->put('nama_desa')
            
        ];
        if ($this->desa->updateDesa($data, $no_desa) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new nama_desa has been updated'
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
