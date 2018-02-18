<?php

class Policies extends Controller{

    public function __construct(){
        $this->policyModel = $this->model('Policy');
    }



     public function index(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $raw_from_date = htmlentities($_POST['from_date']);
            $from_date = date('Y-m-d', strtotime($raw_from_date));

            $raw_to_date = htmlentities($_POST['to_date']);
            $to_date = date('Y-m-d', strtotime($raw_to_date));


            if(isset($_POST['firstname']) && is_array($_POST['firstname'])){
                $firstname = implode(" / ",$_POST['firstname']);
            }
            if(isset($_POST['lastname']) && is_array($_POST['lastname'])){
                $lastname = implode(" / ",$_POST['lastname']);
            }

            if(isset($_POST['dateofbirth']) && is_array($_POST['dateofbirth'])){
                $dateofbirth = implode(" / ",$_POST['dateofbirth']);
            }




            $data = array(
                'fullname' => trim($_POST['fullname']),
                'policy' => trim($_POST['policy']),
                'phone' => trim($_POST['phone']),
                'from_date' => $from_date,
                'to_date' => $to_date,
                'firstname' => trim($firstname),
                'customer_id' => $_SESSION['customer_id'],
                'lastname' => trim($lastname),
                'dateofbirth' => $dateofbirth,
                'fullname_err' => '',
                'phone_err' => ''

            );

            if(empty($data['fullname'])){
                $data['fullname_err'] = 'Please enter your fullname';
            }

            if(empty($data['phone'])){
                $data['phone_err'] = 'Please enter your phone number';
            }



            //Make sure errors are empty
            if(empty($data['fullname_err']) && empty($data['phone_err'])){
                // Validated


                //Register Customer
                $this->policyModel->buy($data);
                flash('buy_success','You have successfully bought policy');
                redirect('pages/about');
            }else{
                //Load view with errors
                $this->view('policies/index',$data);
            }


        }else{
            $data = array(
                'fullname' => '',
                'policy' => '',
                'phone' => '',
                'from_date' => '',
                'to_date' => '',
                'firstname' => '',
                'lastname' => '',
                'dateofbirth' => '',
                'fullname_err' => '',
                'phone_err' => ''


            );

            $this->view('policies/index',$data);
        }


    }
}
