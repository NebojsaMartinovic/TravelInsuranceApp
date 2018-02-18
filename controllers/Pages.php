<?php

class Pages extends Controller{

    public function __construct(){
        $this->policyModel = $this->model('Policy');
    }

    public function index(){
        $this->view('pages/index');
    }

    public function about(){
        $this->view('pages/about');
    }

    public function policies(){

        $policies = $this->policyModel->show();

        $data = array(
            'policies' => $policies
        );

        $this->view('pages/show',$data);
    }
}
