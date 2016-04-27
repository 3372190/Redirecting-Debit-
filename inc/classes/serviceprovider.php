<?php

class ServiceProvider{
    
    private $transactionDate;
    private $transactionTitle;
	private $transactionAmount; 
    private $transactionName;
    
    function __construct($title, $date, $amnt) {
		$this->transactionDate = str_replace('/','-', $date);
        $this->transactionTitle = $title;
		$this->transactionAmount = $amnt;
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
	
	public function setAmount($amnt){
		$this->transactionAmount = $amnt;
	}
	
	public function getAmount(){
		return $this->transactionAmount;
	}
    
    
    
}

?>