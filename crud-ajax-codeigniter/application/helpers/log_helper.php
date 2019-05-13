<?php

function helper_log($tipe = "", $str = ""){
    $CI =& get_instance();
 
    if (strtolower($tipe) == "login"){
        $log_tipe   = 0;
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe   = 1;
    }
   
 
    // parameter

    date_default_timezone_set("Asia/Jakarta");
    $param['log_date']      = date('Y-m-d');
    $param['log_time']      = date('H:i:s');
    $param['log_user']      = $CI->session->userdata('username');
    $param['log_tipe']      = $log_tipe;
    $param['log_desc']      = $str;
    $param['ip']            = $_SERVER['REMOTE_ADDR'];

 
    //load model log
    $CI->load->model('m_log');
 
    //save to database
    $CI->m_log->save_log($param);
 
}

?>