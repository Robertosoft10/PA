<?php
class Client{
   private $clientId;
   private $clientname;
   private $clientfone;
   private $clientlocal;
   private $clientemail;

   public function __construct($clientId=0, $clientname="", $clientfone="", $clientlocal="", $clientemail=""){
       $this->clientId = $clientId;
       $this->clientname = $clientname;
       $this->clientfone = $clientfone;
       $this->clientlocal = $clientlocal;
       $this->clientemail = $clientemail;
   }
   public function getClientId(){
       return $this->clientId;
   }
   public function setClientId($clientId){
        $this->clientId = $clientId;
    }
    public function getClientname(){
        return $this->clientname;
    }
    public function setClientname($clientname){
         $this->clientname = $clientname;
     }
     public function getClientfone(){
        return $this->clientfone;
    }
    public function setClientfone($clientfone){
         $this->clientfone = $clientfone;
     }
     public function getClientlocal(){
        return $this->clientlocal;
    }
    public function setClientlocal($clientlocal){
         $this->clientlocal = $clientlocal;
     }
     public function getClientemail(){
        return $this->clientemail;
    }
    public function setClientemail($clientemail){
         $this->clientemail = $clientemail;
     }
}
?>