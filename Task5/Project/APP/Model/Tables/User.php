<?php
namespace APP\Model\Tables;
use APP\Model\Curd\Curd;
use APP\Model\Tables\Model;
Class User extends Model implements Curd {
    private $id,$first_name,$last_name,$phone,$email,$password, $gender,$verification_code ,$email_verified_at ,$status,$created_at,$updated_at;
    const TABLE ='users';
    
    
    function create(){
        $query="INSERT INTO ". self::TABLE ." (first_name ,last_name,phone,email,password,gender,verification_code)VALUES( ?,?,?,?,?,?,?)";
        
        $stmt=$this->conn->prepare($query);
        if(!$stmt){
            echo "false";
            return false;
        }
        $stmt->bind_param("ssssssi",$this->first_name,$this->last_name,$this->phone,$this->email,$this->password,$this->gender, $this->verification_code);
        return $stmt->execute();   
        }
    
    
    function update(){
        $query="UPDATE ". self::TABLE ." SET first_name = ? , last_name = ? , email = ?  WHERE id = ?";
        $stmt=$this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("sssi",$this->first_name,$this->last_name,$this->email, $this->id);
        return $stmt->execute();   
    }
   
    function updatePassword(){
        $query = "UPDATE " .self::TABLE ." SET password = ? WHERE email = ?";
        $stmt=$this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss",$this->password,$this->email);
        return $stmt->execute();
    }
    public function read ()
    {
        $query = "SELECT * FROM" . self::TABLE ."WHERE email = ?" ;
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s",$this->email);
        if(!$stmt){
            return null;
        }
        $stmt->execute();
        return $stmt->get_result();
    }
    function delete(){
        $query="DELETE FROM " .self::TABLE ."WHERE email = ?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("s",$this->email);
        if(!$stmt){
            return false ;
        }
        return $stmt->execute();
    }
    function comparedcode(){
        $query="SELECT * From ".self::TABLE ." WHERE email = ? AND verification_code = ?";
        $stmt=$this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss",$this->email,$this->verification_code);
        $stmt->execute();
        $stmt->get_result();
        if($stmt->num_rows()==1){
            return false;
        }else{
            return true;
        }
        
    }
    function updateVerificationCode(){
        $query="UPDATE " .self::TABLE . " SET email_verified_at = ? WHERE email = ?";
        $stmt=$this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss",$this->email_verified_at,$this->email);
        $stmt->execute();
        return $stmt;
    }
    function getUserByEmail(){
        $query="SELECT * FROM " . self::TABLE . " WHERE email =?";
        $stmt=$this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s",$this->email);
        $stmt->execute();
        return $stmt->get_result();
      
    }
    function changepassword(){
        $query="UPDATE " .self::TABLE ." SET password = ? WHERE email = ?" ;
        $stmt=$this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss",$this->password,$this->email);
        $stmt->execute();
        return $stmt;
        
    }

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
      
        $this->password =  password_hash($password ,PASSWORD_BCRYPT);

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
     * Get the value of verification_code
     */ 
    public function getVerification_code()
    {
        return $this->verification_code;
    }

    /**
     * Set the value of verification_code
     *
     * @return  self
     */ 
    public function setVerification_code($verification_code)
    {
        $this->verification_code = $verification_code;

        return $this;
    }

    /**
     * Get the value of email_verified_at
     */ 
    public function getEmail_verified_at()
    {
        return $this->email_verified_at;
    }

    /**
     * Set the value of email_verified_at
     *
     * @return  self
     */ 
    public function setEmail_verified_at($email_verified_at)
    {
        $this->email_verified_at = $email_verified_at;

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
}