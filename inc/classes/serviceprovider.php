<?php

class ServiceProvider{
    
    private $transactionDate;
    private $transactionTitle;
    private $transactionName;
    
    function __construct($title, $date) {
		$this->transactionDate = str_replace('/','-', $date);
        $this->transactionTitle = $title;
        
   }
    
    public function setDate($date){
        $this->transactionDate = $date;
        
    }
    
    public function setName($name){
        $this->transactionName = $name;
    }
    
    public function getName(){
        return $this->transactionName;
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