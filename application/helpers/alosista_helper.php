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
