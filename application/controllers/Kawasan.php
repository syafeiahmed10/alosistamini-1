<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kawasan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('alosista_model');
    }


    // ====================================================SK KUMUH==========================================================================
    public function index()
    {
        $data['title'] = 'SK Kumuh';
        $data['content'] =  $this->alosista_model->get_sk_kumuh();

        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('suratketerangankumuh', $data);
        $this->load->view('template/footer');
    }



    public function sk_kumuh_tambah()
    {
        $data['title'] = 'SK Kumuh';
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('surat_keterangan', 'Surat Keterangan', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun SK', 'numeric|trim|required');
        $this->form_validation->set_message('required', '{field} harus diisi');
        $this->form_validation->set_message('numeric', 'Input {field} harus berupa angka');
        if ($this->form_validation->run() == FALSE) {
            $data['content'] =  $this->alosista_model->dropdown_kabupaten_jateng();
            $data['title'] =  "SK Kumuh";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('suratketerangankumuhtambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->alosista_model->add_sk_kumuh();
            redirect('kawasan/');
        }
    }

    public function sk_kumuh_ubah($id_sk)
    {
        $data['title'] = 'SK Kumuh';
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['content'] = $this->alosista_model->dropdown_kabupaten_jateng();
        $data['content2'] = $this->alosista_model->edit_sk_kumuh_get($id_sk);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('suratketerangankumuhubah', $data);
        $this->load->view('template/footer');
    }

    public function sk_kumuh_aksi_ubah()
    {
        $this->alosista_model->edit_sk_kumuh_action($this->input->post('id_sk'));
        redirect('kawasan/');
    }

    public function sk_kumuh_hapus($id_sk)
    {
        $this->alosista_model->del_sk_kumuh($id_sk);
        redirect('kawasan/');
    }

    public function import_sk()
    {
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['berkas_excel']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            for ($i = 1; $i < count($sheetData); $i++) {
                $sk = $sheetData[$i]['0'];
                $tahun = $sheetData[$i]['1'];
                $regency_id = $sheetData[$i]['2'];

                $object = [
                    'sk' => $sk,
                    'tahun' => $tahun,
                    'regency_id' => $regency_id

                ];

                $this->db->insert('surat_keterangan_kumuh', $object);
            }
            redirect('kawasan');
        }
    }
    // ====================================================END OF SK KUMUH==========================================================================

    // ====================================================LOKASI KUMUH==========================================================================
    public function lokasi_kumuh()
    {
        $data['title'] = "Lokasi Kumuh";
        $data['content'] = $this->alosista_model->get_lokasi_kumuh()->result_array();
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('lokasikumuh', $data);
        $this->load->view('template/footer');
    }

    public function lokasi_kumuh_tambah()
    {
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('luas', 'Luas', 'trim|required|decimal');
        $this->form_validation->set_rules('lng', 'Langitude', 'trim|required|decimal');
        $this->form_validation->set_rules('lat', 'Latitude', 'trim|required|decimal');
        $this->form_validation->set_message('required', '{field} harus diisi');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Lokasi Kumuh";
            $data['content'] =  $this->alosista_model->dropdown_sk_kumuh();
            $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('lokasikumuhtambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->alosista_model->add_lokasi_kumuh();
            redirect('kawasan/lokasi_kumuh');
        }
    }

    public function lokasi_kumuh_ubah($id_lokasi)
    {
        // var_dump($this->alosista_model->edit_lokasi_kumuh_get($id_lokasi));
        // die;
        $data['content'] = $this->alosista_model->dropdown_sk_kumuh();
        $data['title'] = "Lokasi Kumuh";
        $data['content2'] = $this->alosista_model->edit_lokasi_kumuh_get($id_lokasi);
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('lokasikumuhubah', $data);
        $this->load->view('template/footer');
    }
    public function lokasi_kumuh_aksi_ubah()
    {
        $this->alosista_model->edit_lokasi_kumuh_action($this->input->post('id_lokasi'));

        redirect('kawasan/lokasi_kumuh');
    }

    public function lokasi_kumuh_hapus($id_lokasi)
    {
        $this->alosista_model->del_lokasi_kumuh($id_lokasi);
        redirect('kawasan/lokasi_kumuh');
    }



    public function import_lokasi()
    {
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['berkas_excel']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            for ($i = 1; $i < count($sheetData); $i++) {
                $lokasi = $sheetData[$i]['0'];
                $luas = $sheetData[$i]['1'];
                $lingkup_adminstratif = $sheetData[$i]['2'];
                $lng = $sheetData[$i]['3'];
                $lat = $sheetData[$i]['4'];
                $tingkat_kumuh = $sheetData[$i]['5'];
                $luas_akhir = $sheetData[$i]['6'];
                $id_sk = $sheetData[$i]['7'];

                $object = [
                    'lokasi' => $lokasi,
                    'luas' => $luas,
                    'lingkup_administratif' => $lingkup_adminstratif,
                    'lng' => $lng,
                    'lat' => $lat,
                    'tingkat_kumuh' => $tingkat_kumuh,
                    'luas_akhir' => $luas,
                    'id_sk' => $id_sk

                ];

                $this->db->insert('lokasi_kumuh', $object);
            }
            redirect('kawasan/lokasi_kumuh');
        }
    }
    // ====================================================END OF LOKASI KUMUH==========================================================================

    // ==================================================PENANGANAN KUMUH==========================================================================
    public function penanganan_kumuh()
    {
        // var_dump($this->alosista_model->get_penanganan_kumuh());
        // die;
        $data['content'] =  $this->alosista_model->get_penanganan_kumuh()->result_array();
        $data['title'] =  "Penanganan Kumuh";
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penanganankumuh', $data);
        $this->load->view('template/footer');
    }

    public function penanganan_kumuh_tambah()
    {
        $this->form_validation->set_rules('proposal', 'Proposal', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] =  $this->alosista_model->dropdown_lokasi_kumuh()->result_array();
            $data['title'] =  "Penanganan Kumuh";
            $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('penanganankumuhtambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->alosista_model->add_penanganan_kumuh();
            redirect('kawasan/penanganan_kumuh');
        }
    }

    public function penanganan_kumuh_hapus($id_penanganan, $id_lokasi)
    {
        $this->alosista_model->del_penanganan_kumuh($id_penanganan, $id_lokasi);
        redirect('kawasan/penanganan_kumuh');
    }

    public function penanganan_kumuh_ubah($id_penanganan)
    {
        // var_dump($this->alosista_model->edit_penanganan_kumuh_get($id_penanganan));
        // die;
        $data['content'] = $this->alosista_model->dropdown_lokasi_kumuh()->result_array();

        $data['content2'] = $this->alosista_model->edit_penanganan_kumuh_get($id_penanganan);

        $data['title'] =  "Penanganan Kumuh";
        $data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penanganankumuhubah', $data);
        $this->load->view('template/footer');
    }

    public function penanganan_kumuh_aksi_ubah()
    {
        $this->alosista_model->edit_penanganan_kumuh_action($this->input->post('id_penanganan'));

        redirect('kawasan/penanganan_kumuh');
    }


    public function import_penanganan()
    {
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['berkas_excel']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            for ($i = 1; $i < count($sheetData); $i++) {
                $proposal = $sheetData[$i]['0'];
                $kegiatan = $sheetData[$i]['1'];
                $tahun = $sheetData[$i]['2'];
                $sumber_dana = $sheetData[$i]['3'];
                $luas_tertangani = $sheetData[$i]['4'];
                $lng = $sheetData[$i]['5'];
                $lat = $sheetData[$i]['6'];
                $id_lokasi = $sheetData[$i]['7'];

                $object = [
                    'proposal' => $proposal,
                    'kegiatan' => $kegiatan,
                    'tahun' => $tahun,
                    'sumber_dana' => $sumber_dana,
                    'luas_tertangani' => $luas_tertangani,
                    'lng' => $lng,
                    'lat' => $lat,
                    'id_lokasi' => $id_lokasi

                ];

                $this->db->insert('penanganan_lokasi_kumuh', $object);
            }
            redirect('kawasan/penanganan_kumuh');
        }
    }
    // ==================================================END OF PENANGANAN KUMUH==========================================================================
}

/* End of file Kawasan.php */
