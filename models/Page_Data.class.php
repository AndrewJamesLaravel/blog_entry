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

    public function addScript( $href ){
        $this->js .= "<script src='$href'></script>";
    }

}
