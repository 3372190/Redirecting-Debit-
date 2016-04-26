<?php

class upload{
    
    private $uploadDir = 'statements/';
    private $uId;
    private $filetoUpload;
    private $targetFile; 
    
    
    function __construct($u, $f){
        $this->uId = $u;
        $this->fileToUpload = $f;
        $this->uploadDir = $this->uploadDir.$this->uId.'/';
        $this->targetFile = $this->uploadDir.basename($this->fileToUpload['name']);
    }
    
    
    
    function checkFileType(){
        $fileType = pathinfo($this->fileToUpload['name'],PATHINFO_EXTENSION);
        //check the type

        if($fileType != "csv"  ) {
            return false;
        }
        return true;    
    }
    
    function checkFileExists(){
        if (file_exists($this->targetFile)) {
            return false;
        }
        return true;
    }
    
    
    function uploadFile(){
        
        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir);
        }
        
        if (move_uploaded_file($this->fileToUpload["tmp_name"], $this->targetFile)) {
            return true;
        } else {
            return false;
        }
    }
    
    function getFilePath(){
        return $this->targetFile;
    }
}
?>
