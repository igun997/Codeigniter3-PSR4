<?php
namespace App\controllers;

class Sample extends \CI_Controller {

    public function index()
    {
        view("sample",["msg"=>"s"]);
    }
}
