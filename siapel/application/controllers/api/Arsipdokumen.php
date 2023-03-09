<?php

defined('BASEPATH') or exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;


class Arsipdokumen extends REST_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->methods['index_put']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function index_get()
    {
        // Users from a data store e.g. database
        $kode_arsip = $this->get('kode_arsip');

        // If the id parameter doesn't exist return all the users

        if ($kode_arsip === NULL) {

            $this->db->select('*');
            $this->db->from('arsip_dokumen ad');
            $this->db->join('desa i', 'i.no_desa = ad.no_desa');
            $this->db->join('kecamatan k', 'k.no_kecamatan = ad.no_kecamatan');
            $arsip_dokumen = $this->db->get()->result_array();
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($arsip_dokumen) {
                // Set the response and exit
                $this->response($arsip_dokumen, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Tidak Ditemukan Transaksi'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $kode_arsip = (int) $kode_arsip;

            // Validate the id.
            if ($kode_arsip <= 0) {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            $this->db->select('*');
            $this->db->from('arsip_dokumen ad');
            $this->db->join('desa i', 'i.no_desa = ad.no_desa');
            $this->db->join('kecamatan k', 'k.no_kecamatan = ad.no_kecamatan');
            $this->db->where(array("kode_arsip" => $kode_arsip));
            //$this->db->query("select * from arsip_dokumen ad join kecamatan k on k.no_kecamatan = ad.no_kecamatan DESC");
            $arsip_dokumen = $this->db->get()->row_array();

            $this->response($arsip_dokumen, REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        // $this->some_model->update_user( ... );
        $data = [
            'kode_arsip' => $this->post('kode_arsip'),
            'nik' => $this->post('nik'),
            'nama_kk' => $this->post('nama_kk'),
            'no_desa' => $this->post('no_desa'),
            'no_kecamatan' => $this->post('no_kecamatan')
        ];

        $this->db->insert("arsip_dokumen", $data);

        $this->set_response($data, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function index_delete()
    {
        // $this->some_model->delete_something($id);

        $kode_arsip = $this->delete('kode_arsip');
        $this->db->where('kode_arsip', $kode_arsip);
        $this->db->delete('arsip_dokumen');
        $messages = array('status' => "Data berhasil dihapus");
        $this->set_response($messages, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }
    public function index_put()
    {
        $data = array(
            'kode_arsip' => $this->post('kode_arsip'),
            'nik' => $this->post('nik'),
            'nama_kk' => $this->post('nama_kk'),
            'no_desa' => $this->post('no_desa'),
            'no_kecamatan' => $this->post('no_kecamatan')
        );

        $this->db->where('kode_arsip', $this->put('kode_arsip'));
        $this->db->update('arsip_dokumen', $data);

        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
}