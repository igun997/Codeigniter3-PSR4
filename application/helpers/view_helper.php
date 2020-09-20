<?php

use Jenssegers\Blade\Blade;
use Rakit\Validation\Validator;

function view(string $view,array $data = []){
    $path = APPPATH."views";
    $blade = new Blade($path,APPPATH."/cache");
    echo $blade->make($view,$data);
}

function validate(array $data,array $rules){
    $validate = new Validator;
    $validation = $validate->make($data,$rules);
    $validation->validate();
    $is_fail = $validation->fails();
    if ($is_fail){
        return  $validation->errors();
    }
    return true;
}

function json($data){
    header("Content-type:application/json");
    echo json_encode($data);
    return true;
}

