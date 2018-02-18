<?php

class Policy extends ActiveRecord{
     public static $tableName = 'policies';
     public static $keyColumn = 'id';
     public $fullname,$customer_id,$policy,$firstname,$lastname,$dateofbirth,$phone,$from_date,$to_date;

    public function buy($data){
        $this->fullname = $data['fullname'];
        $this->customer_id = $data['customer_id'];
        $this->policy = $data['policy'];
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->dateofbirth = $data['dateofbirth'];
        $this->phone = $data['phone'];
        $this->from_date = $data['from_date'];
        $this->to_date = $data['to_date'];

        $this->insert();
    }

    public function show(){
        $policies = static::getAll();
        return $policies;
    }

}
