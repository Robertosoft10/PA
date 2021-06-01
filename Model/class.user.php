<?php
class User{
   private $useId;
   private $username;
   private $useremail;
   private $usernivel;
   private $userpassword;
   private $useriamge;

   public function __construct($useId=0, $username="", $useremail="", $usernivel="", $userpassword="", $useriamge=""){
       $this->useId = $useId;
       $this->username = $username;
       $this->useremail = $useremail;
       $this->usernivel = $usernivel;
       $this->userpassword = $userpassword;
       $this->useriamge = $useriamge;
   }
   public function getUseId(){
       return $this->useId;
   }
   public function setUseId($useId){
        $this->useId = $useId;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
         $this->username = $username;
     }
     public function getUseremail(){
        return $this->useremail;
    }
    public function setUseremail($useremail){
         $this->useremail = $useremail;
     }
     public function getUsernivel(){
        return $this->usernivel;
    }
    public function setUsernivel($usernivel){
         $this->usernivel = $usernivel;
     }
     public function getUserpassword(){
        return $this->userpassword;
    }
    public function setUserpassword($userpassword){
         $this->userpassword = $userpassword;
     }
     public function getUserimage(){
        return $this->userimagee;
    }
    public function setUserimage($userimagee){
         $this->userimagee = $userimagee;
     }
}
?>