<?php
require_once __DIR__."\..\database\models\User.php";

class registerRequest{
    private $email; // this email whick amke vaidation on it
    private $password;
    private $confirmPassword;
    private $phone;

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
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of confirmPassword
     */ 
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * Set the value of confirmPassword
     *
     * @return  self
     */ 
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

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

     // validation method 
     public function emailValidation(){
        $pattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
        $errors = [];
        //check if email is empty
        if(empty($this->email)){
            $errors['email-required'] = "<div class='alert alert-danger'> Email Is Required </div>";
        }else{
            //check if exist email so must match regqxp
            if(!preg_match($pattern,$this->email)){
                $errors['email-pattern'] = "<div class='alert alert-danger'> Email Is Invalid </div>";
            }    
        }
        return $errors; // return array empty or have values
    }

    public function passwordValidation(){
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        $errors = [];
        if(empty($this->password)){
            $errors['password-required'] = "<div class='alert alert-danger'> Password Is Required </div>";
        }
        if(empty($this->confirmPassword)){
            $errors['confirmPassword-required'] = "<div class='alert alert-danger'> Confirm Password Is Required </div>";
        }

        if(empty($errors)){
            //check matched password
            if($this->password !== $this->confirmPassword){
                
                $errors['password-confirmed'] = "<div class='alert alert-danger'> Password Dosen't Match  </div>";
            }
            // check regexp
            if(!preg_match($pattern,$this->password)){
                $errors['password-pattern'] = "<div class='alert alert-danger'>Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character. </div>";
            }
        }
        return $errors; // return errors or empty array

    }
    public function emailExists(){
        $errors = [];
        $userObject = new User;
        $userObject->setEmail($this->email); // return email used in check email exist
        $result = $userObject->checkIfEmailExist();
        if($result){
            $errors['email-unique'] = "<div class='alert alert-danger'>Email Already Exists </div>";
        }
        else{
            return $result;
        }
        return $errors;
        
    }
    public function phoneExists(){
        $errors = [];
        $userObject = new User;
        $userObject->setPhone($this->phone); // return email used in check email exist
        $result = $userObject->checkIfPhoneExist();
        if($result){
            $errors['phone-unique'] = "<div class='alert alert-danger'>Phone is Already Exist</div>";
        }
        else{
            return $result;
        }
        return $errors;
    }
}