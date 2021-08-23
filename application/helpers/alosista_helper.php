<?php

function get_digit_after_dot_lat_long($value)
{
    return round($value, 8);
}

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }
}

function paginationConfig($baseUrl, $countRow)
{

    $CI = &get_instance();

    $config['base_url'] = $baseUrl;
    $config['total_rows'] = $countRow;
    $config['per_page'] = 10;
    $config['full_tag_open'] = '<nav><ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    $config['attributes'] = array('class' => 'page-link');
    return $config;
}

function show_time($epoch)
{
    return date('Y-m-d H:i:s', $epoch + 5 * 3600);
}

function import_excel()
{

    //Access-Control-Allow-Origin header with wildcard.
    header('Access-Control-Allow-Origin: *');
    $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $ci = get_instance();
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

        if ($ci->input->post('path') == 'surat_keterangan_kumuh') {
            for ($i = 1; $i < count($sheetData); $i++) {

                $object = [
                    'regency_id' => $sheetData[$i]['2'],
                    'sk' => $sheetData[$i]['1'],
                    'last_update' => now()
                ];
                if ($object['regency_id'] == null) {
                    $ci->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    regency_id tidak boleh kosong
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    redirect('kawasan_permukiman/surat_keterangan_kumuh');
                } else {
                    # code...
                    $ci->db->insert('kawasan__surat_keterangan_kumuh', $object);
                }
            }
        } elseif ($ci->input->post('path') == 'lokasi_kumuh') {
            for ($i = 1; $i < count($sheetData); $i++) {

                $object = [
                    'id_sk' => $sheetData[$i]['10'],
                    'lokasi' => $sheetData[$i]['1'],
                    'luas' => (float)$sheetData[$i]['2'],
                    'rt_rw' => $sheetData[$i]['3'],
                    'lintang' => get_digit_after_dot_lat_long($sheetData[$i]['6']),
                    'bujur' => get_digit_after_dot_lat_long($sheetData[$i]['7']),
                    // 'lintang' => $sheetData[$i]['6'],
                    // 'bujur' => $sheetData[$i]['7'],
                    'village_id' => $sheetData[$i]['11'],
                    'tingkat_kumuh' => $sheetData[$i]['9'],

                ];
                if ($object['id_sk'] == null) {
                    redirect('kawasan_permukiman/lokasi_kumuh');
                } else {
                    # code...
                    $ci->db->insert('kawasan__lokasi_kumuh', $object);
                }
            }
        } else {
            for ($i = 1; $i < count($sheetData); $i++) {

                $object = [
                    'id_lokasi' => $sheetData[$i]['1'],
                    'luas_tertangani' => $sheetData[$i]['2'],
                    'tahun' => $sheetData[$i]['3'],
                    'kegiatan' => $sheetData[$i]['4'],
                    'nominal' => $sheetData[$i]['5'],
                    'sumber_dana' => $sheetData[$i]['6'],

                ];
                if ($object['id_lokasi'] == null) {
                    redirect('kawasan_permukiman/penanganan_kumuh');
                } else {
                    # code...
                    $ci->db->insert('kawasan__penanganan_lokasi_kumuh', $object);
                }
            }
        }
    }
}
