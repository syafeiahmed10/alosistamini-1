<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Perumahan__rtlh extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perumahan__rtlh_model');
    }

    /*
     * Listing of perumahan__rtlh
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('perumahan__rtlh/index?');
        $config['total_rows'] = $this->Perumahan__rtlh_model->get_all_perumahan__rtlh_count();
        $this->pagination->initialize($config);

        $data['perumahan__rtlh'] = $this->Perumahan__rtlh_model->get_all_perumahan__rtlh($params);
        $data['title'] = "RTLH";
        $data['_view'] = 'perumahan__rtlh/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new perumahan__rtlh
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('unit_pbdt', 'Unit Pbdt', 'required|integer');
        $this->form_validation->set_rules('unit_dtpfmotm', 'Unit Dtpfmotm', 'required|integer');
        $this->form_validation->set_rules('unit_dtks', 'Unit Dtks', 'required|integer');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|integer');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|max_length[100]');
        // $this->form_validation->set_rules('last_update', 'Last Update', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                // 'village_id' => $this->input->post('village_id'),
                'village_id' => $this->input->post('kelurahan'),
                'unit_pbdt' => $this->input->post('unit_pbdt'),
                'unit_dtpfmotm' => $this->input->post('unit_dtpfmotm'),
                'unit_dtks' => $this->input->post('unit_dtks'),
                'tahun' => $this->input->post('tahun'),
                'keterangan' => $this->input->post('keterangan')
            );

            $perumahan__rtlh_id = $this->Perumahan__rtlh_model->add_perumahan__rtlh($params);
            redirect('perumahan__rtlh/index');
        } else {
            $this->load->model('Reg__village_model');
            $this->load->model('Reg__regency_model');
            $data['all_reg__villages'] = $this->Reg__village_model->get_all_reg__villages();
            $data['all_reg__regencies'] = $this->Reg__regency_model->get_all_reg__regencies();
            $data['title'] = "Tambah RTLH";
            $data['_view'] = 'perumahan__rtlh/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a perumahan__rtlh
     */
    function edit($id_rtlh)
    {
        // check if the perumahan__rtlh exists before trying to edit it
        $data['perumahan__rtlh'] = $this->Perumahan__rtlh_model->get_perumahan__rtlh($id_rtlh);

        if (isset($data['perumahan__rtlh']['id_rtlh'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('unit_pbdt', 'Unit Pbdt', 'required|integer');
            $this->form_validation->set_rules('unit_dtpfmotm', 'Unit Dtpfmotm', 'required|integer');
            $this->form_validation->set_rules('unit_dtks', 'Unit Dtks', 'required|integer');
            $this->form_validation->set_rules('tahun', 'Tahun', 'required|integer');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|max_length[100]');
            $this->form_validation->set_rules('last_update', 'Last Update', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'village_id' => $this->input->post('village_id'),
                    'unit_pbdt' => $this->input->post('unit_pbdt'),
                    'unit_dtpfmotm' => $this->input->post('unit_dtpfmotm'),
                    'unit_dtks' => $this->input->post('unit_dtks'),
                    'tahun' => $this->input->post('tahun'),
                    'keterangan' => $this->input->post('keterangan'),
                    'last_update' => $this->input->post('last_update'),
                );

                $this->Perumahan__rtlh_model->update_perumahan__rtlh($id_rtlh, $params);
                redirect('perumahan__rtlh/index');
            } else {
                $this->load->model('Reg__village_model');
                $data['all_reg__villages'] = $this->Reg__village_model->get_all_reg__villages();

                $data['_view'] = 'perumahan__rtlh/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The perumahan__rtlh you are trying to edit does not exist.');
    }

    /*
     * Deleting perumahan__rtlh
     */
    function remove($id_rtlh)
    {
        $perumahan__rtlh = $this->Perumahan__rtlh_model->get_perumahan__rtlh($id_rtlh);

        // check if the perumahan__rtlh exists before trying to delete it
        if (isset($perumahan__rtlh['id_rtlh'])) {
            $this->Perumahan__rtlh_model->delete_perumahan__rtlh($id_rtlh);
            redirect('perumahan__rtlh/index');
        } else
            show_error('The perumahan__rtlh you are trying to delete does not exist.');
    }
}
