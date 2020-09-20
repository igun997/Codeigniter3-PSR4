<?php

use Jenssegers\Blade\Blade;

function view(string $view,array $data = []){
    $path = APPPATH."views";
    $blade = new Blade($path,APPPATH."/cache");
    echo $blade->make($view,$data);
}

function json($data){
    header("Content-type:application/json");
    echo json_encode($data);
    return true;
}
