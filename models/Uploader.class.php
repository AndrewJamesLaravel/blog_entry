<?php
class Uploader {
    private $filename;
    private $fileData;
    private $destination;
    private $errorMessage;
    private $errorCode;
    
    
    public function __construct( $key ) {
        $this->filename = $_FILES[$key]['name'];
        $this->fileData = $_FILES[$key]['tmp_name'];
        $this->errorCode = ( $_FILES[$key]['error'] );
    }

    public function saveIn( $folder ) {
        $this->destination = $folder;
    }
    
    public function save(){
        if ( $this->readyToUpload() ) {
            move_uploaded_file(
                $this->fileData,
                "$this->destination/$this->filename" );
        } else {
            $exc = new Exception( $this->errorMessage );
            throw $exc;
        }
    }

    private function readyToUpload () {
        $folderIsWriteAble = is_writable( $this->destination );
        if ( $folderIsWriteAble === false ) {
            $this->errorMessage = "Error: destination folder is ";
            $this->errorMessage .= "not writable, change permissions";
            $canUpload = false;
        } elseif ( $this->errorCode === 1 ) {
            $maxSize = ini_get( 'upload_max_filesize' );
            $this->errorMessage = "Error: File is too big. ";
            $this->errorMessage .= "Max file size is $maxSize";
            $canUpload = false;
        } elseif ( $this->errorCode === 2 ) {
            $this->errorMessage = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form ";
            $this->errorMessage .= "Error code: $this->errorCode";
            $canUpload = false;
        } elseif ( $this->errorCode === 3 ) {
            $this->errorMessage = "The uploaded file was only partially uploaded ";
            $this->errorMessage .= "Error code: $this->errorCode";
            $canUpload = false;
        } elseif ( $this->errorCode === 4 ) {
            $this->errorMessage = "No file was uploaded ";
            $this->errorMessage .= "Error code: $this->errorCode";
            $canUpload = false;
        } elseif ( $this->errorCode === 6 ) {
            $this->errorMessage = "Missing a temporary folder ";
            $this->errorMessage .= "Error code: $this->errorCode";
            $canUpload = false;
        } elseif ( $this->errorCode === 7 ) {
            $this->errorMessage = " Failed to write file to disk ";
            $this->errorMessage .= "Error code: $this->errorCode";
            $canUpload = false;
        } elseif ( $this->errorCode === 8 ) {
            $this->errorMessage = "A PHP extension stopped the file upload ";
            $this->errorMessage .= "Error code: $this->errorCode";
            $canUpload = false;
        } else {
            $canUpload = true;
        }
        return $canUpload;
    }

}