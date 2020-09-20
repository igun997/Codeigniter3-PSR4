<?php
namespace App\controllers;

use Illuminate\Http\Request;
use Rakit\Validation\Validator;

class Sample extends \CI_Controller {

    public function index(Request $req)
    {

        $validate = validate($req->all(),["id"=>"required"]);
        $msg = "";
        if ($validate !== TRUE){
            $msg = "Error";
        }
        view("sample",["msg"=>$msg]);
    }
}
