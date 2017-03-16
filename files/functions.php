<?php
function sanitize($data){
    if (!is_array($data)) {

        $data = trim(htmlentities($data, ENT_QUOTES, 'UTF-8', false));
    } else {
        //Self call function to sanitize array data
        $data = array_map('sanitize', $data);
    }
    return $data;
}