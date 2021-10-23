<?php

// models
// echo  ;
require_once __DIR__ . "\..\config\connection.php";
require_once __DIR__ . "\..\config\crud.php";


class User extends connection implements crud
{

    // declare attribute as a property
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $phone;
    private $status;
    private $code;
    private $image;
    private $gender;
    private $verified_at;
    private $created_at;
    private $updated_at;




    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = md5($password);

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of verified_at
     */
    public function getVerified_at()
    {
        return $this->verified_at;
    }

    /**
     * Set the value of verified_at
     *
     * @return  self
     */
    public function setVerified_at($verified_at)
    {
        $this->verified_at = $verified_at;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    // all func in connection is already exist in this file by inheritance

    public function read()
    {
    }
    public function delete()
    {
    }
    public function create()
    {
        $query = "INSERT INTO users (first_name,last_name,email,phone,gender,password,code) 
            VALUES ('$this->first_name','$this->last_name','$this->email','$this->phone','$this->gender',
            '$this->password',$this->code)";
        return $this->runDML($query); // to insert

    }

    public function update()
    {
        $query = "UPDATE users 
        SET first_name = '$this->first_name'
        ,last_name='$this->last_name'
        ,phone='$this->phone'
        ,gender='$this->gender'";
        // if($this->image){
        //     $query .= ",image = '$this->image'";
        // }
        $query .= $this->image ? ",image = '$this->image'" :  "";
        $query .= "WHERE email = '$this->email'";
        return $this->runDML($query);
    }


    public function checkIfEmailExist()
    {
        // make query to retrieve email and if return result so email is exist
        $query = "SELECT * FROM users WHERE email = '$this->email'";
        return $this->runDQL($query);
    }
    public function checkIfPhoneExist()
    {
        // make query to retrieve email and if return result so email is exist
        $query = "SELECT * FROM users WHERE phone = '$this->phone'";
        // all func in connection is already exist in this file by inheritance
        return $this->runDQL($query);
    }



    public function checkCode()
    {
        //check with code and email to define which user check on it's code
        $query = "SELECT * FROM users WHERE email = '$this->email' AND code = $this->code";
        return $this->runDQL($query);
    }

    public function verifyUser()
    {
        $query = "UPDATE users SET status = $this->status,verified_at = '$this->verified_at' WHERE email = '$this->email'";
        return $this->runDML($query);
    }

    public function login()
    {
        // /check with code and email to define which user check on it's code
        $query = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password'";
        return $this->runDQL($query);
    }
    public function updateCode()
    {
        $query = "UPDATE users SET code = $this->code WHERE email = '$this->email'";
        return $this->runDML($query);
    }

    public function updatePassword()
    {
        $query = "UPDATE users SET password = '$this->password' WHERE email = '$this->email'";
        return $this->runDML($query);
    }

    public function updateEmail()
    {
        $query = "UPDATE users SET email = '$this->email', status = $this->status , code = $this->code, verified_at = '$this->verified_at'WHERE id = '$this->id'";
        return $this->runDML($query);
    }
}
