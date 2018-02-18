<?php

class Customer extends ActiveRecord{
    public static $tableName = 'customers';
    public static $keyColumn = 'id';
    public $name;
    public $email;
    public $password;


    public function register($data){
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];

        $this->insert();
    }

    public function findCustomerByEmail($customerEmail){
       $customers = static::getAll();
        foreach($customers as $customer){
            if($customer->email == $customerEmail){
                return true;
            }
        }

    }

    public function login($email,$password){
        $customers = static::getAll();
        foreach($customers as $customer){
            if($customer->email == $email){
                 $hashed_password = $customer->password;
                if(password_verify($password,$hashed_password)){
                    return $customer;
                }else{
                    return false;
                }
            }
        }
    }

    public function getCustomerById($id){
        $customer = static::get($id);
        return $customer;
    }
}









