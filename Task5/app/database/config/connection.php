<?php

class connection {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'ecommerce';
    private $connection;
    function __construct()
    {
        $this->connection = new mysqli($this->hostname,$this->username,$this->password,$this->database);
        # for testing
        // if($this->connection->connect_error){
        //     die("Connection Error is: ". $this->connection->connect_error);
        // }else{
        //     die("Connection Correct");
        // }
    }

    public function runDQL($query)
    {
        //
        $result = $this->connection->query($query);
        if($result->num_rows > 0){
            return $result; // have record
        }
        else{
            return [];
        }

    }

    public function runDML($query)
    {
        $result = $this->connection->query($query);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }


}


// $user= new connection;
