<?php

function get_digit_after_dot_lat_long($value)
{
    $result = explode(".", $value);
    $commaAfterDot = substr($result[1], 0, 8);
    $result = $result[0] . "." . $commaAfterDot;
    return $result;
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
    $config['per_page'] = 20;
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
    $dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
    return $dt->format('Y-m-d H:i:s'); // output = 2017-01-01 00:00:00
}
