<?php

function is_admin()
{
    $ci = get_instance();
    $role = $ci->session->userdata('level');

    $status = true;

    if ($role != '0') {
        $status = false;
    }

    return $status;
}

function is_pegawai()
{
    $ci = get_instance();
    $role = $ci->session->userdata('level');

    $status = true;

    if ($role != '1') {
        $status = false;
    }

    return $status;
}

function is_staf()
{
    $ci = get_instance();
    $jabatan = $ci->session->userdata('jabatan_id');

    $status = false;

    if ($jabatan == '12' || $jabatan == '13' || $jabatan == '14') {
        $status = true;
    }

    return $status;
}

function set_pesan($pesan, $tipe = true)
{
    $ci = get_instance();
    if ($tipe) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>'.$pesan.'</div></div>');
    } else {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible show fade"><div class="alert-body"><button class="close" data-dismiss="alert"><span>&times;</span></button>'.$pesan.'</div></div>');
    }
}

function output_json($data)
{
    $ci = get_instance();
    $data = json_encode($data);
    $ci->output->set_content_type('application/json')->set_output($data);
}
