<?php

function append_js($arr_files){
    foreach($arr_files as $file){
        echo  '<script src="'.url('assets/js/pages/'.$file).'"></script>';
    }
}

function append_css($arr_files){
    foreach($arr_files as $file){
       echo '<link rel="stylesheet" href="'.url('assets/dist/css/'.$file).'" />';
    }
}

function group_by($key, $data) {
    $result = array();
    foreach($data as $val) {
        if(array_key_exists($key, $val)){
            $result[$val[$key]][] = $val;
        }else{
            $result[""][] = $val;
        }
    }
    return $result;
}

?>