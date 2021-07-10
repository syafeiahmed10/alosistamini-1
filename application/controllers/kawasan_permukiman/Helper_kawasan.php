<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Helper_kawasan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_lokasi_kumuh');
        $this->load->model('model_for_all');
    }
    public function index()
    {
    }

    public function get_kecamatan($id)
    { //Access-Control-Allow-Origin header with wildcard.
        header('Access-Control-Allow-Origin: *');
        $data = $this->model_for_all->dropdown_kecamatan($id)->result();
        echo json_encode($data);
    }

    public function get_kelurahan($id)
    { //Access-Control-Allow-Origin header with wildcard.
        header('Access-Control-Allow-Origin: *');
        $data = $this->model_for_all->dropdown_kelurahan($id)->result();
        echo json_encode($data);
    }

    public function import_lokasi_kumuh()
    {
        //Access-Control-Allow-Origin header with wildcard.
        header('Access-Control-Allow-Origin: *');
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['berkas_excel']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ('xls' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            for ($i = 1; $i < count($sheetData); $i++) {

                $object = [
                    'id_sk' => $sheetData[$i]['13'],
                    'lokasi' => $sheetData[$i]['7'],
                    'luas' => (float)$sheetData[$i]['8'],
                    'rt_rw' => $sheetData[$i]['6'],
                    'village_id' => $sheetData[$i]['5'],
                    'tingkat_kumuh' => "KUMUH_dberat",
                    'last_update' => now()
                ];

                $this->db->insert('lokasi_kumuh', $object);
            }
            redirect('kawasan_permukiman/lokasi_kumuh');
        }
    }
}

/* End of file Helper_kawasan.php */
