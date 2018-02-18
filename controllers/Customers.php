<?php

class Customers extends Controller{
    public function __construct(){
        $this->customerModel = $this->model('Customer');
    }


    public function register(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = array(
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            );

            if(empty($data['name'])){
                $data['name_err'] = 'Please enter your name';
            }

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter your email';
            }else{
                //Check email
                if($this->customerModel->findCustomerByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }

            if(empty($data['password'])){
                $data['password_err'] = 'Please enter your password';
            }elseif(strlen($data['password']) < 5){
                $data['password_err'] = 'Password must be at least 5 char long';
            }

            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            }elseif($data['password'] != $data['confirm_password']){
                $data['confirm_password_err'] = 'Passwords dont match';
            }

            //Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                // Validated

                //Hash Password
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                //Register Customer
                $this->customerModel->register($data);
                flash('register_success','You are registered and can login');
                redirect('customers/login');
            }else{
                //Load view with errors
                $this->view('customers/register',$data);
            }


        }else{
            $data = array(
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            );

            $this->view('customers/register',$data);
        }


    }

    public function login(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = array(
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            );

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter your email';
            }

            if(empty($data['password'])){
                $data['password_err'] = 'Please enter your password';
            }elseif(strlen($data['password']) < 5){
                $data['password_err'] = 'Password must be at least 5 char long';
            }

            if($this->customerModel->findCustomerByEmail($data['email'])){
                //customer found
            }else{
                $data['email_err'] = 'No customer found!';
            }



            if(empty($data['password_err']) && empty($data['email_err'])){

                $loggedInCustomer = $this->customerModel->login($data['email'],$data['password']);

                if($loggedInCustomer){
                    $this->createCustomerSession($loggedInCustomer);
                }else{
                    $data['password_err'] = 'Password incorrect!';
                    $this->view('customers/login',$data);
                }
            }else{
                $this->view('customers/login',$data);
            }

        }else{
            $data = array(
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            );
             $this->view('customers/login',$data);
        }


    }

    public function createCustomerSession($customer){
        $_SESSION['customer_id'] = $customer->id;
        $_SESSION['customer_name'] = $customer->name;
        $_SESSION['customer_email'] = $customer->email;
        redirect('policies/index');
    }

    public function logout(){
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_email']);
        unset($_SESSION['customer_name']);
        session_destroy();
        redirect('customers/login');
    }
}















