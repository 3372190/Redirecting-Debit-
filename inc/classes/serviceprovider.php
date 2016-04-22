<?php

class ServiceProvider{
    
    private $transactionDate;
    private $transactionTitle;
    
    function __construct($title, $date) {
        $this->transactionDate = $date;
        $this->transactionTitle = $title;
        
   }
    
    public function setDate($date){
        $this->transactionDate = $date;
        
    }
    
    public function setTitle($title){
        $this->transactionTitle = $title;
    }
    
    public function getDate(){
        return $this->transactionDate;
    }
    
    public function getTitle(){
        return $this->transactionTitle;
    }

    
    
    
}

?>