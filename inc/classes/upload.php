<?php

class upload{
    
    private $uploadDir = 'files/';
    private $uId;
    private $filetoUpload;
    
    
    function __construct($u, $f){
        $this->uId = $u;
        $this->fileToUpload = $f;
    }
    
    
    function checkFileType(){
        $fileType = pathinfo($this->fileToUpload,PATHINFO_EXTENSION);
        //check the type and if it exists
        if (file_exists($this->fileToUpload)) {
            return false;
        }
        if($imageFileType != "csv"  ) {
            return false;
        }
        return true;    
    }
    
    
    function uploadFile(){
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            return true;
        } else {
            return false;
        }
    }
    
    function getFilePath(){}
    
    
    
    
    
}








?>
