<?php
class Page_Data {
    public $title = "";
    public $content = "";
    public $css = "";
    public $js = "";
    public $embeddedStyle = "";
    
    public function addCSS( $href ){
        $this->css .= "<link href='$href' rel='stylesheet' />";
    }

    public function addScript( $src ){
        $this->js .= "<script src='$src'></script>";
    }

}
