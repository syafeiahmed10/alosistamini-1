<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Helper_kawasan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_lokasi_kumuh');
        $this->load->model('model_for_all');
        $this->load->helper('download');
        $this->load->helper('url');
        $this->load->helper('alosista_helper');
    }

    public function index()
    {
    }



    public function download()
    {
        $kabupaten = strtolower($this->input->post('kabupaten'));
        $kabupaten = ucwords($kabupaten);
        $path = $this->input->post('path');
        if ($path == 'lokasi_kumuh') {
            $fileName = 'Eksisting Kumuh_' . $kabupaten . '.xls';
        } else {
            $fileName = 'Penanganan Kumuh_' . $kabupaten . '.xlsx';
        }

        if ($fileName) {
            $file = realpath('assets/files/' . $path . '/download/format/' . $fileName);
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                //force download
                force_download($fileName, $data);
            } else {
                // Redirect to base url
                redirect(base_url());
            }
        }
    }



    public function get_kecamatan($id)
    { //Access-Control-Allow-Origin header with wildcard.
        header('Access-Control-Allow-Origin: *');
        $data = $this->model_for_all->get_kecamatan($id)->result();
        echo json_encode($data);
    }

    public function get_kelurahan($id)
    { //Access-Control-Allow-Origin header with wildcard.
        header('Access-Control-Allow-Origin: *');
        $data = $this->model_for_all->dropdown_kelurahan($id)->result();
        echo json_encode($data);
    }

    public function import()
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

            if ($this->input->post('path') == 'surat_keterangan_kumuh') {
                for ($i = 1; $i < count($sheetData); $i++) {

                    $object = [
                        'regency_id' => $sheetData[$i]['2'],
                        'sk' => $sheetData[$i]['1'],
                        'last_update' => now()
                    ];
                    if ($object['regency_id'] == null) {
                        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        regency_id tidak boleh kosong
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>');
                        redirect('kawasan_permukiman/surat_keterangan_kumuh');
                    } else {
                        # code...
                        $this->db->insert('surat_keterangan_kumuh', $object);
                    }
                }
                redirect('kawasan_permukiman/surat_keterangan_kumuh');
            } elseif ($this->input->post('path') == 'lokasi_kumuh') {
                for ($i = 1; $i < count($sheetData); $i++) {

                    $object = [
                        'id_sk' => $sheetData[$i]['12'],
                        'lokasi' => $sheetData[$i]['6'],
                        'luas' => (float)$sheetData[$i]['7'],
                        'rt_rw' => $sheetData[$i]['5'],
                        'lintang' => get_digit_after_dot_lat_long($sheetData[$i]['8']),
                        'bujur' => get_digit_after_dot_lat_long($sheetData[$i]['9']),
                        'village_id' => $sheetData[$i]['4'],
                        'tingkat_kumuh' => $sheetData[$i]['11'],
                        'last_update' => now()
                    ];
                    if ($object['id_sk'] == null) {
                        redirect('kawasan_permukiman/lokasi_kumuh');
                    } else {
                        # code...
                        $this->db->insert('lokasi_kumuh', $object);
                    }
                    redirect('kawasan_permukiman/lokasi_kumuh');
                }
            } else {
                for ($i = 1; $i < count($sheetData); $i++) {

                    $object = [
                        'id_lokasi' => $sheetData[$i]['15'],
                        'luas_tertangani' => $sheetData[$i]['8'],
                        'tahun' => (float)$sheetData[$i]['11'],
                        'kegiatan' => $sheetData[$i]['12'],
                        'nominal' => $sheetData[$i]['13'],
                        'sumber_dana' => $sheetData[$i]['14'],
                        'last_update' => now()
                    ];
                    if ($object['id_lokasi'] == null) {
                        redirect('kawasan_permukiman/penanganan_kumuh');
                    } else {
                        # code...
                        $this->db->insert('penanganan_lokasi_kumuh', $object);
                    }
                }
            }
        }
    }
}

/* End of file Helper_kawasan.php */
